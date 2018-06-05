<?php
/**
 * Created by PhpStorm.
 * User: zipman
 * Date: 28.05.18
 * Time: 10:13
 */

namespace App\Repository;

use PDO;

class Repository extends RepositoryAbstract
{

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function save($image)
    {
        $this->pdo->beginTransaction();
        $newImage = $this->pdo->prepare("INSERT INTO images(name, views) VALUE (:imageName, :fileViews);");
        try {
            $newImage->execute(['imageName' => $image->name,
                'fileViews' => 0]);
        } catch (\PDOException $e) {
            return false;
        }
        $imageID = $this->pdo->lastInsertId();

        foreach ($image as $key => $value) {
            $newImageAttr = $this->pdo->prepare("INSERT INTO images_properties(image_id, img_key, img_value) 
                                          VALUE (:imageID, :imageKey, :imageValue);");
            try {
                $newImageAttr->execute(['imageID' => $imageID,
                    'imageKey' => $key,
                    'imageValue' => $value,
                ]);
            } catch (\PDOException $e) {
                var_dump($e);
                return false;
            }
        }

        $this->pdo->commit();

        return $this->findById($imageID);
    }


    public function findById($id)
    {
        $imageName = $this->pdo->prepare("SELECT img.name FROM images img WHERE img.id = :id;");
        $imageName->execute(['id' => $id]);
        $result = $imageName->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function findAllImages(array $filters = []) : array
    {
        $sql = "SELECT img.id, img.name, img.views FROM images img ";

        if(isset($filters['limit'])) {
            $sql .= "JOIN images_properties pi ON img.id=pi.image_id ";
            if (!empty($filters['weight'])) {
                $sql .= "WHERE pi.img_key = 'size' AND pi.img_value " . $filters['sign'] . $filters['weight'] . " ";
                if(!empty($filters['countViews']) || $filters['countViews'] === 0){
                    $sql .= "AND img.views = " . $filters['countViews'] . " ";
                }
            } else {
                $sql .= "WHERE pi.img_key = '" . $filters['sortSize'] . "' AND pi.img_value " . $filters['ratio'] . $filters['dimension'] . " ";
                if(!empty($filters['countViews']) || $filters['countViews'] === 0){
                    $sql .= "AND img.views = " . $filters['countViews'] . " ";
                }
            }
            unset($filters['ratio']);
        }

        $preQuery = $this->pdo->query($sql . ";");
        $totalRows = $preQuery->rowCount();


        if(!isset($filters['page'])) {
            $filters['page'] = 1;
        }

        if(!isset($filters['limit'])){
            $filters['limit'] = 5;
        }

        $start = ($filters['page']-1)*$filters['limit'];
        if($start < 0) $start = 0;

        $sql .= "LIMIT " . $start . ", " . $filters['limit'];

        $allImages = $this->pdo->prepare($sql . ";");
        $allImages->execute([]);
        $arrImages = [];
        foreach ($allImages as $row) {
            $arrImages[] = $row;
        }

        $totalPages = ceil($totalRows / $filters['limit']);

        $data = ['totalPages' => $totalPages, 'arrImages' => $arrImages];

        return $data;

    }


    public function viewsCounter($id, $views)
    {
        $allImages = $this->pdo->prepare("UPDATE images SET views = :views WHERE id = :id; ");
        $allImages->execute([
            'views' => $views,
            'id' => $id
        ]);
    }
}
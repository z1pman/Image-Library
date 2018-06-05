<?php
/**
 * Created by PhpStorm.
 * User: zipman
 * Date: 28.05.18
 * Time: 18:04
 */

namespace App\Controller;


use App\Repository\Repository;

class ImageController
{
    private $image;

    /**
     * Validation constructor.
     */
    public function __construct()
    {
        $this->image = new \stdClass();
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $this->image->type = (explode('/', finfo_file($finfo, $_FILES['userfile']['tmp_name'])))[1];
        finfo_close($finfo);
        $this->image->size = round((filesize($_FILES['userfile']['tmp_name']) / 1024), 2);
        $resolution = GetImageSize($_FILES['userfile']['tmp_name']);
        $this->image->width = $resolution[0];
        $this->image->height = $resolution[1];
        $this->image->name = time() . basename($_FILES['userfile']['name']);
    }


    /**
     * @return array|bool|mixed
     */
    public function saveAction()
    {
        if($errors = $this->validateAction()){
            return $errors;
        };
        $saveImage = new Repository();
        $image = $saveImage->save($this->image);
        $this->saveToFolder();

        return $image;
    }

    /**
     * @return array
     */
    private function validateAction()
    {
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
            $validation = new ValidationController($this->image);
            return $validation->validate();
        } else {
            return ["uploaded" => "File is not uploaded"];
        }
    }


    public function saveToFolder(): void
    {
        move_uploaded_file($_FILES['userfile']['tmp_name'], DIR_PATH . '/img/' . $this->image->name);

        // If used cyrillic language

        // move_uploaded_file($_FILES['userfile']['tmp_name'], iconv("UTF-8", "WINDOWS-1251", (DIR_PATH . '/img/' . $validation->nameFile)));
    }
}
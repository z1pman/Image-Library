<?php
/**
 * Created by PhpStorm.
 * User: Cougar
 * Date: 07.01.2018
 * Time: 12:58
 */

namespace App\Controller;

use App\Controller\ValidationController;
use App\Repository\Repository;


class MainController
{

    protected $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function execute()
    {
        switch ($this->action) {
            case '':
            case 'main':
                $this->mainAction();
                break;
            case 'save':
                $this->saveAction();
                break;
            case 'getAllPositions':
                $this->getAllPositionAction();
                break;
            case 'viewCounter' :
                $this->viewCounter();
                break;

            default:
                $this->errorAction();
        }
    }

//------------------------------------------------------------- function

    protected function mainAction()
    {
        $filters = $_REQUEST;
        $result = $this->getAllPositionAction($filters);

        if($this->is_ajax()) {
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            require_once DIR_VIEW . '/view/main.html';
        }
    }

    protected function errorAction() : void
    {
        require_once DIR_VIEW . '/public/error.php';
        exit();
    }

    /**
     * @return array|bool|mixed
     */
    private function saveAction()
    {
        $image = new ImageController();
        return $image->saveAction();
    }

    /**
     * @param array $filters
     * @return array
     */
    private function getAllPositionAction($filters = [])
    {
        $allPosition = new Repository();
        return  $allPosition->findAllImages($filters);
    }

    private function viewCounter()
    {
        $imgID = $_POST['id'];
        $imgViews = $_POST['views'];
        $upperView = new Repository();
        $upperView->viewsCounter($imgID, $imgViews);
        header("Content-type: application/json; charset=utf-8");
        echo json_encode([$upperView], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return bool
     */
    private function is_ajax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }






}
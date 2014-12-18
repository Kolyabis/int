<?php
class KerivnikController implements IController{
    public function indexAction(){
        $fc = FrontController::getInstance();
        $params = $fc->getParams();
        $view = new IndexModel();
        $result = $view->render('../views/index.php');
        $fc->setBody($result);
    }
    public function updateAction(){}
    public function insertAction(){}
    public function deleteAction(){}
}
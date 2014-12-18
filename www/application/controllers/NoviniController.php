<?php
class NoviniController implements IController{
    public function indexAction(){
        $fc = FrontController::getInstance();
        $params = $fc->getParams();
        $view = new IndexModel();
        $result = $view->listGo('../views/razgovor.php',$params);
        $fc->setBody($result);
    }
    public function updateAction(){
        $fc = FrontController::getInstance();
        $params = $fc->getParams();
        $view = new ListModel();
        $result = $view->isertList('../views/razgovor.php',$params);
        $fc->setBody($result);
    }
    public function insertAction(){
        $fc = FrontController::getInstance();
        $params = $fc->getParams();
        $params['token'] = $_COOKIE['PHPSESSID'];
        $view = new ListModel();
        $result = $view->insertUser('../views/razgovor.php',$params);
        $fc->setBody($result);
    }
    public function deleteAction(){}
}
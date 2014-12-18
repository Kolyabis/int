<?php
class IndexController implements IController{
    public function indexAction(){
          $fc = FrontController::getInstance();
          $params = $fc->getParams();
          $params['token'] = 	;
          $view = new IndexModel();
          $view->params = $params;
          $result = $view->listGo('../views/index.php', $params);
          $fc->setBody($result);
    }
    public function updateAction(){}
    public function insertAction(){}
    public function deleteAction(){}

}

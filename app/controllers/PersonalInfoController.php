<?php
namespace app\controllers;
use app\core\Controller;
//контроллер личной страницы
class PersonalInfoController extends Controller {
    
public function indexAction() {
  $res =  $this->model->getPersonInfo($_SESSION['auth']['id']);
    if ($res) {
        $this->view->render($res);
    }
 }
public function save_changeAction() {
    if ($this->isAjax()) {
      if (isset($_POST['name_change']) AND isset($_POST['lastName_change']) AND isset($_POST['email_change']) AND isset($_POST['sex_change']) AND  isset($_POST['birthdate_change'])) {
        // $res = 'yes';
        // $res = [$_POST['name_change'],$_POST['lastName_change'], $_POST['email_change'], $_POST['sex_change'], $_POST['birthdate_change']];
        // echo
        // json_encode([$_POST['name_change'], $_POST['lastName_change'], $_POST['email_change'], $_POST['sex_change'] , $_POST['birthdate_change'],$_SESSION['auth']['id']]);
        $res = $this->model->save_change($_POST['name_change'], $_POST['lastName_change'], $_POST['email_change'], $_POST['sex_change'], $_POST['birthdate_change'], $_SESSION['auth']['id']);
        if (!$res) {
          $res = 'true';
        } else {
          $res = 'false';
        }
        echo json_encode($res);
      } 
     } else {
       return 'false';
     }
 }
    
}
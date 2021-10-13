<?php
require_once("./config/databaseConfig.php");
require_once("./models/Users.php");
require_once('./models/Roles.php');
require_once('./services/UsersServices.php');   
  
$viewData;

class WebMain extends DatabasePDOConfiguration {

    private $user;

        function __construct() {
        
            $this->user = new UsersServices();
            $viewData['logged'] = $this->user->loggedUser();
            require_once("./views/header.php");

        $url = explode("/", strtok($_SERVER['REQUEST_URI'], '?'));

        switch($url[sizeof($url) - 1]) {
            case '':
                $this->home();
                break;
            case 'addProcess':
                $this->addProcess();
                break;
            case 'studimi':
                $this->studimi();
                break;
            case 'apliko':
                $this->apliko();
                break;
            case 'list':
                $this->list();
                break;
            case 'events':
                $this->events();
                break;
            case 'loginVerify':
               $this->loginVerify();
               break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->notfound();
                break;

        }
        require_once("./views/footer.php");
    }

    function home() {
       // $viewData['newsBallina'] = $this->news->getNewsByCategory(1);
        require_once("./views/home.php");
    }

    function studimi() {
        require_once("./views/studimi.php");
    }

    function apliko() {
        require_once("./views/apliko.php");
    }
    function events() {
        require_once("./views/events.php");
    }

    function addProcess() {    
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
 
         $data = (object)$_POST;
         if(isset($data->id)) {
             unset($data->id);
         }
             $data->role_id = 1;
             $data->active = 1;

           
             $this->user->insertUser($data);
     
       
        }

        header('Location: /apliko');
     }

    function loginVerify() {
        $result = $this->user->login((object)$_POST);
       if(!$this->user->isLogged()) {
        $viewData['logedFail'] = "username ose password gabim !";
        require_once("./views/apliko.php");
       } else {
        if($this->user->loggedUser()->role_id == 1) {
            header('Location: /');
     } else {
        header('Location: /');
     }
       }
    }

    function logout() {
        session_destroy();
        header('Location: /');
    }

    function notfound() {
       echo "not found";
    }

}

new WebMain();

?>
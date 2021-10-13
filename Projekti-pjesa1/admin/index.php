<?php
require_once("../config/databaseConfig.php");
require_once("../models/Users.php");
require_once('../models/Roles.php');
require_once('../models/News.php');
require_once('../services/UsersServices.php'); 
require_once('../services/NewsServices.php');   
$viewData;

class AdminMain extends DatabasePDOConfiguration {

    private $user;
    private $news;

        function __construct() {
        $this->user = new UsersServices();
        $this->news = new NewsServices();
        if(!$this->user->isLoggedRole()) {
            header('Location: /');
        }
        require_once("./views/header.php");

        $url = explode("/", strtok($_SERVER['REQUEST_URI'], '?'));

        switch($url[sizeof($url) - 1]) {
            case '': 
            $this->home();
            break;
            case 'add':
                $this->add();
                break;
            case 'addProcess':
                $this->addProcess();
            case 'edit':
                $this->edit();
                break;
            case 'list':
                $this->list();
                break;
            case 'newslist':
                $this->newslist();
                break;
            default:
                $this->notfound();
                break;

        }
        require_once("./views/footer.php");
    }

    function home() {
        require_once('./views/home.php');
    }

    function add() {

         $viewData['roles'] = $this->user->getUserRoles();
         require_once("./views/add.php");

    }

    function addProcess() {    
       if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {

        $data = (object)$_POST;
        if(isset($data->id) && $data->id == '') {
            unset($data->id);
            $this->user->insertUser($data);
        } else {
            $this->user->updateUser($data);
        }   

       header('Location: /admin/list');

      }
    }
    function list() {
        $viewData['users'] =  $this->user->getUsers();
        require_once("./views/list.php");
    }

    function edit() {
        if(isset($_GET['id'])) {
        $viewData['user'] =  $this->user->getUser($_GET['id']);
        $viewData['roles'] =  $this->user->getUserRoles();
        return require_once("./views/add.php");
        } else {
            header('Location: /admin/list'); 
        }
    }

    //news calls

    function newslist() {
        $viewData['newslist'] = $this->news->getAllNews ();
        return require_once("./views/newslist.php");
    }

    function notfound() {
        die("Page not found");
    }

}

new AdminMain();

?>
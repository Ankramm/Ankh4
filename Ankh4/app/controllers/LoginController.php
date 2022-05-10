<?php
// me@mail.ru     12a12a12a
namespace App\Controllers;
use \Ankh\Framework\Core\BaseController;
use \Ankh\Framework\Db\Database;
use \Ankh\Domains\Domains;

require_once dirname(__DIR__) . '/config/config.php';

class LoginController extends BaseController {
    private $log_in;
    function login() {
        if($_SESSION['user_email']) {
            header("Location: /home"); // TODO cabinet
            exit();
        }
       echo $this
                ->twig
                ->render('login.html', []);
    }

    function process() {
        if(!isset($_POST['email']))
            die('No email provided!');

        if(!isset($_POST['password']))
            die('No password provided!');
        
        try {
            $db = new Database(PROJECT_PATH . '/db.sqlite');
            $db->connect();
            $post = ([$_POST['email'], $_POST['password']]);
            $stm = $db->conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
            $stm -> execute($post);
            $result = $stm->fetchAll();            
        } catch(PDOExeption $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        if ($result) {
            $_SESSION['user_email'] = $_POST['email'];

            header('Location: /home');
            exit();
        } else {
            echo('<script>
                    if (confirm("Invalid input,please try again or go to registration")){
                    window.location.replace("' . LOGIN . '"); 
                    } else {
                    window.location.replace("' . REGISTER . '");                      
                    }  
                </script>') ;
        }

    }

    function logout(){
        $_SESSION = array();
        header('Location: http://localhost:8080/');
        exit();
    }
}


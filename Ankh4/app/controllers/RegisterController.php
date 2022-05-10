<?php 

namespace App\Controllers;
use \Ankh\Framework\Core\BaseController;
use \Ankh\Framework\Db\Database;

class RegisterController extends BaseController{
	function registration(){
		if(isset($_SESSION['user_email'])) {
            header("Location: /home");
            exit();
        } else {
			echo $this->twig->render('register.html', []);
		}
	}

	function process(){
		if (   !isset($_POST['username']) 
			or !isset($_POST['email']) 
			or !isset($_POST['password']) 
			or !isset($_POST['repeatpassword'])) {
			die('No data provided!'); 
		}
		// Simple verification :
		if ($_POST['password'] == $_POST['repeatpassword']){
			try { 
				$db = new Database(PROJECT_PATH . '/db.sqlite');
				$db -> connect();
				$sql ="INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
				$stmt = $db->conn->prepare($sql);

				$result = $stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);

				if ($result) {
					header('Location: /home');
					//TODO auto login process with redirect to home
					// + 1 db request (loginController)
					exit();
				} else {
					header('Location:' . ERROR);
				}

			} catch (PDOExeption $e){
					die('Transfer Failed' . $e -> getMessage());
			}
		} else {

			echo('<script>
                    if (confirm("Passwords is different, please try again ")){
                    window.location.replace("' . REGISTER . '"); 
                    } else {
                    window.location.replace("' . HOME . '");                      
                    }  
                </script>') ; 
		}
	}
}
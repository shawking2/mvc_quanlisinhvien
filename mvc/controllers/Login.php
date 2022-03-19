<?php 
    class Login extends Controller{
        public $user;

        public function __construct()
        {
            $this->user = $this->model("UserModel");
            $this->view("login",["result"=>"none"]);
        }
        public function index()
        {
            
        }
        public function UserLogin()
        {
            if( isset($_POST['buttonLogin']) ){
                $username = $_POST['username'];
                $password = $_POST['password'];
                //check login success
                $result = $this->user->CheckLogin($username, $password);

                if($result == "true"){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id']  = $this->user->GetId($username);
                    $_SESSION['temp_id'] = 0;
                    $_SESSION['temp_ip'] = "";
                    $_SESSION['temp_password'] = "";
                    header('Location: '."../Home");

                }else{
                    header('Location: '."../Login");
                }
            }else{
                echo "else";
            }
        }
    }
?>

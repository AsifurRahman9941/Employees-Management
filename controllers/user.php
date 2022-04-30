<?php

class User extends Controller
{


    public $id;
    public $name;
    public $password;
    public $email;


    public function __construct()
    {
        parent::__construct();
    }


    public function render()
    {
        $users =  $this->model->get();
        $this->view->users = $users;
        $this->view->render("user/index");
    }

    public function registerUser()
    {
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
    
        if ($this->model->insert($data)) {
           
        };
        
        $this->render();
    }

    public function newUser()
    {
        $this->view->render("user/addUser");
    }

   
    public function showUser($param = null)
    {
        $userName = $param;
       
        $user = $this->model->getById("$userName");
       
        $users =  $this->model->get($userName);
        $this->view->users = $users;
        $this->view->user = $user;
      
        $this->view->render('user/editUser');
    }

   
    public function updateUser()
    {
        
        $data = [
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'name' => $_POST['name'],
        ];

       
        if ($this->model->update($data)) {
           
            $user = new User();
            $user->name = $data["name"];
            $user->password = $data['password'];
            $user->email = $data['email'];
            $this->view->user = $user;
        } else {
          

        }
       
        $this->render();
    }

   
    public function deleteUser($param = null)
    {
        $userName = $param;
      
        if ($this->model->delete($userName)) {
            
            $text = "Exito en la eliminacion";
        } else {
           
            $text = "Error en la eliminacion";
        }

        echo $text;
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        $user = $this->model->login($email, $password);
        if ($user) {
            $_SESSION["lastLogin_timeStamp"] = time();
            $_SESSION["user"] = $user;
            header("Location:" . BASE_URL . "dashboard/");
        } else {
            $_SESSION["loginError"] = "Invalid user or password";
            header("Location:" . BASE_URL);
        }
    }

    public function logOut()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['login_time_stamp']);
            unset($_SESSION['user']);
            header("Location:" . BASE_URL);
        }
    }
}

<?php
namespace App\Models;
class UserLogin
{
	public $name;
    public $email;
    public $password;
    

   
	public function setUsername($username)
	{
		$this->name =$username;
		
	}

	public function getUsername()
	{	
        return $this->name;

	}

    public function setEmail($useremail)
	{
		$this->email =$useremail;
		
	}

	public function getUseremail()
	{	
        return $this->email;

	}
    public function setPassword($password)
	{
		$this->password =$password;
		
	}

	public function getUserpassword()
	{	
        return $this->password;

	}
}
?>
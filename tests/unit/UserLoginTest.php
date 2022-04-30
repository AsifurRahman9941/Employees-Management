<?php

class UserLoginTest extends \PHPUnit\Framework\TestCase
{
	

    protected $UserLogin;

	public function testusername()
	{

		$UserLogin = new \App\Models\UserLogin;
		$UserLogin->setUsername("asifur");
        $UserLogin->setEmail("asif@gmail.com");
        $UserLogin->setPassword("123456");

		$this->assertEquals($UserLogin->getUsername(),"asifur");
        $this->assertEquals($UserLogin->getUseremail(),"asif@gmail.com");
        $this->assertEquals($UserLogin->getUserpassword(),"123456");
	}
}
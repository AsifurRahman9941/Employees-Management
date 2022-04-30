<?php

class Errors extends Controller
{
    public function __construct()
    {
        
        parent::__construct();
       
        $this->view->message = "NOT FOUND!";

        $this->view->render("errors/index");
    }
}

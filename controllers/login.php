<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->model->processLogin();
    }

    function logout() {
        $this->model->logout();
    }
}
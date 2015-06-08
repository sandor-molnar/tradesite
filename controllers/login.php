<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->view->title = "Belépés";
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    function register() {
        $this->view->title = "Regisztráció";
        $this->view->render('header');
        $this->view->render('login/register');
        $this->view->render('footer');
    }
    
    function processLogin()
    {
        $this->model->processLogin();
    }

    function logout() {
        $this->model->logout();
    }
    
    function processRegister() {
        $this->model->processRegister();
    }



}
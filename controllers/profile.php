<?php

class Profile extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('profile/js/default.js');
    }
    
    function index() {
        $this->view->user = User::getUser(Session::get("username"));
        $this->view->title = LANG_TITLE_PROFILE.' - '. $this->view->user["username"];
        $this->view->profile = User::getUser("username");
        $this->view->render('header');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }
    
    function newChar() {
        $this->model->newChar();
    }

    function setLang($lang) {
        $this->model->setLang($lang);
    }

}


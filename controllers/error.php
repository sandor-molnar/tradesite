<?php

class Error extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->view->title = LANG_TITLE_ERROR;
        $this->view->msg = LANG_ERROR_404;
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}
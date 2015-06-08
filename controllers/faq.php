<?php

class FAQ extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->view->title = LANG_TITLE_FAQ;
        $this->view->render('header');
        $this->view->render('faq/index');
        $this->view->render('footer');
    }

}
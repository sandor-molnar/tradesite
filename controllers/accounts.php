<?php

class Accounts extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::handleLogin();
        $this->view->js = array('accounts/js/default.js');
    }
    
    function index($page = 1) {
        $this->view->count = $this->model->getCount();
        $this->view->start = $this->model->getStart($page);
        $this->view->pages = $this->model->getPages();
        $this->view->page = $page;
        $this->view->accounts = $this->model->getAccount(null,$this->view->start,$this->view->count);
        $this->view->title = LANG_TITLE_ACCOUNTS;
        $this->view->render('header');
        $this->view->render('accounts/index');
        $this->view->render('footer');
    }

    function edit($id) {
        $this->view->account = $this->model->getAccount($id);
        $this->view->user = User::getUser(Session::get("username"));
        $this->model->authAccount($this->view->account,$this->view->user);
        $this->view->types = $this->model->getTypes();
        $this->view->trade_types = $this->model->getTradeTypes();
        $this->view->title = LANG_TITLE_EDIT." - ".$this->view->account["title"];
        $this->view->render('header');
        $this->view->render('accounts/edit');
        $this->view->render('footer');
    }

    function mine($page = 1) {
        $this->view->user = User::getUser(Session::get("username"));
        $this->view->count = $this->model->getCount();
        $this->view->start = $this->model->getStart($page);
        $this->view->pages = $this->model->getPages($this->view->user["id"]);
        $this->view->page = $page;
        $this->view->myOffers = $this->model->getOffers($this->view->user["id"],$this->view->start,$this->view->count);
        unset($this->view->user);
        $this->view->title = LANG_TITLE_MYACCOUNTS;
        $this->view->render('header');
        $this->view->render('accounts/mine');
        $this->view->render('footer');
    }

    function account($id) {
        $this->view->account = $this->model->getAccount($id);
        $this->view->title = LANG_TITLE_ACCOUNT." - ".$this->view->account["title"];
        $this->view->user = User::getUser($this->view->account["user_id"]);
        $this->view->render('header');
        $this->view->render('accounts/account');
        $this->view->render('footer');
    }

    function SearchC() {
        $this->model->SearchC();
    }
    
    function search() {
        $this->view->title = LANG_TITLE_SEARCH;
        $this->view->render('header');
        $this->view->render('accounts/search');
        $this->view->render('footer');
    }

    function newAccount() {
        $this->view->columns = $this->model->getTypesName();
        $this->view->title = LANG_TITLE_NEWACCOUNT;
        $this->view->render('header');
        $this->view->render('accounts/newAccount');
        $this->view->render('footer');
    }
    function processNew() {
        $this->model->processNew();
    }

    function processEdit($token) {
        $this->model->processEdit($token);
    }

}


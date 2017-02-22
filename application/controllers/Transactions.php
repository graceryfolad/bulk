<?php

class Order extends MY_Controller {
    private $sessiondetails;

    function __construct() {
        parent::__construct();
        $this->sessiondetails = $this->session->userdata('userdetails');
        $this->data['userinfo'] = $this->sessiondetails;

        $this->load->model('User');
        $this->load->model('Account');
        $this->load->model('AddressBook');
        $this->load->model('AddressBookDetail');

        $this->load->helper('html');
       
    }

    public function index() {
        $this->data['inc'] = 1;
        $this->body = "userlayout/transact";

        $this->userlayout();
    }
}


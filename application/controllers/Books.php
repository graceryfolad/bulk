<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends MY_Controller {

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
        $this->load->library('form_validation');
    }

    public function index() {
        $this->data['inc'] = 1;
        $this->body = "userlayout/userhome";

        $this->userlayout();
    }

    public function AddressBook($abh_id = null) {
        // $this->data['inc'] = 1;
        if ($abh_id == null) {
            $result = $this->AddressBook->BooksClientID($this->sessiondetails['id']);
            $this->data['Books'] = $result;
            //var_dump($result);
        } else {
            $result = $this->AddressBookDetail->Abook($abh_id);
            $this->data['hd']=$abh_id;
            $this->data['details'] = $result;
        }
        $this->body = "userlayout/addrbk";

        $this->userlayout();
    }

   

    public function addBookName() {
        $addname = $this->input->post('addname');
        $this->AddressBook->cl_id = $this->sessiondetails['id'];
        $this->AddressBook->abh_name = $addname;
        $this->AddressBook->abh_status = 1;
        $result = $this->AddressBook->insert_entry();

        if ($result) {
            redirect('/Books/AddressBook');
        }
    }

    
    public function EditBookName() {
        
    }
    public function NewStaff() {
        
        $this->AddressBookDetail->abh_id = $this->input->post('hd') ;
        $this->AddressBookDetail->emp_name = $this->input->post('empName') ;
        $this->AddressBookDetail->emp_phone =$this->input->post('phone') ;
        $this->AddressBookDetail->ph_network =$this->input->post('network') ;
        $this->AddressBookDetail->bk_status =1 ;
        $result = $this->AddressBookDetail->insert_entry();

        if ($result) {
            redirect('/Books/AddressBook');
        }
    }
    

}

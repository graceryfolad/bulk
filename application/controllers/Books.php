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
            if(is_array($result)){
                $this->data['Books'] = $result;
            }
            
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
    
    public function UpdateBookStatus() {
        $list = $this->input->post('adrst');
        $status = $this->input->post('enstatus');
        $bkid = $this->input->post('bkid');
        $this->AddressBookDetail->UpdateDetailStatus($list, $status);
        
        redirect("/Books/AddressBook/{$bkid}");
    }
    
    public function EditBookDetail($id) {
        $bkdet = $this->AddressBookDetail->ADetail($id);
        if(is_array($bkdet)){
            $this->data['bkdet']=$bkdet;
        }

         $this->body = "userlayout/bkdet";

        $this->userlayout();
    }

    public function EditBkDet()
    {
       if(array_key_exists('submitupdate', $_POST)){
            $name = $this->input->post('empName');
            $phone = $this->input->post('phone');
            $network = $this->input->post('network');
            $id = $this->input->post('hd');

            $test = $this->AddressBookDetail->EditBkDetails($id,$name,$phone,$network);


            if($test)
            {
                redirect("/Books/EditBookDetail/{$id}");
            }
            else{
                redirect("/Books/AddressBook");
            }
       }
    }
}

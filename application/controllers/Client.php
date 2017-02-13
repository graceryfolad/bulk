<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {
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
	public function index()

	{
		$this->data['inc'] = 1;
		$this->body = "userlayout/userhome";

        $this->userlayout();
	}

    public function test()

    {
        // $this->data['inc'] = 1;
       $this->load->view('clients');
    }

    public function Wallet()

    {
        // $this->data['inc'] = 1;
        $this->body = "userlayout/wallet";

        $this->userlayout();
    }

    public function AddressBook($abh_id=null)

    {
        // $this->data['inc'] = 1;
        if($abh_id==null){
             $result = $this->AddressBook->BooksClientID($this->sessiondetails['id']);
             $this->data['Books'] = $result;
             //var_dump($result);
        }
        else{
           $result = $this->AddressBookDetail->Abook($abh_id);
           $this->data['details'] = $result; 
        }
        $this->body = "userlayout/addrbk";
       
       $this->userlayout();
    }

    public function Orders()

    {
        // $this->data['inc'] = 1;
        $this->body = "userlayout/orders";

        $this->userlayout();
    }

    public function Transactions()

    {
        // $this->data['inc'] = 1;
        $this->body = "userlayout/transacts";

        $this->userlayout();
    }

     public function addBookName()

    {
        $addname = $this->input->post('addname');
        $this->AddressBook->cl_id=$this->sessiondetails['id'];
        $this->AddressBook->abh_name=$addname;
        $this->AddressBook->abh_status=1;
        $result = $this->AddressBook->insert_entry();

        if($result){
            redirect('/Client/AddressBook');
        }

    }

    public function LogOut() {
        // $this->data['inc'] = 1;
        $this->session->sess_destroy();
        redirect('/Guest/Login');
    }

    public function EditBookName() {
        
    }
}
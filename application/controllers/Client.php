<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->model('User');
        $this->load->model('Account');
        
        
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

    public function AddressBook()

    {
        // $this->data['inc'] = 1;
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
        echo $addname;
    }
}
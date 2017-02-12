<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->model('User');
        $this->load->model('Account');
        $this->load->model('Credit');
        
        $this->load->helper('html');
        $this->load->library('form_validation');
    }
	public function index()

	{
		$this->data['inc'] = 1;
		$this->body = "guestlayout/homepage";

        $this->guestlayout();
	}

	public function Register()
	{
		$this->data['inc'] = 1;
		$this->body = "guestlayout/homepage";

        $this->guestlayout();
	}
	public function Login()

	{
		$this->data['inc'] = 2;
		$this->body = "guestlayout/homepage";

        $this->guestlayout();
	}
	public function Forgot()
	{
		$this->data['inc'] = 3;
		$this->body = "guestlayout/homepage";

        $this->guestlayout();
	}
	public function Reset()
	{
		$this->load->view('welcome_message');
	}

	public function ProcRegister()
	{
		// validate the values
		

                $this->form_validation->set_rules('name', 'Customer Name', 'trim|required|min_length[5]|max_length[30]');

                $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        // save to db
                	if($this->User->insert_entry())
                	{
                		$regusr = $this->User->Search($this->input->post('email'));

                		//var_dump($regusr);
                        $id  =$regusr[0]['id'];
                		$this->Account->acc_pwd=$this->Account->hashKey($this->input->post('password'));
                		$this->Account->acc_email=$this->input->post('email');
                		$this->Account->acc_status= ACCOUNT_ACTIVE;
                		$this->Account->acc_type= COMPANY;
                        $this->Account->acc_created= date('Y-m-d h:i:s');
                		$this->Account->cl_id =$id; 

                		var_dump($this->Account);
                		if($this->Account->insert_entry())
                		{
                			// goto success page
                            $this->Credit->credit_balance=0.0;
                            $this->Credit->cl_id=$id;
                            $this->Credit->credit_date = date('Y-m-d h:i:s');
                            $this->Credit->insert_entry();
                			redirect('/Guest/RegSuccess/');
                		}

                	}
                	else{
                		// falsed registration
                		echo "failed";
                	}
                }
	}
	public function ProcLogin()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
        	$email = $this->input->post('email');
        	$pass = $this->input->post('password');
        	$login = $this->Account->Try_Login($email,$pass);

        	if(is_array($login)){
        		// get the user account
        		$userdetails = $this->User->AUser($login['user']);
                $this->session->set_userdata('userdetails', $userdetails);
        		redirect('/Client');
        	}
        	else
        	{
        		echo "there was error";
        		print_r($login);
        	}
        }
	}

	public function RegSuccess()
	{
		// $this->data['inc'] = 2;
		$this->body = "guestlayout/reg_success";

        $this->guestlayout();
	}

}

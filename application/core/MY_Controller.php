<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
    { 
    //set the class variable.
        public $template  = array();
        public $data      = array();
 
        /*Loading the default libraries, helper, language */
        public function __construct(){
            parent::__construct();
            $this->load->library(array('session','table'));
            $this->load->helper(array('form','language','url'));
            
        }
 
        /*Front Page Layout*/
        public function guestlayout() {
            $this->template['header']   = $this->load->view('general/header', $this->data, true);
            // $this->template['sidepanel']   = $this->load->view('general/header', $this->data, true);
            $this->template['body'] = $this->load->view($this->body, $this->data, true);
            $this->template['footer'] = $this->load->view('general/footer', $this->data, true);
            $this->load->view('guestlayout/thepage', $this->template);
        }
        public function userlayout() {
            if(is_array($this->session->userdata('userdetails')))
            {
                $this->template['header']   = $this->load->view('general/header', $this->data, true);
                //$this->template['sidepanel']   = $this->load->view('userlayout/sidebar', $this->data, true);
                $this->template['body'] = $this->load->view($this->body, $this->data, true);
                $this->template['footer'] = $this->load->view('general/footer', $this->data, true);
                $this->load->view('userlayout/userpage', $this->template);
            }
            else{
                 redirect('/Guest/Login');
            }

        }
        public function adminlayout() {
            
        }
}


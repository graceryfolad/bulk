<?php

class Topup extends CI_Model{
    
    public $top_id;
    public $cl_id;
    private $table;
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        $this->table = "topups";
    }
    
    public function insert_entry() {
        
    }
    
    public function GetByClientID($cl_id) {
        
    }
}


<?php

class Wallet extends CI_Model {

    
    public $cl_id;
    public $credit_date;
    public $credit_balance;
    public $credit_id;
    private $table;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        $this->table = "client_credits";
    }
    
    public function insert_entry() {
        $ret = $this->db->insert($this->table, $this);
        return $ret;
    }
    
    public function GetBalance($clID) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('cl_id',$clID);
        $query = $this->db->get();


        $qy = $query->result();
        
        foreach ($qy as $value) {
            $bal = $value->credit_balance;
        }
        return $bal;
    }
    
    public function UpdateBalance($clID,$balance) {
        
    }
    
    

}

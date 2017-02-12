<?php
class Credit extends CI_Model {

        public $credit_id;
        public $credit_balance;
        public $cl_id;
        public $credit_date;
        
        

        private $table;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->table="client_credits";
        }
        public function insert_entry()
        {
                // $this->acc_ps  = $this->input->post('pass'); // please read the below note
                // $this->acc_email  = $this->input->post('email');
                // $this->acc_phone  = $this->input->post('phone');
                // $this->created   = date('Y:m:d');

                $ret = $this->db->insert($this->table, $this);

                return $ret;
        }

}
<?php
class Account extends CI_Model {

        public $acc_pwd;
        public $acc_email;
        public $acc_status;
        public $acc_type;
        public $cl_id;
        public $acc_created;
        
        

        private $table;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->table="accounts";
        }
        public function insert_entry()
        {
                
                $ret = $this->db->insert($this->table, $this);

                return $ret;
        }

        public function hashKey($value) 
        {
                $hash = md5(($value));

                return $hash;
        }

        public function Try_Login($email, $pass) 
        {
                if (!empty($email) && !empty($pass)) {

                    $this->db->select();
                    $this->db->from($this->table);
                    $this->db->where('acc_email', $email);
                    //$this->db->where($this->acc_status, ACCOUNT_ACTIVE);
                    $this->db->where('acc_pwd', $this->hashKey($pass));
                    $this->db->limit(1);

                    $query = $this->db->get();

                    if ($query->num_rows() == 1) {
                        $qy = $query->result();
                        foreach ($qy as $row) {
                            $toreturn = array(
                                'user' => $row->cl_id,
                                'status' => $row->acc_status,
                                // 'code' => $row->sis_user_staff_code,
                                'logged_in' => TRUE,
                                'air'=>$row->air_id,
                            );
                        }

                        return $toreturn;
                    } else {
                        
                       return false;
                    }
                }
        }

        public function Reset($new_ps,$id) 
        {
                $data = array('acc_pwd'=>$this->hashKey($new_ps));
                    $this->db->where('acc_id',$id);
                 $ret = $this->db->update($this->table, $data);

                return $ret;
        }

        

}
?>
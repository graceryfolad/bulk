<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model {

        public $cl_comp;
        public $cl_email;
        public $cl_phone;
        public $cl_address;
        public $cl_id;
        public $cl_date;

        private $table;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
                $this->table="clients";
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get($this->table, 100);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->cl_comp   = $this->input->post('name'); // please read the below note
                $this->cl_email  = $this->input->post('email');
                $this->cl_phone  = $this->input->post('phone');
                $this->cl_address  = $this->input->post('address');
                $this->cl_date   = date('Y:m:d');

                $ret = $this->db->insert($this->table, $this);

        return $ret;
        }

        public function update_entry()
        {
                $this->us_name    = $_POST['name']; // please read the below note
                $this->us_email  = $_POST['email'];
                $this->us_phone     = $_POST['phone'];
                //$this->created     = date('Y:m:d');

                $ret = $this->db->update($this->table, $this, array('id' => $_POST['id']));

                return $ret;
        }

        public function AUser($id) {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->where('cl_id', $id);
        $query = $this->db->get();


        $qy = $query->result();
        foreach ($qy as $row) {
            $toreturn = array(
                'name' => $row->cl_comp,
                'email' => $row->cl_email,
                'phone' => $row->cl_phone,
                'id' => $row->cl_id,
                'regdate' => $row->cl_date,
            );
        }

        return $toreturn;
    }

    public function Search($search)
        {
                $this->db->select();
                $this->db->from($this->table);
                $this->db->like('cl_email', $search);
                $this->db->or_like('cl_comp', $search);
                $query = $this->db->get();
                if($query->num_rows() > 0)
                {
                        $qy = $query->result();
                        foreach ($qy as $row) {
                            $toreturn[] = array(
                                'name' => $row->cl_comp,
                                'email' => $row->cl_email,
                                'phone' => $row->cl_phone,
                                'id' =>$row->cl_id,
                                'regdate' =>$row->cl_date,
                            );

                        }

                        return $toreturn;
                }

                return false;
        }

}
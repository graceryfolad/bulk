<?php

/**
 * 
 */
class AddressBookDetail extends CI_Model {

    public $bk_id;
    public $emp_name;
    public $emp_phone;
    public $ph_network;
    public $abh_id;
    // public $abh_name;
    public $bk_status;
    private $table;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "addressbookdetails";
    }

    public function insert_entry() {

        $ret = $this->db->insert($this->table, $this);

        return $ret;
    }

    public function Abook($id) {

        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->where('abh_id', $id);
//        $query = $this->db->where('bk_status', 1);
        $query = $this->db->get();


        $toreturn = array();
        $result = $query->result();
        foreach ($result as $key) {
            $toreturn[] = array(
                'id' => $key->bk_id,
                'name' => $key->emp_name,
                'phone' => $key->emp_phone,
                'network' => $key->ph_network,
                'status' => $key->bk_status
            );
        }

        return $toreturn;
    }

    public function Allbooks() {

        $this->db->select();
        $this->db->from($this->table);

        // $query = $this->db->where('abh_id', $id);
        $this->db->limit(10);
        $query = $this->db->get();


        $toreturn = array();
        $result = $query->result();
        foreach ($result as $key) {
            $toreturn[] = array(
                'id' => $key->bk_id,
                'name' => $key->emp_name,
                'phone' => $key->emp_phone,
                'network' => $key->ph_network,
                'status' => $key->bk_status
            );
        }

        return $toreturn;
    }

}

?>
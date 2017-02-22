<?php

/**
 * 
 */
class AddressBook extends CI_Model {

    public $cl_id;
    public $abh_id;
    public $abh_name;
    public $abh_status;
    private $table;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = "addressbookheaders";
    }

    public function insert_entry() {

        $ret = $this->db->insert($this->table, $this);

        return $ret;
    }

    public function Abook($id) {

        $this->db->select();
        $this->db->from($this->table);

        $this->db->where('abh_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $qy = $query->result();
            foreach ($qy as $value) {
               
                $book = array(
                    'id' => $value->abh_id,
                    'name' => $value->abh_name,
                );

                return $book;
            }
        }

        return FALSE;
    }

    public function Allbooks() {

        $this->db->select();
        $this->db->from($this->table);

        // $query = $this->db->where('abh_id', $id);
        $this->db->limit(10);
        $query = $this->db->get();


        $result = $query->result();
    }

    public function BooksClientID($id) {

        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->where('cl_id', $id);
        $this->db->limit(10);
        $query = $this->db->get();


        $result = $query->result();
        if($query->num_rows() >0){
        foreach ($result as $key) {
            $toreturn[] = array(
                'id' => $key->abh_id,
                'name' => $key->abh_name
            );
        }

        return $toreturn;
        }
        else{
            return FALSE;
        }
    }

}

?>
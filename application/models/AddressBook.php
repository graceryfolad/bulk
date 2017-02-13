<?php

/**
* 
*/
class AddressBook extends CI_Model
{
	public $cl_id;
    public $abh_id;  
	public $abh_name;
	public $abh_status;      
        

    private $table;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->table="addressbookheaders";
	}

	public function insert_entry()
    {
                
        $ret = $this->db->insert($this->table, $this);

        return $ret;
    }

    public function Abook($id)
    {
                
       			$this->db->select();
                $this->db->from($this->table);
        
                $query = $this->db->where('abh_id', $id);
                $query = $this->db->get();


                return $query->result();
    }

    public function Allbooks()
    {
                
       			$this->db->select();
                $this->db->from($this->table);
        
                // $query = $this->db->where('abh_id', $id);
                $this->db->limit(10);
                $query = $this->db->get();


                $result= $query->result();


    }

    public function BooksClientID($id)
    {
                
       			$this->db->select();
                $this->db->from($this->table);
        
                $query = $this->db->where('cl_id', $id);
                $this->db->limit(10);
                $query = $this->db->get();


                $result= $query->result();
                foreach ($result as $key ) {
                	$toreturn[]=array(
                			'id'=>$key->abh_id,
                			'name'=>$key->abh_name
                		);
                }

return $toreturn;

    }


}
?>
<?php

/**
* 
*/
class AddressBook extends CI_Model
{
	public $cl_id;
    public $acc_created;
	public $abh_id;  
	public $abh_name;
	public $abh_status;      
        

    private $table;
	public function __construct(argument)
	{
		parent::__construct();
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


}
?>
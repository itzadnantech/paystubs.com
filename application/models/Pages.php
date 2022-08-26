<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Model{
	
    public function __construct() {
        parent::__construct();
        $this->table = 'cms';
    }
        
    // Add new Page
	public function addNewPage( $data = array() ){
	    
        //$dateFormat = date("Y-m-d H:i:s");
        //$data['created'] = $dateFormat;
        
		$insert = $this->db->insert($this->table,$data);
		
		return $insert ? true : false;
	}
	
	public function getAllPages() {
        $data = FALSE;
        $this->db->select("$this->table.*");
        $result = $this->db->get($this->table);
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function updatePage($id = NULL, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update($this->table, $data);
        if ($result) {
            $data = TRUE;
        } else {
            $data = FALSE;
        }
        return $data;
    }
    
    public function getPage($id) {
     
        $SQL='SELECT id,title,content from cms where id="'.$id.'"';
    	$query = $this->db->query($SQL);
    	$result = $query->row();
    	return $result;

    }
}

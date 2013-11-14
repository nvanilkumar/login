<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}
class Admin_model extends CI_Model
{
    
    public function validate($aUserName, $aPassword, $type)
    {     
        return $this->db->get_where('admin', array('username' => $aUserName, 'password' => $aPassword, 'type' => $type))->row();

    }
    
    public function validate_username($FUserName, $type)
    {     
        if($type == 'user')
            return $this->db->get_where('users', array('username' => $FUserName))->row();
		else if($type == 'admin')	
			return $this->db->get_where('admin', array('username' => $FUserName, 'type' => $type))->row();
    }
    
    public function insert($tablename, $data) 
    {
        //         $data = array('name'=>$bizName
        //                        , 'street'=>$street
        //                        , 'street2'=>$street2
        //                        , 'city'=>$city
        //                        , 'state'=>$state
        //                        , 'zip'=>$zip
        //                        , 'country'=>$country
        //                );
        $this->db->insert($tablename,$data) ;
        return $this->db->insert_id() ;
    }

    public function update($tablename,$data, $where) 
    {
        $this->db->where($where) ;
        $this->db->update($tablename,$data) ;
    }
   
    public function allRecords($tablename) 
    {
        return $this->db->get($tablename)->result() ;
    }
    
    public function allRecords_where($tablename,$data) 
    {
        return $this->db->get_where($tablename, $data)->result() ;
    }
  
 } 
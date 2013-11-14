<?php
class login_model extends CI_Model
{
    public function check_userid($email,$oemail =NULL)
    {
        if ($this->db->select()->from('user')->where('email', $email)->where('email !=', $oemail)->get()->row())
            return false;
        else
            return true;
    }
    public function check_username($username)
    {
        if ($this->db->select()->from('user')->where('username', $username)->get()->row())
            return false;
        else
            return true;
    }
    public function signup($userdata)
    {
       // e($_post);
        $registration_data = array(
            'prefix' => $this->input->post('prefix'),
            'first' => $this->input->post('first'),
            'middle' => $this->input->post('middle'),
            'last' => $this->input->post('last'),
            'title'=> $this->input->post('title'),
            'workphone'=> $this->input->post('workphone'),
            'cellphone'=> $this->input->post('cellphone'),
            'username'=> $this->input->post('username'),
            'password'=> Encrypt::encryptData($this->input->post('password')),
            'email' => $this->input->post('email'),
            'usertype'=> $userdata['type'],
            'created' => date("Y-m-d"),
            'activation_key' =>$userdata['key']
        );
        
        $this->db->insert('user', $registration_data);
        $user_id=$this->db->insert_id();
        
        if($userdata['type']=='1')
        {
            $enrollment_data['schoolname']=$this->input->post('schoolname');
            $enrollment_data['add1']=$this->input->post('add1');
            $enrollment_data['add2']=$this->input->post('add2');
            $enrollment_data['city']=$this->input->post('city');
            $enrollment_data['state']=$this->input->post('state');
            $enrollment_data['zipcode']=$this->input->post('zipcode');
            $enrollment_data['schoolphone']=$this->input->post('schoolphone');
            $enrollment_data['schoolfax']=$this->input->post('schoolfax');
            $enrollment_data['district']=$this->input->post('district');
            $enrollment_data['track']=$this->input->post('track');
            $enrollment_data['e_fax']=$this->input->post('e_fax');
            $enrollment_data['gradelevel']=$this->input->post('gradelevel');
            $enrollment_data['communication']=$this->input->post('communication');
            $enrollment_data['e_prefix']=$this->input->post('e_prefix');
            $enrollment_data['e_first']=$this->input->post('e_first');
            $enrollment_data['e_middle']=$this->input->post('e_middle');
            $enrollment_data['e_last']=$this->input->post('e_last');
            $enrollment_data['e_workphone']=$this->input->post('a_phone');
            $enrollment_data['a_fax']=$this->input->post('a_fax');
            $enrollment_data['e_email']=$this->input->post('e_email');
            $enrollment_data['userid']=$user_id;
            $this->db->insert('enrollment', $enrollment_data);
        }else{
            $volunteer_data['company']=$this->input->post('company');
            $volunteer_data['add1']=$this->input->post('add1');
            $volunteer_data['add2']=$this->input->post('add2');
            $volunteer_data['city']=$this->input->post('city');
            $volunteer_data['state']=$this->input->post('state');
            $volunteer_data['zipcode']=$this->input->post('zipcode');
            $volunteer_data['addresstype']=$this->input->post('addresstype');
            $volunteer_data['h_phone']=$this->input->post('h_phone');
            $volunteer_data['prefered_phone']=$this->input->post('prefered_phone');
            $volunteer_data['communication']=$this->input->post('communication');
            $volunteer_data['agegroup']=$this->input->post('agegroup');
            $total_days="";
            foreach ($this->input->post('availabledays') as $days)
            {
                   $total_days.=$days.'-';
            }
            $total_days=substr($total_days, 0, -1);
            $volunteer_data['availabledays']=$total_days;
            $volunteer_data['userid']=$user_id;
            $this->db->insert('volunteer', $volunteer_data);
        }  
    }
    
    public function checkLogin($aUserName, $aPassword)
    {         
        return $this->db->get_where('user', array('username' => $aUserName, 'password' => $aPassword))->row();
    }
    
    public function registration_status($u_id)
    {
        $user_data = array('activation_key' => '0');
        $this->db->update('user',$user_data,array('id' => $u_id));
    }
    
    public function user_details()
    {
        $table_name=($this->session->userdata(usertype) == '1')?'enrollment':'volunteer';
        $user_id=$this->session->userdata(userid);
        return $this->db->select()
                 ->from('user')
                 ->join($table_name,$table_name.'.userid =user.id','left')
                 ->where('user.id',$user_id)->get()->row();
    }


    public function manage_user_details($userdata)
    {
        $registration_data = array(
            'prefix' => $this->input->post('prefix'),
            'first' => $this->input->post('first'),
            'middle' => $this->input->post('middle'),
            'last' => $this->input->post('last'),
            'title'=> $this->input->post('title'),
            'workphone'=> $this->input->post('workphone'),
            'cellphone'=> $this->input->post('cellphone'),
        );
        
        $this->db->update('user', $registration_data,array('id' => $userdata['user_id']));
        
        if($userdata['type']=='1')
        {
            $enrollment_data['schoolname']=$this->input->post('schoolname');
            $enrollment_data['add1']=$this->input->post('add1');
            $enrollment_data['add2']=$this->input->post('add2');
            $enrollment_data['city']=$this->input->post('city');
            $enrollment_data['state']=$this->input->post('state');
            $enrollment_data['zipcode']=$this->input->post('zipcode');
            $enrollment_data['schoolphone']=$this->input->post('schoolphone');
            $enrollment_data['schoolfax']=$this->input->post('schoolfax');
            $enrollment_data['district']=$this->input->post('district');
            $enrollment_data['track']=$this->input->post('track');
            $enrollment_data['e_fax']=$this->input->post('e_fax');
            $enrollment_data['gradelevel']=$this->input->post('gradelevel');
            $enrollment_data['communication']=$this->input->post('communication');
            $enrollment_data['e_prefix']=$this->input->post('e_prefix');
            $enrollment_data['e_first']=$this->input->post('e_first');
            $enrollment_data['e_middle']=$this->input->post('e_middle');
            $enrollment_data['e_last']=$this->input->post('e_last');
            $enrollment_data['e_workphone']=$this->input->post('a_phone');
            $enrollment_data['a_fax']=$this->input->post('a_fax');
            $enrollment_data['e_email']=$this->input->post('e_email');
            $enrollment_data['e_title']=$this->input->post('e_email');
            
           
            $this->db->update('enrollment', $enrollment_data, array('userid' => $userdata['user_id']));
        }else{
            $volunteer_data['company']=$this->input->post('company');
            $volunteer_data['add1']=$this->input->post('add1');
            $volunteer_data['add2']=$this->input->post('add2');
            $volunteer_data['city']=$this->input->post('city');
            $volunteer_data['state']=$this->input->post('state');
            $volunteer_data['zipcode']=$this->input->post('zipcode');
            $volunteer_data['addresstype']=$this->input->post('addresstype');
            $volunteer_data['h_phone']=$this->input->post('h_phone');
            $volunteer_data['prefered_phone']=$this->input->post('prefered_phone');
            $volunteer_data['communication']=$this->input->post('communication');
            $volunteer_data['agegroup']=$this->input->post('agegroup');
            $total_days="";
            foreach ($this->input->post('availabledays') as $days)
            {
                   $total_days.=$days.'-';
            }
            $total_days=substr($total_days, 0, -1);
            $volunteer_data['availabledays']=$total_days;
            
            $this->db->update('volunteer', $volunteer_data, array('userid' => $userdata['user_id']));
        } 
    }
    
    public function change_password($user_id, $user_data)
    {
        $this->db->update('user', $user_data,array('id' => $user_id));
    }
    
    public function forget_password($user_email)
    {
        return $this->db->select()->from('user')
                    ->where('email', $user_email)->get()->row();
    }
    
    public function users_list()
    {
        return $this->db->select()->from('user')->get()->result();
    }
    
    public function change_user_status($user_id,$status)
    {
        $user_data = array(
            'activation_key' => $status,
        );
        $this->db->update('user', $user_data,array('id' => $user_id));
    }
    
    
    
}

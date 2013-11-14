<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl_Controller extends CI_Controller {
    
    const GUEST = 'guest';
    const USER = 'user';
  
    public function __construct()
    {
        parent::__construct();		

        $this->load->library('Session');
        $this->_run_access_control();
    }
    
    private function _run_access_control()
    {		
        $this->load->library('Acl');
        if($this->session->userdata('userid')){
            $user_role_id = self::USER;
        }  else {
            $user_role_id = self::GUEST;
        }

        $cur_resource_id = $this->router->fetch_class();
        $cur_privilege_id = $this->router->fetch_method();

        $role_arr = array(self::GUEST, self::USER );
        $resource_arr = array('login', 'remote');
        foreach ($role_arr as $role_id)
        {
            $this->acl->add_role($role_id);
        }

        foreach ($resource_arr as $resource_id)
        {
            $this->acl->add_resource($resource_id);
        }		
        $this->acl->deny();

        //if type is user
        if($user_role_id == self::USER)
        {
            $this->acl->allow(self::USER, 'login');
            $this->acl->allow(self::USER, 'remote');
        }
        //Guest Privilages
        $this->acl->allow(self::GUEST, 'login', array('index','signin','signup'));
        $this->acl->allow(self::GUEST, 'remote');
 
        if (!$this->acl->is_allowed($user_role_id, $cur_resource_id, $cur_privilege_id))
        {
            redirect('login/index');
        }
    }

}
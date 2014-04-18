<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class login extends Acl_Controller
{
    private $module, $class, $view_dir;

    public function __construct()
    {
        parent::__construct();
        // module //
        $this->module = '';
        // class //
        $this->class = strtolower(__CLASS__);
        // view directory //
        $this->view_dir = $this->module . '/' . $this->class . '/';
        $this->load->model('login_model');
    }
    
    public function index($activation_key = NULL)
    {	
        $data['activation_key']=($activation_key)?$activation_key:'0';
        $data['content'] = $this->load->view($this->view_dir . 'index',$data, TRUE);
        $this->load->view('template', $data);
    }
    
    public function signup()
    {
        $data['content'] = $this->load->view($this->view_dir . 'signup','', TRUE);
        if($this->input->post('submit') )
	{
            $data['type']=$this->input->post('usertype');
            $data['key'] = uniqid();
            $this->login_model->signup($data);
            
            $data['content']='Thank you for your interest. Please check for a confirmation email 
                              to activate your account';
            $emaillink=base_url().'login/index/'.$data['key'];

            $to =$this->input->post('email');//"yoursanil22@gmail.com";
            $username=$this->input->post('first')." " .$this->input->post('last');
            $this->email->from('nvanilkumar@gmail.com');
            $this->email->to($to);
            $this->email->subject('Registration Activation link');
            $this->email->message($username.'  Thanks for registering with us. To complete your registration 
                                        process please click on the confirmation link.<br />'.$emaillink);  
            $this->email->send();
        }
        $this->load->view('template', $data);
    }
    
    public function signin()
    {	
        $UserName = $_POST['UserName'];		
        $sPassword = Encrypt::encryptData($this->input->post('Password'));
        $sActivation_key=$_POST['registration_key'];
        $aUser = $this->login_model->checkLogin($UserName, $sPassword);
         if(!$aUser)
             $sMessage = "incorrect";
         else if($aUser->activation_key != $sActivation_key)
         {
             $sMessage=($aUser->activation_key== '1' )?'in_active':'not_activated';
         }
         else {
            $data = array(
                'name' => $aUser->first_name . ' ' . $aUser->last_name,
                'userid' => $aUser->id,
                'usertype' => $aUser->usertype,
                'is_logged_in' => true,
                'refresh' => true
            );
            $this->session->set_userdata($data);  						
            if($_POST['Remember'] == "remember")
            { 
                setcookie("Cuname", $_POST['UserName']);
                setcookie("Cpassword", $_POST['Password']);                                                  
            }
            $sMessage = $aUser->usertype;
         }
         
         if(($aUser->activation_key == $sActivation_key) && ($aUser->activation_key!='0'))
         {
             $this->login_model->registration_status($aUser->id);
         }
         echo $sMessage; exit;
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login'); 
    }
    
    public function home()
    {
        $data['topMenu']=$this->load->view('topMenu','',TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'home',$data, TRUE);
        $this->load->view('template', $data);
    }
    
    public function manage_user_details()
    {
        if($this->input->post('submit'))
	{
            $data['user_id']=$this->session->userdata(userid);
            $data['type']=$this->session->userdata(usertype);
            $this->login_model->manage_user_details($data); 
        }
        $data['user_details']=$this->login_model->user_details();
        $data['topMenu']=$this->load->view('topMenu','',TRUE);
        $data['content'] = $this->load->view($this->view_dir . 'manage_user_details',$data, TRUE);
        $this->load->view('template', $data);
    }
    
    public function change_password()
    {
        $data['topMenu']=$this->load->view('topMenu','',TRUE);
        if($this->input->post('submit'))
        {
            $user_id=$this->session->userdata(userid); 
            $user_data = array(
                'password'=> Encrypt::encryptData($this->input->post('password')),
            );
            $this->login_model->change_password($user_id,$user_data);
        }
        
        $data['content'] = $this->load->view($this->view_dir . 'change_password',$data, TRUE);
        $this->load->view('template', $data);
    }

}
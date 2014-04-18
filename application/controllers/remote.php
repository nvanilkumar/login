<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class remote extends Acl_Controller
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
        $this->load->model('admin_model');
    }
    public function check_userid()
    {
        $old_email=($this->input->post('old_email'))?$this->input->post('old_email'):'';
        $get_result = $this->login_model->check_userid($this->input->post('username'),$old_email);
        echo ($get_result)?'true':'false';exit;
    }
    
    public function check_username()
    {
        $get_result = $this->login_model->check_username($this->input->post('username'));
        echo ($get_result)?'true':'false';exit;
    }
    
    public function create_captcha()
    {
        $this->load->helper('captcha');
        $image_url = base_url().'utils/captcha/images/';
        $image_path = FCPATH . 'utils/captcha/images' . DIRECTORY_SEPARATOR;
        $font_path = FCPATH . 'utils/captcha/verdana.ttf';

        $vals = array(
        'img_path'	 => $image_path,
        'img_url'	 => $image_url,
        'font_path'	 	=> $font_path,
        'img_width'	 => '317',
        'img_height' => 30,
        'border' => 0, 
        'expiration' => 7200
        );
        // create captcha image
        $cap = create_captcha($vals);
        // store image html code in a variable
        $data['image'] = $cap['image'];
        if(file_exists(FCPATH.'utils/captcha/images/'.$this->session->userdata['image']))
        {
            unlink(FCPATH.'utils/captcha/images/'.$this->session->userdata['image']);
	}
	$this->session->set_userdata('image' ,$cap['time'].'.jpg');
        $this->session->set_userdata('word', $cap['word']);
        $data['captcha'] = $data['image'];
	echo $data['captcha']; exit();
    } 
    
    public function captcha_validation()
    {
        //echo $this->session->userdata('word');
        if($this->input->post('captcha_word') == $this->session->userdata('word'))
        {
            echo "true";exit();
        }else{
                echo "false";  exit();
        }
    }
    
    public function forget_password()
    {
        $Email = $_POST['Femail'];		
        $user_details = $this->login_model->forget_password($Email);		
        if(count($user_details) == 0 )
            echo  @$sMessage = "incorrect";
        else {
            echo @$sMessage = "correct";
                $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) 
                {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                $data['pwd'] = implode($pass);
 
                $to = $user_details->email;
                $subject = "Forgot Password";
                $message = $this->load->view($this->view_dir . 'forget_password',$data, TRUE);          
			         
                $from = 'Login Project';
                $headers = 'Content-type: text/html;'. "\n";            
                $headers .= 'From:'.$from."\n";
                mail($to,$subject,$message,$headers);
                $user_data = array(
                    'password'=> Encrypt::encryptData($data['pwd']),
                );
                $this->login_model->change_password($user_details->id,$user_data);
          }
         exit;
        
    } 
    
    public function change_user_status()
    {
        $status=$this->input->post('user_status');
        $user_id=$this->input->post('user_id');
        $this->login_model->change_user_status($user_id,$status);
    }
    
    //To Bring the all the movies list to show in front side
    public function movies_list()
    {
        $m_data=array('vid_name' => $this->input->post('movie_name'),
                       'vid_type' => 1   //movie     
                       ); 
        echo(json_encode($this->admin_model->allRecords_where('videoinfo',$m_data)));exit;
    }
    //To Bring the selected year movies list
    public function year_movies_list()
    {
        $year = $this->input->post('year');
        $v_where=array('extract(YEAR from release_date) =' => $year);
        $movies=$this->admin_model->allRecords_where('videoinfo',$v_where);
    }        
    //To Bring the selected alphabhet movies list
    public function alpha_movies_list()
    {
        $name = 'a'.'%';//$this->input->post('text');
        $v_where=array('vid_name  like' => $name);
        $movies=$this->admin_model->allRecords_where('videoinfo',$v_where);
        //echo $this->db->last_query();
        e($movies);
    }        
    //To Bring the selected alphabhet movies list
    public function genres_movies_list()
    {
        foreach($this->post('genres') as $value)
        {
            $g_list= $value.',';
        }
        $g_list=substr($g_list, 0, -1); 
        $movies=$this->admin_model->genresMovieList($g_list);
        
    }        

    
 }
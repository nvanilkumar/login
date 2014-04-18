<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
            $this->view_dir = strtolower(__CLASS__) . '/';
    }  

    public function index()
    { 
        if(!$this->session->userdata('ausername'))
        {
            $this->load->view($this->view_dir .'index');
        }else{  
            redirect ("admin");
        }
    }
    
    public function login()
    {
         $UserName = $_POST['UserName'];		
         $sPassword = Encrypt::encryptData($this->input->post('Password'));
         $logintype = $this->input->post('LoginType');
         $type=isset($_POST['Type'])?$_POST['Type']:'0'; 
         $aUser = $this->admin_model->validate($UserName, $sPassword, $logintype);
//       e($aUser);
         if(!$aUser)
             @$sMessage = "incorrect";
         else if($type == '0'){        
            if($aUser->type == "admin")
            {  
                $newdata = array(
                    'logged_in' => true,
                    'username' => $aUser->username,
                    'useremail' => $aUser->email,
                    'usertype' => $aUser->type,
                    'user_id' => $aUser->id,
                    'refresh' => true
                );
                if($_POST['Remember'] == "remember"){ 
                  setcookie("auname", $_POST['UserName']);
                  setcookie("apassword", $_POST['Password']);                                                  
                }else{
                    $expire = time() - 300;
                    setcookie("auname", $_POST['UserName'],$expire);
                    setcookie("apassword", $_POST['Password'],$expire); 
                }
                $sMessage = $aUser->type;
            }
            $this->session->set_userdata($newdata);
         }
         echo @$sMessage; exit;
    }
    
    //Admin Logout
    public function logout()
    {      
        $newdata = array(
                'logged_in' => "",
                'username' => "",
                'useremail' => "",
                'usertype' => "",
                'user_id' => "",
                'refresh' => ""
                );
           $this->session->unset_userdata($newdata); 
           redirect('admin/index');
                  
    }
    
    //Adding and Editing Organiztion
    public function list_users()
    { 
        $data['users'] = $this->login_model->users_list();
       //e($data['users']);
        $data['content'] = $this->load->view($this->view_dir .'list_users',$data,TRUE);
        $this->load->view('admin_template',$data);
    }
    
    public function show()
    {
        
        e($this->admin_model->allRecords('admin'));
    }
    
    public function addvideo()
    {
        //add movie
        $type=$this->post('video_type');
        
        $a_status=($this->post('award_status'))?1:0;
        $data = array('url'=>$this->post('url'),
                     'vid_name'=>$this->post('vid_name'),
                     'vid_description'=>$this->post('vid_description'),
                     'vid_type'=>$type,
                     'created_date'=>date("Y-m-d"),
                     'release_date'=>$this->post('release_date'),
                     'award_inf'=>$this->post('award_inf'),
                     'award_status'=>$a_status
                    ); 
        $video_id=$this->admin_model->insert('videoinfo',$data);
        
        //admin user details
        $admin_data=array('adm_id' => $this->session->userdata(userid),
                          'vid_id' => $video_id
                         ); 
        $this->admin_model->insert('videoinfo',$admin_data);
        
        if($type == 1 )//full movie
        {
             //genre
            $genre=$this->post('genre');
            foreach($genre as $value)
            {
                $g_data=array('vid_id' => $video_id,
                              'gen_id' => $value        
                             ); 
                
                $this->admin_model->insert('film_genres',$g_data);
            }
            
            //crew
            $i=0;
            foreach($this->post('first_name') as $name)
            {
                $last_name=$this->post('sur_name');
                $dob=$this->post('dob');
                $people_data=array(
                                    'peo_name' => $name.' '.$last_name[$i],
                                    'dob' => $dob[$i]
                                  );
                //check this syntax
                $people_info=$this->admin_model->allRecords_where('people',$people_data['peo_name']);
                if(count($people_info) > 0)
                {
                    foreach($people_info as $value) 
                    {
                        $person_id = $value->peo_id;
                    }
                }else{
                    $person_id=$this->admin_model->insert('people',$people_data);
                } 
                
                $role= $this->post('role');
                $cast_data=array('vid_id' => $video_id,
                                 'rol_id' =>$role[$i],
                                 'peo_id' => $person_id
                            ); 
                $this->admin_model->insert('cast_crew',$cast_data);
                
                 $i++;
            }    
            
        }
            
    }
    
    public function editvideo()
    {
        $type=$this->post('video_type');
        
        $a_status=($this->post('award_status'))?1:0;
        $data = array('url'=>$this->post('url'),
                     'vid_name'=>$this->post('vid_name'),
                     'vid_description'=>$this->post('vid_description'),
                     'vid_type'=>$type,
                     'created_date'=>date("Y-m-d"),
                     'release_date'=>$this->post('release_date'),
                     'award_inf'=>$this->post('award_inf'),
                     'award_status'=>$a_status
                    ); 
        $m_where=array('vid_id'=>$this->post('vid_id'));
        $this->admin_model->update('videoinfo',$data,$m_where);
        
    }
    
    public function test()
    {
        
       // echo $this->db->last-query();
        e($movies);
    }        
    
     
}
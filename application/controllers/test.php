<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
            $this->view_dir = strtolower(__CLASS__) . '/';  
    }  
    public function index()
    {
        e('test');
        
    }

     public function sample()
     {
         
        $data['title']='first page';
        $data['model']='model data';
        $data['content'] = $this->load->view($this->view_dir . 'sample',$data, TRUE);
        $this->load->view('template', $data);
     }        
     public function sample2()
     {
        
        $data['content'] = $this->load->view($this->view_dir . 'sample2',$data, TRUE);
        $this->load->view('template', $data);
     }        
}
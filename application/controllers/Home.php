<?php
 /**
  * 
  */
 class Home extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	public function index()
 	{
        $data = [
            'menu'=>'home',
            'submenu'=>'',
        ];
 		$this->template->load('template',"home",$data);
 	}
    public function whatsapp()
    {
        $data = [
            'menu'=>'whatsapp',
            'submenu'=>'',
        ];
        $this->template->load('template',"whatsapp",$data);
    }
    public function record()
    {
        $data = [
            'menu'=>'face-recording',
            'submenu'=>'add-record',
        ];
        $this->template->load('template',"redorc",$data);
    }
    public function result($id)
    {
        $data = [
            'menu'=>'face-recording',
            'submenu'=>'add-record',
            'data'=>$this->db->get_where("scan",['code'=>$id])->row()
        ];
        $this->template->load('template',"result",$data);
    }
 }
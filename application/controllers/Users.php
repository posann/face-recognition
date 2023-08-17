<?php
 /**
  * 
  */
 class Users extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	public function add()
 	{
        $data = [
            'menu'=>'users',
            'submenu'=>'add'
        ];
 		$this->template->load("template","add-user",$data);
 	}
    public function view()
    {
        $data = [
            'menu'=>'users',
            'submenu'=>'view',
            'data'=>$this->db->order_by("id",'desc')->get("client")->result(),
        ];
        $this->template->load("template","view-user",$data);
    }
 }
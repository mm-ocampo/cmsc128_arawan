<?php

	class Add extends CI_Controller{
		
		public function add(){
			parent::__construct();
		}

		function index(){
			//$data['title'] = "Add";
			//$data['header'] = "This is a sample just a sample program for CI. :D";
			//$data['first_name'] = "MM";
			//$data['query'] = $this->db->get('student');
			$this->load->view("add_view");
		}
	}

?>
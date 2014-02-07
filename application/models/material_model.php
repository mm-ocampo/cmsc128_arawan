<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function add_reading_materials($data, $data2){
		$query = $this->db->insert("material", $data);
		$query = $this->db->insert("author", $data2);
		return $query;
	}
}

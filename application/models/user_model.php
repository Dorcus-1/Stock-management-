<?php

class User_model extends CI_Model {

	public function addUser(){
		$array=array(
		'firstName'=>$_POST['first_name'],
		'lastName'=>$_POST['last_name'],
		'email'=>$_POST['email'],
		'password'=>$_POST['password'],
		'username'=>$_POST['username'],
		'telephone'=>$_POST['Telephone'],
		'gender'=>$_POST['gender'],
		'nationality'=>$_POST['nationality']);
		// $this->db->set($array);
		$query=$this->db->insert('users',$array);
		//  return $query;
    }
	public function display(){
		return $users= $this->db->get('users')->result_array();
	}
	function updateUser($userId){
		$data = array(
		'firstName'=>$_POST['first_name'],
		'lastName'=>$_POST['last_name'],
		'email'=>$_POST['email'],
		'password'=>$_POST['password'],
		'username'=>$_POST['username'],
		'telephone'=>$_POST['Telephone'],
		'gender'=>$_POST['gender'],
		'nationality'=>$_POST['nationality']
		);
		$this->db->where('userId',$userId);
		$this->db->update('users',$data);
	   }
	function getUser($userId)
	{
		return $this->db->get_where('users',array('userId'=>$userId))->result_array();
	}
	function deleteUser($userId){
		$this->db->where('userId',$userId);
		$this->db->delete('users');
	   }
	
	function index($email,$password){
		$data=array(
		'email'=>$email,
		'password'=>$password);
		$login=$this->db->get_where('users',$data)->result_array();

		return $login;

		
}

}

?>

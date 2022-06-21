<?php
class Inventory_model extends CI_model{
	function __construct() {
        $this->postTable = 'posts';
		$this->primary_key = "inventory_id";
		$this->table_name = "stk_inventory";

    }
	public function addinventory(){
		$array=array('quantity'=>$_POST['quantity'],'productId'=>$_POST['productId']);
		$this->db->set($array);
		$query=$this->db->insert('stk_inventory',$array);
		 return $query;

	
	}
	function all(){
		$inventory= $this->db->get('stk_inventory')->result();
		return $inventory;
	}
	function updateInventory($inventoryId){
		$data = array(
			'quantity'=>$_POST['quantity'],'productId'=>$_POST['productId']
		);
		$this->db->where('inventory_id',$inventoryId);
		$this->db->update('stk_inventory',$data);
	   }

	function getInventory($inventoryId)
	    {
		return $this->db->get_where('stk_inventory',array('inventory_id'=>$inventoryId))->result_array();
	  }
	function deleteInventory($inventoryId){
		$this->db->where('inventory_id',$inventoryId);
		$this->db->delete('stk_inventory');
	   }
}

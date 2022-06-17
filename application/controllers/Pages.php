<?php
class Pages extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Inventory_model');
	}
	public function show(){
		$inventory=$this->Inventory_model->all();
		$inv=array();
		$inv['inventory']=$inventory;
		$this->load->view('listing',$inv);
		
	}
	public function index(){
		$this->load->view('inventory');
	}

	public function process(){
		// $this->load->helper('url');
		
		$this->load->model('Inventory_model');
		$result=$this->Inventory_model->addinventory();

		 if(!$result){
			 echo mysqli_error($result);
		 }else{
			 redirect(base_url().'index.php/pages/show/');
		 }
    }
	function edit($inventoryId){
		$inventory=$this->Inventory_model->getInventory($inventoryId);
		$data=array();
		$data['data']=$inventory;
		// $this->form_validation->set_rules('inventory_id', 'productId', 'required');
		if(isset($_POST['updateinventory'])){
			$this->Inventory_model->updateInventory($inventoryId);
			redirect(base_url().'pages/index');
		}
		   $this->load->view('edit',$data);

		//    $inventory = new Inventory_model;
		//    $inventory->updateInventory($inventoryId);
		  
		   
	 }
}
?>

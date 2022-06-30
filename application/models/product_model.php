<?php
class Product_model extends CI_Model{
    function __construct(){
        $this->primary_key = 'product_id';
        $this->table_name = 'products';
        parent::__construct();
    }

    function getUser($productId)
     {
        // $this->db->where('productId',$productId);
        return $product = $this->db->get_where('products',array('productId'=>$productId))->row();
    }
     function updateProduct($productId){
         
         $data = array(
             "product_Name" => $this->input->post("name"),
             "brand" => $this->input->post("brand"),
             "supplier_phone" => $this->input->post("supplier_phone"),
             "supplier" => $this->input->post("supplier"),
            
         );
         $this->db->where('productId',$productId);
         $this->db->update('products',$data);
        }
 

        function deleteProduct($productId){
        
         $this->db->where('productId',$productId);
         $this->db->delete('products');
        }
}
?>

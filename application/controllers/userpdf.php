<?php
class Userpdf extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function display(){

      ob_start();
      require('fpdf184/fpdf.php');
      $query=$this->db->get('users')->result_array();
      // var_dump($query);
      
      // $pdf = new FPDF();
      $pdf = new FPDF('P', 'mm', array(500,550));
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      // var_dump($query);

      foreach($query as $row){ {
          foreach($row as $val=>$value)
              $pdf->Cell(50,12,$val,1);           
      }   
      
      foreach($query as $row){ 
          $pdf->SetFont('Arial','',12);	
          $pdf->Ln();
          foreach($row as $column){
              $pdf->Cell(50,12,$column,1);

          }
      }
      $pdf->Output();
      ob_end_flush(); 

    }
  }
    

}





?>

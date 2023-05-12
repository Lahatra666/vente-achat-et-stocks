<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FicheFournisseur extends CI_Model
{  
       public function Fiche($a,$id) {
          $csx = $this->db;
          $sql = "select * from DemandeEntreprise Where Etat=0 and idadmin='$a' and idtypefournisseur in (select idtypefournisseur  from fournisseur where idfournisseur=$id)";
          $query = $csx->query($sql);
          return $query->result_array();
         echo $sql;
     }
   //   function saveProforma($sql)
   //   {
   //      $csx = $this->db;
   //      $query = $csx->query($sql); 
   //      return true;
   //   }
   function select_fournisseur($id){
      $csx = $this->db;
      $sql = "select *  from fournisseur where idfournisseur='$id'";
      $query = $csx->query($sql);
      return $query->result_array();
   }
   function Insert($id,$designe,$nombre,$montant){
      $csx = $this->db;
      $sql="INSERT INTO FROM Proforma Values ('$id','$designe','$nombre','$montant')";
      $c=$csx->query($sql);

  return 1;
  
  }
  public function id() {
   $csx = $this->db;
   $sql = "select * from idProforma ";
   $array = $this->db->query($sql)->row_array();
   $id = implode("",$array);

   return $id;
}

     function saveProforma($sql)
     {
        $csx = $this->db;
        $query = $csx->query($sql); 
        return true;
     }
}   

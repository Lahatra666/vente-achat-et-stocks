<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DemandeDepartement extends CI_Model
{
    function saveDemande($data)
    {
        $this->db->insert('demandedept',$data);
        return true;
    }
    function updateDemande($nombre,$designation,$cate,$id)
    {
        $csx = $this->db;
        echo $sql = "update demandedept set designation='".$designation."',nombre=".$nombre.",idtypefournisseur=".$cate." where iddemandedept=".$id;
         $query = $csx->query($sql);
         return true;
    }
    public function listDemande($id){
        $csx = $this->db;
        $sql = "select * from demandedept where etat=0 and iddept=".$id;
        $query = $csx->query($sql);
        return $query->result_array();
        // echo $sql;
    }
    public function Stockdept($id){
        $csx = $this->db;
        $sql = "select * from stockdept where iddept=".$id;
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function listDemandeupdate($id){
        $csx = $this->db;
        $sql = "select * from demandedept where etat=0 and iddemandedept=".$id;
        $query = $csx->query($sql);
        return $query->result_array();
        // echo $sql;
    }
}
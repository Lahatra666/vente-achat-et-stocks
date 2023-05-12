<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DepartementAdmin extends CI_Model
{

    public function listStock(){
        $csx = $this->db;
        $sql = "SELECT * from stockentreprise";
        $query = $csx->query($sql);
        return $query->result_array();
    } 

    public function listEntree(){
        $csx = $this->db;
        $sql = "SELECT * from Entree";
        $query = $csx->query($sql);
        return $query->result_array();
    } 

    function saveStockDept($data)
	{
        $this->db->insert('stockdept',$data);
        return true;
	}

    public function updateStock($idStock, $nombre){
        $csx = $this->db;
        $sql = "Update stock set nombre = " . $nombre ." where idstock = " .$idStock; 
        $query = $csx->query($sql);
        return true;
    } 

    public function getDeptinfo(){
        $csx = $this->db;
        $sql = "SELECT idDept, nomDept from Departement";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
}
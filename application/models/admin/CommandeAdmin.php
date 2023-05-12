<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommandeAdmin extends CI_Model
{
    public function commande(){
        $csx = $this->db;
        $sql = "INSERT INTO DemandeEntreprise(idAdmin,Designation, Nombre,idtypefournisseur) SELECT 1 as idadmin,Designation, SUM(Nombre),idtypefournisseur as Nombre FROM DemandeDept GROUP BY Designation,idtypefournisseur";
        $sql2 = "update demandedept set etat=1 where designation in (SELECT designation from demandeentreprise)"; 
        $query = $csx->query($sql);
        $query2 = $csx->query($sql2);
    } 
    function saveCommande($sql)
	{
        $csx = $this->db;
        $query = $csx->query($sql);
        return true;
	}
    public function flivraison(){
        $csx = $this->db;
        $sql="select nomfournisseur,email,fournisseur.idfournisseur from livraison join fournisseur on livraison.idfournisseur=fournisseur.idfournisseur where etat=0 group by nomfournisseur,email,fournisseur.idfournisseur";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function recu($id){
        $csx = $this->db;
        $sql="select*from livraison where etat=0 and idfournisseur='$id'";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function daterecu($id){
        $csx = $this->db;
        $sql="select livraison.datelivraison,fournisseur.nomfournisseur from livraison join fournisseur on livraison.idfournisseur=fournisseur.idfournisseur where livraison.idfournisseur='$id' and etat=0 group by livraison.datelivraison,fournisseur.nomfournisseur";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function updateetat($date,$id){
        $csx = $this->db;
        $sql="update livraison set etat=1 where datelivraison='$date' and idfournisseur=$id";
        $query = $csx->query($sql);
        return true;
    }
}
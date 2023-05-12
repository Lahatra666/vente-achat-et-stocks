<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProformaAdmin extends CI_Model
{
    public function proforma(){
        $csx = $this->db;
        $sql = "INSERT INTO Proforma (Designations, Nombres) SELECT Designation, SUM(Nombre) as Nombre FROM DemandeDept GROUP BY Designation";
        $query = $csx->query($sql);
    } 

    public function listProforma(){
        $csx = $this->db;
        $sql = "select distinct(v_manana.idDemandeEntreprise),v_manana.*,typefournisseur.* from proforma inner join v_manana on proforma.idfournisseur=v_manana.idfournisseur inner join typefournisseur on typefournisseur.idtypefournisseur=v_manana.idtypefournisseur;";
        $query = $csx->query($sql);
        return $query->result_array();
    } 
    public function fproforma(){
        $csx = $this->db;
        $sql="select nomfournisseur,email,fournisseur.idfournisseur from proformafournisseur join fournisseur on proformafournisseur.idfournisseur=fournisseur.idfournisseur group by nomfournisseur,email,fournisseur.idfournisseur";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function proposition($id){
        $csx = $this->db;
        $sql="select*from proformafournisseur 
        join proforma on proformafournisseur.idproforma=proforma.idproforma where proformafournisseur.idfournisseur='$id'";
        $query = $csx->query($sql);
        return $query->result_array();
    }
    public function proformamora(){
        $reponse=array();
        $i=0;
        $id=0;
        $info= array();
        //$reponse['a'][0][0]="a0";
        $csx = $this->db;
        $sql="select *from demandeentreprise";
        $query = $csx->query($sql);
        $data = array();
        $data = $query->result_array();
        foreach($data as $row){
           //echo $sql2="select min(montant),idproforma,designation,nombre,montant from proforma where designation='".$row['designation']."' group by idproforma,designation,nombre,montant";
           $sql2="select idproforma,designation,nombre,montant from proforma where designation='".$row['designation']."' and montant in (select min(montant) from proforma where designation='".$row['designation']."')";
           $query2 = $csx->query($sql2);
            $data2 = array();
            $data2 = $query2->result_array();
            
            foreach($data2 as $info){
                //$sql3="select*from proformafournisseur where idproforma=".$info['idproforma']."";
                $sql3="select proformafournisseur.idfournisseur,fournisseur.nomfournisseur from proformafournisseur 
                join fournisseur on proformafournisseur.idfournisseur=fournisseur.idfournisseur
                where proformafournisseur.idproforma=".$info['idproforma']."";
                $query3 = $csx->query($sql3);
                $data3 = array();
                $data3 = $query3->result_array();
            }
            foreach($data3 as $info2){
                $id=$info2['idfournisseur'];
                $nomfournisseur=$info2['nomfournisseur'];
            }
            $reponse['a'][$i][0]=$info['designation'];
            $reponse['a'][$i][1]=$info['nombre'];
            $reponse['a'][$i][2]=$info['montant'];
            $reponse['a'][$i][3]=$id;
            $reponse['a'][$i][4]=$nomfournisseur;
            $i++;
        }
        
        return $reponse;
    }
    
}
//select min(montant),idproforma,designation,nombre,montant from proforma where designation='Cache Bouche' group by idproforma,designation,nombre,montant; 
// select * from proformafournisseur 
//                 join fournisseur on proformafournisseur.idfournisseur=fournisseur.idfournisseur
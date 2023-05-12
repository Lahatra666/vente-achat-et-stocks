<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginDepartement extends CI_Model
{
// fonction qui prend un client si le compte existe dans la base
     public function login($contact, $pass) {
          $sql = "SELECT idDept FROM Departement WHERE email = '".$contact."' AND password = '".$pass."'";
          // echo $sql;
          $array = $this->db->query($sql)->row_array();
          $idDepartement = implode("",$array);
           $data = $this->db->query($sql);
          // return $data->row_array();\
           return $idDepartement;

     }
}
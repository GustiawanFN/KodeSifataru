<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Page extends CI_Model
{

    //Input
    function input($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function tampil_data()
    {
        return $this->db->get('v_doktek');
    }

    function get_by_id($Id){

        $query = 'SELECT * FROM v_doktek where Id = '.$Id;
        return $this->db->query($query);
    }

    function cek_eksisting($KodeSifataru){
        $query = "SELECT KodeSifataru FROM v_doktek WHERE KodeSifataru = '$KodeSifataru'";
        return $this->db->query($query)->num_rows();
    }

    function cek_kode_terbesar($kodesifata){
       $query ="SELECT MAX(KodeSifataru) FROM v_doktek WHERE KodeSifataru LIKE '$kodesifata%'";
       return $this->db->query($query);


    //    SELECT MAX(KodeSifataru) FROM v_doktek WHERE KodeSifataru LIKE '2019030301011205000%' LIMIT 1 

    }


    


   
}

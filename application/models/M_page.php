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

        $query = 'select * from v_doktek where Id = '.$Id;
        return $this->db->query($query);
    }

    function cek_eksisting($KodeSifataru){
        $query = 'select * from v_doktek where KodeSifataru = '.$KodeSifataru;
        return $this->db->query($query)->num_rows();
    }


   
}

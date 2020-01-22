<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Generate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_page');
        $this->load->library('session');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->model("M_page");
    }

    public function generate_kode($Id)
    {

        $data['hasil'] = $this->M_page->get_by_id($Id)->result();

        foreach ($data['hasil'] as $value) {

            $Tahun = $value->Tahun;

            $ProyekPrioritasNasionalId = $value->ProyekPrioritasNasionalId;
            $KegiatanPrioritasId = $value->KegiatanPrioritasId;
            $ProgramPrioritasId = $value->ProgramPrioritasId;
            $PrioritasNasionalId = $value->PrioritasNasionalId;

            $DistrictId = $value->DistrictId;
            $RegionId = $value->RegionId;
            $ProvinceId = $value->ProvinceId;

            $CodeProyek = $value->CodeProyek;
            $CodeKegiatan = $value->CodeKegiatan;
            $CodeProgram = $value->CodeProgram;
            $CodePrioritas = $value->CodePrioritas;

            $CodeProp = $value->CodeProp;
            $CodeKab = $value->CodeKab;
            $CodeKec = $value->CodeKec;


            //PNCode
            $PNCode = "";

            if ($ProyekPrioritasNasionalId != null) {
                $PNCode = $CodeProyek;
            } else if ($KegiatanPrioritasId != null) {
                $PNCode = $CodeKegiatan . "00";
            } else if ($ProgramPrioritasId != null) {
                $PNCode = $CodeProgram . "0000";
            } else if ($PrioritasNasionalId != null) {
                $PNCode = $CodePrioritas . "000000";
            }

            //AreaCode
            $AreaCode = "";


            if ($DistrictId != 0) {
                $AreaCode = $CodeKec;
            } else if ($RegionId != 0) {
                $AreaCode = $CodeKab . "000";
            } else if ($ProvinceId != 0) {
                $AreaCode = $CodeProp . "00000";
            }

            //zerofil 5 digit terakhir
            $count = 1;
            $fmt = sprintf('%05d', $count);

            $KodeSifataru =   $Tahun . $PNCode . $AreaCode . $fmt;

            //cek sebelum input
            $data = $this->M_page->cek_eksisting($KodeSifataru);


            if ($data == 0) {
                //Jika kode baru maka input
                $this->input($KodeSifataru, $Id);
            } else if ($data == 1) {

                //buang 5 digit terakhir
                $KodeToString = (string) $KodeSifataru;
                $kodesifata = substr($KodeToString, 0, 19);

                // ambil data esksisting terbesar
                $dataa = $this->M_page->cek_kode_terbesar($kodesifata)->result();
                //  var_dump(((array) $dataa[0]) ['kode_paling_gede']);
                $kode_paling_gede = ((array) $dataa[0])['kode_paling_gede'];

                // potong 5 digit terakhir dari data eksisting terbesar
                $lima_terakhir = substr($kode_paling_gede, 19, 5);

                // tambah 1 di 5 digit terakhir
                $tambah = sprintf ("%05d", $lima_terakhir + 1);

                //Kode Sifataru 
                $KodeSifataru = $kodesifata . $tambah;

                //input
                $this->input($KodeSifataru, $Id);
            }
        }
    }



    public function input($KodeSifataru, $Id)
    {
        $data = array(
            'KodeSifataru' => $KodeSifataru
        );

        $where = array('Id' => $Id);

        $this->M_page->input($where, $data, 'v_doktek');

        $this->session->set_flashdata("a", "Data Berhasil Diinput");
        redirect('page/index');
    }
}

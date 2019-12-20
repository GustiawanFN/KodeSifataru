<?php
//CONTROLLER
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
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


	public function index()
	{
		$data['kode'] = $this->M_page->tampil_data()->result();
		$data['judul'] = "Kode Sifataru";
		$data['page_name'] = 'kode_sifataru.php';
		$this->load->view('menu', $data);
	}

	public function generate_kode_sifataru($Id)
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

			$fmt = "00000";

			//Mixing
			// $KodeSifataru =  "Tahun" . $Tahun . "PnCode" . $PNCode . "AreaCode" . $AreaCode;
			$KodeSifataru =   $Tahun . $PNCode . $AreaCode . $fmt;

			//Cek
			$data = $this->M_page->cek_eksisting($KodeSifataru);



			// echo $data;
			if ($data >= 1) {
				// sudah ada
				echo "ada";
				//var_dump($data);

				//Convert to string
				$KodeToString = (string) $KodeSifataru;

				//Ambil 5 digit terakhir kode sifatatu
				$lima_terakhir = substr($KodeToString, 19, 5);

				//Tambah 1
				$tambah = (int)$lima_terakhir + 1;

				//Zero Fill
				$kodeterakhir= sprintf('%05d', $tambah);


				$SifataruCode = $Tahun . $PNCode . $AreaCode . $kodeterakhir;

				//ZeroFill 
				//$filled_int = sprintf("%04d", $your_int);
				//Zerofill
				// $number = 15;
				// $length = 5;
				// echo str_pad($number, $zeros, '0', STR_PAD_LEFT); // result 00015

				$data = array(

					'KodeSifataru' => $SifataruCode

				);

				$where = array('Id' => $Id);
				$this->M_page->input($where, $data, 'v_doktek');

				$this->session->set_flashdata("a", "Data Berhasil Diedit");
				redirect('page/index');
			} else {
				// belum ada
				//echo "eweuh";

				$data = array(

					'KodeSifataru' => $KodeSifataru

				);

				$where = array('Id' => $Id);
				$this->M_page->input($where, $data, 'v_doktek');

				$this->session->set_flashdata("a", "Data Berhasil Diedit");
				redirect('page/index');
			}
		}
	}
}

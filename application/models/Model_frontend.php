<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
/**
 * 
 */
class Model_frontend extends CI_Model
{

	function page_utama()
	{
		return $this->db->get_where('tbl_web', "id_web='1'")->row();
	}

	function pendaftaran($menu = '', $data = '')
	{
		switch ($menu) {
			
			case 'daftar':
				$data = (object) $data;
				$data = array(
					'id_pendaftaran'	=> $data->post('id_pendaftaran'),
					'nama_lengkap'		=> $data->post('nama_lengkap'),
					'jenis_kelamin'		=> $data->post('jk'),
					'no_kk'				=> $data->post('no_kk'),
					'no_ktp'			=> $data->post('no_ktp'),
					'ttl'				=> $data->post('tempat_lahir') . ", " .$data->post('tgl_lahir') . "-" . $data->post('bln_lahir') . "-" . $data->post('thn_lahir'),
					'alamat_rumah'		=> $data->post('alamat_rumah'),
					'status_verifikasi'	=> 'proses',
					'status_pendaftaran'=> 'proses',
					'tgl_pendaftaran'	=> date('Y-m-d H:i:s')
				);
				return $this->db->insert('tbl_pendaftaran', $data);
				break;

			case 'id_baru':
				$no_max = $this->db->select_max('id_pendaftaran', 'kode')->get('tbl_pendaftaran')->row();
				$no_max = $no_max->kode;
				$no_max = (int) substr($no_max, 6) + 1;
				return date('Y-m-') . sprintf("%06s", time());
				break;

			case 'status_rekrutmen':
				return $this->db->get_where('tbl_web', "id_web='1'")->row();
				break;

			default:
				# code...
				break;
		}
	}

	function auth($menu = '', $data = '')
	{
		switch ($menu) {
			case 'cek-masuk':
				$query = $this->db->where("nama_lengkap", $data['nama_lengkap'])->where("no_ktp", $data['no_ktp'])->get('tbl_pendaftaran');
				return array(
					'res'	=> $query->row(),
					'sum'	=> $query->num_rows()
				);
				break;

			default:
				# code...
				break;
		}
	}
}

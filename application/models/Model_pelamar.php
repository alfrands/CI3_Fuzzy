<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelamar extends CI_Model
{

	function base_biodata($sess)
	{
		return $this->db->get_where('tbl_pendaftaran', "id_pendaftaran='$sess'")->row();
	}
	function hasil_seleksi($sess)
	{
		return $this->db->get_where('tbl_penilaian', "id_penilaian='$sess'")->row();
	}
	function update_status($kirim, $where)
	{
		$this->db->where('id_pendaftaran', $where);
		$str = $this->db->update('tbl_pendaftaran', $kirim);
		return $str;
	}
	function cek_id($kirim_cek)
	{
		$query = $this->db->where("id_berkas", $kirim_cek['id_berkas'])->get('tbl_berkas');
		return array(
			'res'	=> $query->row(),
			'sum'	=> $query->num_rows()
		);
	}
	function upload($data)
	{
		return $this->db->insert('tbl_berkas', $data);

	}
	function update_berkas($data, $where)
	{
		$this->db->where('id_berkas', $where);
		$str = $this->db->update('tbl_berkas', $data);
		return $str;
	}

	function get_fy()
	{
		return $this->db->get_where('tbl_web', "id_web=1")->row()->tapel;
	}

	function get_print($menu = '', $data = '')
	{
		switch ($menu) {
			case 'passed':
				return $this->db->like('tgl_pendaftaran', date('Y'), 'after')->get_where('tbl_pendaftaran', "id_pendaftaran='$data'")->row();
				break;

			case 'announcement':
				return $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();
				break;

			default:
				# code...
				break;
		}
	}

	function get_val($type, $sess, $subject)
	{
		switch ($type) {
			default:
				# code...
				break;
		}
	}
}

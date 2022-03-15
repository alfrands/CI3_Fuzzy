<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Model_admin extends CI_Model
{

	function auth($data)
	{
		$query = $this->db->where("username", $data['username'])->where("password", $data['password'])->get('tbl_user');
		return array(
			'res'	=> $query->row(),
			'sum'	=> $query->num_rows()
		);
	}
	function base($menu = '', $data = '')
	{
		switch ($menu) {
			case 'bio':
				// var_dump($data); exit;
				return $this->db->get_where('tbl_user', "username='$data'")->row();
				break;

			case 'status-ppdb':
				return $this->db->get_where('tbl_web', "id_web='1'")->row();
				break;

			default:
				# code...
				break;
		}
	}
	function ppdb_status($option, $date)
	{
		switch ($option) {
			case 'tutup':
				$data = array(
					'status_rekrutmen'	=> 'tutup',
					'tgl_diubah'	=> $date
				);
				return $this->db->update('tbl_web', $data, array('id_web' => '1'));;
				break;

			case 'buka':
				$data = array(
					'status_rekrutmen'	=> 'buka',
					'tgl_diubah'	=> $date
				);
				return $this->db->update('tbl_web', $data, array('id_web' => '1'));;
				break;

			default:
				# code...
				break;
		}
	}
	function get_pelamar($menu = '')
	{
		switch ($menu) {
			case 'data_pelamar':
				$query = $this->db->get('tbl_pendaftaran');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function get_pelamarb($menu = '')
	{
		switch ($menu) {
			case 'data_pelamar':
				$this->db->where('status_pendaftaran', "belum dinilai");
				$query = $this->db->get('tbl_pendaftaran');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function update_pelamar($data, $where)
	{
		$this->db->where('id_pendaftaran', $where);
		$str = $this->db->update('tbl_pendaftaran', $data);
		return $str;
	}
	function delete_pelamar($where)
	{
		$this->db->where('id_pendaftaran', $where);
		$str = $this->db->delete('tbl_pendaftaran');
		return $str;
	}
	function get_tim($menu = '')
	{
		switch ($menu) {
			case 'data_tim':
				$query = $this->db->get('tbl_user');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function save_tim($send)
	{

		$query = $this->db->insert('tbl_user', $send);
		return $query;
	}
	function update_tim($data, $where)
	{
		$this->db->where('id_user', $where);
		$str = $this->db->update('tbl_user', $data);
		return $str;
	}
	function delete_tim($where)
	{
		$this->db->where('id_user', $where);
		$str = $this->db->delete('tbl_user');
		return $str;
	}
	function get_berkas($menu = '')
	{
		switch ($menu) {
			case 'data_berkas':
				$this->db->select('*');
				$this->db->from('tbl_pendaftaran');
				$this->db->join('tbl_berkas', 'tbl_pendaftaran.id_pendaftaran = tbl_berkas.id_berkas');
				$query = $this->db->get();
				return $query;
				break;
			default:
				# code...
				break;
		}
	}
	function update_berkas($data, $where)
	{
		$this->db->where('id_berkas', $where);
		$str = $this->db->update('tbl_berkas', $data);
		return $str;
	}
	function delete_berkas($where)
	{
		$this->db->where('id_berkas', $where);
		$str = $this->db->delete('tbl_berkas');
		return $str;
	}

	function get_kriteria($menu = '')
	{
		switch ($menu) {
			case 'data_kriteria':
				$query = $this->db->get('tbl_kriteria');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function save_kriteria($send)
	{

		$query = $this->db->insert('tbl_kriteria', $send);
		return $query;
	}
	function update_kriteria($data, $where)
	{
		$this->db->where('id', $where);
		$str = $this->db->update('tbl_kriteria', $data);
		return $str;
	}
	function delete_kriteria($where)
	{
		$this->db->where('id', $where);
		$str = $this->db->delete('tbl_kriteria');
		return $str;
	}
	function get_subkriteria($menu = '')
	{
		switch ($menu) {
			case 'sub_kriteria':
				$query = $this->db->get('tbl_sub_kriteria');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function get_namakriteria($menu = '', $gn)
	{
		switch ($menu) {
			case 'gets':
				$query = $this->db->query("SELECT * FROM tbl_kriteria where id = $gn;");
				return array(
					'res'	=> $query->row(),
					'sum'	=> $query->num_rows()
				);


			default:
				# code...
				break;
		}
	}
	function get_subk1($menu = '')
	{
		switch ($menu) {
			case 'sub_kriteria':
				$query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '1';");
				return $query->result_array();


			default:
				# code...
				break;
		}
	}
	function get_subk2($menu = '')
	{
		switch ($menu) {
			case 'sub_kriteria':
				$query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '2';");
				return $query->result_array();


			default:
				# code...
				break;
		}
	}
	function get_subk3($menu = '')
	{
		switch ($menu) {
			case 'sub_kriteria':
				$query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '3';");
				return $query->result_array();


			default:
				# code...
				break;
		}
	}
	function get_nilaikriteria($menu = '', $ckid)
	{
		switch ($menu) {
			case 'gets':
				$query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_sub = $ckid;");
				return array(
					'res'	=> $query->row(),
					'sum'	=> $query->num_rows()
				);


			default:
				# code...
				break;
		}
	}
	function get_bobotkriteria($menu = '', $bbid)
	{
		switch ($menu) {	
			case 'gets':
				$query = $this->db->query("SELECT * FROM tbl_kriteria where id = $bbid;");
				return array(
					'res'	=> $query->row(),
					'sum'	=> $query->num_rows()
				);


			default:
				# code...
				break;
		}
	}
	function save_subkriteria($send)
	{

		$query = $this->db->insert('tbl_sub_kriteria', $send);
		return $query;
	}
	function update_subkriteria($data, $where)
	{
		$this->db->where('id_sub', $where);
		$str = $this->db->update('tbl_sub_kriteria', $data);
		return $str;
	}
	function delete_subkriteria($where)
	{
		$this->db->where('id_sub', $where);
		$str = $this->db->delete('tbl_sub_kriteria');
		return $str;
	}

	function cek_id($kirim_cek)
	{
		$query = $this->db->where("id_penilaian", $kirim_cek['id_penilaian'])->get('tbl_penilaian');
		return array(
			'res'	=> $query->row(),
			'sum'	=> $query->num_rows()
		);
	}
	function banding_nilai($menu = '')
	{
		switch ($menu) {
			case 'banding':
				$query = $this->db->select('total_nilai,id_penilaian')->from('tbl_penilaian')
					->limit(2)
					->order_by('total_nilai', 'DESC')
					->get();
				return $query->row(1);
				break;

			default:
				# code...
				break;
		}
	}
	function get_count($menu = '')
	{
		switch ($menu) {
			case 'count':
				$query = $this->db->select('count(*) as count')->from('tbl_penilaian')
					->get();
				return $query->row();
				break;

			default:
				# code...
				break;
		}
	}
	function save_nilai($menu = '', $send)
	{
		switch ($menu) {

			case 'simpan':
				$query = $this->db->insert('tbl_penilaian', $send);
				return $query;
				break;

			default:
				# code...
				break;
		}
	}
	function update_nilai($menu = '', $where)
	{
		$dataa = array('keterangan' => 'tidak lulus');
		switch ($menu) {
			case 'update':
				$this->db->where('id_penilaian', $where);
				$query = $this->db->update('tbl_penilaian', $dataa);
				return $query;
				break;
			default:
				# code...
				break;
		}
	}
	function update_status($kirim, $where)
	{
		$this->db->where('id_pendaftaran', $where);
		$str = $this->db->update('tbl_pendaftaran', $kirim);
		return $str;
	}
	function get_hasil_penilaian($menu = '')
	{
		switch ($menu) {
			case 'hasil_penilaian':
				$query = $this->db->get('tbl_penilaian');
				return $query->result_array();

			default:
				# code...
				break;
		}
	}
	function update_area($data, $where)
	{
		$this->db->where('id_penilaian', $where);
		$str = $this->db->update('tbl_penilaian', $data);
		return $str;
	}
	function update_profil($data, $where)
	{
		$this->db->where('id_user', $where);
		$str = $this->db->update('tbl_user', $data);
		return $str;
	}
	function about_me($menu = '', $data = '')
	{
		switch ($menu) {
			case 'update':
				$old_user = $data['old_user'];
				$data = array(
					'username'		=> $data['username'],
					'nama_lengkap'	=> $data['nama_lengkap'],
					'alamat'		=> $data['alamat'],
					'telp'			=> $data['telp'],
					'email'			=> $data['email'],
					'website'		=> $data['website'],
					'kabupaten'	=> $data['kabupaten'],
					'ketua_panitia'	=> $data['ketua_panitia'],
					'nip_ketua'		=> $data['nip_ketua'],
					'tahun'	=> $data['tahun'],
				);
				return $this->db->update('tbl_user', $data, array('username' => $old_user));
				break;

			case 'update-pass':
				$old_user = $data['old_user'];
				$data = array(
					'password'		=> $data['password']
				);
				return $this->db->update('tbl_user', $data, array('username' => $old_user));
				break;

			default:
				# code...
				break;
		}
	}
}

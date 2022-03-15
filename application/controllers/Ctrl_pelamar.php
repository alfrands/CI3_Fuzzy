<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_pelamar extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('Ctrl_pelamar');
		} else {
			$data = array(
				'user'		=> $this->mpelamar->base_biodata($this->session->userdata('id_pendaftaran')),
				'judul_web'	=> "HOME"
			);

			$this->load->view('pelamar/header', $data);
			$this->load->view('pelamar/dashboard', $data);
			$this->load->view('pelamar/footer');
		}
	}
	public function form_upload()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('login_pelamar');
		} else {
			$data = array(
				'user'		=> $this->mpelamar->base_biodata($this->session->userdata('id_pendaftaran')),
				'judul_web'	=> "PENGUMUMAN"
			);

			$this->load->view('pelamar/header', $data);
			$this->load->view('pelamar/upload_berkas', $data);
			$this->load->view('pelamar/footer');
		}
	}

	public function upload_berkas()
	{
		if (isset($_POST['btnUpload'])) {
			$id_berkas = $this->input->post('id_berkas');
			$kirim_cek = array(
				'id_berkas'	=> $id_berkas,
			);
			$cek_data	= $this->mpelamar->cek_id($kirim_cek);
			if ($cek_data['sum'] == 0) {
				$id_berkas = $this->input->post('id_berkas');
				$ktp = $_FILES['ktp']['name'];
				$kk = $_FILES['kk']['name'];
				$pernyataan = $_FILES['pernyataan']['name'];

				if ($ktp != null && $kk !=  null && $pernyataan != null) {

					$config['upload_path'] = './files/uploads/';
					$config['allowed_types'] = 'jpg|jpeg|png|svg';
					$config['max_size'] = 10000;
					$config['encrypt_name'] = TRUE;

					$this->upload->initialize($config);
					$this->load->library('upload', $config);



					$field1 = "ktp";
					$field2 = "kk";
					$field3 = "pernyataan";
					if ($this->upload->do_upload($field1)) {
						$uploaded = $this->upload->data();
						$data_picture_ktp = $uploaded['file_name'];
					}
					if ($this->upload->do_upload($field2)) {
						$uploaded = $this->upload->data();
						$data_picture_kk = $uploaded['file_name'];
					}

					if ($this->upload->do_upload($field3)) {
						$uploaded = $this->upload->data();
						$data_picture_per = $uploaded['file_name'];
					}
					$upload = [
						'id_berkas' => $this->input->post('id_berkas'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'foto_ktp' => $data_picture_ktp,
						'foto_kk' => $data_picture_kk,
						'foto_pernyataan' => $data_picture_per,
					];
					$where = $id_berkas;
					$kirim = array('status_pendaftaran' => 'belum dinilai');
					$this->mpelamar->update_status($kirim, $where);

					if ($this->mpelamar->upload($upload)) {
						$this->session->set_flashdata('success', '<p> File Anda berhasil diupload , terima kasih. <strong></strong></p>');
					} else {
						$this->session->set_flashdata('error', '<p> Gagal! File tidak berhasil diupload , ulangi kembali!</p>');
					}
					redirect('Ctrl_pelamar/form_upload');
				} else {
					$this->session->set_flashdata('error', '<p> Gagal! Maaf tidak ada File yang ditemukan untuk diupload , ulangi kembali!</p>');
					redirect('Ctrl_pelamar/form_upload');
				}
			} else {
				$ktp = $_FILES['ktp']['name'];
				$kk = $_FILES['kk']['name'];
				$pernyataan = $_FILES['pernyataan']['name'];

				if ($ktp != null && $kk !=  null && $pernyataan != null) {

					$config['upload_path'] = './files/uploads/';
					$config['allowed_types'] = 'jpg|jpeg|png|svg';
					$config['max_size'] = 10000;
					$config['encrypt_name'] = TRUE;

					$this->upload->initialize($config);
					$this->load->library('upload', $config);



					$field1 = "ktp";
					$field2 = "kk";
					$field3 = "pernyataan";
					if ($this->upload->do_upload($field1)) {
						$uploaded = $this->upload->data();
						$data_picture_ktp = $uploaded['file_name'];
					}
					if ($this->upload->do_upload($field2)) {
						$uploaded = $this->upload->data();
						$data_picture_kk = $uploaded['file_name'];
					}

					if ($this->upload->do_upload($field3)) {
						$uploaded = $this->upload->data();
						$data_picture_per = $uploaded['file_name'];
					}
					$upload = [
						'id_berkas' => $this->input->post('id_berkas'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'foto_ktp' => $data_picture_ktp,
						'foto_kk' => $data_picture_kk,
						'foto_pernyataan' => $data_picture_per,
					];
					$where = $id_berkas;
					$update = $this->mpelamar->update_berkas($upload, $where);
					
					$kirim = array('status_pendaftaran' => 'belum dinilai');
					$this->mpelamar->update_status($kirim, $where);
					if ($update) {
						$this->session->set_flashdata('success', '<p> File Anda berhasil diupload dan diupdate , terima kasih. <strong></strong></p>');
					} else {
						$this->session->set_flashdata('error', '<p> Gagal! File tidak berhasil diupload , ulangi kembali!</p>');
					}
					redirect('Ctrl_pelamar/form_upload');
				} else {
					$this->session->set_flashdata('error', '<p> Gagal! Maaf tidak ada File yang ditemukan untuk diupload , ulangi kembali!</p>');
					redirect('Ctrl_pelamar/form_upload');
				}
			}
		} else {
			$this->session->set_flashdata('error', '<p> Gagal! Kesalahan Sistem</p>');
			redirect('Ctrl_pelamar/form_upload');
		}
	}

	public function pengumuman()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('login_pelamar');
		} else {
			$data = array(
				'user'		=> $this->mpelamar->base_biodata($this->session->userdata('id_pendaftaran')),
				'hasil'		=> $this->mpelamar->hasil_seleksi($this->session->userdata('id_pendaftaran')),
				'judul_web'	=> "PENGUMUMAN"
			);

			$this->load->view('pelamar/header', $data);
			$this->load->view('pelamar/pengumuman', $data);
			$this->load->view('pelamar/footer');
		}
	}

	public function biodata()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('login_pelamar');
		} else {
			$sess = $this->session->userdata('id_pendaftaran');
			$data = array(
				'user'		=> $this->mpelamar->base_biodata($sess),
				'judul_web'	=> "BIODATA"
			);

			$this->load->view('pelamar/header', $data);
			$this->load->view('pelamar/biodata', $data);
			$this->load->view('pelamar/footer');
		}
	}


	public function cetak()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('login_pelamar');
		}
		$sess 		= $this->session->userdata('id_pendaftaran');
		$base_bio 	= $this->mpelamar->base_biodata($sess);
		$data = array(
			'user'			=> $base_bio,
			'judul_web'		=> ucwords($base_bio->id_pendaftaran) . '-' . ucwords($base_bio->nama_lengkap),
			'thn_ppdb'		=> date('Y', strtotime($base_bio->tgl_pendaftaran))
		);

		$this->load->view('pelamar/cetak', $data);
	}

	public function cetak_lulus()
	{
		if ($this->session->userdata('id_pendaftaran') == NULL) {
			redirect('login_pelamar');
		} else {
			$sess = $this->session->userdata('id_pendaftaran');
			$base_bio 	= $this->mpelamar->base_biodata($sess);
			$data = array(
				'user'		=> $this->mpelamar->get_print('passed', $sess),
				'judul_web'	=> "Cetak Bukti Lulus " . ucwords($base_bio->nama_lengkap),
				'thn_ppdb'	=> date('Y', strtotime($base_bio->tgl_pendaftaran)),
				'v_ket'		=> $this->mpelamar->get_print('announcement')
			);
		}

		if ($data['user']->status_pendaftaran != 'lulus') {
			redirect('Ctrl_pelamar');
		}

		$this->load->view('pelamar/cetak_lulus', $data);
	}

	public function logout()
	{
		if ($this->session->userdata('id_pendaftaran') != '') {
			$this->session->sess_destroy();
		}
		redirect('login_pelamar');
	}
}

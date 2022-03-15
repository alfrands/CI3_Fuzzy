<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_admin extends CI_Controller
{

	public function index()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'web_ppdb'	=> $this->madmin->base('status-ppdb'),
				'judul_web'	=> "HOME",
				'v_thn'		=> date('Y'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnnonaktif'])) {
				$acts = $this->madmin->ppdb_status('tutup', date('Y-m-d H:i:s'));
				redirect('Ctrl_admin');
			}

			if (isset($_POST['btnaktif'])) {
				$acts = $this->madmin->ppdb_status('buka', date('Y-m-d H:i:s'));
				redirect('Ctrl_admin');
			}
		}
	}

	public function log_in()
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess != NULL) {
			redirect('Ctrl_admin');
		} else {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

			if (isset($_POST['btnlogin'])) {
				$send = array(
					'username'	=> $this->input->post('username'),
					'password'	=> $this->input->post('password')
				);
				$masuk	= $this->madmin->auth($send);

				if ($masuk['sum'] == 0) {
					$this->session->set_flashdata('msg', $this->err->wrong_admin_auth($sess));
					redirect('Ctrl_admin/log_in');
				} else {
					$this->session->set_userdata('administrator', $masuk['res']->level);
					$this->session->set_userdata('id_admin', $masuk['res']->username);
					redirect('Ctrl_admin');
				}
			}
		}
	}

	public function logout()
	{
		if ($this->session->userdata('id_admin') != '') {
			$this->session->sess_destroy();
			redirect('Ctrl_admin/log_in');
		}
		$this->load->view('admin/login/header_login');
		$this->load->view('admin/login/login');
		$this->load->view('admin/login/footer');
	}
	public function data_pelamar()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "MANAJEMEN PELAMAR",
				'v_thn'		=> date('Y'),
				'data_pelamar' => $this->madmin->get_pelamar('data_pelamar'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_pelamar', $data);
			$this->load->view('admin/footer');
		}
	}
	public function edit_pelamar($id_pendaftaran)
	{
		if (isset($_POST['btnEdit'])) {

			$data = array(
				'no_ktp' => $this->input->post('no_ktp'),
				'no_kk' => $this->input->post('no_kk'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'ttl' => $this->input->post('ttl'),
				'alamat_rumah' => $this->input->post('alamat'),
			);
			$where = $id_pendaftaran;
			$update = $this->madmin->update_pelamar($data, $where);

			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Pelamar Berhasil Diupdate! <strong></strong></p>');
				redirect('Ctrl_admin/data_pelamar');
			} else {
				$this->session->set_flashdata('error', '<p> Data Pelamar Gagal Diupdate!</p>');
				redirect('Ctrl_admin/data_pelamar');
			}
			redirect('Ctrl_admin/data_pelamar');
		}
	}
	public function hapus_pelamar()
	{
		if (isset($_POST['btnHapus'])) {

			$where = $this->input->post('id_pendaftaran');
			$delete = $this->madmin->delete_pelamar($where);

			if ($delete == true) {
				$this->session->set_flashdata('success', '<p> Data Pelamar Berhasil Dihapus! <strong></strong></p>');
				redirect('Ctrl_admin/data_pelamar');
			} else {
				$this->session->set_flashdata('error', '<p> Data Pelamar Gagal Dihapus!</p>');
				redirect('Ctrl_admin/data_pelamar');
			}
			redirect('Ctrl_admin/data_pelamar');
		}
	}
	public function data_tim()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "MANAJEMEN TIM",
				'v_thn'		=> date('Y'),
				'data_tim' => $this->madmin->get_tim('data_tim'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_tim', $data);
			$this->load->view('admin/footer');
		}
	}
	public function tambah_tim()
	{
		if (isset($_POST['btnTambah'])) {
			$send = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),
			);
			$save = $this->madmin->save_tim($send);

			if ($save == true) {
				$this->session->set_flashdata('success', '<p> Data Tim Berhasil Disimpan! <strong></strong></p>');
				redirect('Ctrl_admin/data_tim');
			} else {
				$this->session->set_flashdata('error', '<p> Data Tim Gagal Disimpan!</p>');
				redirect('Ctrl_admin/data_tim');
			}
			redirect('Ctrl_admin/data_tim');
		}
	}
	public function edit_tim()
	{
		if (isset($_POST['btnedit'])) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level')
			);
			$where = $this->input->post('id_user');
			$update = $this->madmin->update_tim($data, $where);

			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Tim Berhasil Diupdate! <strong></strong></p>');
				redirect('Ctrl_admin/data_tim');
			} else {
				$this->session->set_flashdata('error', '<p> Data Tim Gagal Diupdate!</p>');
				redirect('Ctrl_admin/data_tim');
			}
			redirect('Ctrl_admin/data_tim');
		}
	}
	public function hapus_tim()
	{
		if (isset($_POST['btnHapus'])) {

			$where = $this->input->post('id_user');
			$delete = $this->madmin->delete_tim($where);

			if ($delete == true) {
				$this->session->set_flashdata('success', '<p> Data Tim Berhasil Dihapus! <strong></strong></p>');
				redirect('Ctrl_admin/data_tim');
			} else {
				$this->session->set_flashdata('error', '<p> Data Tim Gagal Dihapus!</p>');
				redirect('Ctrl_admin/data_tim');
			}
			redirect('Ctrl_admin/data_tim');
		}
	}
	public function data_berkas()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "MANAJEMEN BERKAS",
				'v_thn'		=> date('Y'),
				'data_pelamar' => $this->madmin->get_pelamar('data_pelamar'),


			);
			$data['data_berkas'] = $this->madmin->get_berkas('data_berkas')->result();
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_berkas', $data);
			$this->load->view('admin/footer');
		}
	}
	public function edit_berkas($id_pendaftaran)
	{
		if (isset($_POST['btnEdit'])) {
			$ktp = $_FILES['ktp']['name'];
			$kk = $_FILES['kk']['name'];
			$pernyataan = $_FILES['pernyataan']['name'];
			if ($ktp != null && $kk !=  null && $pernyataan != null) {
				$config['upload_path'] = './files/uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|svg';
				$config['max_size'] = 20000;
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

				$data = array(
					'foto_ktp' => $data_picture_ktp,
					'foto_kk' => $data_picture_kk,
					'foto_pernyataan' => $data_picture_per,
				);
				$where = $id_pendaftaran;
				$update = $this->madmin->update_berkas($data, $where);
				if ($update) {
					$this->session->set_flashdata('success', '<p> Data Berkas Berhasil Diupdate! <strong></strong></p>');
					redirect('Ctrl_admin/data_berkas');
				} else {
					$this->session->set_flashdata('error', '<p> Data Berkas Gagal Diupdate!</p>');
					redirect('Ctrl_admin/data_berkas');
				}
				redirect('Ctrl_admin/data_berkas');
			} else {
				redirect('Ctrl_admin/data_berkas');
			}
		}
	}
	public function hapus_berkas($id_pendaftaran)
	{
		if (isset($_POST['btnHapus'])) {

			$where = $id_pendaftaran;
			$delete = $this->madmin->delete_berkas($where);

			if ($delete == true) {
				$this->session->set_flashdata('success', '<p> Data Berkas Pelamar Berhasil Dihapus! <strong></strong></p>');
				redirect('Ctrl_admin/data_berkas');
			} else {
				$this->session->set_flashdata('error', '<p> Data Berkas Pelamar Gagal Dihapus!</p>');
				redirect('Ctrl_admin/data_berkas');
			}
			redirect('Ctrl_admin/data_berkas');
		}
	}
	public function data_seleksi()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "HASIL SELEKSI ADMINISTRASI",
				'v_thn'		=> date('Y'),
				'data_pelamar' => $this->madmin->get_pelamar('data_pelamar'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_seleksi', $data);
			$this->load->view('admin/footer');
		}
	}
	public function data_kriteria()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "DATA KRITERIA",
				'v_thn'		=> date('Y'),
				'data_kriteria' => $this->madmin->get_kriteria('data_kriteria'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_kriteria', $data);
			$this->load->view('admin/footer');
		}
	}
	public function tambah_kriteria()
	{
		if (isset($_POST['btnTambah'])) {
			$send = array(
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'bobot' => $this->input->post('bobot'),
			);
			$save = $this->madmin->save_kriteria($send);

			if ($save == true) {
				$this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Disimpan! <strong></strong></p>');
				redirect('Ctrl_admin/data_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Kriteria Gagal Disimpan!</p>');
				redirect('Ctrl_admin/data_kriteria');
			}
			redirect('Ctrl_admin/data_kriteria');
		}
	}
	public function edit_kriteria($id)
	{
		if (isset($_POST['btnEdit'])) {
			$data = array(
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'bobot' => $this->input->post('bobot'),
			);
			$where = $id;
			$update = $this->madmin->update_kriteria($data, $where);

			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Diupdate! <strong></strong></p>');
				redirect('Ctrl_admin/data_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Kriteria Gagal Diupdate!</p>');
				redirect('Ctrl_admin/data_kriteria');
			}
			redirect('Ctrl_admin/data_kriteria');
		}
	}
	public function hapus_kriteria()
	{
		if (isset($_POST['btnHapus'])) {

			$where = $this->input->post('id');
			$delete = $this->madmin->delete_kriteria($where);

			if ($delete == true) {
				$this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Dihapus! <strong></strong></p>');
				redirect('Ctrl_admin/data_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Kriteria Gagal Dihapus!</p>');
				redirect('Ctrl_admin/data_kriteria');
			}
			redirect('Ctrl_admin/data_kriteria');
		}
	}
	public function sub_kriteria()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "DATA SUB KRITERIA",
				'v_thn'		=> date('Y'),
				'data_kriteria' => $this->madmin->get_kriteria('data_kriteria'),
				'sub_kriteria' => $this->madmin->get_subkriteria('sub_kriteria'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sub_kriteria', $data);
			$this->load->view('admin/footer');
		}
	}
	public function tambah_subkriteria()
	{
		if (isset($_POST['btnTambah'])) {
			$gn = $this->input->post('id_kriteria');
			$cek = $this->madmin->get_namakriteria('gets', $gn);
			$nama_kriteria = $cek['res']->nama_kriteria;

			$send = array(
				'id_kriteria' => $gn,
				'nama_kriteria' => $nama_kriteria,
				'nilai' => $this->input->post('nilai'),
				'keterangan' => $this->input->post('keterangan'),
			);
			$save = $this->madmin->save_subkriteria($send);

			if ($save == true) {
				$this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Disimpan! <strong></strong></p>');
				redirect('Ctrl_admin/sub_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Disimpan!</p>');
				redirect('Ctrl_admin/sub_kriteria');
			}
			redirect('Ctrl_admin/sub_kriteria');
		}
	}
	public function edit_subkriteria($id)
	{
		if (isset($_POST['btnEdit'])) {
			$gn = $this->input->post('id_kriteria');
			$cek = $this->madmin->get_namakriteria('gets', $gn);
			$nama_kriteria = $cek['res']->nama_kriteria;
			$data = array(
				'id_kriteria' => $gn,
				'nama_kriteria' => $nama_kriteria,
				'nilai' => $this->input->post('nilai'),
				'keterangan' => $this->input->post('keterangan'),
			);
			$where = $id;
			$update = $this->madmin->update_subkriteria($data, $where);

			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Diupdate! <strong></strong></p>');
				redirect('Ctrl_admin/sub_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Diupdate!</p>');
				redirect('Ctrl_admin/sub_kriteria');
			}
			redirect('Ctrl_admin/sub_kriteria');
		}
	}
	public function hapus_subkriteria()
	{
		if (isset($_POST['btnHapus'])) {

			$where = $this->input->post('id');
			$delete = $this->madmin->delete_subkriteria($where);

			if ($delete == true) {
				$this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Dihapus! <strong></strong></p>');
				redirect('Ctrl_admin/sub_kriteria');
			} else {
				$this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Dihapus!</p>');
				redirect('Ctrl_admin/sub_kriteria');
			}
			redirect('Ctrl_admin/sub_kriteria');
		}
	}
	public function data_penilaian()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "MANAJEMEN BERKAS",
				'v_thn'		=> date('Y'),
				'data_pelamar' => $this->madmin->get_pelamar('data_pelamar'),
				'sub_k1' => $this->madmin->get_subk1('sub_kriteria'),
				'sub_k2' => $this->madmin->get_subk2('sub_kriteria'),
				'sub_k3' => $this->madmin->get_subk3('sub_kriteria'),

			);
			$data['data_berkas'] = $this->madmin->get_berkas('data_berkas')->result();
			$this->load->view('admin/header', $data);
			$this->load->view('admin/data_penilaian', $data);
			$this->load->view('admin/footer');
		}
	}

	public function simpan_nilai()
	{
		if (isset($_POST['btnNilai'])) {
			$parpp = $this->input->post('parameter_penduduk');
			$parpk = $this->input->post('parameter_keluarga');
			$parper = $this->input->post('parameter_pernyataan');

			$cekpp = $this->madmin->get_nilaikriteria('gets', $parpp);
			$nilaipp = $cekpp['res']->nilai;
			$idpp = $cekpp['res']->id_kriteria;
			$bbpp = $this->madmin->get_bobotkriteria('gets', $idpp);
			$bobotpp = $bbpp['res']->bobot;

			$cekpk = $this->madmin->get_nilaikriteria('gets', $parpk);
			$nilaipk = $cekpk['res']->nilai;
			$idpk = $cekpk['res']->id_kriteria;
			$bbpk = $this->madmin->get_bobotkriteria('gets', $idpk);
			$bobotpk = $bbpk['res']->bobot;

			$cekper = $this->madmin->get_nilaikriteria('gets', $parper);
			$nilaiper = $cekper['res']->nilai;
			$idper = $cekper['res']->id_kriteria;
			$bbper = $this->madmin->get_bobotkriteria('gets', $idper);
			$bobotper = $bbper['res']->bobot;

			$p_penduduk = $nilaipp * $bobotpp;
			$parameter_penduduk = substr($p_penduduk, 0, 8);
			$p_keluarga = $nilaipk * $bobotpk;
			$parameter_keluarga = substr($p_keluarga, 0, 8);
			$p_pernyataan = $nilaiper * $bobotper;
			$parameter_pernyataan = substr($p_pernyataan, 0, 8);


			$id_pendaftaran = $this->input->post('id_pendaftaran');
			$kirim_cek = array(
				'id_penilaian'	=> $id_pendaftaran,
			);
			$cek_data	= $this->madmin->cek_id($kirim_cek);

			if ($cek_data['sum'] == 0) {
				$intotal_nilai = $parameter_penduduk + $parameter_keluarga + $parameter_pernyataan;
				$nilai = $this->madmin->banding_nilai('banding');

				if ($nilai == NULL) {
					$maxtot = 0;
					$hasil = $intotal_nilai;

					$send = array(
						'id_penilaian' => $id_pendaftaran,
						'no_ktp' => $this->input->post('no_ktp'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'kriteria_penduduk' => $parameter_penduduk,
						'kriteria_keluarga' => $parameter_keluarga,
						'kriteria_pernyataan' => $parameter_pernyataan,
						'total_nilai' => $hasil,
						'keterangan' => 'lulus',
						'area_kerja' => '-',
					);
					$save = $this->madmin->save_nilai('simpan', $send);
					$where = $id_pendaftaran;
					$kirim = array('status_pendaftaran' => 'lulus');
					$this->madmin->update_status($kirim, $where);

					if ($save == true) {
						$this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Disimpan! <strong></strong></p>');
						redirect('Ctrl_admin/data_penilaian');
					} else {
						$this->session->set_flashdata('error', '<p> Data Penilaian Gagal Disimpan!</p>');
						redirect('Ctrl_admin/data_penilaian');
					}
				} else {

					$count = $this->madmin->get_count('count');
					if ($count->{'count'} == 1) {
						$hasil = $intotal_nilai;
						$send = array(
							'id_penilaian' => $id_pendaftaran,
							'no_ktp' => $this->input->post('no_ktp'),
							'nama_lengkap' => $this->input->post('nama_lengkap'),
							'kriteria_penduduk' => $parameter_penduduk,
							'kriteria_keluarga' => $parameter_keluarga,
							'kriteria_pernyataan' => $parameter_pernyataan,
							'total_nilai' => $hasil,
							'keterangan' => 'lulus',
							'area_kerja' => '-',
						);
						$save = $this->madmin->save_nilai('simpan', $send);
						$where = $id_pendaftaran;
						$kirim = array('status_pendaftaran' => 'lulus');
						$this->madmin->update_status($kirim, $where);
						if ($save == true) {
							$this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Disimpan! <strong></strong></p>');
							redirect('Ctrl_admin/data_penilaian');
						} else {
							$this->session->set_flashdata('error', '<p> Data Penilaian Gagal Disimpan!</p>');
							redirect('Ctrl_admin/data_penilaian');
						}
					} elseif ($count->{'count'} >= 2) {
						$maxtot = $nilai->{'total_nilai'};
						$bandingkan = (int)$intotal_nilai > (int)$maxtot;
						$hasil = $intotal_nilai;
						if ($bandingkan == TRUE) {
							$send = array(
								'id_penilaian' => $id_pendaftaran,
								'no_ktp' => $this->input->post('no_ktp'),
								'nama_lengkap' => $this->input->post('nama_lengkap'),
								'kriteria_penduduk' => $parameter_penduduk,
								'kriteria_keluarga' => $parameter_keluarga,
								'kriteria_pernyataan' => $parameter_pernyataan,
								'total_nilai' => $hasil,
								'keterangan' => 'lulus',
								'area_kerja' => '-',
							);
							$this->madmin->save_nilai('simpan', $send);
							$where = $id_pendaftaran;
							$kirim = array('status_pendaftaran' => 'lulus');
							$this->madmin->update_status($kirim, $where);
							$where = $nilai->{'id_penilaian'};
							$update = $this->madmin->update_nilai('update', $where);
							$where = $nilai->{'id_penilaian'};
							$kirim = array('status_pendaftaran' => 'tidak lulus');
							$this->madmin->update_status($kirim, $where);
							if ($update == true) {
								$this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Disimpan! <strong></strong></p>');
								redirect('Ctrl_admin/data_penilaian');
							} else {
								$this->session->set_flashdata('error', '<p> Data Penilaian Gagal Disimpan!</p>');
								redirect('Ctrl_admin/data_penilaian');
							}
						} else {
							$send = array(
								'id_penilaian' => $id_pendaftaran,
								'no_ktp' => $this->input->post('no_ktp'),
								'nama_lengkap' => $this->input->post('nama_lengkap'),
								'kriteria_penduduk' => $parameter_penduduk,
								'kriteria_keluarga' => $parameter_keluarga,
								'kriteria_pernyataan' => $parameter_pernyataan,
								'total_nilai' => $hasil,
								'keterangan' => 'tidak lulus',
								'area_kerja' => '-',
							);
							$save = $this->madmin->save_nilai('simpan', $send);
							$where = $id_pendaftaran;
							$kirim = array('status_pendaftaran' => 'tidak lulus');
							$this->madmin->update_status($kirim, $where);
							if ($save == true) {
								$this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Disimpan! <strong></strong></p>');
								redirect('Ctrl_admin/data_penilaian');
							} else {
								$this->session->set_flashdata('error', '<p> Data Penilaian Gagal Disimpan!</p>');
								redirect('Ctrl_admin/data_penilaian');
							}
						}
						redirect('Ctrl_admin/data_penilaian');
					}
				}
			} else {
				$this->session->set_flashdata('success', '<p> Penilaian Sudah Diberikan Untuk Pelamar Ini, Silahkan Cek Pada Data Hasil Penilaian! <strong></strong></p>');
				redirect('Ctrl_admin/data_penilaian');
			}
		}
	}
	public function hasil_penilaian()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "HASIL PENILAIAN",
				'v_thn'		=> date('Y'),
				// 'hasil_penilaian' => $this->madmin->get_hasil_penilaian('hasil_penilaian'),
				'hasil_penilaian' => $this->madmin->get_pelamarb('data_pelamar'),

			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/belum_penilaian', $data);
			$this->load->view('admin/footer');
		}
	}
	public function history_penilaian()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $sess),
				'judul_web'	=> "HASIL PENILAIAN",
				'v_thn'		=> date('Y'),
				'hasil_penilaian' => $this->madmin->get_hasil_penilaian('hasil_penilaian'),


			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/hasil_penilaian', $data);
			$this->load->view('admin/footer');
		}
	}
	public function edit_area($id_penilaian)
	{
		if (isset($_POST['btnSend'])) {
			$data = array(
				'area_kerja' => $this->input->post('area_kerja'),
			);
			$where = $id_penilaian;
			$update = $this->madmin->update_area($data, $where);

			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Area Berhasil Diupdate Dan Dikirim ke Pelamar! <strong></strong></p>');
				redirect('Ctrl_admin/hasil_penilaian');
			} else {
				$this->session->set_flashdata('error', '<p> Data Area Gagal Diupdate!</p>');
				redirect('Ctrl_admin/hasil_penilaian');
			}
			redirect('Ctrl_admin/hasil_penilaian');
		}
	}
	public function profiletim()
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess == NULL) {
			redirect('Ctrl_admin/log_in');
		} else {
			$data = array(
				'user'		=> $this->madmin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "PROFIL"
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/profiletim', $data);
			$this->load->view('admin/footer');
		}
	}
	public function ubah_profil()
	{
		if (isset($_POST['btnupdate'])) {
			$where = $this->input->post('id_user');
			$data = array(
				'username'		=> $this->input->post('username'),
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'alamat'		=> $this->input->post('alamat'),
				'telp'			=> $this->input->post('telp'),
				'email'			=> $this->input->post('email'),
				'kabupaten'	=> $this->input->post('kabupaten'),
				'ketua_panitia'	=> $this->input->post('ketua_panitia'),
				'nip_ketua'		=> $this->input->post('nip_ketua'),
				'website'		=> $this->input->post('website'),
				'tahun'	=> $this->input->post('tahun'),
			);
			$update = $this->madmin->update_profil($data, $where);
			if ($update == true) {
				$this->session->set_flashdata('success', '<p> Data Profil Berhasil Diupdate! <strong></strong></p>');
				redirect('Ctrl_admin/profiletim');
			} else {
				$this->session->set_flashdata('error', '<p> Data Profil Gagal Diupdate!</p>');
				redirect('Ctrl_admin/log_in');
			}
			$this->session->set_flashdata('error', '<p> Data Profil Berhasil Diupdate,Silahkan Login Kembali dengan username baru anda! <strong></strong></p>');
			redirect('Ctrl_admin/log_in');
		}
	}
	public function ubah_password()
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('Ctrl_admin/log_in');
		} else {
			$data = array(
				'user' 		=> $this->madmin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "UBAH PASSWORD"
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/ubah_pass', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnUbahPass'])) {
				$send = array(
					'plama'	=> $this->input->post('password_lama'),
					'pbaru'	=> $this->input->post('password'),
					'pconf'	=> $this->input->post('password2')
				);

				if ($data['user']->password != $send['plama']) {
					$this->session->set_flashdata('msg2', $this->err->update_admin('password-notmatch'));
				} else if ($send['pbaru'] != $send['pconf']) {
					$this->session->set_flashdata('msg2', $this->err->update_admin('password-notconfirmed'));
				} else {
					$data = array(
						'old_user'	=> $sess,
						'password'	=> $send['pbaru']
					);
					$acts = $this->madmin->about_me('update-pass', $data);

					$this->session->set_flashdata('msg2', $this->err->update_admin('password-success'));
				}
				redirect('Ctrl_admin/ubah_password');
			}
		}
	}
}

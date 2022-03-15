<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_frontend extends CI_Controller
{

	public function index()
	{
		$data['web_ppsu']	 = $this->mfront->page_utama();
		$this->load->view('front-end/index', $data);
	}

	public function idbaru($value = '')
	{
		echo $this->mfront->pendaftaran('id_baru');
	}

	public function pendaftaran()
	{
		$data = array(
			'id_pendaftaran'			=> $this->mfront->pendaftaran('id_baru'),
			'web_ppdb'					=> $this->mfront->pendaftaran('status_rekrutmen'),
		);

		if ($data['web_ppdb']->status_rekrutmen == 'tutup') {
			redirect('404');
		}

		$this->load->view('front-end/pendaftaran', $data);

		if (isset($_POST['btndaftar'])) {
			// var_dump($this->input->post()); exit();
			$acts = $this->mfront->pendaftaran('daftar', $this->input);
			// 

			$this->session->set_userdata('id_pendaftaran', $this->input->post('id_pendaftaran'));
			redirect('Ctrl_pelamar');
		}
	}

	public function login_pelamar()
	{
		$data['web_ppsu']	 = $this->mfront->pendaftaran('status_rekrutmen');
		if ($data['web_ppsu']->status_rekrutmen == 'tutup') {
			redirect('404');
		}

		if ($this->session->userdata('id_pendaftaran') != NULL) {
			redirect('login_pelamar');
		} else {
			$this->load->view('front-end/index', $data);

			if (isset($_POST['btnlogin'])) {
				$send = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'no_ktp' => $this->input->post('no_ktp')
				);
				$auth = $this->mfront->auth('cek-masuk', $send);

				if ($auth['sum'] == 0) {
					$this->session->set_flashdata('msg', $this->err->wrong_auth());
					redirect('login_pelamar');
				} else {
					$this->session->set_userdata('id_pendaftaran', $auth['res']->id_pendaftaran);
					redirect('Ctrl_pelamar/index');
				}
			}
		}
	}


	public function cari()
	{
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('web/cari', $data);
	}


	function error_not_found()
	{
		$this->load->view('404_content');
	}
}

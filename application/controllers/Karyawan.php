<?php

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Daftar Karyawan';
        // cara mengambil database lewat model
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();
        // statment if untuk pengkondisian fitur serch menggunakan method post dan mencari data dengan name keyword
        if ($this->input->post('keyword')) {
            // ketika true maka akan di ganti
            $data['karyawan'] = $this->Karyawan_model->cariDataKaryawan();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Karyawan';
        // set rules di dalam fromnya yang pertama adalah namenya, yang kedua adalah rules ketika salah akan memunculkan apa, yang ketika adalah required adalah nntinya harus di isi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // menambahkan form validasi 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/tambah');
            $this->load->view('templates/footer');
        } else {
            // sekarang insert ke database kita akan ambil datanya akan di jalankan fungsi di databse
            $this->Karyawan_model->tambahDataKaryawan();
            // sebelum di redirect kita akan memasukan session terlebih dahulu
            $this->session->set_flashdata('flash', 'Ditambahkan');
            // jika sudah, kita akan arahkan ke halaman data karyawan menggunakan function redirect, parameternya apa dan isinya apa
            redirect('karyawan');
        }
    }

    public function hapus($id)
    {
        $this->Karyawan_model->hapusDataKaryawan($id);
        // membuat flash data
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('karyawan');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $data['judul'] = 'Form ubah Data Karyawan';
        $data['divisi'] = ['Programmer/IT', 'Pemasaran', 'Umum', 'Peneliti', 'Accounting', 'Sekretaris'];
        // set rules di dalam fromnya yang pertama adalah namenya, yang kedua adalah rules ketika salah akan memunculkan apa, yang ketika adalah required adalah nntinya harus di isi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // menambahkan form validasi 
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // sekarang insert ke database kita akan ambil datanya akan di jalankan fungsi di databse
            $this->Karyawan_model->ubahDataKaryawan();
            // sebelum di redirect kita akan memasukan session terlebih dahulu
            $this->session->set_flashdata('flash', 'Diubah');
            // jika sudah, kita akan arahkan ke halaman data karyawan menggunakan function redirect, parameternya apa dan isinya apa
            redirect('karyawan');
        }
    }
}

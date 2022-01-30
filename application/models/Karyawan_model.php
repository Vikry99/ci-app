<?php

class Karyawan_model extends CI_Model
{
    public function getAllKaryawan()
    {
        // cara mengambil database di CI menggunakan msqli dan CI sudah mempunyai query builder
        return $this->db->get('karyawan')->result_array();
    }
    public function tambahDataKaryawan()
    {
        // isinya berisikan insert ke database kita bikin data, lalu kita ngambil data dari post
        $data = [
            // parameter true untuk mengamankan seperti html CI lebih simple
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "divisi" => $this->input->post('divisi', true)
        ];

        // lalu tinggal insert,nama halaman dan variable datanya
        $this->db->insert('karyawan', $data);
        // jika berhasil halamannya akan pindah ke halaman karyawan
    }

    public function hapusDataKaryawan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('karyawan', ['id' => $id]);
    }

    public function getKaryawanById($id)
    {
        // di query builder di CI bisa mengambil data cuman sebaris, lalu kita pilih field id yang berada di parameter lalu kita pilih
        return $this->db->get_where('karyawan', ['id' => $id])->row_array();
        // lalu kita ambil resulnya satu baris menggunakan row_array
        // return $this->db->get('karyawan')->row_array();
    }

    public function ubahDataKaryawan()
    {
        // isinya berisikan insert ke database kita bikin data, lalu kita ngambil data dari post
        $data = [
            // parameter true untuk mengamankan seperti html CI lebih simple
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "divisi" => $this->input->post('divisi', true)
        ];


        // lalu ambil WHERE ambil data id yang di hidden tadi mengginakan post
        $this->db->where('id', $this->input->post('id'));
        // lalu tinggal insert,nama halaman dan variable datanya
        $this->db->update('karyawan', $data);
        // jika berhasil halamannya akan pindah ke halaman karyawan
    }

    public function cariDataKaryawan()
    {
        // lalu kita cari datanya terlebih dahulu dengan input dan variable keyword
        $keyword = $this->input->post('keyword', true);
        // lalu gunakan query data similiar atau like dengan keyword divisi
        $this->db->like('nama', $keyword);
        // lalu gunakan query data similiar atau like dengan keyword divisi dengan or like
        $this->db->or_like('divisi', $keyword);
        // lalu gunakan query data similiar atau like dengan keyword npm dengan or like
        $this->db->or_like('npm', $keyword);
        // lalu gunakan query data similiar atau like dengan keyword npm dengan or like
        $this->db->or_like('email', $keyword);
        // lalu tinggal jalanin query pencariannya 
        return $this->db->get('karyawan')->result_array();
    }
}

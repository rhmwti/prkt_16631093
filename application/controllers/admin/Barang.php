<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load Login_model
        $this->load->model('login_model');
        //cek session dan level user
        if ($this->login_model->is_role() != "admin") {
            redirect("login");
        }

        //load Barang_model
        $this->load->model('barang_model');
    }

    function index()
    {
        //load Barang_model
        $this->load->model('barang_model');

        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        //mengambil semua data barang
        $data['barang'] = $this->barang_model->getAllBarang();

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barang/list', $data);
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $this->load->model('jenis_model');
        $this->load->model('satuan_model');

        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        //mengambil semua isi tabel jenis
        $data['jenis'] = $this->jenis_model->getAllJenis();

        //mengambil semua isi tabel satuan
        $data['satuan'] = $this->satuan_model->getAllSatuan();

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barang/tambah', $data);
        $this->load->view('template/footer');
    }

    function simpan()
    {
        $nama_barang    = $this->input->post('nama_barang');
        $stok           = $this->input->post('stok');
        $harga          = $this->input->post('harga');
        $id_jenis       = $this->input->post('id_jenis');
        $id_satuan      = $this->input->post('id_satuan');

        $data = array(
            'nama_barang' => $nama_barang,
            'stok' => $stok,
            'harga' => $harga,
            'id_jenis' => $id_jenis,
            'id_satuan' => $id_satuan,
        );

        ///memanggil fungsi simpan
        $this->barang_model->simpan($data, 'barang');

        redirect('admin/barang');
    }

    function edit()
    {
        $id = $this->uri->segment(4);

        $query = $this->barang_model->getBarang($id);
        if ($query->num_rows() > 0) {
            $barang = $query->row_array();
            $data = array(
                'row' => $barang
            );

            //mengambil nama user
            $data['nama'] = $this->session->userdata['nama'];

            $this->load->model('jenis_model');
            $this->load->model('satuan_model');
            //mengambil semua isi tabel jenis
            $data['jenis'] = $this->jenis_model->getAllJenis();

            //mengambil semua isi tabel satuan
            $data['satuan'] = $this->satuan_model->getAllSatuan();

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/barang/edit', $data);
            $this->load->view('template/footer');
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('admin/barang') . "';</script>";
        }
    }

    function update()
    {
        $id_barang      = $this->input->post('id_barang');
        $nama_barang    = $this->input->post('nama_barang');
        $stok           = $this->input->post('stok');
        $harga          = $this->input->post('harga');
        $id_jenis       = $this->input->post('id_jenis');
        $id_satuan      = $this->input->post('id_satuan');

        $data = array(
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
            'stok' => $stok,
            'harga' => $harga,
            'id_jenis' => $id_jenis,
            'id_satuan' => $id_satuan,
        );

        $this->barang_model->update($data, 'barang');

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('admin/barang') . "';</script>";
    }

    function hapus()
    {
        //ambil id dari alamat url segment ke-4
        $id = $this->uri->segment(4);
        $this->barang_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('admin/barang') . "';</script>";
    }
}

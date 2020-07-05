<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokin extends CI_Controller
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
    }

    function index()
    {
        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/stokin/list');
        $this->load->view('template/footer');
    }

    function simpan()
    {
        //mengambil isi id_barang dan stok
        $id_barang = $_POST['id_barang'];
        $stok = $_POST['stok'];
        $data = array();

        $index = 0;
        foreach ($id_barang as $id) {
            array_push($data, array(
                'id_barang' => $id,
                'stok' => $stok[$index],
                'waktu' => time(),
            ));
            $index++;
        }

        //print_r($data);

        $this->load->model('stokin_model');

        $sql = $this->stokin_model->simpan_masal($data);

        if ($sql) {
            echo "<script>alert('Semua stok berhasil disimpan');window.location='" . site_url('admin/barang') . "';</script>";
        } else {
            echo "<script>alert('Stok gagal disimpan');window.location='" . site_url('admin/stokin') . "';</script>";
        }
    }

    function getBarang()
    {
        $this->load->model('barang_model');

        $id_barang = $this->input->post('id_barang');
        $data = $this->barang_model->getBarangID($id_barang);
        echo json_encode($data);
    }
}

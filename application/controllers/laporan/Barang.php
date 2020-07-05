<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

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
        $this->load->view('laporan/barang/content');
        $this->load->view('template/footer');
    }

    function cetak()
    {
        //load Barang_model
        $this->load->model('barang_model');

        $data['judul'] = 'LAPORAN DATA BARANG';
        //mengambil semua data barang
        $data['barang'] = $this->barang_model->getAllBarang();

        ob_start();
        $this->load->view('laporan/barang/cetak', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $pdf = new Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Barang.pdf', 'I');
    }
}

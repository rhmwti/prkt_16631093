<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    //fungsi untuk mengambil semua isi dari tabel model
    function getAllSatuan()
    {
        return $this->db->get('satuan')->result_array();
    }
}

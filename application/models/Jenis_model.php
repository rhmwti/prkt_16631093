<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    //fungsi untuk mengambil semua isi dari tabel model
    function getAllJenis()
    {
        return $query = $this->db->get('jenis')->result_array();
    }
}

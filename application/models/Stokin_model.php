<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokin_model extends CI_Model
{
    //fungsi untuk menyimpan semua stok masuk
    function simpan_masal($data)
    {
        //koding simpan masal
        return $this->db->insert_batch('stokin', $data);
    }
}

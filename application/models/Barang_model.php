<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    //fungsi untuk mengambil semua isi dari tabel barang
    function getAllBarang()
    {
        //query untuk mengambil semua data dengan cara query biasa
        //$query = $this->db->query('SELECT * FROM barang INNER JOIN jenis ON jenis.id_jenis = barang.id_jenis INNER JOIN satuan ON satuan.id_satuan = barang.id_satuan');
        //return $query->result();

        //query untuk mengambil semua data dengan cara query builder
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('jenis', 'jenis.id_jenis = barang.id_jenis');
        $this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
        return $this->db->get()->result();
    }

    function simpan($data, $table)
    {
        //query untuk simpan
        $this->db->insert($table, $data);
    }

    function getBarang($id = null)
    {
        //query untuk mengambil data berdasar id dengan cara query builder
        return $this->db->get_where('barang', array('id_barang' => $id));
    }

    function update($data, $table)
    {
        //query untuk edit
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update($table, $data);
    }

    function delete($id)
    {
        //query untuk hapus
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    function getBarangID($id_barang)
    {
        $hsl = $this->db->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_barang' => $data->id_barang,
                    'nama_barang' => $data->nama_barang,
                    'harga' => $data->harga,
                );
            }
        }
        return $hasil;
    }
}

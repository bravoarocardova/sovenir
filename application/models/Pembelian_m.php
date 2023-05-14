<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_m extends CI_Model{
    
    public function getPembelian($id=null)
    {
        $this->db->join('pelanggan','pembelian.id_pelanggan = pelanggan.id_pelanggan');
        if (empty($id)) {
            return $this->db->get('pembelian')->result();
        } else {
            return $this->db->get_where('pembelian',['id_pembelian' => $id])->result();
        }
        
    }

    public function getPembelianProduk($id)
    {
        $this->db->join('produk', 'pembelian_produk.id_produk = produk.id_produk');
        return $this->db->get_where('pembelian_produk',['id_pembelian' => $id])->result();
    }

}
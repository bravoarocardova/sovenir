<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_m extends CI_Model{
    
    public function getProduk($id=null)
    {
        if (empty($id)) {
            return $this->db->get('produk')->result();
        } else {
            return $this->db->get_where('produk',['id_produk' => $id])->result();
        }
        
    }

    public function search($key)
    {
        $this->db->like('nama_produk',$key);
        return $this->db->get('produk')->result();
    }

    public function hapus($id)
    {
        return $this->db->delete('produk', ['id_produk' => $id]);
    }

    public function tambahProduk($post)
    {
        $value = [
            'nama_produk' => $post['nama'],
            'harga_produk' => $post['harga'],
            'berat_produk' => $post['berat'],
            'foto_produk' => $post['foto'],
            'deskripsi_produk' => $post['deskripsi'],
            'stok_produk' => $post['stok']
        ];
        return $this->db->insert('produk', $value);
    }

    public function editProduk($post)
    {
        $value = [
            'nama_produk' => $post['nama'],
            'harga_produk' => $post['harga'],
            'berat_produk' => $post['berat'],
            'deskripsi_produk' => $post['deskripsi'],
            'stok_produk' => $post['stok']
        ];
        if($post['foto'] != null) $value['foto_produk'] = $post['foto'];
        
        $this->db->where('id_produk', $post['id_produk']);
        return $this->db->update('produk', $value);
    }

}
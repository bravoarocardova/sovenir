<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_m extends CI_Model
{

    public function prosesCheckout($post, $produk)
    {
        $pembelian = [
            'id_pelanggan' => $post['id_pelanggan'],
            'ongkir' => $post['ongkir'],
            'tanggal_pembelian' => date("Y-m-d"),
            'total_pembelian' => $post['total'] + $post['ongkir'],
            'tujuan' => $post['tujuan'],
            'ekspedisi' => $post['kurir'] . " - " . $post['ekspedisi'],
            'status_pembelian' => 'Belum Bayar'
        ];
        $this->db->insert('pembelian', $pembelian);
        $idPembelian = $this->db->insert_id();

        foreach ($produk as $p) {
            $this->insertPembelianProduk($idPembelian, $p);
        }
        return $idPembelian;
    }

    private function getOngkir($id)
    {
        return $this->db->get_where('ongkir', ['id_ongkir' => $id])->row();
    }

    private function insertPembelianProduk($idPembelian, $p)
    {
        $pembelianProduk = [
            'id_pembelian' => $idPembelian,
            'id_produk' => $p['id'],
            'jumlah' => $p['qty']
        ];
        $this->db->insert('pembelian_produk', $pembelianProduk);
        $this->updateStok($p);
    }

    private function updateStok($p)
    {
        $this->db->set('stok_produk', 'stok_produk-' . $p['qty']);
        $this->db->where('id_produk', $p['id_produk']);
        return $this->db->update('produk');
    }
}

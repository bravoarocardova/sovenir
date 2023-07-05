<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    public function getPembelian($id = null)
    {
        $this->db->join('pelanggan', 'pembelian.id_pelanggan = pelanggan.id_pelanggan');
        if (empty($id)) {
            return $this->db->get('pembelian')->result();
        } else {
            return $this->db->get_where('pembelian', ['id_pembelian' => $id])->result();
        }
    }

    public function getPembelianProduk($id)
    {
        $this->db->join('produk', 'pembelian_produk.id_produk = produk.id_produk');
        return $this->db->get_where('pembelian_produk', ['id_pembelian' => $id])->result();
    }

    public function getPembayaran($id)
    {
        return $this->db->get_where('pembayaran', ['id_pembelian' => $id])->result();
    }

    public function kirim($id)
    {
        $value = [
            'status_pembelian' => 'dikirim',
        ];

        $this->db->where('id_pembelian', $id);
        return $this->db->update('pembelian', $value);
    }

    public function selesai($id)
    {
        $value = [
            'status_pembelian' => 'selesai',
        ];

        $this->db->where('id_pembelian', $id);
        return $this->db->update('pembelian', $value);
    }

    public function batalkan($id)
    {
        $value = [
            'status_pembelian' => 'dibatalkan',
        ];

        $produk = $this->db->join('produk', 'produk.id_produk = pembelian_produk.id_produk')->get_where('pembelian_produk', ['id_pembelian' => $id])->result();
        $lprodukCancel = [];
        foreach ($produk as $p) {
            $lprodukCancel[] = [
                'id_produk' => $p->id_produk,
                'stok_produk' => $p->jumlah + $p->stok_produk,
            ];
        }

        $this->db->update_batch('produk', $lprodukCancel, 'id_produk');

        $this->db->where('id_pembelian', $id);
        return $this->db->update('pembelian', $value);
    }

    public function resi($id, $resi)
    {
        $value = [
            'resi' => $resi,
        ];

        $this->db->where('id_pembelian', $id);
        return $this->db->update('pembelian', $value);
    }
}

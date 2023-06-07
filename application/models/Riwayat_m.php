<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_m extends CI_Model
{

    public function getPembelian($id)
    {
        $this->db->join('pelanggan', 'pembelian.id_pelanggan = pelanggan.id_pelanggan');
        return $this->db->get_where('pembelian', ['pembelian.id_pembelian' => $id])->row();
    }

    public function getProduk($id)
    {
        $this->db->join('produk', 'pembelian_produk.id_produk = produk.id_produk');
        return $this->db->get_where('pembelian_produk', ['pembelian_produk.id_pembelian' => $id])->result();
    }

    public function getPembelianByPelanggan($id)
    {
        return $this->db->get_where('pembelian', ['id_pelanggan' => $id])->result();
    }

    public function getPembayaran($id)
    {
        return $this->db->get_where('pembayaran', ['id_pembelian' => $id])->result();
    }

    public function pembayaran($post)
    {
        $value = [
            'id_pembelian' => $post['id'],
            'nama' => $post['nama'],
            'bank' => $post['bank'],
            'jumlah' => $post['jumlah'],
            'tanggal' => date("Y-m-d"),
            'bukti' => $post['bukti']
        ];

        if ($this->db->insert('pembayaran', $value)) {
            $this->db->set('status_pembelian', 'sudah kirim pembayaran');
            $this->db->where('id_pembelian', $post['id']);
            return $this->db->update('pembelian');
        }

        return false;
    }

    public function selesai($id)
    {
        $value = [
            'status_pembelian' => 'selesai',
        ];

        $this->db->where('id_pembelian', $id);
        return $this->db->update('pembelian', $value);
    }
}

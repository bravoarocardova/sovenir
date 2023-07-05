<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    public function getLaporanPesanan($tgl_mulai, $tgl_selesai)
    {
        $this->db->join('pelanggan', 'pembelian.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->where('tanggal_pembelian >=', $tgl_mulai);
        $this->db->where('tanggal_pembelian <=', $tgl_selesai);
        return $this->db->get('pembelian')->result();
    }

    public function getLaporanBarang($tgl_mulai, $tgl_selesai)
    {
        $this->db->select('produk.id_produk, produk.nama_produk, sum(pembelian_produk.jumlah) as jumlah');
        $this->db->join('pembelian_produk', 'pembelian_produk.id_pembelian = pembelian.id_pembelian');
        $this->db->join('produk', 'produk.id_produk = pembelian_produk.id_produk');
        $this->db->where('tanggal_pembelian >=', $tgl_mulai);
        $this->db->where('tanggal_pembelian <=', $tgl_selesai);
        $this->db->group_by('produk.id_produk');
        return $this->db->get('pembelian')->result();
    }
}

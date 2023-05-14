<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model{

    public function getLaporan($tgl_mulai, $tgl_selesai)
    {
        $this->db->join('pelanggan', 'pembelian.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->where('tanggal_pembelian >=', $tgl_mulai);
        $this->db->where('tanggal_pembelian <=', $tgl_selesai);
        return $this->db->get('pembelian')->result();
    }
    
}
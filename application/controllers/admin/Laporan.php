<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_m');
        $this->load->library('pdf');
    }

    public function index()
    {
        check_admin_not_login();
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['kirim'])) {
            $data = [
                'tgl_mulai' => $post['tglm'],
                'tgl_selesai' => $post['tgls'],
                'semuadata' => $this->laporan_m->getLaporan($post['tglm'], $post['tgls'])
            ];
        } else {
            $data = [
                'tgl_mulai' => '-',
                'tgl_selesai' => '-',
                'semuadata' => []
            ];
        }

        $this->template->load('template_admin/template', 'admin/laporan', $data);
    }

    public function cetak()
    {
        check_admin_not_login();
        $get = $this->input->get(NULL, TRUE);
        $semuadata = $this->laporan_m->getLaporan($get['tgl_mulai'], $get['tgl_selesai']);
        error_reporting(0);

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 5, 'Laporan Data Pembelian', '0', '1', 'C', false);
        // $pdf->image('../pf.jpg','10','8','17');
        $pdf->Cell(0, 5, 'Souvenir Fiqih', '0', '1', 'C', false);
        $pdf->Ln(5);
        $pdf->Ln(4);
        $pdf->SetFont('Arial', 'i', 8);
        $pdf->Cell(0, 2, 'Alamat : Jl.Jr.H.Juanda,Mayang Mangurai, Kec. Kota Baru, Kota Jambi, Jambi 36129', '0', '1', 'L', false);
        $pdf->Cell(0, 2, 'No.Telp 085367439778, Kode Pos 36129', '0', '1', 'R', false);
        $pdf->Ln(2);
        $pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
        $pdf->Ln(5);
        $pdf->Cell(0, 5, $get['tgl_mulai'] . " - " . $get['tgl_selesai'], '0', '1', 'C', false);

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Ln(4);

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(8, 6, '', 0, 0, 'C');
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Pelanggan', 1, 0, 'C');
        $pdf->Cell(45, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(22, 6, 'Subtotal', 1, 0, 'C');
        $pdf->Cell(45, 6, 'Status', 1, 0, 'C');

        $pdf->Ln(2);

        $no = 1;
        foreach ($semuadata as $ambil) {
            $pdf->ln(4);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 4, '', 0, 0, 'C');
            $pdf->Cell(8, 4, $no++ . ".", 1, 0, 'C');
            $pdf->Cell(40, 4, $ambil->nama_pelanggan, 1, 0, 'C');
            $pdf->Cell(45, 4,  date("d M Y", strtotime($ambil->tanggal_pembelian)), 1, 0, 'C');
            $pdf->Cell(22, 4, "Rp." . number_format($ambil->total_pembelian), 1, 0, 'C');
            $pdf->Cell(45, 4, $ambil->status_pembelian, 1, 0, 'C');
        }
        $pdf->ln(16);
        $pdf->Cell(151, 4, "Mengetahui", 0, 0, 'R');
        $pdf->ln(4);
        $pdf->Cell(162, 4, "Pemilik Toko  Souvenir Fiqih . ", 0, 0, 'R');

        $pdf->ln(15);
        $pdf->Cell(152, 4, "Administrator", 0, 0, 'R');
        $pdf->ln(4);
        $pdf->Cell(130, 0.0, '', 0, 0, 'R');
        $pdf->Cell(30, 0.2, '', 1, 0, 'R', true);

        $pdf->Output();
    }
}

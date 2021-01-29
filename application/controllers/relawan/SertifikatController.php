<?php defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class SertifikatController extends CI_Controller
{
    public function index()
    {
        $data = array(
            // Halaman Data FOlder
            'aktivitas'       => 'full',
            'folder'          => 'sertifikat',
            'halaman'         => 'index',
            'cert'            => true
        );

        return $this->load->view('relawan/include/index', $data);
    }

    public function pdf()
    {
        $relawan  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $data = [
            'nama'      => $relawan->nm_relawan,
            'sebagai'   => 'Relawan'
        ];
        $html = $this->load->view('relawan/sertifikat/pdf',  $data, TRUE);
        // return $this->load->view('relawan/sertifikat/pdf');
        $options = new Options();
        $options->set('setIsRemoteEnabled', true);
        $options->set('defaultMediaType', 'all');
        $options->set('isFontSubsettingEnabled', true);

        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream('Serti.pdf', array("Attachment" => false));
    }
}

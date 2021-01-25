<?php defined('BASEPATH') or exit('No direct script access allowed');


class ControllerRelawanUjian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relawan/insert_model');
        $this->load->model('relawan/select_model');
        $this->load->model('relawan/update_model');
    }

    public function index($id)
    {
        $cek = $this->db->get_where('tbl_ujian', ['id_ujian' => $id, 'status' => 'Aktif'])->row();
        if (!$cek) {
            return redirect('relawan');
        }
        $relawan  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $isSelesai = $this->db->get_where('tbl_nilai_ujian', ['id_relawan' => $relawan->id_relawan, 'id_ujian' => $id])->num_rows();
        if ($isSelesai > 0) {
            return redirect('relawan');
        }

        $total      = $this->db->where(['id_ujian' => $id, 'status' => 'ADA'])->from("tbl_soal")->count_all_results();
        $from       = ($this->uri->segment(5) != null) ? intval($this->uri->segment(5)) - 1 : 0;
        $soal       = $this->db->order_by('rand(' . $this->session->userdata('id_login') . ')')
            ->get_where('tbl_soal', ['id_ujian' => $id, 'status' => 'ADA'], 1, $from)
            ->result_array();
        $allSoal    = $this->db->order_by('rand(' . $this->session->userdata('id_login') . ')')
            ->get_where('tbl_soal', ['id_ujian' => $id, 'status' => 'ADA'])
            ->result();
        // append jawaban to soal collection
        foreach ($soal as $i => $s) {
            $jwb = $this->db->get_where('tbl_jawaban', ['id_soal' => $s['id_soal']])->result();
            $soal[$i]['jwb'] = $jwb;
        }


        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($soal);
            exit;
        }

        if ($from + 1 > $total) {
            return redirect('relawan/ujian/mulai/' . $id . '/1');
        }

        $data = array(
            'folder'        => 'ujian',
            'halaman'       => 'index',
            'aktivitas'     => 'limit',
            'soal'          => (count($soal) > 0) ? $soal[0] : $soal,
            'total'         => $total,
            'allSoal'       => $allSoal,
            'id_ujian'      => $id
        );

        return $this->load->view('relawan/include/index', $data);
    }

    /**
     * simpan jawaban ke database
     * 
     * @return json
     */
    public function storeJawaban()
    {
        header('Content-Type: application/json');
        $relawan  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $data = [
            'id_relawan'    => $relawan->id_relawan,
            'id_soal'       => $_POST['id_soal'],
            'jawaban'       => $_POST['jawaban']
        ];

        $where = [
            'id_relawan'    => $relawan->id_relawan,
            'id_soal'       => $_POST['id_soal'],
        ];

        $cek = $this->db->get_where('tbl_jawaban_relawan', $where);
        if ($cek->num_rows() > 0) {
            $this->db->where($where);
            $this->db->update('tbl_jawaban_relawan', $data);
        } else {
            $this->db->insert('tbl_jawaban_relawan', $data);
        }
        echo json_encode($data);
        exit;
    }

    /**
     * cek nomor yang sudah terjawab
     * 
     * @return json
     */
    public function cekNumber()
    {
        header('Content-Type: application/json');
        $relawan  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $data = $this->db->get_where('tbl_jawaban_relawan', ['id_relawan' => $relawan->id_relawan])->result();
        echo json_encode($data);
        exit;
    }

    /**
     * Cek soal yang sudah terjawab
     * 
     * @return json
     */
    public function cekSoal()
    {
        header('Content-Type: application/json');
        $relawan  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $data = [
            'id_relawan'    => $relawan->id_relawan,
            'id_soal'       => $_POST['id_soal'],
        ];
        $result = $this->db->get_where('tbl_jawaban_relawan', $data)->row();
        echo json_encode($result);
        exit;
    }

    /**
     * selesai ujian
     */
    public function selesaiUjian()
    {
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            // cek sudah menyelesaikan / belum
            $relawan    = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
            $cek_ujian  = $this->db->get_where('tbl_nilai_ujian', ['id_relawan' => $relawan->id_relawan, 'id_ujian' => $_POST['id_ujian']])->row();
            if (!$cek_ujian) {
                $this->db->select('*')->from('tbl_jawaban_relawan as A')->join('tbl_soal as B', 'A.id_soal = B.id_soal');
                $this->db->where('A.id_relawan', $relawan->id_relawan);
                $this->db->where('A.jawaban=B.jawaban');
                $query      = $this->db->get();
                $benar      = $query->num_rows();
                $id_ujian   = $_POST['id_ujian'];
                $periode    = $this->db->get_where('tbl_periode', ['status' => 'ADA'])->row();
                $soal       = $this->db->get_where('tbl_soal', ['id_ujian' => $id_ujian, 'status' => 'ADA'])->num_rows();

                $jml_nilai  = 100 / $soal;
                $nilai      = $benar * $jml_nilai;

                $data = [
                    'id_relawan'    => $relawan->id_relawan,
                    'id_periode'    => $periode->id_periode,
                    'id_ujian'      => $id_ujian,
                    'nilai_ujian'   => $nilai
                ];

                $this->db->insert('tbl_nilai_ujian', $data);

                $this->db->where(['id_login' => $this->session->userdata('id_login')]);
                $this->db->update('tbl_login', ['status' => 'UJIAN_SELESAI']);
                echo json_encode(['selesai' => true]);
                exit;
            }
            return http_response_code(403);
        }
    }
}

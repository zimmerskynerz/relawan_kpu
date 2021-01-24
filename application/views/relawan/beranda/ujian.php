<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Ujian Calon Relawan</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> No </th>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Tanggal Ujian</th>
                                        <th class="text-center">Jumlah Soal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_bank as $Data_bank) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td style="text-align: center;"><?= $Data_bank->tahun ?></td>
                                            <td><?= date('d F Y', strtotime($Data_bank->tgl_mulai)) ?> - <?= date('d F Y', strtotime($Data_bank->tgl_selesai)) ?></td>
                                            <td style="text-align: center;"><?= $Data_bank->jml_soal ?> Soal</td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Data_bank->status_soal == 'AKTIF') :
                                                    echo '<span class="shadow-none badge badge-primary">AKTIF</span>';
                                                else :
                                                    echo '<span class="shadow-none badge badge-danger">Non Aktif</span>';
                                                endif;
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a type="button" data-id="<?= $Data_bank->id_ujian ?>" class="bs-tooltip openModal" data-placement="top" title="" data-original-title="Lihat Soal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('staff/include/copyright') ?>
    </div>
</div>

<script src="<?= base_url(); ?>assets/plugins/sweetalerts/sweetalert2.min.js"></script>
<script>
    $('.openModal').on('click', function(e) {
        e.preventDefault();
        var IDUJIAN = $(this).data('id');
        swal({
                title: 'Yakin Anda Ingin Mengerjakan Ujian?',
                text: "Klik yakin untuk melanjutkan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
                padding: '2em'
            })
            .then((result) => {
                if (result.value) {
                    window.location.href = "<?= base_url('relawan/ujian/mulai/') ?>" + IDUJIAN
                }
            });
    })
</script>
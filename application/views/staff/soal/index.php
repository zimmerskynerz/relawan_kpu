<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Soal Ujian</h3>
            </div>
            <a type="submit" href="<?= base_url('staff/bank_soal/tambah_soal/' . $id_ujian . '') ?>" class="btn btn-primary mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                Tambah
            </a>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Soal</th>
                                        <th style="text-align: center;">Jawaban</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_soal as $Data_soal) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no; ?></td>
                                            <td><?= $Data_soal->soal; ?></td>
                                            <td style="text-align: center;"><?= $Data_soal->jawaban; ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('staff/bank_soal/edit_soal/' . $Data_soal->id_soal . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Pendaftar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
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
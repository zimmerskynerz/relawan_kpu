<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Laporan Tugas Relawan</h3>
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
                                        <th class="text-center">Tanggal Laporan</th>
                                        <th class="text-center">Link Laporan</th>
                                        <th class="text-center">Komentar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_laporan as $Data_laporan) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= date('d F Y', strtotime($Data_laporan->tgl_laporan)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('staff/relawan/laporan_tugas/' . $Data_laporan->id_relawan_tugas . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Tugas">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td><?= $Data_laporan->nm_tugas ?></td>
                                            <td><?= $Data_laporan->detail_tugas ?></td>
                                            <td class="checkbox-column text-center"><?= $Data_laporan->nm_relawan ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('staff/relawan/laporan_tugas/' . $Data_laporan->id_relawan_tugas . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Tugas">
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
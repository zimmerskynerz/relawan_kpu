<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Gaji Relawan</h3>
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
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No HP</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Gabung</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_relawan as $Data_relawan) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= $Data_relawan->nm_relawan ?></td>
                                            <td><?= $Data_relawan->email ?></td>
                                            <td><?= $Data_relawan->no_hp ?></td>
                                            <td><?= $Data_relawan->alamat ?></td>
                                            <td><?= date('d F Y', strtotime($Data_relawan->tgl_daftar)) ?></td>
                                            <td class="text-center">
                                                <?php if ($Data_relawan->status == 'AKTIF') : ?>
                                                    <span class="shadow-none badge badge-primary">AKTIF</span>
                                                <?php else : ?>
                                                    <span class="shadow-none badge badge-danger">BLOKIR</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('staff/relawan/detail_gaji/' . $Data_relawan->id_relawan . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Tugas">
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
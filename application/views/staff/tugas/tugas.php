<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Tugas Relawan</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#tambah_tugas" class="btn btn-primary mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                Bagi Tugas
            </button>
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
                                        <th class="text-center">Tugas</th>
                                        <th class="text-center">Detail Tugas</th>
                                        <th class="text-center">Pelaksana</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_tugas_relawan as $Data_tugas_relawan) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= $Data_tugas_relawan->nm_tugas ?></td>
                                            <td><?= $Data_tugas_relawan->detail_tugas ?></td>
                                            <td class="checkbox-column text-center"><?= $Data_tugas_relawan->nm_relawan ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('staff/relawan/laporan_tugas/' . $Data_tugas_relawan->id_relawan_tugas . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Tugas">
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
<!-- Tambah Pengguna -->
<div class="modal fade" id="tambah_tugas" tabindex="-1" role="dialog" aria-labelledby="tambah_tugasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_tugasLabel">Pembagian Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('staff/relawan/crudtugas'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Nama Tugas</label>
                    <input type="text" class="form-control" value="<?= $data_tugas['nm_tugas'] ?>" id="nm_tugas" name="nm_tugas" readonly placeholder="Nama Tugas Relawan">
                    <input type="text" class="form-control" value="<?= $data_tugas['id_tugas'] ?>" id="id_tugas" name="id_tugas" hidden placeholder="Nama Tugas Relawan">
                </div>
                <div class="form-group mb-4">
                    <label>Detail Tugas</label>
                    <textarea type="text" class="form-control" id="detail_tugas" name="detail_tugas" readonly placeholder="Detail Tugas Relawan"><?= $data_tugas['detail_tugas'] ?></textarea>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Laporan</label>
                    <input type="number" class="form-control" value="<?= $data_tugas['jml_laporan'] ?>" id="jml_laporan" name="jml_laporan" placeholder="Jumlah Laporan" readonly>
                </div>
                <div class="form-group mb-4">
                    <label>Nama Pelaksana Tugas</label>
                    <select name="id_relawan" id="id_relawan" class="form-control">
                        <?php
                        foreach ($data_relawan as $Data_relawan) :
                        ?>
                            <option value="<?= $Data_relawan->id_relawan ?>"><?= $Data_relawan->nm_relawan ?></option>'
                        <?php endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="bagi_tugas" name="bagi_tugas"> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
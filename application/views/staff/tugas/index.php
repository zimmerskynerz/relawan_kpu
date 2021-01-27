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
                Tambah
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
                                        <th class="text-center">Jumlah Laporan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_tugas as $Data_tugas) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= $Data_tugas->nm_tugas ?></td>
                                            <td><?= $Data_tugas->detail_tugas ?></td>
                                            <td class="checkbox-column text-center"><?= $Data_tugas->jml_laporan ?></td>
                                            <td>
                                                <a id="detail_tugas" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#tugas_detail" data-placement="top" title="" data-original-title="Detail" data-id_tugas="<?= $Data_tugas->id_tugas ?>" data-nm_tugas="<?= $Data_tugas->nm_tugas ?>" data-detail_tugas="<?= $Data_tugas->detail_tugas ?>" data-jml_laporan="<?= $Data_tugas->jml_laporan ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                                <a href="<?= base_url('staff/relawan/detail_tugas/' . $Data_tugas->id_tugas . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Tugas">
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
                <h5 class="modal-title" id="tambah_tugasLabel">Tambah Tugas</h5>
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
                    <input type="text" class="form-control" id="nm_tugas" name="nm_tugas" required placeholder="Nama Tugas Relawan">
                </div>
                <div class="form-group mb-4">
                    <label>Detail Tugas</label>
                    <textarea type="text" class="form-control" id="detail_tugas" name="detail_tugas" required placeholder="Detail Tugas Relawan"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Laporan</label>
                    <input type="number" class="form-control" id="jml_laporan" name="jml_laporan" placeholder="Jumlah Laporan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan_tugas" name="simpan_tugas"> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Ubah Pengguna -->
<div class="modal fade" id="tugas_detail" tabindex="-1" role="dialog" aria-labelledby="tugas_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tugas_detailLabel">Detail Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/relawan/crudtugas'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Nama Tugas</label>
                    <input type="text" class="form-control" id="nm_tugas" name="nm_tugas" required placeholder="Nama Tugas Relawan">
                    <input type="text" class="form-control" id="id_tugas" hidden name="id_tugas" required placeholder="Nama Tugas Relawan">
                </div>
                <div class="form-group mb-4">
                    <label>Detail Tugas</label>
                    <textarea type="text" class="form-control" id="detail_tugas" name="detail_tugas" required placeholder="Detail Tugas Relawan"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Laporan</label>
                    <input type="number" class="form-control" id="jml_laporan" name="jml_laporan" placeholder="Jumlah Laporan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-success" id="hapus_tugas" name="hapus_tugas">Hapus</button>
                <button type="submit" class="btn btn-primary" id="ubah_tugas" name="ubah_tugas">Ubah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_tugas", function() {
        var id_tugas = $(this).data('id_tugas');
        var nm_tugas = $(this).data('nm_tugas');
        var detail_tugas = $(this).data('detail_tugas');
        var jml_laporan = $(this).data('jml_laporan');
        $(".modal-body#detail_body #id_tugas").val(id_tugas);
        $(".modal-body#detail_body #nm_tugas").val(nm_tugas);
        $(".modal-body#detail_body #detail_tugas").val(detail_tugas);
        $(".modal-body#detail_body #jml_laporan").val(jml_laporan);
    })
</script>
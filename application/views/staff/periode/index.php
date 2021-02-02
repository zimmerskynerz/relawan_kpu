<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Periode Relawan</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#bukaperiode" class="btn btn-primary mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                Periode
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
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Pendaftaran</th>
                                        <th class="text-center">Maximal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_periode as $Data_periode) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td style="text-align: center;"><?= $Data_periode->tahun ?></td>
                                            <td><?= date('d F Y', strtotime($Data_periode->tgl_mulai)) ?> - <?= date('d F Y', strtotime($Data_periode->tgl_selesai)) ?></td>
                                            <td style="text-align: center;"><?= $Data_periode->jml_relawan ?> Orang</td>
                                            <td style="text-align: center;">
                                                <a id="detail_periode" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#periode_detail" data-placement="top" title="" data-original-title="Ubah" data-id_periode="<?= $Data_periode->id_periode ?>" data-tahun="<?= $Data_periode->tahun ?>" data-tgl_mulai="<?= $Data_periode->tgl_mulai ?>" data-tgl_selesai="<?= $Data_periode->tgl_selesai ?>" data-jml_relawan="<?= $Data_periode->jml_relawan ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                                <!-- <a href="<?= base_url('staff/periode/list_pendaftar/' . $Data_periode->id_periode . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Pendaftar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a> -->
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
<!-- Tambah Periode -->
<div class="modal fade" id="bukaperiode" tabindex="-1" role="dialog" aria-labelledby="bukaperiodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukaperiodeLabel">Buka Periode Relawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('staff/periode/crudperiode'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Tanggal Mulai Pendaftaran</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required placeholder="Nama Staff KPU">
                </div>
                <div class="form-group mb-4">
                    <label>Tanggal Selesai Pendaftaran</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Nomor Telepon Staff" required>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Pendaftaran Relawan</label>
                    <input type="number" class="form-control" id="jml_relawan" name="jml_relawan" placeholder="Jumlah Pendaftaran Relawan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan_periode" name="simpan_periode"> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Ubah Pengguna -->
<div class="modal fade" id="periode_detail" tabindex="-1" role="dialog" aria-labelledby="periode_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="periode_detailLabel">Detail Periode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/periode/crudperiode'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Periode Relawan</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" required readonly>
                    <input type="text" class="form-control" id="id_periode" name="id_periode" hidden required readonly>
                </div>
                <div class="form-group mb-4">
                    <label>Tanggal Mulai Pendaftaran</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required placeholder="Nama Staff KPU">
                </div>
                <div class="form-group mb-4">
                    <label>Tanggal Selesai Pendaftaran</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Nomor Telepon Staff" required>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Pendaftaran Relawan</label>
                    <input type="number" class="form-control" id="jml_relawan" name="jml_relawan" placeholder="Jumlah Pendaftaran Relawan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-danger" id="hapus_periode" name="hapus_periode">Hapus</button>
                <button type="submit" class="btn btn-primary" id="ubah_periode" name="ubah_periode">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_periode", function() {
        var tahun = $(this).data('tahun');
        var id_periode = $(this).data('id_periode');
        var tgl_mulai = $(this).data('tgl_mulai');
        var tgl_selesai = $(this).data('tgl_selesai');
        var jml_relawan = $(this).data('jml_relawan');
        $(".modal-body#detail_body #tahun").val(tahun);
        $(".modal-body#detail_body #id_periode").val(id_periode);
        $(".modal-body#detail_body #tgl_mulai").val(tgl_mulai);
        $(".modal-body#detail_body #tgl_selesai").val(tgl_selesai);
        $(".modal-body#detail_body #jml_relawan").val(jml_relawan);
    })
</script>
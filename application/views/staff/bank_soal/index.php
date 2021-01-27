<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Bank Soal</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#buat_bank_soal" class="btn btn-primary mb-2">
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
                                                <?php
                                                if ($Data_bank->status_soal == 'AKTIF') : ?>
                                                    <a id="detail_bank_soal" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#bank_soal_detail" data-placement="top" title="" data-original-title="Ubah" data-id_ujian="<?= $Data_bank->id_ujian ?>" data-tahun="<?= $Data_bank->tahun ?>" data-jml_soal="<?= $Data_bank->jml_soal ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg>
                                                    </a>
                                                <?php else : ?>
                                                    <a id="detail_bank_soal" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#bank_soal_detail" data-placement="top" title="" data-original-title="Ubah" data-id_ujian="<?= $Data_bank->id_ujian ?>" data-tahun="<?= $Data_bank->tahun ?>" data-jml_soal="<?= $Data_bank->jml_soal ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="<?= base_url('staff/bank_soal/lihat_soal/' . $Data_bank->id_ujian . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Soal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                <?php endif;
                                                ?>
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
<!-- Tambah Bank Soal -->
<div class="modal fade" id="buat_bank_soal" tabindex="-1" role="dialog" aria-labelledby="buat_bank_soalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buat_bank_soalLabel">Tambah Bank Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('staff/bank_soal/crudsoal'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Pilih Periode Ujian</label>
                    <select name="id_periode" class="form-control" id="id_periode">
                        <?php foreach ($data_periode as $Data_periode) :
                            echo '<option value="' . $Data_periode->id_periode . '">Tahun ' . $Data_periode->tahun . '</option>';
                        endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Soal</label>
                    <input type="text" class="form-control" id="jml_soal" name="jml_soal" placeholder="Jumlah Soal" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan_bank_soal" name="simpan_bank_soal"> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Detail Bank Soal -->
<div class="modal fade" id="bank_soal_detail" tabindex="-1" role="dialog" aria-labelledby="bank_soal_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bank_soal_detailLabel">Detail Bank Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/bank_soal/crudsoal'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Periode Relawan</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" required readonly>
                    <input type="text" class="form-control" id="id_ujian" name="id_ujian" hidden required readonly>
                </div>
                <div class="form-group mb-4">
                    <label>Jumlah Soal</label>
                    <input type="text" class="form-control" id="jml_soal" name="jml_soal" placeholder="Jumlah Soal" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-danger" id="hapus_bank_soal" name="hapus_bank_soal">Hapus</button>
                <button type="submit" class="btn btn-warning" id="blokir_bank_soal" name="blokir_bank_soal">Non Aktif</button>
                <button type="submit" class="btn btn-success" id="aktif_bank_soal" name="aktif_bank_soal">Aktif</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_bank_soal", function() {
        var tahun = $(this).data('tahun');
        var id_ujian = $(this).data('id_ujian');
        var jml_soal = $(this).data('jml_soal');
        $(".modal-body#detail_body #tahun").val(tahun);
        $(".modal-body#detail_body #id_ujian").val(id_ujian);
        $(".modal-body#detail_body #jml_soal").val(jml_soal);
    })
</script>
<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Nilai Pendaftar Relawan</h3>
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
                                        <th class="text-center">Nilai Ujian</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_calon_relawan as $Data_calon_relawan) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= $Data_calon_relawan->nm_relawan ?></td>
                                            <td><?= $Data_calon_relawan->email ?></td>
                                            <td><?= $Data_calon_relawan->no_hp ?></td>
                                            <td><?= $Data_calon_relawan->alamat ?></td>
                                            <td class="checkbox-column text-center"><?= $Data_calon_relawan->nilai_ujian ?></td>
                                            <td>
                                                <a id="detail_nilai" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#nilai_detail" data-placement="top" title="" data-original-title="Ubah" data-id_relawan="<?= $Data_calon_relawan->id_relawan ?>" data-email="<?= $Data_calon_relawan->email ?>" data-nm_relawan="<?= $Data_calon_relawan->nm_relawan ?>" data-nilai_ujian="<?= $Data_calon_relawan->nilai_ujian ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
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
<!-- Detail Bank Soal -->
<div class="modal fade" id="nilai_detail" tabindex="-1" role="dialog" aria-labelledby="nilai_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nilai_detailLabel">Konfirmasi Relawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/relawan/crudnilai'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Nama Relawan</label>
                    <input type="text" class="form-control" id="nm_relawan" name="nm_relawan" required readonly>
                    <input type="text" class="form-control" id="id_relawan" name="id_relawan" hidden required readonly>
                </div>
                <div class="form-group mb-4">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" readonly placeholder="Jumlah Soal" required>
                </div>
                <div class="form-group mb-4">
                    <label>Nilai Ujian</label>
                    <input type="text" class="form-control" id="nilai_ujian" name="nilai_ujian" readonly placeholder="Jumlah Soal" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-danger" id="gagal_relawan" name="gagal_relawan">Gagal</button>
                <button type="submit" class="btn btn-success" id="lulus_relawan" name="lulus_relawan">Lulus</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_nilai", function() {
        var id_relawan = $(this).data('id_relawan');
        var nm_relawan = $(this).data('nm_relawan');
        var email = $(this).data('email');
        var nilai_ujian = $(this).data('nilai_ujian');
        $(".modal-body#detail_body #id_relawan").val(id_relawan);
        $(".modal-body#detail_body #nm_relawan").val(nm_relawan);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #nilai_ujian").val(nilai_ujian);
    })
</script>
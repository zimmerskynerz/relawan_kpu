<?php $this->load->view('relawan/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Konfirmasi Data Administrasi</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#konfirmasi_relawan" class="btn btn-primary mb-2">
                Konfirmasi
            </button>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Data Identitas</h4>
                        <!-- Data Identtias -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">
                                    <h6>Email Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data_diri_relawan['email']; ?>" readonly>
                                <input type="text" class="form-control" id="id_login" name="id_login" value="<?= $data_diri_relawan['id_login']; ?>" hidden readonly>
                                <input type="text" class="form-control" id="id_relawan" name="id_relawan" value="<?= $data_diri_relawan['id_relawan']; ?>" hidden readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nm_user">
                                    <h6>Nama Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="nm_user" name="nm_user" value="<?= $data_diri_relawan['nm_relawan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">
                                    <h6>Tempat Lahir Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="kota_lahir" name="kota_lahir" value="<?= $data_diri_relawan['kota_lahir']; ?>" readonly placeholder="Kota Lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nm_user">
                                    <h6>Tanggal Lahir Relawan</h6>
                                </label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data_diri_relawan['tgl_lahir']; ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Alamat Relawan</h6>
                            </label>
                            <textarea type="text" class="form-control" id="alamat" readonly value="<?= set_value('alamat') ?>" name="alamat" placeholder="Desa, Jalan, Gedung atau Studio" required><?= $data_diri_relawan['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Nomor HP Relawan</h6>
                            </label>
                            <input type="number" class="form-control" id="no_hp" readonly value="<?= $data_diri_relawan['no_hp']; ?>" name="no_hp" placeholder="Mis. 0891129xx" required>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Jenis Kelamin</h6>
                            </label>
                            <input type="text" class="form-control" id="j_kelamin" readonly value="<?php if ($data_diri_relawan['j_kelamin'] == 'L') : echo 'Laki-laki';
                                                                                                    else : echo 'Perempuan';
                                                                                                    endif; ?>" name="j_kelamin" placeholder="Mis. 0891129xx" required>
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
                                                        <th class="text-center">Gambar</th>
                                                        <th class="text-center">Nama Berkas</th>
                                                        <th class="text-center">Link Berkas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_berkas_Calon as $Data_berkas_Calon) : ?>
                                                        <tr>
                                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                                            <td><?= $Data_berkas_Calon->link_berkas ?></td>
                                                            <td><?= $Data_berkas_Calon->nm_berkas ?></td>
                                                            <td>
                                                                <a href="<?= base_url('staff/relawan/tampil_berkas/' . $Data_berkas_Calon->link_berkas . '') ?>" class="bs-tooltip" data-placement="top" title="" data-original-title="Lihat Soal">
                                                                    Link Berkas!
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
                    </div>
                </div>
            </div>

        </div>

        <?php $this->load->view('relawan/include/copyright') ?>

    </div>
</div>
<!-- Konfirmasi Modal -->
<div class="modal fade" id="konfirmasi_relawan" tabindex="-1" role="dialog" aria-labelledby="konfirmasi_relawanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasi_relawanLabel">Konfirmasi Relawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('staff/relawan/crudpendaftaran'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="nm_user">
                        <h6>Konfirmasi Administrasi</h6>
                    </label>
                    <select class="form-control" name="konfirmasi" id="konfirmasi" onchange="showDiv2(this)" required>
                        <option value="1">Diterima</option>
                        <option value="2">Revisi</option>
                        <option value="3">Tolak</option>
                    </select>
                    <input type="text" id="id_relawan" name="id_relawan" value="<?= $data_diri_relawan['id_relawan'] ?>" hidden>
                    <input type="text" id="id_login" name="id_login" value="<?= $data_diri_relawan['id_login'] ?>" hidden>
                </div>
                <div class="form-group" id="select_id_prodi2">
                    <label for="nm_user">
                        <h6>Alasan Ditolak</h6>
                    </label>
                    <textarea type="text" class="form-control" id="alasan" name="alasan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-warning" id="revisi_relawan" name="revisi_relawan" class="btn btn-primary mb-2">Revisi</button>
                <button type="submit" class="btn btn-danger" id="tolak_relawan" name="tolak_relawan" class="btn btn-primary mb-2">Tolak</button>
                <button type="submit" class="btn btn-success" id="terima_relawan" name="terima_relawan"> Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#select_id_prodi2").hide();
    $("#revisi_relawan").hide();
    $("#tolak_relawan").hide();
    $("#terima_relawan").show();

    function showDiv2(select) {
        if (select.value == 1) {
            $("#select_id_prodi2").hide();
            $("#revisi_relawan").hide();
            $("#tolak_relawan").hide();
            $("#terima_relawan").show();
        }
        if (select.value == 2) {
            $("#select_id_prodi2").show();
            $("#revisi_relawan").show();
            $("#tolak_relawan").hide();
            $("#terima_relawan").hide();
        }
        if (select.value == 3) {
            $("#select_id_prodi2").show();
            $("#revisi_relawan").hide();
            $("#tolak_relawan").show();
            $("#terima_relawan").hide();
        }
    }
</script>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Pendaftar Relawan</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#buat_bank_soal" class="btn btn-primary mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                Laporan
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
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No HP</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Daftar</th>
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
                                            <td><?= date('d F Y', strtotime($Data_calon_relawan->tgl_daftar)) ?></td>
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
<!-- Laporan Pendaftaran -->
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
                <?php echo form_open_multipart('staff/laporan/pendaftaran'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Pilih Bulan Pendaftaran</label>
                    <select class="form-control" id="bulan" name="bulan" style="width: 100%;">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">Nopember</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label>Pilih Tahun Pendaftaran</label>
                    <select class="form-control" id="tahun" name="tahun" style="width: 100%;">
                        <?php
                        $now = date('Y');
                        for ($tahun = $now; $tahun >= $now - 20; $tahun--) {
                            echo '
                                            <option value="' . $tahun . '">' . $tahun . '</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-warning" id="reset_laporan_pendaftaran" name="reset_laporan_pendaftaran"> Reset</button>
                <button type="submit" class="btn btn-primary" id="lihat_laporan_pendaftaran" name="lihat_laporan_pendaftaran"> Lihat</button>
                <!-- <button type="submit" class="btn btn-success" id="cetak_laporan_pendaftaran" name="cetak_laporan_pendaftaran"> Cetak</button> -->
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
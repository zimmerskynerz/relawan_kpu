<?php $this->load->view('relawan/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Selamat Datang, <?= $data_diri['nm_relawan'] ?></h3>
                <h5>Silahkan melengkapi data diri dan berkas anda!</h5>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-12">
                <div class="card">
                    <?php echo form_open_multipart('relawan/beranda/cruddaftar'); ?>
                    <div class="card-body">
                        <h4>Data Identitas</h4>
                        <!-- Data Identtias -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">
                                    <h6>Email Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data_login['email']; ?>" readonly>
                                <input type="text" class="form-control" id="id_login" name="id_login" value="<?= $data_login['id_login']; ?>" hidden readonly>
                                <input type="text" class="form-control" id="id_relawan" name="id_relawan" value="<?= $data_diri['id_relawan']; ?>" hidden readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nm_user">
                                    <h6>Nama Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="nm_user" name="nm_user" value="<?= $data_diri['nm_relawan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">
                                    <h6>Tempat Lahir Relawan</h6>
                                </label>
                                <input type="text" class="form-control" id="kota_lahir" name="kota_lahir" value="<?= $data_diri['kota_lahir']; ?>" placeholder="Kota Lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nm_user">
                                    <h6>Tanggal Lahir Relawan</h6>
                                </label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data_diri['tgl_lahir']; ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Alamat Relawan</h6>
                            </label>
                            <textarea type="text" class="form-control" id="alamat" value="<?= set_value('alamat') ?>" name="alamat" placeholder="Desa, Jalan, Gedung atau Studio" required><?= $data_diri['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Nomor HP Relawan</h6>
                            </label>
                            <input type="number" class="form-control" id="no_hp" value="<?= $data_diri['no_hp']; ?>" name="no_hp" placeholder="Mis. 0891129xx" required>
                        </div>
                        <div class="form-group">
                            <label for="nm_user">
                                <h6>Jenis Kelamin</h6>
                            </label>
                            <select class="form-control" name="j_kelamin" id="j_kelamin" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Scan KTP yang masih berlaku</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="ktp">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Scan ijazah SLTA atau sederajat</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="ijazah">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Foto diri background merah</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="foto">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Surat pernyataan tidak menjadi anggota partai poliik</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="surat_parpol">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Surat pernyataan kesediaan menjadi relawan demokrasi</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="surat_kesediaan">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Surat keterangan terdaftar sebagai pemilih</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="surat_pemilih">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Surat pernyataan tidak pernah dipidana penjara atau melakukan tindak pidana</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="skck">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Surat pernyataan bukan bagian dari penyelenggara pemilu</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]" required>
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="bukan_anggotakpu">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Seritikat/Piagam yang berkaitan dengan kegiatan KPU (bagi yang mempunyai)</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]">
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="sertifikat">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Daftar riwayat hidup</label>
                            <input type="file" class="form-control-file" id="berkas[]" name="berkas[]">
                            <input type="text" name="keterangan[]" hidden id="keterangan[]" value="riwayat_hidup">
                        </div>
                        <?php if ($data_konfirmasi > 0) : ?>
                            <div class="form-group">
                                <label for="nm_user">
                                    <h6>Alasan Ditolak</h6>
                                </label>
                                <input type="text" class="form-control" id="alasan" value="<?= $data_konfirmasi['alasan'] ?>" name="alasan" placeholder="Mis. 0891129xx" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" id="kirim_konfirmasi" name="kirim_konfirmasi" class="btn btn-primary mb-2">Kirim Ulang</button>
                        <?php else : ?>
                            <button type="submit" class="btn btn-primary" id="kirim_konfirmasi" name="kirim_konfirmasi" style="position: absolute; right:12px; bottom:12px;" class="btn btn-primary mb-2">Kirim</button>
                        <?php endif; ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>

        <?php $this->load->view('relawan/include/copyright') ?>

    </div>
</div>
<?php $this->load->view('staff/notif') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Staff KPU</h3>
            </div>
            <button type="button" data-toggle="modal" data-target="#tambah_staff" class="btn btn-primary mb-2">
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
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No HP</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Gabung</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_staff as $Data_staff) : ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= $no; ?></td>
                                            <td><?= $Data_staff->nm_staff ?></td>
                                            <td><?= $Data_staff->email ?></td>
                                            <td><?= $Data_staff->no_hp ?></td>
                                            <td><?= $Data_staff->alamat ?></td>
                                            <td class="text-center">
                                                <?php if ($Data_staff->status == 'AKTIF') : ?>
                                                    <span class="shadow-none badge badge-primary">AKTIF</span>
                                                <?php else : ?>
                                                    <span class="shadow-none badge badge-danger">BLOKIR</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= date('d F Y', strtotime($Data_staff->tgl_daftar)) ?></td>
                                            <td>
                                                <a id="detail_staff" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#staff_detail" data-placement="top" title="" data-original-title="Detail" data-id_login="<?= $Data_staff->id_login ?>" data-nm_staff="<?= $Data_staff->nm_staff ?>" data-email="<?= $Data_staff->email ?>" data-no_hp="<?= $Data_staff->no_hp ?>" data-alamat="<?= $Data_staff->alamat ?>">
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
<!-- Tambah Pengguna -->
<div class="modal fade" id="tambah_staff" tabindex="-1" role="dialog" aria-labelledby="tambah_staffLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_staffLabel">Tambah Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('staff/pengguna/crudpengguna'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Nama Staff</label>
                    <input type="text" class="form-control" id="nm_staff" name="nm_staff" required placeholder="Nama Staff KPU">
                </div>
                <div class="form-group mb-4">
                    <label>No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Staff" required>
                </div>
                <div class="form-group mb-4">
                    <label>Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
                </div>
                <div class="form-group mb-4">
                    <label>Alamat Staff</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat Lengkap Petugas atau Staff KPU Kudus"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan_staff" name="simpan_staff"> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Ubah Pengguna -->
<div class="modal fade" id="staff_detail" tabindex="-1" role="dialog" aria-labelledby="staff_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staff_detailLabel">Detail Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('staff/pengguna/crudpengguna'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-4">
                    <label>Nama Staff</label>
                    <input type="text" class="form-control" id="nm_staff" name="nm_staff" required placeholder="Nama Staff KPU">
                    <input type="text" class="form-control" id="id_login" name="id_login" hidden required>
                </div>
                <div class="form-group mb-4">
                    <label>No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Staff" required>
                </div>
                <div class="form-group mb-4">
                    <label>Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
                </div>
                <div class="form-group mb-4">
                    <label>Alamat Staff</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat Lengkap Petugas atau Staff KPU Kudus"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" class="btn btn-warning" id="reset_password" name="reset_password">Reset</button>
                <button type="submit" class="btn btn-danger" id="blokir_staff" name="blokir_staff">Blokir</button>
                <button type="submit" class="btn btn-success" id="aktif_staff" name="aktif_staff">Aktif</button>
                <button type="submit" class="btn btn-primary" id="ubah_staff" name="ubah_staff">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_staff", function() {
        var id_login = $(this).data('id_login');
        var nm_staff = $(this).data('nm_staff');
        var no_hp = $(this).data('no_hp');
        var email = $(this).data('email');
        var alamat = $(this).data('alamat');
        $(".modal-body#detail_body #id_login").val(id_login);
        $(".modal-body#detail_body #nm_staff").val(nm_staff);
        $(".modal-body#detail_body #no_hp").val(no_hp);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #alamat").val(alamat);
    })
</script>
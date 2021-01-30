<link href="<?= base_url() ?>/assets/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>PROFIL</h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="<?= base_url() ?>relawan/profile/update">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $login->email ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label for="text">Nama</label>
                                        <input type="text" class="form-control" id="text" name="nm_relawan" value="<?= $relawan->nm_relawan ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label for="number">No. HP</label>
                                        <input type="number" class="form-control" id="number" name="no_hp" value="<?= $relawan->no_hp ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="time" class="btn btn-primary" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/assets/plugins/notification/snackbar/snackbar.min.js"></script>
<script src="<?= base_url() ?>/assets/js/components/notification/custom-snackbar.js"></script>
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Snackbar.show({
            text: 'Berhasil edit profil',
            duration: 3000,
            backgroundColor: '#8dbf42',
            pos: 'top-center',
            showAction: false
        });
    </script>
<?php endif; ?>
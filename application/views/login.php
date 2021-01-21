<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>SELAMAT DATANG DI PORTAL KPU KUDUS</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>img/logo_kpu.png" />
	<link href="<?= base_url('assets/') ?>css/loader.css" rel="stylesheet" type="text/css" />
	<script src="<?= base_url('assets/') ?>js/loader.js"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/') ?>css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/') ?>css/authentication/form-2.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/forms/theme-checkbox-radio.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/forms/switches.css">
</head>

<body class="form">

	<!-- BEGIN LOADER -->
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<!--  END LOADER -->

	<div class="form-container outer" style="background-color: red;">
		<div class="form-form">
			<div class="form-form-wrap">
				<div class="form-container">
					<div class="form-content">
						<img src="<?= base_url('assets/img/bg_kpu.png') ?>" width="100%" alt="">
						<?= $this->session->flashdata('pesan_gagal_username'); ?>
						<?= $this->session->flashdata('pesan_gagal_password'); ?>
						<?= $this->session->flashdata('pesan_paksa_logout'); ?>
						<?php echo form_open_multipart('cek_login'); ?>
						<div class="text-left">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
							<div id="username-field" class="field-wrapper input">
								<label for="username">EMAIL</label>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<input id="email" name="email" type="email" class="form-control" required placeholder="kpukudus@gmail.com">
							</div>
							<div id="password-field" class="field-wrapper input mb-2">
								<div class="d-flex justify-content-between">
									<label for="password">PASSWORD</label>
								</div>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
									<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
									<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
								</svg>
								<input id="password" name="password" type="password" class="form-control" required placeholder="Password">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
									<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
									<circle cx="12" cy="12" r="3"></circle>
								</svg>
							</div>
							<div class="d-sm-flex justify-content-between">
								<div class="field-wrapper">
									<button type="submit" class="btn btn-danger" value="">Masuk</button>
								</div>
							</div>
							<p class="signup-link">Ingin Jadi Relawan KPU ? <a href="<?= base_url('daftar') ?>">Daftar Disini!</a></p>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
	<script src="<?= base_url('assets/') ?>js/libs/jquery-3.1.1.min.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>

	<!-- END GLOBAL MANDATORY SCRIPTS -->
	<script src="<?= base_url('assets/') ?>js/authentication/form-2.js"></script>
	<script>
		var loaderElement = document.querySelector('#load_screen');
		setTimeout(function() {
			loaderElement.style.display = "none";
		}, 3000);
	</script>
</body>

</html>
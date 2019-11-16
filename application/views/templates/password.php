<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Mangganti Password Agar Anda Mudah Mengingatnya
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= $this->session->flashdata('message'); ?>
	<form class="user" method="post" action="<?= base_url(($level == 1337 ? 'admin' : ($level == 999 ? 'musahil' : 'user'))); ?>/password">
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="password" id="password" placeholder="Password Lama..." type="password" class="form-control" value="<?= set_value('password'); ?>">
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="password1" id="password1" placeholder="Password Baru..." type="password" class="form-control" value="<?= set_value('password1'); ?>">
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="password2" id="password2" placeholder="Password Baru Lagi..." type="password" class="form-control">
					<?= form_error('password2', '<small class=" text-danger pl-3">', '</small>') ?>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg">Ganti Password</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
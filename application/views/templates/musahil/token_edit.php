<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Mangganti Data Riwayat Sakit
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= $this->session->flashdata('message'); ?>
	<form class="user" method="post">
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="nim" class="">NIM</label>
					<input name="nim" id="nim" type="text" class="form-control" value="<?= $nim ?>" autofocus>
					<?= form_error('nim', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="token" class="">Token</label>
					<input name="token" id="tokenDaftar" placeholder="NEW TOKEN" type="text" class="form-control">
				</div>
				<div class="col-md-4 text-center align-middle mt-2">
					<button type='button' class="btn btn-success" onclick="generate_token()">New Token</button>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg">Simpan Perubahan</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
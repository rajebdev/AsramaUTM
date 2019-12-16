<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Menambah Prestasi
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= $this->session->flashdata('message'); ?>
	<form class="user" method="post" enctype="multipart/form-data">
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="<?= $kolom ?>" class="">Berkas <?= $kolom ?></label>
					<input name="<?= $kolom ?>" id="<?= $kolom ?>" type="file" class="form-control" autofocus>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<input type="submit" name='submit' class="btn btn-primary btn-lg" value="Simpan Perubahan" />
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
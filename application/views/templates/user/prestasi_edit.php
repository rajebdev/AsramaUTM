<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Mangganti Data Prestasi
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
					<label for="nama_prestasi" class="">Nama Prestasi</label>
					<input name="nama_prestasi" id="nama_prestasi" type="text" class="form-control" value="<?= $table['nama_prestasi'] ?>" autofocus>
					<?= form_error('nama_prestasi', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="tahun_prestasi" class="">Tahun Prestasi</label>
					<input name="tahun_prestasi" id="tahun_prestasi" type="text" class="form-control" value="<?= $table['tahun_prestasi'] ?>" autofocus>
					<?= form_error('tahun_prestasi', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="berkas_prestasi" class="">Berkas Prestasi</label>
					<input name="berkas_prestasi" id="berkas_prestasi" type="file" class="form-control" autofocus>
					<?= form_error('berkas_prestasi', '<small class="text-danger pl-3">', '</small>') ?>
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
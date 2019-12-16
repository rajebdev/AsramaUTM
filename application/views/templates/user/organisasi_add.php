<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Mangganti Hobi
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
					<label for="nama_organisasi" class="">Nama Organisasi</label>
					<input name="nama_organisasi" id="nama_organisasi" type="text" class="form-control" autofocus>
					<?= form_error('nama_organisasi', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="tahun_masuk" class="">Tahun Masuk</label>
					<input name="tahun_masuk" id="tahun_masuk" type="text" class="form-control" autofocus>
					<?= form_error('tahun_masuk', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="tahun_selesai" class="">Tahun Selesai</label>
					<input name="tahun_selesai" id="tahun_selesai" type="text" class="form-control" autofocus>
					<?= form_error('tahun_selesai', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg">Tambahkan Data</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
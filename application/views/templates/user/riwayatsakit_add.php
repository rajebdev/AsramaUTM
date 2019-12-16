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
					<label for="nama_penyakit" class="">Nama Penyakit</label>
					<input name="nama_penyakit" id="nama_penyakit" type="text" class="form-control" autofocus>
					<?= form_error('nama_penyakit', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="ket_penyakit" class="">Keterangan Tambahan</label>
					<textarea name="ket_penyakit" id="ket_penyakit" type="text" class="form-control"></textarea>
					<?= form_error('ket_penyakit', '<small class="text-danger pl-3">', '</small>') ?>
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
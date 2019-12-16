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
					<label for="jenjangpendidikan" class="">Jenjang Pendidikan</label>
					<select name="jenjangpendidikan" id="jenjangpendidikan" class="form-control">
						<?php foreach ($jenjangpendidikan as $key => $value) { ?>
							<option value="<?= $value->id_pendidikan ?>" <?= $value->id_pendidikan == $user['id_kelamin'] ? 'selected' : '' ?>>
								<?= $value->ket_pendidikan ?></option>
						<?php } ?>
					</select>
					<?= form_error('jenjangpendidikan', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="nama_sekolah" class="">Nama Sekolah</label>
					<input name="nama_sekolah" id="nama_sekolah" type="text" class="form-control" autofocus>
					<?= form_error('nama_sekolah', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="position-relative form-group">
					<label for="tahun_lulus" class="">Tahun Lulus</label>
					<input name="tahun_lulus" id="tahun_lulus" type="text" class="form-control" autofocus>
					<?= form_error('tahun_lulus', '<small class="text-danger pl-3">', '</small>') ?>
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
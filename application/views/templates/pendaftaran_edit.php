<?php
if ($level == 100) {
	$mylevel = "User";
}
if ($level == 999) {
	$mylevel = "Musahil";
}
if ($level == 1337) {
	$mylevel = "Admin";
}
?>

<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $main['menu'] ?>
					<div class="page-title-subheading">Pastikan Data Pendaftaran Sudah Benar ya kak.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab-eg-55">
					<div class="widget-chart p-3">
						<div class="widget-description mt-0 text-warning">
							<span class="text text-dark opacity-8 d-block">
								<center>
									<img class="img-thumbnail mb-2" ; src="<?= base_url("/uploaded/photoProfile/" . $data['photo']) ?>">

									<div class="form-group">
										<i>update photo profile</i>
										<?php echo form_open_multipart("$mylevel/update_pp") ?>
										<input type="file" class="form-control mb-1" name="file" required>
										<button type="submit" class="btn btn-success btn-sm">Upload Photo</button>
										</form>
									</div>
								</center>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h3 class="text-center ">Edit Data Profile</h3>
							<form method="post" action="<?= base_url('user/profile/edit') ?>">
								<div class="position-relative form-group">
									<label for="nama" class="">Nama</label>
									<input name="nama" id="nama" type="text" class="form-control" value="<?= $user_edit['nama'] ?>" autofocus>
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="nim" class="">NIM</label>
									<input name="nim" id="nim" type="text" class="form-control" value="<?= $user_edit['nim'] ?>">
									<?= form_error('nim', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="jurusan" class="">Jurusan</label>
									<select name="jurusan" id="jurusan" class="form-control">
										<?php foreach ($jurusan as $key => $value) { ?>
											<option value="<?= $value->id_jurusan ?>" <?= $value->id_jurusan == $user_edit['id_jurusan'] ? 'selected' : '' ?>>
												<?= $value->ket_jurusan ?></option>
										<?php } ?>
									</select>
									<?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="jalurmasuk" class="">Jalur Masuk</label>
									<select name="jalurmasuk" id="jalurmasuk" class="form-control">
										<?php foreach ($jalurmasuk as $key => $value) { ?>
											<option value="<?= $value->id_jalurmasuk ?>" <?= $value->id_jalurmasuk == $user_edit['id_jalurmasuk'] ? 'selected' : '' ?>>
												<?= $value->ket_jalurmasuk ?></option>
										<?php } ?>
									</select>
									<?= form_error('jalurmasuk', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="tempat_lahir" class="">Tempat Lahir</label>
									<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" value="<?= $user_edit['tempat_lahir'] ?>">
									<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="tanggal_lahir" class="">Tanggal Lahir</label>
									<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" value="<?= $user_edit['tanggal_lahir'] ?>">
									<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="sex" class="">Jenis Kelamin</label>
									<select name="sex" id="sex" class="form-control">
										<?php foreach ($sex as $key => $value) { ?>
											<option value="<?= $value->id_kelamin ?>" <?= $value->id_kelamin == $user_edit['id_kelamin'] ? 'selected' : '' ?>>
												<?= $value->ket_kelamin ?></option>
										<?php } ?>
									</select>
									<?= form_error('sex', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="notelp" class="">No Telpon</label>
									<input name="notelp" id="notelp" type="text" class="form-control" value="<?= $user_edit['no_telp'] ?>">
									<?= form_error('notelp', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<label for="alamat" class="">Alamat</label>
									<textarea name="alamat" id="alamat" type="text" class="form-control"><?= $user_edit['alamat'] ?></textarea>
									<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="position-relative form-group">
									<center>
										<button class="btn btn-primary" style="width:100%;"><i class="fa fa-save"></i> Simpan Perubahan</button>
									</center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
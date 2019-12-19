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
							<table class="mb-0 table table-striped">
								<h3 class="text-center mb-4 text-uppercase">Data Pendaftaran</h3>

								<?= $this->session->flashdata('message'); ?>
								<tbody>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">nama</th>
										<td class="word-wrap"><?= $user['nama'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">nim</th>
										<td class="word-wrap"><?= $user['nim'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">Fakultas/Jurusan</th>
										<td class="word-wrap"><?= $user['nama_fakultas'] . '/' . $user['ket_jurusan'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">Jalur masuk</th>
										<td class="word-wrap"><?= $user['ket_jalurmasuk'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">tempat, tanggal lahir</th>
										<td class="word-wrap"><?= $user['tempat_lahir'] . ', ' . $user['tanggal_lahir'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">jenis kelamin</th>
										<td class="word-wrap"><?= $user['ket_kelamin'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">nomor telp/hp</th>
										<td class="word-wrap"><?= $user['no_telp'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">alamat asal</th>
										<td class="word-wrap"><?= $user['alamat'] ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-6">
							<div class="main-card mb-3 card">
								<div class="card-body">
									<h5 class="card-title">Upload Berkas</h5>
									<p>Lengkapi persyaratan pendaftaran</p>
									<center>
										<a href="<?= base_url(); ?>user/berkas/view" class="btn btn-primary" style="width:100%;"><i class="fa fa-upload"></i> Berkas Pendaftaran</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="main-card mb-3 card">
								<div class="card-body">
									<h5 class="card-title">Edit Pendaftaran</h5>
									<p>Perubahan pada data pendaftaran</p>
									<center>
										<a href="<?= base_url(); ?>user/profile/edit" class="btn btn-primary" style="width:100%;"><i class="fa fa-edit"></i> Edit Pendaftaran</a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Photo Profile</h5>
					<center>
						<img src="<?= base_url('assets/') ?>assets/images/user/<?= $user['photo'] ?>" alt="<?= $user['nama'] ?>" style="height: 400px;">
					</center>
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
										<th scope="row" class="text-uppercase" style="width: 50%;">hobi/kebiasaan</th>
										<td class="word-wrap">
											<ol class="list-group list-group-flush">
												<?php foreach ($hobi as $key => $value) {
													echo "<li class='list-group-item'> - " . $value . "</li>";
												}
												?>
											</ol>
										</td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">alamat asal</th>
										<td class="word-wrap"><?= $user['alamat'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;" colspan="2">riwayat pendidikan</th>
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
										<a href="<?= base_url(); ?>user/pendaftaran/berkas" class="btn btn-primary" style="width:100%;"><i class="fa fa-upload"></i> Berkas Pendaftaran</a>
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
										<a href="<?= base_url(); ?>user/pendaftaran/edit" class="btn btn-primary" style="width:100%;"><i class="fa fa-edit"></i> Edit Pendaftaran</a>
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
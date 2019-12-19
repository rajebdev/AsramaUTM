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
	<div class="app-page-title" style="position: fixed; z-index: 9999; width: 80%">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $main['menu'] ?>
					<div class="page-title-subheading">Pastikan Data Pendaftaran Sudah Benar ya kak sebelum di validasi.
					</div>
				</div>
			</div>
			<div style="padding-left: 50%" class="page-title-heading">
				<?php if ($pendaftar['validasi'] != 1) { ?>
					<a href="<?= base_url(($level == 1337 ? 'Admin/' : 'musahil/') . 'validasi_berkas/validasi/' . base64_encode($nim)) ?>" class="btn btn-success" type="button" onclick="return confirm('Yakin menvalidasi ?')"><i class="fas fa-check"></i> Validasi</a>
				<?php } else { ?>
					<a href=" <?= base_url(($level == 1337 ? 'Admin/' : 'musahil/') . 'validasi_berkas/unvalidasi/' . base64_encode($nim)) ?>" class="btn btn-danger" onclick="return confirm('Yakin Unvalidasi ?')"><i class="fas fa-times"></i> UnValidasi</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="app-page-title">
	</div>
	<div class="app-page-title">
	</div>
	<div class="row">
		<div class="col-lg-6">
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
										<td class="word-wrap"><?= $pendaftar['nama'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">nim</th>
										<td class="word-wrap"><?= $pendaftar['nim'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">Fakultas/Jurusan</th>
										<td class="word-wrap"><?= $pendaftar['nama_fakultas'] . '/' . $pendaftar['ket_jurusan'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">Jalur masuk</th>
										<td class="word-wrap"><?= $pendaftar['ket_jalurmasuk'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">tempat, tanggal lahir</th>
										<td class="word-wrap"><?= $pendaftar['tempat_lahir'] . ', ' . $pendaftar['tanggal_lahir'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">jenis kelamin</th>
										<td class="word-wrap"><?= $pendaftar['ket_kelamin'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">nomor telp/hp</th>
										<td class="word-wrap"><?= $pendaftar['no_telp'] ?></td>
									</tr>
									<tr>
										<th scope="row" class="text-uppercase" style="width: 50%;">alamat asal</th>
										<td class="word-wrap"><?= $pendaftar['alamat'] ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<table class="mb-0 table table-striped">
						<h3 class="text-center mb-4 text-uppercase">Data Orang Tua</h3>
						<tbody>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">Nama Ayah</th>
								<td class="word-wrap"><?= $orangtua['nama_ayah'] != '' ? $orangtua['nama_ayah'] : '-' ?></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">pekerjaan ayah</th>
								<td class="word-wrap"><?= $orangtua['pekerjaan_ayah'] != '' ? $orangtua['pekerjaan_ayah'] : '-' ?></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">no telp ayah</th>
								<td class="word-wrap"><?= $orangtua['telp_ayah'] != '' ? $orangtua['telp_ayah'] : '-' ?></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">nama ibu</th>
								<td class="word-wrap"><?= $orangtua['nama_ibu'] != '' ? $orangtua['nama_ibu'] : '-' ?></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">pekerjaan ibu</th>
								<td class="word-wrap"><?= $orangtua['pekerjaan_ibu'] != '' ? $orangtua['pekerjaan_ibu'] : '-' ?></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase" style="width: 50%;">no telp ibu</th>
								<td class="word-wrap"><?= $orangtua['telp_ibu'] != '' ? $orangtua['telp_ibu'] : '-' ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<table class="mb-0 table table-striped">
								<h3 class="text-center mb-4 text-uppercase">Data Hobi</h3>
								<thead>
									<tr role="row">
										<?php
										$nama_column = array(
											'No',
											'Hobi'
										);
										foreach ($nama_column as $value) : ?>
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($hobi as $key => $row) : ?>
										<tr>
											<th scope="row" class="text-uppercase"><?= $key + 1 ?></th>
											<td class="word-wrap"><?= $row->ket_hobi ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<table class="mb-0 table table-striped">
						<h3 class="text-center mb-4 text-uppercase">Data Organisasi</h3>
						<thead>
							<tr role="row">
								<?php
								$nama_column = array(
									'No',
									'Nama Organisasi',
									'Tahun Masuk',
									'Tahun Selesai'
								);
								foreach ($nama_column as $value) : ?>
									<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($organisasi as $key => $row) : ?>
								<tr>
									<th scope="row" class="text-uppercase"><?= $key + 1 ?></th>
									<td class="word-wrap"><?= $row->nama_organisasi ?></td>
									<td class="word-wrap"><?= $row->tahun_masuk ?></td>
									<td class="word-wrap"><?= $row->tahun_selesai ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<table class="mb-0 table table-striped">
								<h3 class="text-center mb-4 text-uppercase">Data Prestasi</h3>
								<thead>
									<tr role="row">
										<?php
										$nama_column = array(
											'No',
											'Nama Prestasi',
											'Tahun Prestasi',
											'Berkas Prestasi'
										);
										foreach ($nama_column as $value) : ?>
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody id="show_data">
									<?php foreach ($prestasi as $key => $row) : ?>
										<tr role="row" class="odd">
											<td tabindex="0" class="sorting_1"><?= $key + 1 ?></td>
											<td><?= $row->nama_prestasi ?></td>
											<td><?= $row->tahun_prestasi ?></td>
											<td><img src="<?= base_url('upload/prestasi/' . $row->berkas_prestasi) ?>" alt="<?= $row->berkas_prestasi ?>" width="100px" height="auto"></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<table class="mb-0 table table-striped">
						<h3 class="text-center mb-4 text-uppercase">Data Riwayat Pendidikan</h3>
						<thead>
							<tr role="row">
								<?php
								$nama_column = array(
									'No',
									'Pendidikan',
									'Nama Instansi',
									'Tahun Lulus'
								);
								foreach ($nama_column as $value) : ?>
									<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody id="show_data">
							<?php foreach ($pendidikan as $key => $row) : ?>
								<tr role="row" class="odd">
									<td tabindex="0" class="sorting_1"><?= $key + 1 ?></td>
									<td><?= $row->ket_pendidikan ?></td>
									<td><?= $row->nama_sekolah ?></td>
									<td><?= $row->tahun_lulus ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<table class="mb-0 table table-striped">
								<h3 class="text-center mb-4 text-uppercase">Data Riwayat Sakit</h3>
								<thead>
									<tr role="row">
										<?php
										$nama_column = array(
											'No',
											'Nama Penyakit',
											'Keterangan Tambahan'
										);
										foreach ($nama_column as $value) : ?>
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody id="show_data">
									<?php foreach ($riwayatsakit as $key => $row) : ?>
										<tr role="row" class="odd">
											<td tabindex="0" class="sorting_1"><?= $key + 1 ?></td>
											<td><?= $row->nama_penyakit ?></td>
											<td><?= $row->ket_penyakit ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<table class="mb-0 table table-striped">
						<h3 class="text-center mb-4 text-uppercase">Data Berkas</h3>
						<thead>
							<tr>
								<th>Keterangan</th>
								<th>Berkas</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row" class="text-uppercase">PASS FOTO</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/pass_foto/' . $berkas['pass_foto']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">Surat Pernyataan</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/surat_pernyataan/' . $berkas['surat_pernyataan']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">KTP PENDAFTAR</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/ktp_penghuni/' . $berkas['ktp_penghuni']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">ktp ayah</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/ktp_ayah/' . $berkas['ktp_ayah']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">KTP IBU</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/ktp_ibu/' . $berkas['ktp_ibu']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">kartu keluarga</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/kartu_keluarga/' . $berkas['kartu_keluarga']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">kwitansi daftar</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/kwitansi_daftar/' . $berkas['kwitansi_daftar']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">kwitansi karakter</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/kwitansi_karakter/' . $berkas['kwitansi_karakter']) ?>" alt="gambar berkas" /></td>
							</tr>
							<tr>
								<th scope="row" class="text-uppercase">surat dokter</th>
								<td class="word-wrap"><img width="800px" src="<?= base_url('upload/surat_dokter/' . $berkas['surat_dokter']) ?>" alt="gambar berkas" /></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
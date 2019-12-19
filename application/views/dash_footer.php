</div>
<div class="app-wrapper-footer">
	<div class="app-footer">
		<div class="app-footer__inner">
			<div class="app-footer-right">
				<p> copyright &copy sispengma 2019</p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>



<?php
if ($level != "null") {
	if ($level == 100) {
		$mylevel = "User";
	}
	if ($level == 999) {
		$mylevel = "Musahil";
	}
	if ($level == 1337) {
		$mylevel = "Admin";
	}
}
?>

<?php if ($level != "null") { ?>
	<!-- modal logout -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="mb-0">Anda Yakin Mau Logout ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<a href="<?= base_url('logout'); ?>" type="button" class="btn btn-primary">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<!-- =========================================== -->


	<!-- modal insert gedung -->
	<div class="modal fade" id="insertGedung" tabindex="-2" role="form" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Gedung</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form">
						<?php echo form_open_multipart("Admin/add_gedung") ?>
						<label>Kode Gedung</label>
						<select required class="form-control" name="kode_gedung">
							<option value="">Kode Gedung</option>
							<?php foreach (range('A', 'Z') as $char) {
								if (in_array($char, $list_ged) == false) { ?>
									<option value="<?= $char ?>"><?= $char ?></option>
							<?php }
							} ?>
						</select>
						<br>
						<label>Gedung Untuk</label>
						<select required class="form-control" name="sex_gedung">
							<option value="">Jenis Kelamin</option>
							<option value="1">Laki - Laki</option>
							<option value="2">Perempuan</option>
						</select><br>
						<button type="submit" class="btn btn-success">Tambah
							</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- =============================== -->




	<!-- modal insert kamar -->
	<div class="modal fade" id="insertKamar" tabindex="-2" role="form" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kamar Gedung <?= $gedung ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning">Format Kode Kamar [0]=Kode Gedung, [1]=Lantai ke-, [2]=Urutan Kamar
						ke-. ex: A101</div>
					<div class="form">
						<?php echo form_open_multipart("Admin/add_kamar/" . $gedung) ?>
						<label>Kode Gedung</label>
						<input readonly class="form-control" name="kode_gedung" value="<?= $gedung ?>">
						<br>
						<label>Kamar Lantai -</label>
						<select required class="form-control" name="lantai">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="3">4</option>
						</select><br>
						<label>Kondisi Kamar</label>
						<select required class="form-control" name="kondisi">
							<option value="1">Layak</option>
							<option value="2">Cukup Layak</option>
							<option value="3">Tidak Layak</option>
						</select><br>
						<button type="submit" class="btn btn-success">Tambah</button>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- =============================== -->

	<!-- modal pilih kamar -->
	<div class="modal fade" id="pilihKamar" tabindex="-2" role="form" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pilih Kamar Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table style="width: 100%;" class="display table table-hover table-striped table-bordered">
						<thead>
							<tr role="row">
								<th>Kode Kamar</th>
								<th>Jumlah Penghuni</th>
								<th>kondisi</th>
								<th>Gedung Untuk</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($kamar as $k) { ?>
								<tr>
									<td><?= $k->id_kamar ?></td>
									<td><?= $k->penghuni ?></td>
									<td><?= $k->keterangan ?></td>
									<td><?= $k->ket_kelamin ?></td>
									<td><button class="btn btn-success" onclick="pilih('<?= $k->id_kamar ?>')" data-dismiss="modal">Pilih Kamar</button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- =============================== -->
	<!-- modal pilih mahasiswa -->
	<div class="modal fade" id="pilihMahasiswa" tabindex="-2" role="form" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pilih Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<table style="width: 100%;" class="display table table-hover table-striped table-bordered dataTable dtr-inline">
						<thead>
							<tr role="row">
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Prodi</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($mahasiswa as $m) { ?>
								<tr>
									<td><?= $m->nim ?></td>
									<td><?= $m->nama ?></td>
									<td><?= $m->ket_jurusan ?></td>
									<td><button class="btn btn-success" onclick="pilihMhs('<?= $m->nim ?>', '<?= $m->nama ?>')" data-dismiss="modal">Pilih Mahasiswa</button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- =============================== -->


	<!-- modal upload file -->
	<div class="modal fade" id="uploadFile" tabindex="-2" role="form" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<?php echo form_open_multipart("$mylevel/up_file") ?>
				<div class="modal-body">
					<div class="form-group">
						<label>Name File</label>
						<input type="text" class="form-control" name="file_name" required>
					</div>
					<div class="form-group">
						<label>Choose File</label>
						<input type="file" class="form-control" name="file" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info form-control">Upload File</button>
					</div>
				</div>
				</form>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($main['menu'] == 'Token') : ?>
	<div id="newToken" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="post" id="formToken" action="<?= base_url(($level == 1337 ? 'admin/' : 'musahil/') . 'manage_token/add') ?>">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Token Baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-row">
							<div class="col-md-12">
								<div class="position-relative form-group"><input name="nim" id="nim" placeholder="NIM..." type="text" class="form-control"></div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<div class="position-relative form-group">
											<input name="token" id="tokenDaftar" placeholder="NEW TOKEN" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-4 text-center align-middle mt-2">
										<button type='button' class="btn btn-success" onclick="generate_token()">New Token</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary">Dapatkan Token</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>


<!-- =============================== -->
<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/main.js"></script>
<!-- <script src="http://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- https://code.jquery.com/jquery-3.3.1.js
https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js -->

<script>
	$(document).ready(function() {
		$('table.display').DataTable();
	});
</script>
<?php if ($menu = "Berita Sispengma") { ?>
	<script>
		$(document).ready(
			function() {
				$("img").addClass("img-fluid");
			});
	</script>
<?php } ?>




<script>
	function pilih(id) {
		$("#placeforkamar").val(id);
	}

	function pilihMhs(nim, nama) {
		$("#nim").val(nim);
		$("#nama").val(nama);
	}
</script>


</body>

</html>
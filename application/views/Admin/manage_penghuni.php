<?php 
if($level == 100){
$mylevel = "User";
}
if($level == 999){
$mylevel = "Musahil";
}
if($level == 1337){
$mylevel = "Admin";
}
?>
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-home icon-gradient bg-tempting-azure">
					</i>
				</div>
				<div><?= $menu ?>
					<div class="page-title-subheading">Data Penghuni
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-card mb-3 card">
		<div class="card-body">
			<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<?= $this->session->flashdata('message'); ?>
						<h2 class="card-title">Manage Data Penghuni</h2>
						<?php echo form_open_multipart("$mylevel/update_kamar_penghuni/".$penghuni['nim']) ?>
						<table class="table table-striped">
							<tr>
								<th>NIM</th>
								<td><?= $penghuni['nim']?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?= $penghuni['nama']?></td>
							</tr>
							<tr>
								<th>Prodi</th>
								<td><?= $penghuni['ket_jurusan']?></td>
							</tr>
							<tr>
								<th>Tahun Masuk Asrama</th>
								<td><?= explode(" ",$penghuni['tanggal_mendaftar'])[0]?></td>
							</tr>
							<tr>
								<th>Kamar</th>
								<td>
									<div class="d-flex">
										<input readonly type="text" class="form-control" id="placeforkamar"
											value="<?= $penghuni['kamar']?>" style="width:40%" name="kamar">
										<span class="btn btn-info" id="pilih" data-toggle="modal"
											data-target="#pilihKamar">Pilih Kamar</span>
										&nbsp
									</div>
								</td>
							</tr>
                            <tr>
								<th colspan="2">
                                    <button class="btn btn-success mb-3" style="width:100%" id="btnsub" hidden type="submit">Update</button>
									</form>
								    <i class="btn btn-danger" style="width:100%" onclick="del('<?= $penghuni['nim']?>')">Hapus Penghuni</i>
                                </th>
							</tr>
						</table>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$("#pilih").click(
		function () {
			$("#btnsub").removeAttr("hidden");
		}
	);

	function del(id) {
		var con = confirm("Delete This Data");
		if(con == true){
			location.href="<?= base_url("$mylevel/delete_penghuni/")?>"+id;
		}else{
			console.log("close");
			}
	}

</script>

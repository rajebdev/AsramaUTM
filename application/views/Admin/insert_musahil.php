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
					<div class="page-title-subheading">Insert Data Penghuni
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
						<h2 class="card-title">Masukan Musahil Baru</h2>
						<div class="form-group">
							<?php echo form_open_multipart("$mylevel/add_musahil")?>
							<label>Nim Mahasiswa</label>
							<input required type="text" class="form-control" name="nimMus" id="nimMus">
							<br>
							<label>Photo Profile</label><br>
							<input required type="file" class="" name="file">
							<br><br>
							<label>Password</label>
							<input required type="password" class="form-control" name="password1">
							<br>
							<label>re-Type Password</label>
							<input required type="password" class="form-control" name="password2">
							<br>
							<input type="submit" class="btn btn-info btn-lg" style="width:100%">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
					<div class="page-title-subheading">Change Password
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-card mb-3 card">
		<div class="card-body">
			<div class="card-title">
				Reset Password
			</div>
			<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-lg-12">
						<?= $this->session->flashdata('message'); ?>
						<?php echo form_open_multipart("$mylevel/reset_password")?>
						<table class="table" style="width : 100%">
							<tr>
								<th>
									old Password
								</th>
								<td>
									<input type="password" class="form-control" name="old_pwd" required>
								</td>
							</tr>
							<tr>
								<th>
									new Password
								</th>
								<td>
									<input type="password" class="form-control" name="new_pwd" required>
								</td>
							</tr>
							<tr>
								<th colspan="2">
									<button type="submit" class="btn btn-info form-control">
										Reset Password
									</button>
								</th>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/main.js"></script> -->

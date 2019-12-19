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
					<div class="page-title-subheading">Data Musahil
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
						<h2 class="card-title">Manage Data Musahil</h2>
						<?php echo form_open_multipart("$mylevel/reset_password_mus/".$musahil['nim']."/".$musahil['uname']) ?>
						<table class="table table-striped">
							<tr>
								<th>Username</th>
								<td><?= $musahil['uname']?></td>
							</tr>
							<tr>
								<th>NIM</th>
								<td><?= $musahil['nim_musahil']?></td>
							</tr>
							<tr>
								<th>Prodi</th>
								<td><?= $musahil['ket_jurusan']?></td>
							</tr>
							<tr>
								<th colspan = "2"><span onclick="del('<?= base_url($mylevel.'/delete_musahil/'.$musahil['nim_musahil'].'/'.$musahil['uname'])?>')" class="btn btn-danger" style="width:100%">Delete Musahil</span></th>
							</tr>
                            <tr>
								<th colspan="2" class="bg-warning"> 
                                    <h6><b>Reset Password</b></h6>
                                </th>
							</tr>
                            <tr>
								<th>
                                    old Password
                                </th>
                                <td>
                                    <input type="password" class="form-control" name="old_pwd"required>
                                </td>
							</tr>
                            <tr>
								<th>
                                    new Password
                                </th>
                                <td>
                                    <input type="password" class="form-control" name="new_pwd"required>
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
<script>
function del(link) {
    var con = confirm("Delete This Data");
    if(con == true){
        location.href= link;
    }else{
        console.log("close");
    }
}
</script>

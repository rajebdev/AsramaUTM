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


<div class="app-page-title">
	<div class="row">
        <div class="col-lg-12">
		<?= $this->session->flashdata('message'); ?>    
        </div>
		<div class="col-md-12 col-lg-3">
			<div class="mb-3 card">
				<div class="card-header-tab card-header">
					<div class="card-header-title">
						<i class="header-icon lnr-home icon-gradient bg-tempting-azure"> </i>
						Photo Profile
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="tab-eg-55">
						<div class="widget-chart p-3">
							<div class="widget-description mt-0 text-warning">
								<span class="text text-dark opacity-8 d-block">
                                    <center>
									<img class="img-thumbnail mb-2";
										src="<?= base_url("/uploaded/photoProfile/".$data['photo'])?>">
                                    
                                    <div  class="form-group">
                                    <i>update photo profile</i>
                                    <?php echo form_open_multipart("$mylevel/update_pp")?>
                                    <input type="file" class = "form-control mb-1" name="file" required>
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
		</div>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">User Profile</h5>
							<table class="mb-0 table table-striped">
                                <?php echo form_open_multipart("$mylevel/update_profile")?>
								<tbody>
									<tr>
										<th>nama</th>
										<td><input type="text" name="nama" class="form-control" required value="<?= $data['nama']?>"></td>
									</tr>
                                    <tr>
										<th>Tanggal Lahir</th>
										<td><input type="date" name="tgl" class="form-control" required value="<?= $data['tanggal_lahir']?>"></td>
									</tr>
									<tr>
										<th>Tempat Lahir</th>
                                        <td><input type="text" name="lahir" class="form-control" required value="<?= $data['tempat_lahir']?>"></td>
									</tr>
									<tr>
										<th>Alamat</th>
										<td><textarea class="form-control" name="alamat" required row="2"><?= $data['alamat']?></textarea></td>
									</tr>
                                    <tr>
										<th>Jurusan</th>
										<td>
                                            <select class="form-control" name="jurusan">
                                                <?php foreach($jur as $j) { ?>
                                                    <option value="<?=$j->id_jurusan?>"
                                                        <?php if($j->id_jurusan == $data['id_jurusan']) {echo "selected";}?>
                                                    ><?= $j->ket_jurusan?></option>
                                                <?php } ?>
                                            </select>
                                        
                                        </td>
									</tr>
                                    <tr>
										<td colspan="2"><button type="submit" class="btn btn-info form-control">Update</button></td>
									</tr>
									<tr>
										<th scope="row">Manage Password</th>
										<td><a href="<?= base_url("$mylevel/ManagePassword")?>" class="btn btn-warning form-control">Reset Password</a></td>
									</tr>
								</tbody>
                                </form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

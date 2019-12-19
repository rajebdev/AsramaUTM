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
		<div class="col-md-6 col-xl-4">
			<div class="card mb-3 widget-content bg-midnight-bloom">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Manage Gedung & Kamar</div>
						<div class="widget-subheading">Optimasi Data Gedung</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<a class="btn btn-info" href="<?= base_url("$mylevel/data_gedung")?>">
									GO
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card mb-3 widget-content bg-arielle-smile">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Manage Penghuni Asrama</div>
						<div class="widget-subheading">Optimasi data Penghuni</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white"><span>
								<a class="btn btn-warning" href="<?= base_url("$mylevel/data_penghuni")?>">
									GO
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card mb-3 widget-content bg-grow-early">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Manage Pendaftaran</div>
						<div class="widget-subheading">Optimasi Data Pendaftaran</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<button class="btn btn-info">
									GO
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-6">
			<div class="mb-3 card">
				<div class="card-header-tab card-header">
					<div class="card-header-title">
						<i class="header-icon lnr-home icon-gradient bg-tempting-azure"> </i>
						Selamat Datang di SISPENGMA
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="tab-eg-55">
						<div class="widget-chart p-3">
							<div class="widget-description mt-0 text-warning">
								<span class="text-muted opacity-8 pl-1">
									<img class="img-fluid" src="<?= base_url("assets/assets/images/Asrama.png")?>">
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">User Profile</h5>
							<table class="mb-0 table table-striped">
								<tbody>
									<tr>
										<th scope="row">username</th>
										<td><?= $user['username']?></td>
									</tr>
									<tr>
										<th scope="row">User Level</th>
										<td><?= $user['ket_level']?></td>
									</tr>
									<tr>
										<th scope="row">Bergabung sejak</th>
										<td><?= explode(" ",$user['user_created'])[0] ?></td>
									</tr>
									<tr>
										<th scope="row">Manage Password</th>
										<td><button class="btn btn-info">Manage</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">Tambah Musahil</h5>
							<p>Pendaftaran & manajemen data Musahil asrama</p>
							<center>
							<a class="btn btn-primary" href="<?= base_url("$mylevel/data_musahil")?>" style="width:100%;"><i class="fa fa-plus"></i> MUSAHIL</a>
							</center>                   
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

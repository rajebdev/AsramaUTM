<div class="app-main__inner">
	<div class="app-page-title">
		<div class="row">
			<div class="col-md-6 col-xl-4">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Informasi Pendaftaran</div>
							<div class="widget-subheading">Detail informasi</div>
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
			<div class="col-md-6 col-xl-4">
				<div class="card mb-3 widget-chart card-hover-shadow-2x">
					<div class="icon-wrapper border-light rounded">
						<div class="icon-wrapper-bg bg-light"></div>
						<i class="lnr-apartment icon-gradient bg-sunny-morning"></i>
					</div>
					<div class="widget-numbers" style="font-size: 1.5rem;">Gedung <?= $gedung != '' ? '<div class="mb-2 mr-2 badge badge-pill badge-success">' . $gedung . '</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">-</div>' ?>- Ruang <?= $kamar != '' ? '<div class="mb-2 mr-2 badge badge-pill badge-success">' . $kamar . '</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">-</div>' ?></div>
					<div class="widget-subheading">Alamat Kamar</div>
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
										<img class="img-fluid" src="<?= base_url("assets/assets/images/sispengma.jpeg") ?>">
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
								<h5 class="card-title"><?= $user['nama'] ?></h5>
								<table class="mb-0 table table-striped">
									<tbody>
										<tr>
											<th scope="row">Username</th>
											<td><?= $user['username'] ?></td>
										</tr>
										<tr>
											<th scope="row">User Level</th>
											<td><?= $user['ket_level'] ?></td>
										</tr>
										<tr>
											<th scope="row">Bergabung sejak</th>
											<td><?= $user['user_created'] ?></td>
										</tr>
										<tr>
											<th scope="row">Manage Password</th>
											<td><a href="<?= base_url(($level == 1337 ? 'admin' : ($level == 999 ? 'musahil' : 'user')) . '/password') ?>" class="btn btn-info">Manage</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="main-card mb-3 card">
							<div class="card-body">
								<h5 class="card-title">Upload Berkas</h5>
								<p>Lengkapi persyaratan pendaftaran</p>
								<center>
									<a href="<?= base_url('user/berkas/view') ?>" class="btn btn-primary" style="width:100%;"><i class="fa fa-upload"></i> Berkas Pendaftaran</a>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
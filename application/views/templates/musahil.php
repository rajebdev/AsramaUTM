<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Ini adalah <?= $title ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xl-4">
			<div class="card mb-3 widget-content bg-midnight-bloom">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Get Token Pendaftaran</div>
						<div class="widget-subheading">Token Pendaftaran</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/token') ?>" class="btn btn-info">
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
						<div class="widget-heading">Manage Kamar Pendaftar</div>
						<div class="widget-subheading">Pilih kamar pendaftar</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white"><span>
								<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/penghuni/kamar') ?>" class="btn btn-warning">
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
						<div class="widget-heading">Validasi Berkas</div>
						<div class="widget-subheading">Validasi Data Pendaftaran</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/token') ?>" class="btn btn-info">
									GO
								</a>
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
							<h5 class="card-title">Get Token Daftar</h5>
							<p>Pendaftaran penghuni baru.</p>
							<center>
								<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/token') ?>" class="btn btn-primary" style="width:100%;"><i class="fa fa-plus"></i> Token Daftar</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
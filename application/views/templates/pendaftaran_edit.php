<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $main['menu'] ?>
					<div class="page-title-subheading">Pastikan Data Pendaftaran Sudah Benar ya kak.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Photo Profile</h5>
					<center>
						<img src="<?= base_url('assets/') ?>assets/images/user/<?= $user['photo'] ?>" alt="<?= $user['nama'] ?>" style="height: 400px;">
					</center>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<table class="mb-0 table table-striped">
								<h3 class="text-center mb-4 text-uppercase">Data Pendaftaran</h3>
								<tbody>
									<?php foreach ($user_view as $key => $value) { ?>
										<tr>
											<th scope="row" class="text-uppercase" style="width: 50%;"><?= $key ?></th>
											<td class="word-wrap"><input type="text" value="<?= $value ?>"></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
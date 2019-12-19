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
<?= $this->session->flashdata('message'); ?>

<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-home icon-gradient bg-tempting-azure">
					</i>
				</div>
				<div><?= $menu ?>
					<div class="page-title-subheading">Data Gedung di Asrama Universitas Trunojoyo Madura
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($level == "1337"){ ?>
	<div class="row">
		<div class="col-md-4 col-xl-4">
			<div class="card mb-2 widget-content bg-midnight-bloom">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Tambah Data Gedung</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<button class="btn btn-info" data-toggle="modal" data-target="#insertGedung">
									GO
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="main-card mb-3 card">
		<div class="card-body">
			<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table style="width: 100%;"
							class="display table table-hover table-striped table-bordered dataTable dtr-inline">
							<thead>
								<tr role="row">
									<th>Kode Gedung</th>
									<th>Keterangan</th>
									<th>Jumlah Kamar</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($gedung as $g){ ?>
								<tr role="row" class="odd">
									<td><?= $g->id_gedung?></td>
									<td><?= $g->keterangan?></td>
									<td><?= $g->Penghuni?></td>
									<td>
										<a href="<?= base_url("$mylevel/daftar_kamar/".$g->id_gedung)?>" class="btn btn-success">
											Daftar Kamar
										</a>
										
										<?php if ($level == "1337"){ ?>
										<a href="<?= base_url("$mylevel/manage_gedung/".$g->id_gedung)?>" class="btn btn-info">
											Manage Gedung
										</a>
										<?php } ?>
									</td>
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


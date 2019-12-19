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
					<div class="page-title-subheading">Data Peghuni Kamar <?= $id_kamar?> di Asrama Universitas Trunojoyo Madura
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
						<table style="width: 100%;" id="example"
							class="table table-hover table-striped table-bordered dataTable dtr-inline">
							<thead>
								<tr role="row">
									<th>Nim</th>
									<th>Nama</th>
									<th>Prodi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($penghuni as $p){ ?>
								<tr role="row" class="odd">
									<td><?= $p->nim?></td>
									<td><?= $p->nama?></td>
									<td><?= $p->ket_jurusan?></td>
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


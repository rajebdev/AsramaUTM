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
					<div class="page-title-subheading">Data Penghuni di Asrama Universitas Trunojoyo Madura
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xl-4">
			<div class="card mb-3 widget-content bg-grow-early">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Masukan Penghuni Baru</div>
						<div class="widget-subheading">Pemilihan kamar Penghuni Baru</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white"><span>
								<button class="btn btn-warning" onclick="window.location.href='<?= base_url('$mylevel/insert_penghuni')?>'">
									GO
								</button>
							</span>
						</div>
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
					<table style="width: 100%;"
							class="display table table-hover table-striped table-bordered dataTable dtr-inline">
							<thead>
								<tr role="row">
									<th>Nim</th>
									<th>Nama</th>
									<th>Prodi</th>
									<th>kamar</th>
									<th>Bukti Pendaftaran</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($penghuni as $p){ ?>
								<tr role="row" class="odd">
									<td><?= $p->nim?></td>
									<td><?= $p->nama?></td>
									<td><?= $p->ket_jurusan?></td>
									<td><?= $p->kamar?></td>
									<td><a href="<?= base_url("$mylevel/cetak_bukti/".$p->nim)?>" target="_blank">Cetak Bukti</a></td>
									<td>
										<a class="btn btn-info" href="<?= base_url("$mylevel/manage_penghuni/$p->nim")?>"
										>
											Manage Penghuni
										</a>
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


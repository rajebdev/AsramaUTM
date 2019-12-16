
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div>Tambahkan Fakultas
					<div class="page-title-subheading">Form Penambah
					</div>
				</div>
			</div>
		</div>
	</div>
	<form class="user" method="post" action="<?= base_url(); ?>/admin/t_musahil">
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="nim_musahil" id="nim_musahil" placeholder="Nim Musahil" type="text" class="form-control">
					<small class="text-danger pl-3"></small>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="username" id="username" placeholder="username" type="text" class="form-control">
					<small class="text-danger pl-3"></small>
				</div>
			</div>
        </div>
        <div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="nama" id="nama" placeholder="Nama" type="text" class="form-control">
					<small class="text-danger pl-3"></small>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg" >Tambahkan</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
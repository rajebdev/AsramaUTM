<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div>Edit Musahil
					<div class="page-title-subheading">Form Edit
					</div>
				</div>
			</div>
		</div>
	</div>
	<form class="user" method="post" action="<?= base_url('admin/e_musahil/');echo $id?>">
	<?php $nama = $this->db->get_where('tbl_musahil',['nim_musahil'=>$id])->row()->nama;?>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="nim_musahil" id="nim_musahil" placeholder="Nim Musahil" type="hidden" class="form-control" value='<?php echo $id;?>'>
					<small class="text-danger pl-3"></small>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="nama" id="nama" placeholder="Nama Musahil" type="text" class="form-control" value='<?php echo $nama;?>'>
					<small class="text-danger pl-3"></small>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg">Edit</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
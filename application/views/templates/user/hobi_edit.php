<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-car icon-gradient bg-mean-fruit">
					</i>
				</div>
				<div><?= $title ?>
					<div class="page-title-subheading">Mangganti Hobi
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= $this->session->flashdata('message'); ?>
	<form class="user" method="post">
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group"><input name="ket_hobi" id="ket_hobi" type="text" class="form-control" value="<?= isset($hobi['ket_hobi']) ? $hobi['ket_hobi'] : set_value('ket_hobi'); ?>">
					<?= form_error('ket_hobi', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
			</div>
		</div>
		<div class="divider row"></div>
		<div class="d-flex align-items-center">
			<div class="ml-0">
				<button class="btn btn-primary btn-lg">Ubah Hobi</button>
			</div>
		</div>
		<div class="divider row"></div>
	</form>
</div>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Data <?= $main['menu']; ?>
                    <div class="page-title-subheading">Ubah Data Orangtua
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="text-center mb-4 text-uppercase">Edit Data Orang Tua</h3>
                        <form method="post" action="<?= base_url('user/orangtua/edit') ?>">
                            <div class="position-relative form-group">
                                <label for="nama_ayah" class="">Nama Ayah</label>
                                <input name="nama_ayah" id="nama_ayah" type="text" class="form-control" value="<?= $table['nama_ayah'] ?>" autofocus>
                                <?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="pekerjaan_ayah" class="">Pekerjaan Ayah</label>
                                <input name="pekerjaan_ayah" id="pekerjaan_ayah" type="text" class="form-control" value="<?= $table['pekerjaan_ayah'] ?>" autofocus>
                                <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="pekerjaan_ayah" class="">No Telp Ayah</label>
                                <input name="telp_ayah" id="telp_ayah" type="text" class="form-control" value="<?= $table['telp_ayah'] ?>" autofocus>
                                <?= form_error('telp_ayah', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="nama_ibu" class="">Nama Ibu</label>
                                <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" value="<?= $table['nama_ibu'] ?>" autofocus>
                                <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="pekerjaan_ibu" class="">Pekerjaan Ibu</label>
                                <input name="pekerjaan_ibu" id="pekerjaan_ibu" type="text" class="form-control" value="<?= $table['pekerjaan_ibu'] ?>" autofocus>
                                <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="pekerjaan_ibu" class="">No Telp Ibu</label>
                                <input name="telp_ibu" id="telp_ibu" type="text" class="form-control" value="<?= $table['telp_ibu'] ?>" autofocus>
                                <?= form_error('telp_ibu', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <center>
                                    <button class="btn btn-primary" style="width:100%;"><i class="fa fa-save"></i> Simpan Perubahan</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
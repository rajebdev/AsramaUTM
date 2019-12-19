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
                    <div class="page-title-subheading">Insert Data Penghuni
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
                        <?= $this->session->flashdata('message'); ?>
                        <h2 class="card-title">Masukan Penghuni Baru</h2>
                        <div class="form-group">
                            <?php echo form_open_multipart("$mylevel/add_penghuni")?>
                            <label>Nim & Nama Mahasiswa</label>
                            <div class="form-group d-flex">
                            <input readonly required type="text" class="form-control" name="nim" id="nim" placeholder="Nim Mahasiswa" style="width:40%">
                            <input readonly required type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mahasiswa" style="width:40%">
                            <div class="btn btn-success" id="btn-mhs" style="width:20%" data-toggle="modal" data-target="#pilihMahasiswa">Pilih Mahasiswa</div>
                            </div>
                            <label>Kamar</label>
                            <span class="d-flex"><input readonly type="text" class="form-control" name="kamar" placeholder="Kode Kamar" id="placeforkamar" style="width:80%">
                            <br><div class="btn btn-warning" id="btn-kmr" style="width:20%" data-toggle="modal" data-target="#pilihKamar">Pilih Kamar</div></span><br>
                            <input type="submit" class="btn btn-info btn-lg" style="width:100%">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

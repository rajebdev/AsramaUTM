<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Data <?= $main['menu']; ?>
                    <div class="page-title-subheading">Hobiku Kebiasaanku
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
                        <table class="mb-0 table table-striped">
                            <h3 class="text-center mb-4 text-uppercase">Data Orang Tua</h3>
                            <?= $this->session->flashdata('message'); ?>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">Nama Ayah</th>
                                    <td class="word-wrap"><?= isset($table['nama_ayah']) ? $table['nama_ayah'] : 'Belum Ada Data' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">pekerjaan ayah</th>
                                    <td class="word-wrap"><?= isset($table['pekerjaan_ayah']) ? $table['pekerjaan_ayah'] : 'Belum Ada Data' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">no telp ayah</th>
                                    <td class="word-wrap"><?= isset($table['telp_ayah']) ? $table['telp_ayah'] : 'Belum Ada Data' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">nama ibu</th>
                                    <td class="word-wrap"><?= isset($table['nama_ibu']) ? $table['nama_ibu'] : 'Belum Ada Data' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">pekerjaan ibu</th>
                                    <td class="word-wrap"><?= isset($table['pekerjaan_ibu']) ? $table['pekerjaan_ibu'] : 'Belum Ada Data' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase" style="width: 50%;">no telp ibu</th>
                                    <td class="word-wrap"><?= isset($table['telp_ibu']) ? $table['telp_ibu'] : 'Belum Ada Data' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Orang Tua</h5>
                        <p>Perubahan pada data orang tua</p>
                        <center>
                            <a href="<?= base_url(); ?>user/orangtua/edit" class="btn btn-primary" style="width:100%;"><i class="fa fa-edit"></i> Edit Data Orang Tua</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
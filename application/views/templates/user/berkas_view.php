<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div style="text-transform: uppercase; ">Data <?= $main['menu']; ?>
                    <div class="page-title-subheading">Upload Berkas Yang di Minta
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
                            <h3 class="text-center mb-4 text-uppercase">Data Berkas File</h3>
                            <?= $this->session->flashdata('message'); ?>
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Berkas</th>
                                    <th>Sudah Validasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-uppercase">PASS FOTO</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/pass_foto/' . $table['pass_foto']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['pass_foto'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/pass_foto/' . $table['pass_foto']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/pass_foto/' . base64_encode($table['pass_foto'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">Surat Pernyataan</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/surat_pernyataan/' . $table['surat_pernyataan']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['surat_pernyataan'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/surat_pernyataan/' . $table['surat_pernyataan']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/surat_pernyataan/' . base64_encode($table['surat_pernyataan'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">KTP PENDAFTAR</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/ktp_penghuni/' . $table['ktp_penghuni']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['ktp_penghuni'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/ktp_penghuni/' . $table['ktp_penghuni']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/ktp_penghuni/' . base64_encode($table['ktp_penghuni'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">ktp ayah</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/ktp_ayah/' . $table['ktp_ayah']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['ktp_ayah'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/ktp_ayah/' . $table['ktp_ayah']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/ktp_ayah/' . base64_encode($table['ktp_ayah'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">KTP IBU</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/ktp_ibu/' . $table['ktp_ibu']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['ktp_ibu'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/ktp_ibu/' . $table['ktp_ibu']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/ktp_ibu/' . base64_encode($table['ktp_ibu'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">kartu keluarga</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/kartu_keluarga/' . $table['kartu_keluarga']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['kartu_keluarga'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/kartu_keluarga/' . $table['kartu_keluarga']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/kartu_keluarga/' . base64_encode($table['kartu_keluarga'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">kwitansi daftar</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/kwitansi_daftar/' . $table['kwitansi_daftar']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['kwitansi_daftar'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/kwitansi_daftar/' . $table['kwitansi_daftar']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/kwitansi_daftar/' . base64_encode($table['kwitansi_daftar'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">kwitansi karakter</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/kwitansi_karakter/' . $table['kwitansi_karakter']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['kwitansi_karakter'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>';
                                        s ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/kwitansi_karakter/' . $table['kwitansi_karakter']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/kwitansi_karakter/' . base64_encode($table['kwitansi_karakter'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-uppercase">surat dokter</th>
                                    <td class="word-wrap"><img width="100px" src="<?= base_url('upload/surat_dokter/' . $table['surat_dokter']) ?>" alt="gambar berkas" /></td>
                                    <td><?= $table_validasi['surat_dokter'] == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum</div>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('upload/surat_dokter/' . $table['surat_dokter']) ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('user/berkas/edit/surat_dokter/' . base64_encode($table['surat_dokter'])) ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
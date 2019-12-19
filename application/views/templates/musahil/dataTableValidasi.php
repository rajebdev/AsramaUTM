<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Data <?= $main['menu']; ?>
                    <div class="page-title-subheading">Validasi Berkas Pendaftar
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <?php
                                    $nama_column = array(
                                        'no',
                                        'NIM',
                                        'Keterangan validasi',
                                        'action'
                                    );
                                    foreach ($nama_column as $value) : ?>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                <?php $i = 1;
                                foreach ($table as $key => $row) : ?>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1"><?= $i ?></td>
                                        <td><?= $row->nim ?></td>
                                        <?php
                                        $valid = $row->pass_foto && $row->surat_pernyataan && $row->ktp_penghuni && $row->ktp_ayah && $row->ktp_ibu && $row->kartu_keluarga && $row->kwitansi_daftar && $row->kwitansi_karakter && $row->surat_dokter;
                                        ?>
                                        <td><?= $valid == 1 ? '<div class="mb-2 mr-2 badge badge-pill badge-success">Sudah Validasi</div>' : '<div class="mb-2 mr-2 badge badge-pill badge-danger">Belum Validasi</div>'; ?></td>
                                        <td class="text-center">
                                            <!-- <a class="btn btn-primary text-white"><i class="fas fa-eye"></i></a> -->
                                            <?php if ($valid != 1) { ?>
                                                <a href="<?= base_url(($level == 1337 ? 'Admin/' : 'musahil/') . 'validasi_berkas/validasi/' . base64_encode($row->nim)) ?>" class="btn btn-success" type="button" onclick="return confirm('Yakin menvalidasi ?')"><i class="fas fa-check"></i></a>
                                            <?php } else { ?>
                                                <a href=" <?= base_url(($level == 1337 ? 'Admin/' : 'musahil/') . 'validasi_berkas/unvalidasi/' . base64_encode($row->nim)) ?>" class="btn btn-danger" onclick="return confirm('Yakin Unvalidasi ?')"><i class="fas fa-times"></i> </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <div class="row">
                <div class="col-md-6 col-xl-8">
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Tambah Hobi</div>
                                <div class="widget-subheading">Hobiku</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span>
                                        <a class="btn btn-info">Tambah</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <?php
                                    $nama_column = array(
                                        'No',
                                        'Hobi',
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
                                        <td><?= $row->ket_hobi ?></td>
                                        <td class="text-center">
                                            <!-- <a class="btn btn-primary text-white"><i class="fas fa-eye"></i></a> -->
                                            <a href="<?= base_url('user/hobi/edit/') . $row->id ?>" class="btn btn-success" type="button"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('user/hobi/delete/') . $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
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
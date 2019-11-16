<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Data <?= $main['menu']; ?>
                    <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.
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
                                <div class="widget-heading">Get Token Pendaftaran</div>
                                <div class="widget-subheading">Token Pendaftaran</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newToken">Add</button>
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
                                        'no',
                                        'NIM',
                                        'token enkripsi',
                                        'action'
                                    );
                                    foreach ($nama_column as $value) : ?>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $value ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($table as $key => $row) : ?>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1"><?= $i ?></td>
                                        <td><?= $row->nim ?></td>
                                        <td><?= $row->password ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary text-white"><i class="fas fa-eye"></i></a>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
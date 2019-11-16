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
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending">NO.</th>
                                    <?php foreach ($table[0] as $key => $value) : ?>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending"><?= $key ?></th>
                                    <?php endforeach; ?>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.2px; text-transform: uppercase;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($table as $key => $row) : ?>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1"><?= $i ?></td>
                                        <?php foreach ($row as $key => $value) : ?>
                                            <td><?= $value ?></td>
                                        <?php endforeach; ?>
                                        <td>
                                            <a class="btn btn-primary text-white">View</a>
                                            <button class="btn btn-success">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
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
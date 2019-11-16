<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <h4 class="mb-0">
            <span class="d-block">Selamat Datang.</span></h4>
        <div class="divider row"></div>
        <div>

            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url(); ?>">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group"><input name="username" id="username" placeholder="Username here..." type="text" class="form-control" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control">
                            <?= form_error('password', '<small class=" text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="divider row"></div>
                <div class="d-flex align-items-center">
                    <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                        <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
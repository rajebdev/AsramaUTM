<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div><?= $menu ?>
                    <div class="page-title-subheading">Selamat Datang Di Sistem Informasi Penghuni Asrama Universitas Trunojoyo Madura
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
						<h3 class="text text-dark text-lg"><b><?= $berita['judul_berita']?></b></h3>        
						<p><?= $berita['isi']?></p>
                    </div>
                </div>
            </div>
            <?php if($prev != "null"){ ?>
            <a class="btn btn-info float-left" href="<?= base_url("Asrama/detail_berita/".$prev['id_berita'])?>">Prev Post</a>
            <?php } ?>
            <?php if($next != "null"){ ?>
            <a class="btn btn-success float-right" href="<?= base_url("Asrama/detail_berita/".$next['id_berita'])?>">Next Post</a>
            <?php } ?>
        </div>
        
    </div>
</div>


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
                        <br><a href="<?= base_url("Asrama/detail_berita/999")?>">Lihat Informasi Pendaftaran Disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php foreach($berita as $ber){ ?>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
					<div class="col-sm-12">
						<a href="<?= base_url("Asrama/detail_berita/".$ber->id_berita)?>"><h3 class="text text-dark text-lg"><b><?= $ber->judul_berita?></b></h3></a>
						<em class="text text-dark text-lg bg-light p-1"> <?= $ber->post_date ?> </em>

						<p><?= substr($ber->isi,0, 400)."......." ?><a href="<?= base_url("Asrama/detail_berita/".$ber->id_berita)?>">read_more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
</div>


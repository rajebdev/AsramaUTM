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
                    <div class="page-title-subheading">Post Data
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-4 col-xl-4">
			<div class="card mb-2 widget-content bg-midnight-bloom">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Tambah Berita</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<a class="btn btn-info" href="<?= base_url("$mylevel/tambah_berita")?>">
									GO
                                </a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <br>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                    <?= $this->session->flashdata('message'); ?>
                    <table style="width: 100%;"
                            class="display table table-hover table-striped table-bordered dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>
                                    Judul Berita
                                </th>
                                <th> 
                                    Post Date
                                </th>
                                <th>
                                    Option
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($berita as $ber){ ?>
                            <tr>
                                <td>
                                    <?= substr($ber->judul_berita,0,65)?>......
                                </td>
                                <td>
                                    <?= $ber->post_date?>
                                </td>
                                <td class="d-block">
                                    <center>
                                    <a href="<?= base_url("Asrama/detail_berita/$ber->id_berita")?>"
                                     class = "btn btn-warning mb-2 text text-white" style="width : 100%" >View</a><br>
                                    <a href="<?= base_url("$mylevel/post_detail/$ber->id_berita")?>"
                                     class = "btn btn-info mb-2 text text-white" style="width : 100%" >Update</a><br>
                                    <button onclick = "del('<?= $ber->id_berita?>')" 
                                    class = "btn btn-danger text text-white" style="width : 100%" >Delete</button><br>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function del(id) {
    var con = confirm("Delete This Data");
    if(con == true){
        location.href="<?= base_url("$mylevel/delete_berita/")?>"+id;
    }else{
        console.log("close");
    }
}
</script>


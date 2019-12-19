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
						<div class="widget-heading">Upload File</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<button class="btn btn-info" data-toggle="modal" data-target="#uploadFile">
									GO
                                </button>
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
                                    Nama File
                                </th>
                                <th colspan="2"> 
                                    Link
                                </th>
                                <th>
                                    Option
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($file as $f){ ?>
                            <tr>
                                <td>
                                    <?= explode("_f_",$f)[0]?>
                                </td>
                                <td>
                                    <a target="_blank" href="<?= base_url("uploaded/news_image/".$f)?>"><?= base_url("uploaded/news_image/".$f)?></a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" onclick="copy('<?= $f?>')">copy</button>
                                </td>
                                <td class="d-block">
                                    <center>
                                    <button onclick = "del('<?= $f?>')" 
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
        location.href="<?= base_url("$mylevel/delete_file/")?>"+id;
    }else{
        console.log("close");
    }
}
</script>
<script>
function copy(url) {
  var document = url;
  document.execCommand("copy");
}
</script>


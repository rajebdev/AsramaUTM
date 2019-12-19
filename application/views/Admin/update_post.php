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
                    <div class="page-title-subheading">Update Post
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
                        <?php echo form_open_multipart("$mylevel/update_post/".$berita['id_berita'])?>
                        <div class="form-group">
                            <label>
                                judul Post
                            </label>
                            <input type="text" name="judul" class="form-control" required value="<?= $berita['judul_berita']?>">
                        </div>
                        <div class="form-group">
                            <label>
                                Content
                            </label>
                            <textarea id = "editor" name="isi" class="form-control" required><?= $berita['isi']?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-info">
                                Update Berita
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	initSample();
</script>
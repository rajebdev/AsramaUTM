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
                    <div class="page-title-subheading">Manage Data Gedung <?= $gedung['id_gedung']?>
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
                        <h2 class="card-title">Manage Data Gedung</h2>
                        <div class="form-group">
                            <?php echo form_open_multipart("$mylevel/update_gedung/".$gedung['id_gedung'])?>
                            <label>Kode Gedung</label>
                            <select required class="form-control" name="kode_gedung">
                            <option value="<?= $gedung['id_gedung']?>"><?= $gedung['id_gedung']?></option>
                            <?php foreach (range('A', 'Z') as $char){
                            if(in_array($char, $list_ged) == false){ ?>
                            <option value="<?= $char?>"><?= $char?></option>
                            <?php } 
                            } ?>
                        </select>
                            <br>
                            <label>Gedung Untuk</label>
                            <select required class="form-control" name="sex_gedung">
                                <option value="1" <?php if ($gedung['jenis_kelamin']=="1"){echo "selected";}?>>Laki - laki</option>
                                <option value="2" <?php if ($gedung['jenis_kelamin']=="2"){echo "selected";}?>>Perempuan</option>
                            </select><br>
                            <label>Jumlah Kamar</label>
                            <input readonly class="form-control" value="<?= $gedung['Penghuni']?>" ><br>
                            <button type="submit" class="btn btn-info mb-2" style="width:100%">Update</button>
                            </form>
                            <button
                                <?php if($gedung['Penghuni']!= "0"){echo "disabled";} ?>
                             type="button" class="btn btn-danger" style="width:100%" onclick="del('<?= $gedung['id_gedung']?>')"><i class="fa fa-trash" > </i> Delete</button>
                        </div>
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
        location.href="<?= base_url("$mylevel/delete_gedung/")?>"+id;
    }else{
        console.log("close");
    }
}
</script>

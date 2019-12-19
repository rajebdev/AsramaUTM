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
                    <div class="page-title-subheading">Hubungi Kami (Asrama Universitas Trunojoyo Madura)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="card col-sm-6 mr-1 card-body">
                        <h5 class="text text-muted">Asrama Universitas Trunojoyo Madura</h5><hr>
                        <p>Penyedia layanan tempat tinggal bagi para mahasiswa Universitas Truojoyo madura
                        tidak Hanya seabagai penyedia layanan tempat tinggal, para penghuni akan dibimbing 
                        untuk menjadi insan dengan ahlak mulia yang bisa berprestasi,</p>
                    </div>
                    <div class="card col-sm-5 card-body">
                     <h5 class="text text-muted">Hubungi Kami</h5><hr>
                     <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-phone mr-2"></i> 031 892719</li>
                        <li class="list-group-item"><i class="fa fa-envelope mr-2"></i> AsramaTrunojoyo@trunojoyo.ac.id</li>
                        <li class="list-group-item"><i class="fa fa-globe mr-2"></i> SISPENGMA-UTM.trunojoyo.ac.id</li>
                     </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="card col-sm-11 card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.9847943107593!2d112.7208920147742!3d-7.127754794852995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd803dd886bbff5%3A0x9777ca139b28195d!2sUniversitas%20Trunojoyo%20Madura!5e0!3m2!1sid!2sid!4v1576382447999!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/main.js"></script> -->

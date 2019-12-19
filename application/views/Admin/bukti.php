<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="<?= base_url('assets/') ?>main.css" rel="stylesheet">
	<title>Bukti Pembayaran <?= $nim ?></title>
</head>

<body>
<center>
<div class="col-9">
	<div class="main-card mb-3 mr-5 ml-5 mt-5 card">
		<div class="card-body">
			<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
				<center>
					<h4><b>BUKTI PENDAFTARAN ASRAMA MAHASISWA TRUNOJOYO MADURA</b></h4>
                    <em>Dicetak pada <?= date("d-m-Y")?></em>
                    <hr>
				</center>
				
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-bordered">
								<tr>
									<th>Nama</th>
									<td><?= $bukti['nama']?></th>
								<tr>
								<tr>
									<th>NIM</th>
									<td><?= $bukti['nim']?></th>
								<tr>
								<tr>
									<th>Jurusan</th>
									<td><?= $bukti['ket_jurusan']?></th>
								<tr>
								<tr>
									<th>Tanggal Mendaftar</th>
									<td><?= explode(" ",$bukti['tanggal_mendaftar'])[0]?></th>
								<tr>
								<tr>
									<th>Kamar</th>
									<td><?= $bukti['kamar'] ?></th>
								<tr>
							</table>
						</div>
						<div class="col-sm-12 float-right">
							
                                <b>QR CODE</b><br>
								<a rel='nofollow' href='http://www.qrcode-generator.de' border='0'
									style='cursor:default'></a><img
									src='https://chart.googleapis.com/chart?cht=qr&chl=<?= $bukti['nim']."-".$bukti['kamar']."-".$bukti['tanggal_mendaftar']?>&chs=180x180&choe=UTF-8&chld=L|2'
									alt=''>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </center>
</body>

</html>

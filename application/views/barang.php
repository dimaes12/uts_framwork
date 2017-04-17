<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
		function show_confirm(act,gotoid)
		{
			if(act=="update")
				var r=confirm("Apakah Anda Yakin Ingin Edit Data?");
			else
				var r=confirm("Apakah Anda Yakin Ingin Delete Data?");
			if (r==true)
			{
				window.location="<?php echo site_url()?>index.php/kategori/"+act+"/"+gotoid;
			}
		}
	</script>
	</head>
	<body>
		<div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#">Title</a>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										<li class="active"><a href="<?php echo site_url('kategori') ?>">Data kategori</a></li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li><a href="#">Separated link</a></li>
											</ul>
										</li>
									</ul>
								</div><!-- /.navbar-collapse -->
						</div>
						</nav>

					</div>	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>Daftar Barang</h1>	
						<div class="table-responsive">
							<table class="table table-hover" id="example">
								<thead>
									<tr>
										<th>Nama Kategori</th>
										<th>Nama Barang</th>
										<th>Kode</th>
										<th>Tanggal Beli</th>
										<th>Foto</th>
										<th>Action</th>
										<th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($barang_list as $key) { ?>
									<tr>
										<td><?php echo $key->namaKategori ?></td>
										<td><?php echo $key->namaBarang ?></td>
										<td><?php echo $key->kode ?></td>
										<td><?php echo $key->tanggal_beli ?></td>
										<td><img width="50" src=<?=base_url("assets/uploads")."/".$key->foto?>></td>
										<td>
									    	<a href="<?php echo site_url('barang/update/').$key->id ?>" onClick="show_confirm('update')" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>Update</a> 
									    	<a href="<?php echo site_url('barang/delete/').$key->id.'/'.$key->foto ?>" onClick="show_confirm('hapus')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							<a href="<?php echo site_url('barang/create/').$key->fk_kategori ?>" type="button" class="btn btn-primary">Tambah Data</a>
						</div>
					</div>



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"> </script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>

 		<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		});
		</script>
	</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<base href="<?=base_url();?>"/>
<script type="text/javascript">	
	var BASE_URL = '<?=base_url();?>';
</script>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

<title>Generador de Firmas</title>

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link href="assets/css/style.css" rel="stylesheet">
<style>
body {
background: url(data:image/jpg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCADoAAEDAREAAhEBAxEB/8QAFwABAQEBAAAAAAAAAAAAAAAAAAUJAv/EACgQAAECAwUJAQAAAAAAAAAAAAABE2GR0QdRorLwAgMREhRXYnGV0//EABgBAQEBAQEAAAAAAAAAAAAAAAADAgEE/8QAHxEBAAEEAgMBAAAAAAAAAAAAAAECEVGRErETYnHR/9oADAMBAAIRAxEAPwDdA9DzgA5eMxt204nTSvrLM+yVnXzN3+JTx+06hPyesblBYgkkqVSWGIJJKmeVOexZYS7KRa41Y6WmI6kFOVOe1pnZ1xqGlxhLsoFZlfLFUCyxBJJUCywl2U5f7qfxrjVjpWZhhJ3jNe1lVn1NTAqNLGQFDkSIHYAAAAAAAAAAAAAP/9k=) repeat-x top center;
}

.logo{
background:url(data:image/png;base64,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);
background-repeat:no-repeat;
background-position:center top;
min-height:130px;
}

h1 {
	color: #0078B9;
}
h2 {
	color: #00B5DE;
}
h3 {
	color: #0078B9;
}

h4 {
	color: #76787A;
}
canvas  {
	background: #fff;
}
</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

<div class="row">
<div class="col-md-3 ">


<div class="logo" onclick="location.href='<?=base_url();?><?=$this->uri->segment(1, '');?>';"></div>

<div style="padding-left:15px; padding-top:50px;">


	
	<?php if(isset($misrelevamientos)):?>
	<?php if($misrelevamientos->num_rows() > 0):?>
	<h4><span class="glyphicon glyphicon-tasks"></span> Suministros Asociados</h4>
	
	
		<?php foreach($misrelevamientos->result() as $r): ?>
		<div style="list-style:none; padding-left:20px; padding-top:5px; padding-bottom:10px; border-bottom:1px solid #ccc;"><span class="glyphicon glyphicon-fire text-danger"></span> <span class="text-warning">Nro: <?=$r->nro_suministro?></span><br /> <a href="suministro/edit/<?=$r->id?>"><span class="glyphicon glyphicon-edit"></span> Actualizar suministro</a> <br />  <a href="suministro/descargar_pdf/<?=$r->id?>"><img src="assets/images/pdf.png" border="0" /> Descargar Comprobante </a></div>
		<?php endforeach; ?>
	
	<?php endif; ?>
	<?php endif; ?>

</div>



</div>

	
<div class="col-md-9" style="padding-top:10px; position:relative">

<?php
	if($isLogged) {
?>
	<div class="btn-group" style="position:absolute; right:30px; top:10px;">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	   <span class="glyphicon glyphicon-user"></span> 
	 Mí cuenta <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	    <!--<li class="divider"></li>-->
	    <li><a href="<?php echo base_url(); ?>auth/logout"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
	  </ul>
	</div>
<?php
	}
?>
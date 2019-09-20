<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

  <title><?=$configuracion['nombre']?></title>



  <meta charset="utf-8">

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">



  <link rel="stylesheet" href="<?php echo _CSS?>fuentes.css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo _CSS?>jquery-ui-1.9.2.custom.min.css">

  <link rel="stylesheet" href="<?php echo _CSS?>bootstrap.min.css">  


  <link rel="stylesheet" href="<?php echo _CSS?>template.css">

  


  <link rel="stylesheet" href="<?php echo _JS?>plugins/magnific/magnific-popup.css">

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link href="assets/css/style.css" rel="stylesheet">


  <script>

  	var URL = "<?php echo _URL_ADMIN?>";

  </script>	

  <style>

    .mainbar,

    #boton-login,

    .account-bg

    { background:<?=$configuracion['color1']?> !important ;   }



    .mainbar .mainbar-nav > li > a:hover, .mainbar .mainbar-nav > li > a:focus,

    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus,

    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus,

    .dropdown-menu > li > a:hover,

    .dropdown-menu > li > a:focus,

    .nav-pills > li.active > a,

    .nav-pills > li.active > a:hover,

    .nav-pills > li.active > a:focus,

    .pagination > .active > a, .pagination > .active > span, 

    .pagination > .active > a:hover, .pagination > .active > span:hover, 

    .pagination > .active > a:focus, .pagination > .active > span:focus,

    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus,

    .accordion .panel.open .accordion-toggle,

    .mainbar .mainbar-nav > li > a:hover,

	.mainbar .mainbar-nav > li > a:focus,

	.mainbar .mainbar-nav > .open > a,

	.mainbar .mainbar-nav > .open > a:hover,

	.mainbar .mainbar-nav > .open > a:focus{ 

          background:<?=$configuracion['color2']?> !important; 

      background-color:<?=$configuracion['color2']?> !important;

    border-color:<?=$configuracion['color2']?> !important;  }

    a,

    .table-striped a,

    .linklistado,   

    .elink i,

    .mainbar-nav .dropdown-menu i,

    .sorting:before, .sorting_asc:before, .sorting_desc:before, .sorting_asc_disabled:before, .sorting_desc_disabled:before, .paginate_enabled_previous:before, .paginate_disabled_previous:before, .paginate_enabled_next:before, .paginate_disabled_next:before{color: <?=$configuracion['color1']?>}

    .content-header-title{ color:<?=$configuracion['color1']?>  !important;   }

    #boton-login,

    .dataTables_wrapper .dataTables_filter input{ border: 1px solid <?=$configuracion['color1']?>  !important }

    #boton-login:hover

    { background:<?=$configuracion['color2']?> !important  }

    .elink:hover i{color: <?=$configuracion['color2']?>}

    .carrito-atributos li::before,

    .dropdown-menu > li > a:hover,

    .dropdown-menu > li > a:focus,

    .nav-pills > li.active > a,

    .nav-pills > li.active > a:hover,

    .nav-pills > li.active > a:focus,

    .nav-tabs > li.active > a,

    .nav-tabs > li.active > a:hover,

    .nav-tabs > li.active > a:focus,

    .nav-tabs .open > a,

    .nav-tabs .open > a:hover,

    .nav-tabs .open > a:focus

    { background:<?=$configuracion['color1']?> !important }

        .account-bg{background:  #02b3e3      !important;

    background-size: cover !important;}

  </style>

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

  <![endif]-->

</head>


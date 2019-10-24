<?php $baseUrl = 'http://localhost:8888/lion/metrogas/firmas/metrogas_firmas/' ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <base href="<?= $baseUrl ?>" />
    <script type="text/javascript">
        var BASE_URL = '<?= $baseUrl ?>';
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

        .logo {
            background: url(data:image/png;base64,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);
            background-repeat: no-repeat;
            background-position: center top;
            min-height: 130px;
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

        canvas {
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


                <div class="logo" onclick="location.href='<?= $baseUrl ?>';"></div>

                <div style="padding-left:15px; padding-top:50px;">




                </div>



            </div>


            <div class="col-md-9" style="padding-top:10px; position:relative">

                <meta charset="UTF-8">

                <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/admin/bootstrap.min.css">

                <style>
                    html,
                    body {

                        margin: 0;

                        padding: 0;

                        width: 100%;

                        height: 100%;

                    }

                    .fixed {

                        max-width: 980px;

                        margin: auto;

                        padding-left: 30px;

                        padding-right: 30px;

                    }



                    .mt-form {

                        width: 100%;

                        display: block;

                        border: 1px solid #b5b5b5;

                        font-size: 16px;

                        height: 40px;

                    }



                    .finp {

                        width: 100%;

                    }



                    .flbl {

                        margin-top: 20px;

                        font-weight: normal;

                        display: block;

                    }
                </style>

                <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

                <div id="MODAL_SENDED" style="display:none;position: fixed;left:0;right:0;top:0;bottom:0;z-index: 999;">

                    <table style="height: 100%;width:100%;background-color:rgba(0,0,0,.6);">
                        <tr>
                            <td style="text-align: center;">

                                <img src="<?= $baseUrl ?>/assets/form/modal2.png" style="max-width: 100%;"
                                    onclick="document.getElementById('MODAL_SENDED').style.display = 'none';" />

                            </td>
                        </tr>
                    </table>

                </div>

                <table style="height: 100%;width:100%;">
                    <tr>
                        <td>

                            <div
                                style="height: 150px;background-image: url(<?= $baseUrl ?>/assets/form/sombra.png);background-position: 0 100%;background-repeat:repeat-x;">

                                <div class="fixed">



                                    <img src="<?= $baseUrl ?>/assets/form/toptext.png"
                                        style="margin-top:50px;float:right;" />

                                    <img src="<?= $baseUrl ?>/assets/form/logo.png"
                                        style="margin-top:20px;" />



                                </div>

                            </div>

                            <div>

                                <div class="fixed">

                                    <img src="<?= $baseUrl ?>/assets/form/f1.png"
                                        style="margin-top:20px;max-width: 100%;" />

                                    <div class="row" style="margin-top:20px;">

                                        <div class="col-sm-6">

                                            <div style="background-color: #00b3e3;text-align: center;">

                                                <img src="<?= $baseUrl ?>/assets/form/f2.png"
                                                    style="padding:10px;max-width: 100%;" />

                                            </div>

                                            <form style="margin-top:30px;">

                                                <div class="row">

                                                    <div class="col-sm-6">

                                                        <label class="flbl">

                                                            Nombre<br />

                                                            <input type="text" name="name" class="finp" tabindex="1" />

                                                        </label>

                                                        <label class="flbl">

                                                            Puesto<br />

                                                            <input type="text" name="cargo" class="finp" tabindex="3" />

                                                        </label>

                                                        <label class="flbl">

                                                            Teléfono<br />

                                                            <input type="phone" name="phone" class="finp"
                                                                tabindex="5" />

                                                        </label>

                                                        <label class="flbl">

                                                            Código postal<br />

                                                            <input type="text" name="zip" class="finp"
                                                                 tabindex="7" value="C1267AAB" />

                                                        </label>

                                                        <label class="flbl">

                                                            Ciudad<br />

                                                            <input type="text" name="city" class="finp"
                                                             tabindex="8" value="CABA" />

                                                        </label>

                                                    </div>

                                                    <div class="col-sm-6">

                                                        <label class="flbl">

                                                            Apellido<br />

                                                            <input type="text" name="name2" class="finp" tabindex="2" />

                                                        </label>

                                                        <label class="flbl">

                                                            Mail<br />

                                                            <input type="email" name="email" class="finp"
                                                                tabindex="4" />

                                                        </label>

                                                        <label class="flbl">

                                                            Dirección<br />

                                                            <input type="text" name="address" class="finp"
                                                                tabindex="6" />

                                                        </label>

                                                        <label class="flbl">

                                                            País<br />

                                                            <select 
                                                                style="width: 100%;display: block;" name="country">
                                                                <option selected="selected" value="Argentina">Argentina</option>
                                                                

                                                            </select>

                                                        </label>

                                                    </div>



                                                </div>

                                            </form>

                                        </div>

                                        <div class="col-sm-6">

                                            <div style="background-color: #00b3e3;text-align: center;">

                                                <img src="<?= $baseUrl ?>/assets/form/f3.png"
                                                    style="padding:10px;max-width: 100%;" />

                                            </div>

                                            <div style="margin-top:30px;text-align: center;">

                                                <!--<div class="demo">

						<div style="display: inline-block;text-align: left;font-size:12px;line-height: 12px;width:250px">

							<img src="<?= $baseUrl ?>/assets/form/mlogo.png" style="margin-bottom: 10px;" /><br/>

							<span style="font-size:16px;text-transform: uppercase;margin:0;padding:0;text-align:left;"><span class="text-name"></span> <span class="text-name2"></span></span><br/>

							<span style="text-transform: uppercase;margin:0;padding:0;text-align:left;line-height:normal;" class="text-cargo"></span>

							<br/><br/>

							<p>

								<span style="margin:0;padding:0;text-align:left;" class="text-address"></span><br/>

								<span style="margin:0;padding:0;text-align:left;"><span class="texr-zip">C1267AAB</span> - <span class="texr-city">CABA</span>, Argentina</span><br/>

								<span style="margin:0;padding:0;text-align:left;" class="text-phone"></span><br/>

								<span style="margin:0;padding:0;text-align:left;margin-bottom:12px;"><a href="" class="text-email" style="color:#005fba;"></a></span><br/>

								<span style="margin:0;padding:0;text-align:left;font-size:12px;"><a href="http://www.metrogas.com.ar" style="color:#005fba;">metrogas.com.ar</a></span>

							</p>

							<br/>

							<a href="https://es-la.facebook.com/MetroGAS/" style="border:none"><img src="<?= $baseUrl ?>/assets/form/sc1.png"/></a><a href="https://www.youtube.com/channel/UCWcNyJp_uEBFZBE8q2LzQ5w" style="border:none"><img src="<?= $baseUrl ?>/assets/form/sc2.png"/></a><a href="https://www.linkedin.com/company/metrogas" style="border:none"><img src="<?= $baseUrl ?>/assets/form/sc3.png"/></a>

						</div>

					</div>-->

                                                <!--NEW-->
                                                <div class="Wrp" style="display:inline-block;">
                                                    <div class="demo">
                                                        <table width="250" border="0" align="left" cellpadding="0"
                                                            cellspacing="0" bgcolor="#FFFFFF" style="padding:30px 0px;">
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-size:0px;line-height:0px;margin:0;padding:0px;padding-bottom:10px;">
                                                                    <img src="<?= $baseUrl ?>/assets/form/mlogo.png"
                                                                        width="160" height="59">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:18px;text-transform:uppercase;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <span class="text-name"></span> <span
                                                                        class="text-name2"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;text-transform:uppercase;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <span class="text-cargo"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" height="20"
                                                                    style="font-size:0px;line-height:0px;margin:0px;padding:0px;">
                                                                    &nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <span class="text-address"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <span class="text-zip">C1267AAB</span> <span class="text-guion">-</span> <span class="text-city">CABA</span><span class="texr-comma">,</span> <span class="text-country">Argentina</span>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <span class="text-phone"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <a href="" class="text-email"
                                                                        style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;color:#005fba;text-decoration:none;"></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
                                                                    <a href="http://www.metrogas.com.ar" target="_blank"
                                                                        style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;color:#005fba;text-decoration:none;">metrogas.com.ar</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" height="30"
                                                                    style="font-size:0px;line-height:0px;margin:0px;padding:0px;">
                                                                    &nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" align="left" valign="top"
                                                                    style="font-family:Arial, Helvetica, sans-serif;font-size:0px;line-height:0px;text-transform:uppercase;margin:0;padding:0px;">
                                                                    <a href="https://www.instagram.com/metrogas_ar/"
                                                                        target="_blank" style="border:none;margin-right: 12px;">
                                                                        <img src="<?= $baseUrl ?>/assets/form/instagram_icon.png"
                                                                            width="22" height="22" border="0" style="opacity: .6;">
                                                                    </a>    
                                                                    <a href="https://es-la.facebook.com/MetroGAS/"
                                                                        target="_blank" style="border:none">
                                                                        <img src="<?= $baseUrl ?>/assets/form/sc1.png"
                                                                            width="24" height="20" border="0">
                                                                    </a>
                                                                    <a href="https://www.youtube.com/channel/UCWcNyJp_uEBFZBE8q2LzQ5w"
                                                                        target="_blank" style="border:none">
                                                                        <img src="<?= $baseUrl ?>/assets/form/sc2.png"
                                                                            width="38" height="20" border="0">
                                                                    </a>

                                                                    <div class="content-linkedin">
                                                                        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: es_ES</script>
                                                                        <script type="IN/FollowCompany" data-id="27571"></script>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                        </table>
                                                    </div>
                                                </div>
                                                <!--NEW-->

                                                <br /><img tabindex="9"
                                                    src="<?= $baseUrl ?>/assets/form/btncp.png"
                                                    class="copybtn" style="margin-top:40px;cursor:pointer;" />

                                                <div contenteditable="true" id="demo"
                                                    style="width: 1px;height: 1px; opacity: 0;"></div>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="height: 100%;vertical-align: bottom;">

                            <div
                                style="height: 511px;background-image: url(<?= $baseUrl ?>/assets/form/ftbgB.jpg);background-position: 0% 0;width:50%;margin-left:50%;">
                            </div>

                            <div
                                style="margin-top:-511px;height: 511px;background-image: url(<?= $baseUrl ?>/assets/form/ftbgA.jpg);background-position: 100% 0;width:50%;">
                            </div>

                            <div
                                style="height: 125px;background-image: url(<?= $baseUrl ?>/assets/form/ft3.png);">

                            </div>

                            <div style="height: 125px;margin-top:-125px;">

                                <div class="fixed"
                                    style="height: 125px;padding:0;background-image: url(<?= $baseUrl ?>/assets/form/ft1.png);">

                                    <img src="<?= $baseUrl ?>/assets/form/ft2.png" style="float:right;" />

                                </div>

                            </div>

                            <div
                                style="height: 125px;margin-top:-125px;width:50%;background-image: url(<?= $baseUrl ?>/assets/form/ft1.png);">
                            </div>

                        </td>
                    </tr>
                </table>

                <script type="text/javascript">
                    $('.finp').on('keyup change', function () {

                        var obj = $('.text-' + $(this).attr('name'));
                        var val = this.value

                        if ($(this).attr('name') == 'email') {
                            obj.attr('href', 'mailto:' + val);
                        }

                        if ($(this).attr('name') == 'zip') {
                            if(val == ''){
                                $('.text-guion').hide();
                            }else{
                                $('.text-guion').show();  
                            }
                        }


                        if ($(this).attr('name') == 'city') {
                            if(val == ''){
                                $('.texr-comma').hide();
                            }else{
                                $('.texr-comma').show();  
                            }
                        }

                        obj.text(val);

                    });



                    $('form').submit(function () {

                        try {

                            $('.copybtn').click();

                        } catch (e) {};

                        return false;

                    });



                    $('.copybtn').click(function () {

                        document.getElementById("demo").innerHTML = $('.demo').html();

                        document.getElementById("demo").focus();

                        document.execCommand('SelectAll');

                        document.execCommand('Copy', false, null);

                        $('#MODAL_SENDED').show();

                    })
                </script>

            </div>
        </div>

        <div style="padding-top:120px;"></div>

        <!-- Modal -->
        <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="modalAlertsLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAlertsLabel"> <i class="fa fa-exclamation-triangle"></i>
                            ATENCION!</h4>
                    </div>
                    <div class="modal-body">
                        ...

                    </div>
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->


        <!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>


        <script type="text/javascript">
            /*  function malert(message,redirect) {
    if(typeof redirect != 'undefined') {
      $('.modal-footer').html('<a href="'+redirect+'" type="button" class="btn btn-primary" >Aceptar</a>');
    } else {
      $('.modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>');
    }
      $('.modal-body').html(message);
      $('#modalAlert').modal('show');
  }
*/

            $(document).ready(function () {


                $(".showpassword").each(function (index, input) {
                    var $input = $(input);
                    $('<label class="showpasswordlabel"/>').append(
                        $("<input type='checkbox' class='showpasswordcheckbox' />").click(
                        function () {
                            var change = $(this).is(":checked") ? "text" : "password";
                            var rep = $("<input type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                            $input.remove();
                            $input = rep;
                        })
                    ).append($("<span/>").text("Mostrar contraseña")).insertAfter($input);
                });

                $('#btnLogin').click(function () {

                    $.ajax({
                        type: "POST",
                        url: BASE_URL + 'ajax/checkLogin',
                        dataType: "json",
                        data: {
                            dni: $('#f_dni').val(),
                            password: $('#f_password').val()
                        }
                    }).done(function (data) {
                        //alert(data.status);
                        console.log(data.message);
                        if (data.status) {
                            $(location).attr('href', BASE_URL + 'signatures');
                        } else {
                            $('.messageResult').html(data.message);
                            $('.errorLogin').show();
                        }
                    });
                });
            });
        </script>
        <script>
            function doCanvas(nombreApellido, puesto, direccion, codigoPostal, provincia, telefono, email) {

                var canvas = document.getElementById("myCanvas");
                var content = canvas.getContext("2d");
                var fontDefault = "13px Century Gothic";
                var fontDefaultTelEmail = "13px Century Gothic";
                var colorDefault = "black";
                var img = new Image();
                var marginTextDefault = 25;
                var distancia = 115;
                //var distancia = 120; // para logo_25_anos.png
                var distanciaConst = 15;

                content.scale(1, 1);
                content.clearRect(0, 0, canvas.width, canvas.height);
                img.src = '<?= $baseUrl ?>/assets/img/metrogas-logo.png';
                //img.src = '<?= $baseUrl ?>/assets/img/logo_25_anos.png';
                img.onload = function () {
                    content.drawImage(img, 25, 10);
                    //content.drawImage(img, -7, 10);// para logo_25_anos.pmg
                }

                if (nombreApellido.length > 0) {
                    content.font = "16px Century Gothic";
                    content.fillStyle = colorDefault;
                    content.fillText(nombreApellido.toUpperCase(), marginTextDefault, distancia);
                }

                if (puesto.length > 0) {
                    content.font = "12px Century Gothic";
                    content.fillText(puesto.toUpperCase(), marginTextDefault, distancia = distancia + distanciaConst);
                }

                distancia = distancia + 8;
                content.font = fontDefault;

                if (direccion.length > 0) {
                    content.fillText(direccion, marginTextDefault, distancia = distancia + distanciaConst);
                }

                if (codigoPostal.length > 0) {
                    content.fillText(codigoPostal, marginTextDefault, distancia = distancia + distanciaConst);
                }

                if (provincia.length > 0) {
                    provincia = provincia + ', Argentina';
                    content.fillText(provincia, marginTextDefault, distancia = distancia + distanciaConst);
                }

                content.font = fontDefaultTelEmail;

                if (telefono.length > 0) {
                    content.fillText(telefono, marginTextDefault, distancia = distancia + distanciaConst);
                }

                if (email.length > 0) {
                    content.fillStyle = 'blue';
                    content.fillText(email, marginTextDefault, distancia = distancia + distanciaConst);
                }

                return true;

            }

            function downloadCanvas(link, canvasId, filename) {
                link.href = document.getElementById(canvasId).toDataURL();
                link.download = filename;
            }

            document.getElementById('downloadImg').addEventListener('click', function () {
                downloadCanvas(this, 'myCanvas', 'firma.jpg');
            }, false);

            $('#btnDoBase64').click(function () {
                $('#base64Content').show().val(document.getElementById('myCanvas').toDataURL());
            });

            function downloadHtml(name, type) {
                $('#generateHtml').hide();
                $('#downloadHtml').show();
                var a = document.getElementById("downloadHtml");
                var canvas = document.getElementById('myCanvas').toDataURL();
                var aFileParts = ['<html><body><img src="' + canvas + '"/></body></html>'];
                var file = new Blob(aFileParts, {
                    type: type
                });
                a.href = URL.createObjectURL(file);
                a.download = name;
            }

            function validateLength(text) {
                if (text.length < 1) {
                    return true;
                }
                return false;
            }

            function validateEmailMgas(email) {
                var regex = /([a-zA-Z0-9_.+-])+\@metrogas\.com\.ar/;
                if (regex.test(email)) {
                    return false;
                }
                return true;
            }



            $('#generateImg').click(function () {
                //var form = $('#formInfoCanvas');
                var nombreApellido = $('#f_nombreApellido').val();
                var puesto = $('#f_puesto').val();
                var direccion = $('#f_direccion').val();
                var codigoPostal = $('#f_codigoPostal').val();
                var provincia = $('#f_provincia').val();
                var telefono = $('#f_telefono').val();
                var email = $('#f_email').val();
                var errorMessageLarge = 'Por favor complete este campo.';
                var errorMessageEmailMgas = 'Por favor ingrese un email con el dominio metrogas.com.ar.';


                $('.contenedorBtnDownload').hide();
                $('#base64Content').hide().val();
                $('#generateHtml').show();
                $('#downloadHtml').hide();

                $('.messageError').remove();
                process = false;

                if (validateLength(nombreApellido)) {
                    $('#f_nombreApellido').focus().after('<p class="text-danger messageError">' +
                        errorMessageLarge + '</p>');
                    return false;
                } else if (validateLength(puesto)) {
                    $('#f_puesto').focus().after('<p class="text-danger messageError">' + errorMessageLarge +
                        '</p>');
                    return false;
                } else if (validateLength(direccion)) {
                    $('#f_direccion').focus().after('<p class="text-danger messageError">' + errorMessageLarge +
                        '</p>');
                    return false;
                } else if (validateLength(codigoPostal)) {
                    $('#f_codigoPostal').focus().after('<p class="text-danger messageError">' +
                        errorMessageLarge + '</p>');
                    return false;
                } else if (validateLength(provincia)) {
                    $('#f_provincia').focus().after('<p class="text-danger messageError">' + errorMessageLarge +
                        '</p>');
                    return false;
                } else if (validateLength(telefono)) {
                    $('#f_telefono').focus().after('<p class="text-danger messageError">' + errorMessageLarge +
                        '</p>');
                    return false;
                } else if (validateLength(email)) {
                    $('#f_email').focus().after('<p class="text-danger messageError">' + errorMessageLarge +
                        '</p>');
                    return false;
                } else if (validateEmailMgas(email)) {
                    $('#f_email').focus().after('<p class="text-danger messageError">' + errorMessageEmailMgas +
                        '</p>');
                    return false;
                } else {
                    if (doCanvas(nombreApellido, puesto, direccion, codigoPostal, provincia, telefono, email)) {
                        $('.contenedorBtnDownload').show();
                    }
                }
            });
        </script>
</body>

</html>
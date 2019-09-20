<meta charset="UTF-8">

<link rel="stylesheet" href="<?=_URL;?>assets/css/admin/bootstrap.min.css">    

<style>

	html,body{

		margin:0;

		padding:0;

		width: 100%;

		height: 100%;

	}

	.fixed{

		max-width:980px;

		margin:auto;

		padding-left:30px;

		padding-right:30px;

	}



	.mt-form{

		width:100%;

		display: block;

		border:1px solid #b5b5b5;

		font-size:16px;

		height: 40px;

	}



	.finp{

		width: 100%;

	}



	.flbl{

		margin-top:20px;

		font-weight: normal;

		display: block;

	}

</style>

<script type="text/javascript" src="<?=_URL;?>assets/form/jquery-2.2.3.min.js"></script>

<div id="MODAL_SENDED" style="display:none;position: fixed;left:0;right:0;top:0;bottom:0;z-index: 999;">

	<table style="height: 100%;width:100%;background-color:rgba(0,0,0,.6);"><tr><td style="text-align: center;">

		<img src="<?=_URL;?>assets/form/modal2.png" style="max-width: 100%;" onclick="document.getElementById('MODAL_SENDED').style.display = 'none';"/>

	</td></tr></table>

</div>

<table style="height: 100%;width:100%;"><tr><td>

<div style="height: 150px;background-image: url(<?=_URL;?>assets/form/sombra.png);background-position: 0 100%;background-repeat:repeat-x;">

	<div class="fixed">



		<img src="<?=_URL;?>assets/form/toptext.png" style="margin-top:50px;float:right;" />

		<img src="<?=_URL;?>assets/form/logo.png" style="margin-top:20px;" />



	</div>

</div>

<div>

	<div class="fixed">

		<img src="<?=_URL;?>assets/form/f1.png" style="margin-top:20px;max-width: 100%;" />

		<div class="row" style="margin-top:20px;">

			<div class="col-sm-6">

				<div style="background-color: #00b3e3;text-align: center;">

					<img src="<?=_URL;?>assets/form/f2.png" style="padding:10px;max-width: 100%;" />

				</div>

				<form style="margin-top:30px;">

					<div class="row">

						<div class="col-sm-6">

							<label class="flbl">

								Nombre<br/>

								<input type="text" name="name" class="finp" tabindex="1"/>

							</label>

							<label class="flbl">

								Puesto<br/>

								<input type="text" name="cargo" class="finp" tabindex="3"/>

							</label>

							<label class="flbl">

								Teléfono<br/>

								<input type="phone" name="phone" class="finp" tabindex="5"/>

							</label>

							<label class="flbl">

								Código postal<br/>

								<input type="text" name="zip" class="finp" disabled="disabled" tabindex="7" value="C1267AAB"/>

							</label>

							<label class="flbl">

								Ciudad<br/>

								<input type="text" name="city" class="finp" disabled="disabled" tabindex="8" value="CABA"/>

							</label>

						</div>

						<div class="col-sm-6">

							<label class="flbl">

								Apellido<br/>

								<input type="text" name="name2" class="finp" tabindex="2"/>

							</label>

							<label class="flbl">

								Mail<br/>

								<input type="email" name="email" class="finp" tabindex="4"/>

							</label>

							<label class="flbl">

								Dirección<br/>

								<input type="text" name="address" class="finp" tabindex="6"/>

							</label>

							<label class="flbl">

								País<br/>

								<select disabled="disabled" style="width: 100%;display: block;">

									<option selected="selected">Argentina</option>

								</select>

							</label>

						</div>



					</div>

				</form>

			</div>

			<div class="col-sm-6">

				<div style="background-color: #00b3e3;text-align: center;">

					<img src="<?=_URL;?>assets/form/f3.png" style="padding:10px;max-width: 100%;" />

				</div>

				<div style="margin-top:30px;text-align: center;">

					<!--<div class="demo">

						<div style="display: inline-block;text-align: left;font-size:12px;line-height: 12px;width:250px">

							<img src="<?=_URL;?>assets/form/mlogo.png" style="margin-bottom: 10px;" /><br/>

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

							<a href="https://es-la.facebook.com/MetroGAS/" style="border:none"><img src="<?=_URL;?>assets/form/sc1.png"/></a><a href="https://www.youtube.com/channel/UCWcNyJp_uEBFZBE8q2LzQ5w" style="border:none"><img src="<?=_URL;?>assets/form/sc2.png"/></a><a href="https://www.linkedin.com/company/metrogas" style="border:none"><img src="<?=_URL;?>assets/form/sc3.png"/></a>

						</div>

					</div>-->
					
					<!--NEW-->
					<div class="Wrp" style="display:inline-block;">
						<div class="demo">
							<table width="250" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="padding:30px 0px;">
								<tr>
									<td width="100%" align="left" valign="top" style="font-size:0px;line-height:0px;margin:0;padding:0px;padding-bottom:10px;">
										<img src="<?=_URL;?>assets/form/mlogo.png" width="160" height="59">
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:16px;line-height:18px;text-transform:uppercase;margin:0;padding:0px;padding-bottom:3px;">
										<span class="text-name"></span> <span class="text-name2"></span>
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;text-transform:uppercase;margin:0;padding:0px;padding-bottom:3px;">
										<span class="text-cargo"></span>
									</td>
								</tr>
								<tr>
									<td width="100%" height="20" style="font-size:0px;line-height:0px;margin:0px;padding:0px;">&nbsp;</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
										<span class="text-address"></span>
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
										<span class="texr-zip">C1267AAB</span> - <span class="texr-city">CABA</span>, Argentina</span>
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
										<span class="text-phone"></span>
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
										<a href="" class="text-email" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;color:#005fba;text-decoration:none;"></a>
									</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;padding-bottom:3px;">
										<a href="http://www.metrogas.com.ar" target="_blank" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:13px;margin:0;padding:0px;color:#005fba;text-decoration:none;">metrogas.com.ar</a>
									</td>
								</tr>
								<tr>
									<td width="100%" height="30" style="font-size:0px;line-height:0px;margin:0px;padding:0px;">&nbsp;</td>
								</tr>
								<tr>
									<td width="100%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:0px;line-height:0px;text-transform:uppercase;margin:0;padding:0px;">
										<a href="https://es-la.facebook.com/MetroGAS/" target="_blank" style="border:none">
											<img src="<?=_URL;?>assets/form/sc1.png" width="24" height="20" border="0" >
										</a>
										<a href="https://www.youtube.com/channel/UCWcNyJp_uEBFZBE8q2LzQ5w" target="_blank" style="border:none">
											<img src="<?=_URL;?>assets/form/sc2.png" width="38" height="20" border="0">
										</a>
										<a href="https://www.linkedin.com/company/metrogas" target="_blank" style="border:none">
											<img src="<?=_URL;?>assets/form/sc3.png" width="73" height="20">
										</a>
									</td>
								</tr>
								
								
							</table>
						</div>
					</div>	
					<!--NEW-->

					<br/><img tabindex="9" src="<?=_URL;?>assets/form/btncp.png" class="copybtn" style="margin-top:40px;cursor:pointer;" />

					<div contenteditable="true" id="demo" style="width: 1px;height: 1px; opacity: 0;"></div>

				</div>



			</div>

		</div>

	</div>

</div>

</td></tr>

<tr><td style="height: 100%;vertical-align: bottom;">

<div style="height: 511px;background-image: url(<?=_URL;?>assets/form/ftbgB.jpg);background-position: 0% 0;width:50%;margin-left:50%;"></div>

<div style="margin-top:-511px;height: 511px;background-image: url(<?=_URL;?>assets/form/ftbgA.jpg);background-position: 100% 0;width:50%;"></div>

<div style="height: 125px;background-image: url(<?=_URL;?>assets/form/ft3.png);">

</div>

<div style="height: 125px;margin-top:-125px;">

	<div class="fixed" style="height: 125px;padding:0;background-image: url(<?=_URL;?>assets/form/ft1.png);">

		<img src="<?=_URL;?>assets/form/ft2.png" style="float:right;" />

	</div>

</div>

<div style="height: 125px;margin-top:-125px;width:50%;background-image: url(<?=_URL;?>assets/form/ft1.png);"></div>

</td></tr></table>

<script type="text/javascript">

	

	$('.finp').on('keyup change',function(){

		var obj = $('.text-'+$(this).attr('name'));
		var val = this.value

		if($(this).attr('name')  ==  'email'){
			obj.attr('href','mailto:' + val);
		}

		obj.text(val);
	});



	$('form').submit(function(){

		try{

			$('.copybtn').click();

		}catch(e){};

		return false;

	});



	$('.copybtn').click(function(){

		document.getElementById("demo").innerHTML = $('.demo').html();

		document.getElementById("demo").focus();

        document.execCommand('SelectAll');

		document.execCommand('Copy',false, null);

		$('#MODAL_SENDED').show();

	})

</script>
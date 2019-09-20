<div class="container marginTopDefault">
	<div class="row">
		<div class="col-xs-4">
			<form action="javascript:" id="formInfoCanvas">
				<label for="f_nombreApellido"><span class="camposObligatorios">* </span>Nombre y Apellido:</label>
				<input type="text" class="form-control" name="f_nombreApellido" id="f_nombreApellido" value="<?php echo isset($user->firstName) && isset($user->lastName) ? $user->firstName." ".$user->lastName : ""; ?>">
				<label for="f_puesto"><span class="camposObligatorios">* </span>Puesto:</label>
				<input type="text" name="f_puesto" class="form-control" id="f_puesto" value="<?php echo isset($user->position) ? $user->position : ""; ?>">
				<label for="f_direccion"><span class="camposObligatorios">* </span>Dirección: </label>
				<input type="text" name="f_direccion" class="form-control" id="f_direccion" value="<?php echo isset($user->address) ? $user->address : ""; ?>">
				<label for="f_codigoPostal"><span class="camposObligatorios">* </span>Código Postal:</label>
				<input type="text" name="f_codigoPostal" class="form-control" id="f_codigoPostal" value="<?php echo isset($user->cp) ? $user->cp : ""; ?>">
				<label for="f_provincia"><span class="camposObligatorios">* </span>Provincia:</label>
				<input type="text" name="f_provincia" class="form-control" id="f_provincia" value="<?php echo isset($user->province) ? $user->province : ""; ?>">
                <label for="f_pais">País:</label>
                <input type="text" name="f_pais" class="form-control"  value="Argentina" disabled>
				<label for="f_telefono"><span class="camposObligatorios">* </span>Teléfono:</label>
				<input type="text" name="f_telefono" class="form-control" id="f_telefono" value="<?php echo isset($user->phone) ? $user->phone : ""; ?>">
				<label for="f_email"><span class="camposObligatorios">* </span>Email:</label>
				<input type="text" name="f_email" class="form-control" id="f_email" value="<?php echo isset($user->email) ? $user->email : ""; ?>">				
				<label for="" class="camposObligatoriosComentario">* Campos obligatorios </label>
				<br>
				<button type="submit" class="btn btn-primary btnSubmit" id="generateImg">Generar Imagen</button>
			</form>
		</div>
		<div class="col-xs-8">
			<!--Para logo.png -->
			<canvas id="myCanvas" width="400" height="270"></canvas>
			<!--Para logo_25_anos.png -->
<!--			<canvas id="myCanvas" width="400" height="240"></canvas>-->
			<p class="contenedorBtnDownload" style="display:none;">
				<a id="downloadImg" class="btn btn-primary">Descargar imagen</a>
				<!--<a id="btnDoBase64" class="btn btn-primary">Generar Base64</a>
				<button id="generateHtml" onclick="downloadHtml('firma.html', 'text/html')" class="btn btn-primary">Crear HTML</button>
				<a id="downloadHtml" href="" id="" class="btn btn-primary" style="display:none;">Descargar HTML</a>-->
			</p>
			<textarea name="base64Content" id="base64Content" cols="100" rows="10"style="display:none;"></textarea>
		</div>
	</div>
</div>
<!--MODALES...-->
<div class="modal fade" id="login" >
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Iniciar Sesión</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
				 
					<img src="imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen " title="Logo Oficial">
					<br/><br/>
					<!--contenido de la ventana emergente!-->
                          <div class="form-group" id="loogin" > <!--aqui resolvi con ajax.. NO PUEDE SER CON FORM PORQUE NO ME LO TOMA AJAX-->
                               <div class="form-group">
                               <label class="lbb" for="email">Usuario:</label>
                               <input class="form-control has-feedback" type="email" id="email" name="email" required="required" placeholder="Ingrese su Usuario" />
                               </div>
                               <div class="form-group">
                               <label class="lbb" for="contrasenna">Contraseña:</label>
                               <input class="form-control" type="password" id="contrasenna" name="contrasenna" placeholder="Ingrese su contraseña" required="required"/>
                               </div>
                               <div id="label_muestra" ></div>
                               <br />
                               <input class="btn btn-primary btn-block" style="width:80%;" id="enviar_login" type="submit" value="Iniciar Sesion" />
                               <br/><br/>
                               <label><a href="index_inscripcion.php">Deseas formar parte?</a></label>
                               <br>
                               <label><a href="olvido_clave.php">¿Olvido su contraseña?</a></label>
                            </div>

				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
<!--***********************************
      MODAL PARA info y editar TURNO TRANSPORTISTA
*************************************-->
 <div class="modal fade" id="info_turno" tabindex="-1" role="dialog">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Informarción del turno</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<img src="imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen " title="Logo Oficial">
					<br/>

					<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Editar turno</a></li>    
				  </ul>
					<!--contenido de la ventana emergente!-->
					<div class="tab-content" id="infotur">
					

					
					</div>
					
         
				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	
	 <div class="modal fade" id="registro_turno">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Registrar turno</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<img src="imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen " title="Logo Oficial">
					<br/>

					<!--contenido de la ventana emergente!-->


         <div class="form-group">
					<div class="form-group has-feedback">
						<label for="turno_id">Turno:</label>
						<select class=" form-control" name="turno_id" id="turno_id">
						<option selected disabled>Seleccione un Turno</option>
						<?php foreach ($resultado as $turno): ?>
                             <option value="<?php echo $turno["id_turno"];?>"><?php echo $turno["nombre_tur"];?></option>
                        <?php endforeach; ?>    
                         </select>
					</div>
					<div class="form-group">
						<label for="costo">Mensualidad:</label>
						<input type="number" class="form-control" placeholder="Ingrese una cantidad" name="costo" id="costo">
					</div>
					<div>
						<label for="dia_pag">Dia de pago:</label>
						<input type="text" class="form-control" placeholder="Ingrese un dia" id="dia_pag" name="dia_pag" readonly="readonly">
					</div>
					<input type="hidden" name="id_transporte_turno" id="id_transporte_turno" value="<?php echo $id_transportista; ?>">
                    
                    <div id="muestra" >
                    	
                    </div>
                    <br />
                    <button class="btn btn-primary" id="registrar_turno">Registrar</button>
         
          </div>



				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>




<div class="modal fade" id="visualizar_cli">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Información Cliente</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<img src="imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen" title="Logo Oficial ">
					

					<!--contenido de la ventana emergente!-->

	<div id="volcar_info_cli">
         
          
     </div>



				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>



<div class="modal fade" id="edit_cli">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Información Cliente</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<img src="../imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen" title="Logo Oficial ">
					<br/>

					<!--contenido de la ventana emergente!-->

	<div id="volcar_info_cli_edi">
          
     </div>
     	<br>
     	<button class='btn btn-primary btn-block' id="aplicar">Aplicar Cambios</button>
				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>



<div class="modal fade" id="vi_comentario" >
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Comentario</h4>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<img src="imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen " title="Logo Oficial">
					<br/><br/>
					<!--contenido de la ventana emergente!-->
                  <div id="volcar_comentario">
				  
				  
				  
				  
				  </div>


				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	


 <div class="modal fade" id="confirm_gestion">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Desea Borrar al Cliente?</h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<br/>
					<div id="volcar_id">
						
					</div>
				



				</div>
				<!-- Footer de la ventana -->
			
			</div>
		</div>
	</div>

	

 <div class="modal fade" id="confirm_noticia">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Desea Borrar la Noticia?</h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<br/>
					<div id="volcar_noticia">
						
					</div>
				



				</div>
				<!-- Footer de la ventana -->
			
			</div>
		</div>
	</div>


	<div class="modal fade" id="confirm_ex_turno">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Desea expulsar del Turno?</h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<br/>
					<div id="volcar_">
						
					</div>
				



				</div>
				<!-- Footer de la ventana -->
			
			</div>
		</div>
	</div>



	<div class="modal fade" id="confirm_eli_turno">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Desea eliminar el Turno?</h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<br/>
					<div id="volcar_confir">
						
					</div>
				



				</div>
				<!-- Footer de la ventana -->
			
			</div>
		</div>
	</div>

<!--  -->

<div class="modal fade" id="metodo_pago">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Metodos de Pago</h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
				<input type="hidden" value="<?php echo $datos["id_cliente"]?>" id="idcli" name="idcli">
				<input type="hidden" value="<?php echo $id_transportista?>" id="idtra" name="idtra">
				
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
   <div class='panel panel-default'>
    <div class='panel-heading' role='tab' id='headingOne'>
   <center>
    <h4 class='panel-title'>
    <a role='button' data-toggle='collapse' style='text-decoration:none;' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
            MercadoPago
    </a>
    </h4>
    </center>
   </div>
    <div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
    <div class='panel-body'>
    <div id="vol_ids">
    <center>
		 <i class="fa fa-spinner fa-spin" style="font-size:54px; color:#5bc0de;"></i>
		 <p class="text-info">Conectando..</p>
    </center>

    </div>
    </div>
    </div>
    </div>
  	<center><h4>Ó si ya realizo su pago:</h4></center>
  <div class='panel panel-default'>
    <div class='panel-heading' role='tab' id='headingTwo'>
    	<center>
    	<h4 class='panel-title'>
    	<a class='collapsed' role='button' style='text-decoration:none;' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
          Adjuntar info de pago
    	</a>
    	</h4>
      	</center>
    	</div>
    	<div id='collapseTwo' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
    <div class='panel-body'>
        <form id='pago_manual' action='pagar/registro_pago.php' method='POST' >
        	<div class='form-group'>
            	<label>N de Ref:</label>
                	<input type='text' placeholder='Ingrese el numero de referencia' class='form-control' id='nref' name='nref'>
            	</div>
            <div class='form-group'>
                <label>Tipo de pago:</label>
                <input type='text' placeholder='Ingrese el numero de referencia' class='form-control' id='tpago' name='tpago'>
            </div>
            <div class='form-group'>
                <label>Detalles:</label>
                <input type='text' placeholder='Ingrese detalles del pago' class='form-control' id='detalles' name='detalles'>
            </div>

            <button type='submit' id='hecho' class='btn btn-info btn-block'>Hecho <span class='glyphicon glyphicon-thumbs-up'></span></button>
        </form>
        <div id='result'></div>
       
      </div>
    </div>
  </div>
</div>
				
				
				


				</div>
				<!-- Footer de la ventana -->
			<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

<!--modal para que el cliente pueda ver el pago que hizo-->
<div class="modal fade" id="confirm_eli_turno">
		<div class="modal-dialog-personalizado">
			<div class="modal-content">
				<!-- Header de la ventana -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title">Visualizar </h4></center>
				</div>
				<!-- Contenido de la ventana -->
				<div class="modal-body">
					<br/>
					<div id="volcar_confir">
						
					</div>
				



				</div>
				<!-- Footer de la ventana -->
			
			</div>
		</div>
	</div>
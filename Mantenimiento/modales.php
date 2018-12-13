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
				 
					<img src="../imagenes/Logo_vanxer2.png" class="img-responsive" style="width: 366px;height: 54px" alt="Imagen " title="Logo Oficial">
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
                               <input class="btn btn-primary" id="enviar_login" type="submit" value="Iniciar Sesion" />
                               <br/><br/>
                               <label><a href="../index_inscripcion.php">Deseas formar parte?</a></label>
                               <br>
                               <label><a href="../olvido_clave.php">¿Olvido su contraseña?</a></label>
                            </div>

				</div>
				<!-- Footer de la ventana -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
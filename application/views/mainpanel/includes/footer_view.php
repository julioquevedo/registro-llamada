		<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<hr>
        

        <div class="modal hide fade modal700 myModalAddPregunta" id="myModalAddPregunta">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 id="tituloModal"></h3>
            </div>
            <div class="modal-body" id="">
            	
	           	<div class="wr_tip_enun pasos paso1">
	           		<h4>Tipo de Pregunta</h4>
	           		<a href="#" class="tip_anun" data-id="1">
	           			<img src="./images/unarespuesta.png" alt="">
						<span>Una Respuesta</span>
	           			</a>
	           		<a href="#" class="tip_anun" data-id="2">
	           			<img src="./images/variasrespuestas.png" alt="">
	           			<span>Varias Respuesta</span>
	           			</a>
	           		<a href="#" class="tip_anun" data-id="3">
	           			<img src="./images/abierta.png" alt="">
						<span>Respuesta Abierta</span>
	           			</a>
	           	</div>

	           	<div class="pasos paso2" style="display: none">
	           		<h4>Enunciado de la pregunta</h4>
		           		<textarea name="" id="question_new" cols="30" rows="5" placeholder="Introduce el enunciado de la pregunta" style="width:100%"></textarea>
		           		<input type="checkbox" id="obligatorio" value="1">Marcar pregunta como obligatoria
		           		<br>
		           		<br>
		           		<br>
	           		<h4>Opciones de respuesta</h4>	           		
					<div class="wr_add_opc">
						<div class="opc_agregadas">
							
						</div>
						<div class="opc_por_agregar">
							<input type="text" id="add_opc">
							<input type="button" class="fx_add_opc" value="Añadir">
						</div>
						
					</div>
	           	</div>

	           	<input type="hidden" id="id_tip_enun" value="">
	           	<input type="hidden" id="opciones_concat" value="">	           	
            </div>
            <div class="modal-footer" id="botoneraModal">
                
            </div>
        </div>


		<!-- *********** MODAL PARA EDITAR EL ENUNCIADO ********** -->
        <div class="modal hide fade modal700 myModalEditPregunta" id="myModalEditPregunta">
	        <form action="mainpanel/encuesta/edit/enunciado/" method="post">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">×</button>
	                <h3 id="tituloModal"></h3>
	            </div>
	            <div class="modal-body" id="">

		           	<div class="pasos">
		           		<h4>Enunciado de la pregunta</h4>
			           		<textarea id="question_new" name="question_new" cols="30" rows="5" placeholder="Introduce el enunciado de la pregunta" style="width:100%"></textarea>
			           		<input type="checkbox" id="obligatorio" value="1">Marcar pregunta como obligatoria
			           		<br>
			           		<br>
			           		<br>
		           		<h4>Opciones de respuesta</h4>	           		
						<div class="wr_add_opc">
							<div class="opc_agregadas">
								<div class="wr_opc_insert">
										<input type="text" class="opc_insert" value="qsqs">
										<a class="delete_opc btn btn-danger"><i class="icon-trash icon-white"></i></a>
								</div>							
							</div>
							<div class="opc_por_agregar">
								<input type="text" id="add_opc">
								<input type="button" class="fx_add_opc" value="Añadir">
							</div>
						</div>
		           	</div>
		           	<input type="hidden" id="id_tip_enun" name="id_tip_enun" value="">
		           	<input type="hidden" id="opciones_concat" name="opciones_concat" value="">	           	
		           	<input type="hidden" id="id_enun" name="id_enun" value="">	           			           	
		           	<input type="hidden" id="id_encu" name="id_encu" value="">           	
	            </div>
	            <div class="modal-footer" id="botoneraModal">
	            </div>
	         </form>
        </div>
		<!-- *********** MODAL PARA EDITAR EL ENUNCIADO ********** -->        



        <div class="modal hide fade modal700" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 id="capatituloModal"></h3>
            </div>
            <div class="modal-body" id="cuerpoModal">
            </div>
            <div class="modal-footer" id="botonModal">
                
            </div>
        </div>


		<footer>
                    <p class="pull-left">&copy; <a href="<?php echo base_url()?>" target="_blank">Registro de llamadas</a> <?php echo date('Y') ?>. Todos los derechos reservados</p>
                    <p class="pull-right"></p>
		</footer>

	</div><!--/.fluid-container-->
<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	
             
	<script src="assets/mainpanel/charisma/js/index_ordenar.js"></script>  	
	<script src="assets/mainpanel/charisma/js/jquery-ui-1.8.12.custom.min.js"></script>          
    <script src="assets/mainpanel/charisma/js/jquery-ui-1.8.21.custom.min.js"></script>              
	<!-- transition / effect library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="assets/mainpanel/charisma/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="assets/mainpanel/charisma/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="assets/mainpanel/charisma/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='assets/mainpanel/charisma/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='assets/mainpanel/charisma/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="assets/mainpanel/charisma/js/excanvas.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.min.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.pie.min.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.stack.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="assets/mainpanel/charisma/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="assets/mainpanel/charisma/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="assets/mainpanel/charisma/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="assets/mainpanel/charisma/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="assets/mainpanel/charisma/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="assets/mainpanel/charisma/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="assets/mainpanel/charisma/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="assets/mainpanel/charisma/js/charisma.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.numeric.js"></script>
	<!-- colorpicker -->
	<script type="text/javascript" src="assets/mainpanel/charisma/colorpicker/js/colorpicker.js"></script>        
	<script type="text/javascript" src="assets/mainpanel/charisma/colorpicker/js/layout.js?ver=1.0.2"></script>        	
	<script type="text/javascript" src="assets/mainpanel/charisma/colorpicker/js/eye.js"></script>        	

        
  	<!--  -->
<!--	<script src="assets/mainpanel/charisma/js/jFriendly.jquery.js"></script>-->
	        
        <script src="assets/mainpanel/charisma/js/funciones_ajax.js"></script>    
        <script src="assets/mainpanel/charisma/js/generales_js.js"></script>  		
 

        <script src="assets/mainpanel/charisma/js/jquery.datetimepicker.js"></script>     
        <script>
            $('#f_inicio').datetimepicker({
                    lang: 'de',
                    i18n: {
                        de: {
                            months: [
                                'Enero', 'Febrero', 'Marzo', 'Abril',
                                'Mayo', 'Junio', 'Julio', 'Agosto',
                                'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
                            ],
                            dayOfWeek: [
                                "Dom", "Lun", "Mar", "Mie", "Jue",
                                "Vie", "Sab",
                            ]
                        }
                    },
                    timepicker:false,
                    format:'d-m-Y',
                    formatDate:'d-m-Y'

                    //minDate:'-1970/01/02', // yesterday is minimum date
                    //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
            });
        </script>

        <script>
        $(".numeric").numeric();
        </script>


      
</body>
</html> 
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><h1>Ejemplo Sepomex</h1></center><br><div class="clearfix"></div>
    <center><h4>Ej: 01070, 97345, 06600</h4></center><br><br><div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_postal">C&oacute;digo Postal<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="01070" id="cod_postal" onkeypress="return soloNumeros(event)" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cod_postal" placeholder="p. ej. 01070" type="text">
                          <div id="xcod_postal" class="hide"><h6 class="text-danger">C&oacute;digo postal no encontrado</h6></div>
                        </div>
                          <script type="text/javascript">
                              $('#cod_postal').on('change', function() {
                                comprobar_codigo_postal( this.value, '#xcod_postal' );
                              });
                              $("#cod_postal").keypress(function(e) {if(e.which == 13) {
                                  comprobar_codigo_postal( this.value, '#xcod_postal' );
                              }});
                          </script>
                      </div>
                      <br>
                      <div class="clearfix"></div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_estado">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" style="text-transform: uppercase;" name="cod_estado" id="cod_estado">
                            <option selected="selected"></option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="clearfix"></div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_ciudad">Ciudad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" style="text-transform: uppercase;" name="cod_ciudad" id="cod_ciudad">
                            <option selected="selected"></option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="clearfix"></div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_municipio">Municipio<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" style="text-transform: uppercase;" name="cod_municipio" id="cod_municipio">
                            <option selected="selected"></option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="clearfix"></div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_colonia">Colonia<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" style="text-transform: uppercase;" name="cod_colonia" id="cod_colonia">
                            <option selected="selected"></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript">

            function comprobar_codigo_postal(codigo, div, estado = '#cod_estado', municipio = '#cod_municipio', ciudad = '#cod_ciudad', colonia = '#cod_colonia')
            {
              $(div).hide().removeClass('hide').slideDown('fast');
              $(div).html('<h6 class="fa fa-spinner">Buscando...</h6>');

              var getdetails = function(tipo, municipio, estado, ciudad, codigo){
                return $.getJSON('<?php echo $codigo_postal ?>', { "tipo" : tipo, "municipio" : municipio, "estado" : estado, "ciudad" : ciudad, "codigo" : codigo });
              }
              $(estado).html("<option></option>");
              $(municipio).html("<option></option>");
              $(ciudad).html("<option></option>");
              $(colonia).html("<option></option>");
              var rest_bool = true;

              getdetails('Código Postal', '','','',codigo)
              .done( function( response ) {
              //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
              if( response.success ) {
                var arreglo_estado = new Array();
                var arreglo_municipio = new Array();
                var arreglo_ciudad = new Array();
                var arreglo_colonia = new Array();

                  //recorremos cada usuario
                  $.each(response.data.datos, function( key, value ) {

                    if(!Validar_Array(value['d_asenta'], arreglo_colonia)){
                      arreglo_colonia.push(value['d_asenta']);
                    }

                    if(!Validar_Array(value['d_mnpio'], arreglo_municipio)){
                      arreglo_municipio.push(value['d_mnpio']);
                    }

                    if(!Validar_Array(value['d_estado'], arreglo_estado)){
                      arreglo_estado.push(value['d_estado']);
                    }

                    if(!Validar_Array(value['d_ciudad'], arreglo_ciudad)){
                      arreglo_ciudad.push(value['d_ciudad']);
                    }
                  });

              var temp_string = "";
              $.each(arreglo_estado, function( key, value ) {
                temp_string = temp_string + '<option value="' + (value==""?"No Aplica":value) + '">' + (value==""?"No Aplica":value) + '</option>';
              });
              $(estado).html(temp_string);

              temp_string = "";
              $.each(arreglo_municipio, function( key, value ) {
                temp_string = temp_string + '<option value="' + (value==""?"No Aplica":value) + '">' + (value==""?"No Aplica":value) + '</option>';
              });
              $(municipio).html(temp_string);

              temp_string = "";
              $.each(arreglo_ciudad, function( key, value ) {
                temp_string = temp_string + '<option value="' + (value==""?"No Aplica":value) + '">' + (value==""?"No Aplica":value) + '</option>';
              });
              $(ciudad).html(temp_string);

              temp_string = "";
              $.each(arreglo_colonia, function( key, value ) {
                temp_string = temp_string + '<option value="' + (value==""?"No Aplica":value) + '">' + (value==""?"No Aplica":value) + '</option>';
              });
              $(colonia).html(temp_string);

              $(div).hide().addClass('hide').slideDown('slow');

            } else {
                //response.success no es true
                $(div).hide().removeClass('hide').slideDown('fast');
                $(div).html('<h6 class="text-danger">' + response.data.message + '</h6>');
              }
            })
              .fail(function( jqXHR, textStatus, errorThrown ) {
                $(div).hide().removeClass('hide').slideDown('fast');
                $(div).html('<h6 class="text-danger">Error al buscar Código Postal</h6>');

              });

            }

            function Validar_Array(valor, Arr) {
             var b=false;
             if($.inArray(valor, Arr)==-1){
              b=false;
            }else{
              b=true;
            }
            return b;
          }

          // Solo permite ingresar numeros.
          function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
          }

    </script>
    
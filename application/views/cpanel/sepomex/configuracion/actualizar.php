<section class="content">
    <div class="container-fluid">
        <div class="block-header">
          <?php echo form_open_multipart("configuracion/guardar") ?>
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Actualizar C&oacute;digo Postal
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="dz-message">
                                <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                </div>
                                <h3>Subir archivo aqu&iacute;</h3>
                                <em>Antes de subir el archivo debe recordar guardarlo con la codificaci&oacute;n UTF-8</em>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Datos Adicionales
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="separador">Columnas Separadas Por *</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="separador" id="separador" class="form-control" placeholder="p. ej. ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="linea">Iniciar en la L&iacute;nea *</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="linea" id="linea" class="form-control" placeholder="p. ej. 3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-primary m-t-15 waves-effect" id="atras" name="atras">ATR&Aacute;S</button>
                                        <button type="submit" class="btn btn-success m-t-15 waves-effect" id="guardar" name="guardar">GUARDAR</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
          </form>
        </div>
    </div>
</section>
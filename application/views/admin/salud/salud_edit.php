  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
          <div class="card card-default">
              <div class="card-header">
                  <div class="d-inline-block">
                      <h3 class="card-title"> <i class="fa fa-plus"></i>
                          Agregar Nuevo Registro </h3>
                  </div>
                  <div class="d-inline-block float-right">
                      <a href="<?= base_url('admin/salud'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Lista Registros</a>
                  </div>
              </div>
              <div class="card-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>

                  <?php echo form_open(base_url('admin/salud/edit/'. $salud['salud_id']), 'class="form-horizontal"');  ?>
                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="municipio" class=" control-label">Municipio</label>

                              <div class="">
                                  <input type="text" name="municipio" class="form-control" id="municipio" value="<?= $salud['municipio']; ?>">
                              </div>
                          </div>

                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="comunidad" class=" control-label">Comunidad</label>

                              <div class="">
                                  <input type="text" name="comunidad" class="form-control" id="comunidad" value="<?= $salud['comunidad']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="consejo_comunal" class=" control-label">Consejo Comunal</label>

                              <div class="">
                                  <input type="text" name="consejo_comunal" class="form-control" id="consejo_comunal" value="<?= $salud['consejo_comunal']; ?>">
                              </div>
                          </div>

                      </div>

                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="nombres" class=" control-label">Nombres</label>

                              <div class="">
                                  <input type="text" name="nombres" class="form-control" id="nombres" value="<?= $salud['nombres']; ?>">
                              </div>
                          </div>

                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="apellidos" class=" control-label">Apellidos</label>

                              <div class="">
                                  <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?= $salud['apellidos']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="sexo" class=" control-label">Sexo</label>

                              <select name="sexo" class="form-control">
                                  <option value="">Seleccione</option>
                                  <option value="M" <?= $salud['sexo'] == 'M' ? 'selected' : ''; ?>>Masculino</option>
                                  <option value="F" <?= $salud['sexo'] == 'F' ? 'selected' : ''; ?>>Femenino</option>
                              </select>
                          </div>

                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="cedula" class=" control-label">Cédula</label>

                              <div class="">
                                  <input type="text" name="cedula" class="form-control" id="cedula" value="<?= $salud['cedula']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="telefono" class=" control-label">Teléfono</label>

                              <div class="">
                                  <input type="text" name="telefono" class="form-control" id="telefono" value="<?= $salud['telefono']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="ocupacion" class=" control-label">Ocupación</label>

                              <div class="">
                                  <input type="text" name="ocupacion" class="form-control" id="ocupacion" value="<?= $salud['ocupacion']; ?>">
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="d-inline-block">
                      <h3 class="card-title"> <i class="fa fa-plus"></i>
                          Datos Socioeconómicos </h3>
                  </div>

                  <div class="row">
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="tipo_vivienda" class=" control-label">Tipo Vivienda</label>

                              <select name="tipo_vivienda" class="form-control">
                                  <option value="">Seleccione</option>
                                  <option value="Casa" <?= $salud['tipo_vivienda'] == 'Casa' ? 'selected' : ''; ?>>Casa</option>
                                  <option value="Apartamento" <?= $salud['tipo_vivienda'] == 'Apartamento' ? 'selected' : ''; ?>>Apartamento</option>
                                  <option value="Rancho" <?= $salud['tipo_vivienda'] == 'Rancho' ? 'selected' : ''; ?>>Rancho</option>
                                  <option value="Otro" <?= $salud['tipo_vivienda'] == 'Otro' ? 'selected' : ''; ?>>Otro</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="zona_vivienda" class=" control-label">Zona Vivienda</label>

                              <select name="zona_vivienda" class="form-control">
                                  <option value="">Seleccione</option>
                                  <option value="Rural" <?= $salud['zona_vivienda'] == 'Rural' ? 'selected' : ''; ?>>Rural</option>
                                  <option value="Urbana" <?= $salud['zona_vivienda'] == 'Urbana' ? 'selected' : ''; ?>>Urbana</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="condicion_vivienda" class=" control-label">Condición Vivienda</label>

                              <select name="condicion_vivienda" class="form-control">
                                  <option value="">Seleccione</option>
                                  <option value="Propia" <?= $salud['condicion_vivienda'] == 'Propia' ? 'selected' : ''; ?>>Propia</option>
                                  <option value="Alquilada" <?= $salud['condicion_vivienda'] == 'Alquilada' ? 'selected' : ''; ?>>Alquilada</option>
                                  <option value="Pagada" <?= $salud['condicion_vivienda'] == 'Pagada' ? 'selected' : ''; ?>>Pagada</option>
                                  <option value="Otra" <?= $salud['condicion_vivienda'] == 'Otra' ? 'selected' : ''; ?>>Otra</option>
                              </select>
                          </div>

                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="ingreso_familiar" class=" control-label">Aproximado Ingraso Familiar</label>

                              <div class="">
                                  <input type="text" name="ingreso_familiar" class="form-control" id="ingreso_familiar" value="<?= $salud['ingreso_familiar']; ?>">
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="d-inline-block">
                      <h3 class="card-title"> <i class="fa fa-plus"></i>
                          Datos Salud </h3>
                  </div>

                  <div class="row">
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="enfermedad" class=" control-label">Enfermedad</label>

                              <div class="">
                                  <input type="text" name="enfermedad" class="form-control" id="enfermedad" value="<?= $salud['enfermedad']; ?>">
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="tratamiento" class=" control-label">Tratamiento</label>

                              <div class="">
                                  <input type="text" name="tratamiento" class="form-control" id="tratamiento" value="<?= $salud['tratamiento']; ?>">
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="alergico" class=" control-label">Alérgico</label>

                              <select name="alergico" class="form-control">
                                  <option value="">Seleccione</option>
                                  <option value="SI" <?= $salud['alergico'] == 'SI' ? 'selected' : ''; ?>>SI</option>
                                  <option value="NO" <?= $salud['alergico'] == 'NO' ? 'selected' : ''; ?>>NO</option>
                              </select>
                          </div>

                          <div class="">
                              <input type="text" name="cual_alergia" class="form-control" id="cual_alergia" placeholder="¿Cuál alergia?" value="<?= $salud['cual_alergia']; ?>">
                          </div>
                      </div>

                  </div>

                  <div class="row">
                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="vacuna_covid" class=" control-label">Vacuna COVID-19</label>

                              <div class="">
                                  <input type="text" name="vacuna_covid" class="form-control" id="vacuna_covid" placeholder="" value="<?= $salud['vacuna_covid']; ?>">
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="examen_laboratorio" class=" control-label">Exámen Labotario Sugerido</label>

                              <div class="">
                                  <input type="text" name="examen_laboratorio" class="form-control" id="examen_laboratorio" placeholder="" value="<?= $salud['examen_laboratorio']; ?>">
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="form-group">
                      <div class="col-md-12">
                          <input type="submit" name="submit" value="Editar" class="btn btn-primary pull-right">
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </div>
              <!-- /.box-body -->
          </div>
      </section>
  </div>
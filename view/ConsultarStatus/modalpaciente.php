<div id="modalpaciente" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo">Nuevo Registro</h4>
            </div>
            <form method="post" id="paciente_form">
                <input type="hidden" id="idPaciente" name="idPaciente">
                <input type="hidden" id="Padecimientos_idPadecimientos" name="Padecimientos_idPadecimientos">
                <input type="hidden" id="idInflamacion" name="idInflamacion">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="nombrePac">Nombre</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nombrePac" name="nombrePac" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="apellidoP">Apellido Paterno</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="apellidoM">Apellido Materno</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-1" for="edad">Edad</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="edad" name="edad" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-1" for="Sexo_idSexo">Sexo</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Sexo_idSexo" name="Sexo_idSexo">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="Ocupacion_idOcupacion">Ocupacion</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Ocupacion_idOcupacion" name="Ocupacion_idOcupacion">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Estudiante</option>
                                <option value="2">Profesionista</option>
                                <option value="3">Empleado</option>
                                <option value="4">Tecnico</option>
                                <option value="5">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="telefono">Telefono</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-8" for="calleNumero">Calle y Numero</label>
                        <div class="col-5">
                            <textarea class="form-control" id="calleNumero" name="calleNumero" rows="2" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="colonia">Colonia</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="colonia" name="colonia" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-1" for="cp">C.P</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="ciudad">Ciudad</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="UsoAnteojosLC_idUsoAnteojosLC">Usuario de</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="UsoAnteojosLC_idUsoAnteojosLC" name="UsoAnteojosLC_idUsoAnteojosLC">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Anteojos</option>
                                <option value="2">Lentes de contacto rígido</option>
                                <option value="3">Lentes de contacto blando</option>
                                <option value="4">Ants, lentes contacto rígido</option>
                                <option value="5">Ants, lente de contacto blando</option>
                                <option value="6">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="tiempoUso">Tiempo de uso</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tiempoUso" name="tiempoUso" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="sintomas">Sintomas</label>
                        <div class="col-8">
                            <textarea class="form-control" id="sintomas" name="sintomas" rows="2" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="descripcion">Descripcion del padecimiento</label>
                        <div class="col-8">
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="tipoPadecimiento_idtipoPadecimiento">Enfermedades Sistematicas</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="tipoPadecimiento_idtipoPadecimiento" name="tipoPadecimiento_idtipoPadecimiento">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Diabetes</option>
                                <option value="2">Hipertensión</option>
                                <option value="3">Otras</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="tratamientoPadecimiento">Tratamiento del padecimiento</label>
                        <div class="col-8">
                            <textarea class="form-control" id="tratamientoPadecimiento" name="tratamientoPadecimiento" rows="3" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="Localizacion_idLocalizacion">Localizacion de dolor</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Localizacion_idLocalizacion" name="Localizacion_idLocalizacion">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Ojo izquierdo</option>
                                <option value="2">Ojo derecho</option>
                                <option value="3">Ambos</option>
                                <option value="4">Ninguno</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2" for="Grado_idGrado">Hiperemia</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Grado_idGrado" name="Grado_idGrado">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Irritación leve</option>
                                <option value="2">Irritación</option>
                                <option value="3">Irritación moderada</option>
                                <option value="4">Irritación ojo rojo</option>
                                <option value="5">Ninguno</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="Colores_idColores">Tipo de color</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Colores_idColores" name="Colores_idColores">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Transparente</option>
                                <option value="2">Amarillo</option>
                                <option value="3">Verde</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="Inflamacion_idInflamacion">Inflamacion</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Inflamacion_idInflamacion" name="Inflamacion_idInflamacion">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Ojo izquierdo</option>
                                <option value="2">Ojo derecho</option>
                                <option value="3">Ambos</option>
                                <option value="4">Ninguno</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="alteracionesParpados">Alteraciones en los parpados</label>
                        <div class="col-8">
                            <textarea class="form-control" id="alteracionesParpados" name="alteracionesParpados" rows="2" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="especificaciones">Especificaciones</label>
                        <div class="col-8">
                            <textarea class="form-control" id="especificaciones" name="especificaciones" rows="3" placeholder="" required
                            style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-1" for="Rx_idRx">Rx</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="Rx_idRx" name="Rx_idRx">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Anterior</option>
                                <option value="2">Actual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="AgudezaVisual_idAgudezaVisual">Agudeza visual</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="AgudezaVisual_idAgudezaVisual" name="AgudezaVisual_idAgudezaVisual">
                                <option value="0">Opcion</option>
                                <option value="1">SC</option>
                                <option value="2">CC</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="Graduacion_idGraduacion">Graducacion</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="Graduacion_idGraduacion" name="Graduacion_idGraduacion">
                                <option value="0">Opcion</option>
                                <option value="1">0.1</option>
                                <option value="2">0.2</option>
                                <option value="3">0.3</option>
                                <option value="4">0.4</option>
                                <option value="5">0.5</option>
                                <option value="6">0.6</option>
                                <option value="7">0.7</option>
                                <option value="8">0.8</option>
                                <option value="9">0.9</option>
                                <option value="10">1.0</option>
                                <option value="11">1.1</option>
                                <option value="12">1.2</option>
                                <option value="13">1.3</option>
                                <option value="14">1.4</option>
                                <option value="15">1.5</option>
                                <option value="16">1.6</option>
                                <option value="17">1.7</option>
                                <option value="18">1.8</option>
                                <option value="19">1.9</option>
                                <option value="20">2.0</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="oftalmoscopia">Oftalmoscopia</label>
                        <div class="col-8">
                            <textarea class="form-control" id="oftalmoscopia" name="oftalmoscopia" rows="2" placeholder=""  required
                                style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="diagnosticoRefractivo">Diagnostico Refractivo</label>
                        <div class="col-8">
                            <textarea class="form-control"  id="diagnosticoRefractivo" name="diagnosticoRefractivo" rows="2" placeholder="" required
                                style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="tratamiento">Tratamiento</label>
                        <div class="col-8">
                            <textarea class="form-control" id="tratamiento" name="tratamiento" rows="3" placeholder="" required
                                style="resize:none; height:50px;"></textarea>
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="fechaConsulta">Fecha de proxima cita</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="fechaConsulta" name="fechaConsulta" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default btn-default" type="button">Cerrar</button>
                    <button class="btn btn-primary"  type="submit" name="action" value="add" id="#">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
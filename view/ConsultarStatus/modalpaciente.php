<div id="modalpaciente" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo">Nuevo Registro</h4>
            </div>
            <form method="post" id="paciente_form">
            <input type="hidden" id="idPaciente" name="idPaciente">
            <input type="hidden" id="idTiempoUso" name="idTiempoUso">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-12" for="nombrePac">Nombre</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nombrePac" name="nombrePac" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="apellidoP">Apellido Paterno</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="apellidoM">Apellido Materno</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="edad">Edad</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="edad" name="edad" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="Sexo_idSexo">Sexo</label>
                        <div class="col-md-6">
                            <select class="form-control" id="Sexo_idSexo" name="Sexo_idSexo">
                                <option value="0">Seleccione una Opcion</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="Ocupacion_idOcupacion">Ocupacion</label>
                        <div class="col-md-6">
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
                        <label class="col-12" for="telefono">Telefono</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="calleNumero">Calle y Numero</label>
                            <div class="col-8">
                                <textarea class="form-control" id="calleNumero" name="calleNumero" rows="3" placeholder="" required></textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="colonia">Colonia</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="cp">C.P</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="cp" name="cp" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ciudad">Ciudad</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="UsoAnteojosLC_idUsoAnteojosLC">Usuario de</label>
                        <div class="col-md-6">
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
                        <label class="col-12" for="tiempoUso">Tiempo de uso</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="tiempoUso" name="tiempoUso" placeholder="" required>
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
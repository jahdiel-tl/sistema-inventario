<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel"><i class="bi bi-person-plus-fill"></i> Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mensaje de información -->
                <div id="alertMessage" class="alert alert-warning" role="alert" style="display: none;">
                    <i class="bi bi-info-circle-fill"></i> Todos los campos con <span class="text-danger">*</span> son obligatorios.
                </div>

                <div id="alertPassword" class="alert alert-danger" role="alert" style="display: none;">
                    <i class="bi bi-exclamation-triangle-fill"></i> Las contraseñas no coinciden.
                </div>

                <!-- Formulario dentro del modal -->
                <form id="userForm">

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre del usuario" required>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="apellidos">Apellidos <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                </div>
                                <input type="text" class="form-control" id="apellidos" placeholder="Apellidos del usuario" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row"> 
                    <div class="form-group col">
                        <label for="dni">DNI <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                            </div>
                            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" maxlength="8" required>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="tipo-usuario">Tipo de Usuario <span class="text-danger">*</span></label>
                        <select class="form-control" id="tipo-usuario" required>
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>
                        </select>
                    </div>
                    </div>
            
                    <div class="form-group">
                        <label for="correo">Correo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                            </div>
                            <input type="text" class="form-control" id="correo" placeholder="Correo electrónico" required>
                        </div>
                    </div>
                   

                    <!-- Textos de validación de contraseña -->
                    <div class="form-group">
                        <label for="contraseña">Requisitos para la contraseña <span class="text-danger">*</span></label>
                        <div id="passwordStrength" class="alert alert-secondary" role="alert" style="width: 100%;">
                            <strong id="minLengthRequirement">1. Mínimo de 8 caracteres</strong><br>
                            <strong id="numberRequirement">2. Que contengan números</strong><br>
                            <strong id="symbolRequirement">3. Que tenga símbolos</strong>
                        </div>
                    </div>

                    <!-- Formulario dentro del modal -->
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="contraseña">Contraseña <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                </div>
                                <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="confirmar-contraseña">Confirmar Contraseña <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-unlock-fill"></i></span>
                                </div>
                                <input type="password" class="form-control" id="confirmar-contraseña" placeholder="Confirmar Contraseña" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="validateForm();">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

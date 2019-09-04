<?php
//Clases
$usuario = new Clases\Usuarios();
$hub = new Clases\Hubspot();
$usuario->set("cod", $_SESSION["usuarios"]["cod"]);
$usuarioData = $usuario->view();
?>
<div class="col-md-12 mb-10">
    <?php
    if (isset($_POST["guardar"])) {

        $nombre = $funciones->antihack_mysqli(!empty($_POST["nombre"]) ? $_POST["nombre"] : '');
        $apellido = $funciones->antihack_mysqli(!empty($_POST["apellido"]) ? $_POST["apellido"] : '');
        $email = $funciones->antihack_mysqli(!empty($_POST["email"]) ? $_POST["email"] : '');
        $password = $funciones->antihack_mysqli(!empty($_POST["password"]) ? $_POST["password"] : '');
        $provincia = $funciones->antihack_mysqli(!empty($_POST["provincia"]) ? $_POST["provincia"] : '');
        $localidad = $funciones->antihack_mysqli(!empty($_POST["localidad"]) ? $_POST["localidad"] : '');
        $direccion = $funciones->antihack_mysqli(!empty($_POST["direccion"]) ? $_POST["direccion"] : '');
        $telefono = $funciones->antihack_mysqli(!empty($_POST["telefono"]) ? $_POST["telefono"] : '');
        $celular = $funciones->antihack_mysqli(!empty($_POST["celular"]) ? $_POST["celular"] : '');
        $postal = $funciones->antihack_mysqli(!empty($_POST["postal"]) ? $_POST["postal"] : '');

        $error = '';
        $pass = false;
        if (!empty($_POST["password"]) && !empty($_POST["password2"])) {
            if ($_POST["password"] == $_POST['password2']) {
                $password = $funciones->antihack_mysqli($_POST["password"]);
                $pass = true;
            } else {
                $error = '<div class="alert alert-warning" role="alert">Las contraseña no coinciden</div>';
            }
        }

        $usuario->set("cod", $usuarioData['cod']);
        if (empty($error)) {
            $usuario->editUnico("nombre", $nombre);
            $usuario->editUnico("apellido", $apellido);
            $usuario->editUnico("email", $email);
            $usuario->editUnico("provincia", $provincia);
            $usuario->editUnico("localidad", $localidad);
            $usuario->editUnico("direccion", $direccion);
            $usuario->editUnico("telefono", $telefono);
            $usuario->editUnico("celular", $celular);
            $usuario->editUnico("postal", $postal);
            $usuario->editUnico("fecha", $usuarioData['fecha']);

            if ($pass) {
                $usuario->editUnico("password", $password);
            }

            $hub->set("nombre", $nombre);
            $hub->set("apellido", $apellido);
            $hub->set("email", $email);
            $hub->set("direccion", $direccion);
            $hub->set("telefono", $telefono);
            $hub->set("celular", $celular);
            $hub->set("localidad", $localidad);
            $hub->set("provincia", $provincia);
            $hub->set("postal", $postal);

            if ($email != $usuarioData['email']) {
                $hub->set("email", $usuarioData['email']);
                $response = $hub->getContactByEmail();
                if ($response != false) {
                    $hub->set("vid", $response['vid']);
                    $hub->updateContact();
                }
            } else {
                $response = $hub->getContactByEmail();
                if ($response != false) {
                    $hub->set("vid", $response['vid']);
                    $hub->updateContact();
                }
            }

            $funciones->headerMove(URL . '/sesion/cuenta');
        }
    }
    ?>
    <br>
    <form class="login_form" id="registro" method="post" autocomplete="off">
        <div class="row">
            <div class="col-md-6">Nombre
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['nombre'] ?>"
                           type="text"
                           placeholder="Nombre"
                           name="nombre"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-user"></i></span>
                </div>
            </div>
            <div class="col-md-6">Apellido
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['apellido'] ?>"
                           type="text"
                           placeholder="Apellido"
                           name="apellido"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-user"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">Email
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['email'] ?>"
                           type="email"
                           placeholder="Email"
                           name="email"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-envelope"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">Teléfono
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['telefono'] ?>"
                           type="number"
                           placeholder="Teléfono"
                           name="telefono"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-phone"></i></span>
                </div>
            </div>
            <div class="col-md-6">Celular
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['celular'] ?>"
                           type="number"
                           placeholder="Celular"
                           name="celular"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-phone"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">Provincia
                <div class="input-group">
                    <select class="pull-right form-control h40" name="provincia" id="provincia" required>
                        <option value="<?= $usuarioData['provincia'] ?>" selected><?= $usuarioData['provincia'] ?></option>
                        <option value="" disabled>Provincia</option>
                        <?php $funciones->provincias() ?>
                    </select>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-map-marker"></i></span>
                </div>
            </div>
            <div class="col-md-6">Localidad
                <div class="input-group">
                    <select class="form-control h40" name="localidad" id="localidad" required>
                        <option value="<?= $usuarioData['localidad'] ?>"
                                selected><?= $usuarioData['localidad'] ?></option>
                        <option value="" disabled>Localidad</option>
                    </select>
                    <span class="input-group-addon"><i
                                class="login_icon glyphicon glyphicon-map-marker"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">Dirección
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['direccion'] ?>"
                           type="text"
                           placeholder="Dirección"
                           name="direccion"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-map-marker"></i></span>
                </div>
            </div>
            <div class="col-md-6">Código Postal
                <div class="input-group">
                    <input class="form-control h40"
                           value="<?= $usuarioData['postal'] ?>"
                           type="text"
                           placeholder="Código Postal"
                           name="postal"
                           required/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-map-marker"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <hr>
        <sup>*Dejar vacion si no se desea cambiar la contraseña</sup>
        <br>
        <div class="row">
            <div class="col-md-6">Contraseña
                <div class="input-group">
                    <input type="password" name="password" id="password_fake" class="hidden" autocomplete="off" style="display: none;">
                    <input autocomplete="off" class="form-control h40" value="" type="password" placeholder="Contraseña" name="password"/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-lock"></i></span>
                </div>
            </div>
            <div class="col-md-6">Confirmar Contraseña
                <div class="input-group">
                    <input class="form-control h40" value="" type="password" placeholder="Confirmar Contraseña" name="password2"/>
                    <span class="input-group-addon"><i class="login_icon glyphicon glyphicon-lock"></i></span>
                </div>
            </div>
        </div>
        <br/>
        <button style="width: 100%;" type="submit" name="guardar" class="btn btn-success">Guardar</button>
    </form>
    <br>
</div>
<?php
    $door = "../ajax/usuario.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../custom/css/login.css" />
    <title>IESTP-SULLANA</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form method="post" id="frmAcceso" name="frmAcceso" action="<?php echo"$door";?>" 
            onsubmit="return validateForm()" onload="document.frmAcceso.logina.focus()">
                    <div class="row border rounded-5 p-3 bg-white shadow box-area">
                        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                            <!-- Contenido de la caja izquierda -->
                            <div class="featured-image mb-3">
                            </div>
                        </div>       
                        <div class="col-md-6 right-box">
                            <!-- Contenido de la caja derecha -->
                            <div class="row align-items-center">
                                <div class="header-text mb-4">
                                    <h2>IESTP SULLANA</h2>
                                    <p>BIENVENIDOS AL SISTEMA DE INVENTARIO</p>
                                </div>
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-person-square"></i></span>
                                        </div>
                                        <input value="" type="text" class="form-control" id="logina" name="logina" placeholder="Usuario" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="clave">Contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                        </div>
                                        <input value="" type="password" class="form-control" id="clavea" name="clavea" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" id="btnIngresar">Entrar</button>
                                </div>
                            </div>
                        </div> 
                    </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
</body>
</html>


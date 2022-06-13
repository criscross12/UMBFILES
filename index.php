<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOCUMENTACIÓN UMB</title>
    <link rel="icon" href="includes/doc.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <link rel="icon" href="includes/umb.ico">
    <link rel="stylesheet" href="css/master.css">

    <form action="includes/loguear.php" method="POST">
        <div class="Login">
            <img class="avatar" src="includes/UMB.jpg" alt="">
            <h1>Iniciar sesión</h1>
    
            <label for="floatingInput">Matricula</label>
            <input type="text" name="matricula" placeholder="Enter Matricula" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" placeholder="Enter your Contraseña" required>
            <br>
            <br>
            <input type="submit" value="Iniciar Sesión">
            <!-- <div class="col text-center">
                <a href="includes/registro.php" class="btn btn-success btn-lg " role="button" aria-disabled="true">Registrar</a>
            </div> -->
        </div>
    </form>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../css/sweetalert.min.js"></script>
</body>

</html>
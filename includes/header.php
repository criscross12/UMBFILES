<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="doc.ico">
    <!-- BOOSTRAP 5-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- FONTS FANTA-->
    <script src="https://kit.fontawesome.com/1a4a93a8d2.js" crossorigin="anonymous"></script>
    <style>
        .hojapdf{
            border: #000 5px;
            max-width: 2480px;
            height: auto;
            color: #000;
        }

        .hojapdf h1,h2,h3,h4,p{
            color: #000;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hojapdf h1{
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .hojapdf h2{
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .hojapdf h3{
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2ECC71 ;">
        <a class="navbar-brand" href="index.php">
            <img src="../includes/UMB.jpg" width="30" height="30" class="d-inline-block align-top">
            UMB Xalatlaco
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto text-center ">
            <!--<a class="nav-item nav-link" href="modificar.php"><strong>Alumnos</strong></a>-->
                <a class="nav-item nav-link" href="materias.php"><strong>Materias</strong></a>
                <a class="nav-item nav-link" href="maestros.php"><strong>Maestros</strong></a>
                <a class="nav-item nav-link " href="encuestas.php"><strong>Encuestas</strong></a>
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="nav">
            Otros
          </a> -->
                    <div class="dropdown-menu dropdown-black text-center" aria-label="nav">

                    </div>
                </li>
            </div>
            <div>
                <div class="navbar-nav ml-auto text-center">
                    <a class="btn btn-info m-2" href="acercade.php">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a class="btn btn-primary m-2 " href="profileCe.php">
                        <i class="fas fa-user"> Perfil</i>
                    </a>
                    <a href="salir.php" class="btn btn-danger m-2">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
            </button>
        </div>
    </nav>
<html>

<head>
  <title>Luis Uriel Garcidueñas Fraustro</title>
  <script src="./repositorio/js/jQuery-3.3.1.js"></script>
  <script src="./repositorio/js/bootstrap-3.3.5.min.js"></script>
  <link href="./repositorio/css/bootstrap-3.3.5.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="./repositorio/css/bootsnip.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="http://www.its.mx">
            <img src="./img/its.png" alt="http://www.its.mx" style="width:27px;height:42px;border:0;">
          </a>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Actualización de archivos <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="./controlador.php?gui=estatus">Estatus del proceso</a></li>
            <li class="divider"></li>
            <li><a href="./controlador.php?gui=TPOprograma">Tipos de programas</a></li>
            <li class="divider"></li>
            <li><a href="./controlador.php?gui=dependencia">Dependencias</a></li>
            <li class="divider"></li>
            <li><a href="./controlador.php?gui=estado">Estados*</a></li>
            <li class="divider"></li>
            <li><a href="./controlador.php?gui=municipio">Municipios*</a></li>
            <li class="divider"></li>
            <li><a href="./controlador.php?gui=carrera">Carreras</a></li>
            <li class="divider"></li>
            <li><a href="#">Item</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav" role="navigation">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Otras funciones<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Acción #1</a></li>
            <li><a href="#">Acción #2</a></li>
            <li><a href="#">Acción #3</a></li>
            <li class="divider"></li>
            <li><a href="#">Acción #4</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>
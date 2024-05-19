<div class="contenedor-navbar">
  <div class="row px-xl-5">
    <div class="col-lg-12">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
          <h1 class="m-0 display-5 font-weight-semi-bold">
            <span class="text-primary font-weight-bold border">U</span>NEFA
          </h1>
        </a>
        <div class="col-lg-6 col-6 text-left d-lg-none d-block">
          <form action="Main index/busqueda.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="¿Qué deseas encontrar?" name="busquedaTEG" required />
              <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                  <button type="submit" class="button-10"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </div>
          </form>
        </div>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="#" class="nav-item nav-link pl-4 pl-md-4 pr-md-4">Inicio</a>
            <a href="Main index/todas.php" class="nav-item nav-link pl-4 pl-md-4 pr-md-4">Todas</a>
            <div class="nav-item dropdown d-block d-lg-none pl-4 pl-md-4">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categorias</a>
              <div class="dropdown-menu rounded-0 m-0">
                <a href="Main index/autor.php" class="dropdown-item">Autor</a>
                <a href="Main index/publicacion.php" class="dropdown-item">Año</a>
                <a href="Main index/titulo.php" class="dropdown-item">Titulo</a>
                <a href="Main index/tutor.php" class="dropdown-item">Tutor</a>
              </div>
            </div>
            <div class="nav-item dropdown d-block d-lg-none pl-4 pl-md-4">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Carreras</a>
              <div class="dropdown-menu rounded-0 m-0">
                <a href="Main index/carreras.php?carrera=Aeronautica" class="dropdown-item">Ing. Aeronautica</a>
                <a href="Main index/carreras.php?carrera=Civil" class="dropdown-item">Ing. Civil</a>
                <a href="Main index/carreras.php?carrera=Electrica" class="dropdown-item">Ing. Electrica</a>
                <a href="Main index/carreras.php?carrera=Electronica" class="dropdown-item">Ing. Electronica</a>
                <a href="Main index/carreras.php?carrera=Sistemas" class="dropdown-item">Ing. de <br>Sistemas</a>
                <a href="Main index/carreras.php?carrera=Telecom" class="dropdown-item">Ing. de <br>Telecomunicaciones</a>
              </div>
            </div>
            <a href="#" class="nav-item nav-link pl-4 pl-md-4">Contacto</a>
          </div>
          <div class="col-lg-6 col-6 text-left d-lg-block d-none">
            <form action="Main index/busqueda.php" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="¿Que deseas encontrar?" name="busquedaTEG" required />
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent text-primary">
                    <button type="submit" class="button-10">Buscar &nbsp;<i class="fa fa-search"></i></button>
                  </span>
                </div>
              </div>
            </form>
          </div>
          <div class="navbar-nav ml-auto py-0">
            <a href="Admin/Paginas/login.html" class="nav-item nav-link pl-4 pl-md-4">Cargar</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
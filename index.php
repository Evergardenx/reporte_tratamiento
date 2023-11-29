<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe Hogar Ancianos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/loader.css">
</head>
    <body>
        <header>
          <div class="contenedor_header">
              <ul class="flex-container">
                <li class="flex-item"></li>
                <li class="flex-item">
                  <p>
                    <strong>
                    Desarrollador - Ulises Cenoz
                    </strong>
                  </p>
                </li>
                <li class="flex-item"></li>
              </ul>
          </div>
        </header>

        <div id="demo-content">
          <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
          <div id="content"> </div>
        </div>


        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center" style="padding:100px 0px;">
              <h3 class="text-center" style="font-size:40px; color:#333; font-weight:900;">
              &#9877; Informe de Tratamientos Médicos 💊
              </h3>
              <img src="assets/img/portada.PNG" alt="Reportes en PDF" class="img-fluid portada">
            </div>
          </div>
        </div>

      <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <form action="DescargarReporte_x_fecha_PDF.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <input type="date" name="fecha_inicio" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <input type="date" name="fecha_fin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col">
                      <span class="btn btn-dark mb-2" id="filtro">Filtrar</span>
                      <button type="submit" class="btn btn-danger mb-2">Descargar Reporte</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-12 text-center mt-5">     
                <span id="loaderFiltro">  </span>
              </div>
              
              
              <div class="table-responsive resultadoFiltro">
                    <table class="table table-hover" id="tableTratamientos">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Cédula del Residente</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Enfermedad</th>
                                <th scope="col">Medicamento</th>
                                <th scope="col">Dosis</th>
                                <th scope="col">Fecha de Inicio</th>
                                <th scope="col">Fecha de Fin</th>
                                <th scope="col">Servicio</th>
                            </tr>
                            </thead>
                        <?php
                        include('config.php');
                        $sqlTratamientos = 'SELECT * FROM tratamiento ORDER BY fecha_inicio ASC';
                        $query = mysqli_query($con, $sqlTratamientos);
                        $i = 1;
                        while ($dataRow = mysqli_fetch_array($query)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $dataRow['nombre']; ?></td>
                                    <td><?php echo $dataRow['apellido']; ?></td>
                                    <td><?php echo $dataRow['cedula_residente']; ?></td>
                                    <td><?php echo $dataRow['doctor']; ?></td>
                                    <td><?php echo $dataRow['enfermedad']; ?></td>
                                    <td><?php echo $dataRow['medicamento']; ?></td>
                                    <td><?php echo $dataRow['dosis']; ?></td>
                                    <td><?php echo $dataRow['fecha_inicio']; ?></td>
                                    <td><?php echo $dataRow['fecha_fin']; ?></td>
                                    <td><?php echo $dataRow['servicio']; ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <footer class="footer grey darken-4">
      <div class="container center" style="padding-top: 5px;">
        <div class="row justify-content-md-center">
          <div class="col col-lg-5">
          &copy; Visita mis Redes - 2023 WebDeveloper
          </div>
          <div class="col-md-auto">
            <a href="" target="_blank" title="Visitar Youtube">
              <i class="bi bi-youtube"></i>
            </a>
            <a href="" target="_blank" title="Visitar Github">
              <i class="bi bi-github"></i>
            </a>
            <a href="" target="_blank" title="Visitar Linkedin">
              <i class="bi bi-linkedin"></i>
            </a>
            <a href="" target="_blank" title="Visitar Portafolio">
              <i class="bi bi-briefcase"></i>
            </a>

          </div>
        </div>
      </div>
    </footer>



  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_inicio = $('input[name=fecha_inicio]').val();
  var f_fin = $('input[name=fecha_fin]').val();
  console.log(f_inicio + '' + f_fin);

  if(f_inicio !="" && f_fin !=""){
    $.post("filtro.php", {f_inicio, f_fin}, function (data) {
      $("#tableTratamientos").hide();
      $(".resultadoFiltro").html(data);
      loaderF(false);
    });  
  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>
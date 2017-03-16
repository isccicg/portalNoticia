<header id="home" style="background-color: #fff">

    <section class="top-nav hidden-xs">
      <div class="container">
      <div class="row">

                <div class="col-md-12" align="center">
                 <img src="app/views/default/efectos/images/logo.png">
</div>
        
      </div>



      <div class="row">
        
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="top-left">

              <ul>
                <li>
                  <script>
                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    var f = new Date();
                    document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                  </script> 
                 </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--main-nav-->

    <div id="main-nav">

      <nav class="navbar">
        <div class="container">

          <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Inicio</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
              <span class="sr-only">Toggle</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse" id="ftheme">

            <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?action=politica">Politica</a></li>
                        <li><a href="index.php?action=economia">Economia</a></li>
                        <li><a href="index.php?action=sociedad">Sociedad</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opinión <span class="caret"></span></a>
                            <ul class="dropdown-menu" >
                                <li><a href="index.php?action=articulos">Articulos</a></li>
                                <li><a href="index.php?action=columnas">Columnas</a></li>           
                            </ul>
                        </li>
                        <li><a href="index.php?action=cultura">Cultura</a></li>
                     
                        <li><a href="index.php?action=deportes">Deportes</a></li>                
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estudios de Opinión <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?action=monitores">Monitoreo</a></li>
                                <li><a href="index.php?action=encuestas">Encuestas</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?action=videos">Videos</a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>

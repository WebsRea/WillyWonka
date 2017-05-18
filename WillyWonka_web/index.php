<!DOCTYPE html>
<html lang="cat">
<head>
    <title>WilyWonka</title>
    <meta charset="utf-8" charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
</head>
<body id="inicio">

    <!-- Empezamos con el nav -->
    <nav class="navbar navbar-fixed-top navegador"  role="navigation">
        <div class="container">
            <!-- Creamos el header del menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" >
                    <span class="sr-only">Alternar menu</span>
                    <img src="img/001-chocolate.png"></img>               
                </button>
                <a href="#inicio"><img class="img-responsive" src="img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="#historia" class="btn btn-willy btn-lg">
                    <img src="img/001-chocolate.png"></img> Historia </a>
                    <a href="#quefem" class="btn btn-willy btn-lg">
                    <img src="img/001-chocolate.png"></img> Qué fem </a>
                    <a href="#amiga" class="btn btn-willy btn-lg">
                    <img src="img/001-chocolate.png"></img> Escola amiga </a>
                    <a href="#contacte" class="btn btn-willy btn-lg">
                    <img src="img/001-chocolate.png"></img> Contacte</a>
                    <a href="#" class="btn btn-willy btn-lg" data-toggle="modal" data-target="#modal-1">
                    <img src="img/001-chocolate.png"></img> entrar </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- /.nav -->
    <!-- empieza la modal -->
    
    <div class="modal fade" id="modal-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Accès limitat a mestres i familiars ja inscrits a la nostra llar</h4>
        </div>
        <div class="modal-body ">
           
            <?php
            include "php/login.php";?>

        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  
                    <!-- fin modal -->
     <div class="jumbotron frase">
        <div class="container video">
           <video poster="" autoplay="true" loop="false">
                <source src="video1.mp4" mute="true" type="video/mp4">                    
            </video>
        </div>
    </div>
    <!-- /.video -->
    <div class="container">
        <div class="row" id="historia">
            <h1 class="h1som" >Qui som</h1>
        </div>
        <div class="row quisom">
                <div  class="col-md-12">
                    <div class="col-md-3"><img src="img/waiting.jpg" class="img-responsive imgsom"></div>
                    <div class="col-md-9">
                    <p class="psom">Esteu a punt de rebre el regal més preuat i volem oferir-vos la millor llar d'infants que pogueu desitjar. Som un equip jove i la nostra llar d'infants, antiga fàbrica de xocolate té  amb una història increible.</p></div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="row quisom" id="quefem" >
             <div class="col-md-12">
                <div class="col-md-3">
                <h2 class="h1som">Volem alt</h2>
                <img src="img/fly_boy.jpg" class="img-responsive">
                            <p class="psom">Lorem ipsum dolor sit amet, consectetur adipisicing elit
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">En tenim cura</h2>
                <img src="img/holding.jpg" class="img-responsive">
                            <p class="psom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">Els més dolços</h2>
                <img src="img/casa_chocolate.jpg" class="img-responsive">
                            <p class="psom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">Creixem junts</h2>
                <img src="img/holding_toe.jpg" class="img-responsive">
                            <p class="psom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>      
    </div>
    <div class="jumbotron frase" id="amiga" >
        <div class="container">
            <h1 class="h1som">Aquí les colaboracións</h1>
            <div class="col-md-9">
            <p class="psom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                
            </div>
            <div class="col-md-3">
                <a href="http://espaidegats.com/es/" target="_blanck"><img src="img/col/EspaideGats.png" class="img-responsive"></a>
                <br>
                <a href="http://web.gencat.cat/ca/inici/" target="_blanck"><img src="img/col/gencat_cat1.png" class="img-responsive"></a>
                <br>
                <br>
                <a href="https://www.clubrural.com/turismo-activo/barcelona/vilassar-de-mar/hipica-rosell_29539" target="_blanck"><img src="img/col/hipica1.png" class="img-responsive"></a>
                <br>
                <a href="http://www.vielha-mijaran.org/ar/" target="_blanck"><img src="img/col/vielha1.png" class="img-responsive"></a>
                <br>
                <a href="http://www.greenpeace.org/international/en/" target="_blanck"><img src="img/col/Greenpeace_logo.png" class="img-responsive"></a>
                <br>
            </div>
        </div>
    </div>
    <!-- inicio formulario -->
    <div class="container" id="contacte">
        <div class="col-md-12"> 
            <h1 class="h1som">Formulari de contacte</h1>
             <p class="help-block">Les vostres dades seran utilitzades per la Llar d'Infants Willy Wonka nomès per ús informatiu, i estaran sota la protecció de la <a href="http://administraciojusticia.gencat.cat/web/.content/documents/arxius/lo15_1999lopdcp.pdf" target="_blanck">Llei Orgànica de Protecció de dades</a>.</p>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label for="nominteresat">Nom</label>
                    <input type="text" class="form-control" id="" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="mailinteresat">Correu de contacte</label>
                    <input type="email" class="form-control" id="" placeholder="Correu">
                </div>
                <div class="form-group">
                    <label for="textinteresat">Missatge</label>
                    <textarea type="text" class="form-control" id="" placeholder="El vostre Missatge"></textarea>
                </div> 
                <div class="col-md-3"></div> 
                <div class="col-md-3">  
                <button type="submit" class="btn btn-willy text-center">Enviar dades</button>
                </div> 
            </form>
        </div>         
    </div>
    <br>

    <!-- fin formulario -->

    <!-- google map -->
    <div id="map-btn1-div">
        <a id="map-btn1" class="gmap-btn close-map-button btn-show" href="#map">
        Cliqueu per veure la nostra situació al mapa
        </a>
    </div>
    <a id="map-btn2" class="btn btn-skin btn-lg  gmap-btn close-map-button btn-hide" href="#map" title="Close google map" data-toggle="tooltip" data-placement="top">
    Carrer Carretera Ag.Garos, 17 Vielha
    <br>clica per tornar a tancar
    </a>
    
    <!-- google map -->
    <section id="map" class="close-map">
        <div id="google-map"></div>
    </section>
    <!-- /google map -->        
<!-- AIzaSyAuCV7ADNuqmSfszBHX2qTBcvPj-j0mv6I -->
    
 <!-- JavaScript -->
    <script src="js/jquery.min.js"></script>     
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAhXaF13fF5Exi4nzqVZ_PD1q9bO_O8Y_M&callback=initMap"></script>
    <script src="js/gmap.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery.slides.min.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <div class="col-md-6 text-justify peu">
            <p>&copy;2017 websREA, SA. Tots els drets reservats</p>
            <p><a class="peu" href="#">Avís legal</a></p>
            <p><a class="peu" href="#">Política de privacitat</a></p>
        </div>
        <div class="col-md-6 text-right peu">
        <p>La nostra adreça:</p>
        <p>C/Carretera Ag.Garos, 17</p>
        <p>08923 Viella</p>
            
        </div>
    </div>

</footer>
</html>
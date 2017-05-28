<!DOCTYPE html>
<html lang="cat">
<head>
    <title>WillyWonka</title>
    <meta charset="utf-8" charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/food.png" />
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
                    <p class="psom">Esteu a punt de rebre el regal més preuat i volem oferir-vos la millor llar d'infants que pogueu desitjar. Som un equip jove i la nostra llar d'infants, antiga fàbrica de xocolate té una història increïble. Volem ser més que una llar per vosaltres. Volem ser un lloc acollidor, on els infants se sentin segurs i poguin descobrir i explorar l'entorn per aprendre coses noves cada dia. Us convidem a acompanyar-nos en aquest viatge tant maco, que es veure els vostres fills créixer. </p></div>
                </div>
        </div>
    </div>
    <div class="container">
        <div class="row quisom" id="quefem" >
             <div class="col-md-12">
                <div class="col-md-3">
                <h2 class="h1som">Volem alt</h2>
                <img src="img/fly_boy.jpg" class="img-responsive"><br>
                            <p class="psom">Les nostres instal·lacions estan preparades per oferir als nostres infants moltes oportunitats per descobrir coses noves cada dia. Vine a descobrir el nostre hivernacle, ple de papallones, ocells i tants altres animals com la natura ens ofereix. .</p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">En tenim cura</h2>
                <img src="img/holding.jpg" class="img-responsive"><br>
                            <p class="psom">Especialistes en totes les etapes; ens assegurem de donar una bona atenció individualitzada, vigilant sempre de cobrir les necessitats de cada infant, adaptant-nos sempre que sigui necessari, sense oblidar la cohesió del grup. </p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">Els més dolços</h2>
                <img src="img/casa_chocolate.jpg" class="img-responsive"><br>
                            <p class="psom">Volem que la etapa del vostre infant a la llar estigui plena de somnis, somriures i felicitat. Creiem que és una etapa molt important ja que amb totes les vivencies que acumularà seran les bases del futur individu.</p>
                </div>
                <div class="col-md-3">
                <h2 class="h1som">Creixem junts</h2>
                <img src="img/holding_toe.jpg" class="img-responsive"><br>
                            <p class="psom">Creixem junts en un entorn bonic, tranquil, envoltat de natura. Vivint moments únics en aquest entorn especial. Serem guies, acompanyants, aprendrem junts respectant sempre el ritme de cada infant i els seus moments.</p>
                </div>
            </div>
        </div>      
    </div>
    <div class="jumbotron frase" id="amiga" >
        <div class="container">
            <h1 class="h1som">ESTIMEM LA NATURA </h1>
            <div class="col-md-9">
            <br><br>
            <p class="psom">No només som una llar, sino  també, ferms defensors del medi ambient. És per això que tenim tota una serie de entitats col·laboradores.</p>
            <p class="psom"><i>Espai de Gats</i> ens permet fer activitats amb animals abandonats que necessiten molt d'amor i atenció ja que estan a l'espera d'una familia que els acolli. </p>
            <p class="psom"><i>L'ajuntament de Vielha</i> ens proporciona tant soport a l'hora de realitzar diferents activitats, com també espais lliures pels diferents esfeveniments que organitzem a la llar. </p>
            <p class="psom"><i>Greenpeace:</i> ens sentim molt orgullosos de poder dir-nos "Escola amiga de la Natura"; un certificat que adquireixen les escoles per part de Greenpeace al demostrar que es fa un ús de material renovable i provinents de fonts ecológiques. Hem firmat una declaració per la qual ens comprometem a no fer ús de material provinent de fonts que destrueixin els boscos primaris. Una de les coses que ens proporciona Greenpeace es una guia didàctica que ens ajuda a ensenyar als infants com tenir cura del medi ambient. </p>
            <p class="psom"><i>La hípica Rossell</i> va veure néixer el nostre preciat poni Gregori. Ens va donar soport i ajuda a l'hora d'acollir i cuidar el nostre nou integrant. Amb en Gregori els infants descobriran, investigaran i observaran de ben aprop, com és cuidar d'un dels animals més bonics de la granja. </p>
                
            </div>
            <div class="col-md-3">
                <a href="http://espaidegats.com/es/" target="_blanck"><img src="img/col/EspaideGats.png" class="img-responsive"></a>
               <!--  <br>
                <a href="http://web.gencat.cat/ca/inici/" target="_blanck"><img src="img/col/gencat_cat1.png" class="img-responsive"></a> -->
                
                 <a href="http://www.vielha-mijaran.org/ar/" target="_blanck"><img src="img/col/vielha1.png" class="img-responsive"></a>
                <br>
                <a href="http://www.greenpeace.org/espana/es/" target="_blanck"><img src="img/col/Greenpeace_logo.png" class="img-responsive"></a>
                <br><br><br>
                <a href="https://www.clubrural.com/turismo-activo/barcelona/vilassar-de-mar/hipica-rosell_29539" target="_blanck"><img src="img/col/hipica1.png" class="img-responsive"></a>
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
            <form action="php/send.php" method="POST" name="contacto" id="contacto" novalidate>
                <div class="form-group">
                    <label for="nominteresat">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="name" id="name" required data-validation-required-message="Per favor, introdueixi el seu nom.">
                                <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="mailinteresat">Correu de contacte</label>
                    <input type="email" class="form-control" placeholder="Correu"  name="email" id="email" required data-validation-required-message="Si us plau, introdueixi la seva adreça electrònica.">
                                <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="textinteresat">Missatge</label>
                    <textarea type="text" class="form-control" id="" placeholder="El vostre Missatge" name="message" id="message" required data-validation-required-message="Per favor, introdueixi el seu missatge."></textarea>
                                <p class="help-block text-danger"></p>
                </div> 
                <div class="col-md-3"></div> 
                <br>
                <div id="success"></div>
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
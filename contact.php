<?php 
if(isset($_POST['btnphp'])){
    
    $ok=false;
    
    $prenom =  strip_tags($_POST['prenom']);
    $nom = strip_tags($_POST['nom']);
    $email = strip_tags($_POST['email']);
    $pays = strip_tags($_POST['pays']);
    $sujet = strip_tags($_POST['sujet']);
    $messages = strip_tags($_POST['message']);

    $countryList=["Belgique","Allemagne", "France" ,"Italie", "Pays-bas"];
    $subjectList=["Remerciement","Probleme","Autre"];

    $firstErr = "";
    $secondErr = "";
    $emailErr = "";
    $paysErr = "";
    $sujetErr = "";
    $messageErr = "";

// nom et prenom
    if(isset($prenom)) {
        $result = trim(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
        if(!preg_match("/^[a-zA-Z éèçà-]*$/", $result , $prenom)) {
            $ok=false;
        } else {
            $prenom = $result;
            $ok=true;
        }
    }
    if(isset($nom)) {
    $result = trim(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
     if(!preg_match("/^[a-zA-Z éèçà-]*$/", $result, $nom)) {
        $ok=false;
     } else {
         $nom = $result;
         $ok=true;
     }
    }
// email
    if (isset($email)) {
        $result = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL));
        if(empty($result)) {
            $ok=null;
        }
        else{
            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $result)) {
                $ok=false;
            }
            else{
                $email = $result;
                $ok=true;
            }
        }
        

    }
// pays
    if (isset($pays)){
        $ok=false;
        for($i=0;$i<count($countryList);$i++){
            if($pays==$countryList[$i]){
                $countryList=["","",""];
                $ok=true;
            }
        }  
    }

// sujet
    if (isset($sujet)){
        $ok=false;
        for($i=0;$i<count($subjectList);$i++){
            if($sujet==$subjectList[$i]){
                $subjectList=["","",""];
                $ok=true;
            }
        }  
    }

    // message 
    if (isset($messages)) {
        $result = trim (filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
        if(empty($result)) {
            $ok=null;
        }else{
                $messages = $result;
                $ok=true;
        }
        
    }
    if($ok==true){
        $contenu="Nom du client : $nom \n Prénom du client: $prenom \n Genre: $genre \n Venu de: $pays \n Sujet: $sujet \n Message: $messages";
        $recipient = "jweertzcodes@gmal.com";
        $mailhead = "Hackers-Poulette Formulaire";
        $mailheader = "Mail de : $email \r\n";
        mail($recipient, $mailhead, $contenu, $mailheader) or die("Erreur!");
        echo '<script type="text/javascript">window.alert("votre message est bien envoyé ");</script>'; 
       }else{
        echo '<script type="text/javascript">window.alert("votre formulaire comporte de(s) erreur(s) ");</script>';
      }
}else{
    $prenom = ""; 
    $nom = ""; 
    $genre = ""; 
    $email =""; 
    $pays = "Choisisez un pays"; 
    $sujet = "Choisisez votre sujet"; 
    $messages ="";  
}
  
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/addons-pro/steppers.css" rel="stylesheet">
<!-- Stepper CSS - minified-->
<link href="css/addons-pro/steppers.min.css" rel="stylesheet">

<script src="https://kit.fontawesome.com/126bbe9047.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="./index.html"> <i class="fab fa-angellist fa-1x">En équipe</i> </a>
 
     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div id="navbarCollapse" class="collapse navbar-collapse">
         <ul class="nav navbar-nav ">
             <li class="nav-item">
                 <a href="./index.html" class="nav-link">Accueille</a>
             </li>
             <li class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle mask" data-toggle="dropdown">Les gestes</a>
                 <div class="dropdown-menu">
                     <a href="./maison.html" class="dropdown-item">A la maison</a>
                     <a href="./travaille.html" class="dropdown-item">Au travaille</a>
                     <a href="./exterieur.html" class="dropdown-item">En exterieur</a>
                     <div class="dropdown-divider"></div>
                     <a href="./infos.html"class="dropdown-item">Derniere informations</a>
                 </div>
             </li>
             <li class="nav-item">
               <a href="./modele.html" class="nav-link">Notre modele</a>
           </li>
             <li class="nav-item">
               <a href="jouer.html" class="nav-link">Jouer</a>
           </li>
         </ul>
     </div>
 </nav>



   

      <!-- Jumbotron -->
      <div class="card card-image" style="background-image: url(https://eduprofebio.files.wordpress.com/2016/08/tumblr_static_years-victorian-wallpapers-millions-34898.jpg);">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
          <div class="py-5">
      
            <!-- Content -->
            <h2 class="card-title h2 my-4 py-2">Combattez ensemble le Covid-19 avec ses gestes</h2>
            
      
          </div>
        </div>
      </div>
      <!-- Jumbotron -->
      
      
      
      
      
      
      
      
      
      
      
            <!-- News jumbotron -->
      <div class="jumbotron text-center hoverable p-4">
      
        <!-- Grid row -->
        <div class="row">
      
          <!-- Grid column -->
          <div class="col-md-4 offset-md-1 mx-3 my-3">
      
            <!-- Featured image -->
            <div class="view overlay">
              <img src="./assets/img/aa.png" class="img-fluid" alt="Ensemble on n'est plus fort">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
      
          </div>
          <!-- Grid column -->
      
          <!-- Grid column -->
          <div class="col-md-7 text-md-left ml-3 mt-3">
      
            <!-- Excerpt -->
            <a href=""  class="green-text btn disabled">
              <h6 class="h6 pb-1"><i class="fa fa-grav fa-3x"></i></h6>
            </a>
      
            <h4 class="h4 mb-4">This is title of the news</h4>
      
            <dl class="row">
              <dt class="col-sm-3">Description lists</dt>
              <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
            
              <dt class="col-sm-3">Euismod</dt>
              <dd class="col-sm-9">
                <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
                <p>Donec id elit non mi porta gravida at eget metus.</p>
              </dd>
            
              <dt class="col-sm-3">Malesuada porta</dt>
              <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
            
              <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
              <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
            
              <dt class="col-sm-3">Nesting</dt>
              <dd class="col-sm-9">
                <dl class="row">
                  <dt class="col-sm-4">Nested definition list</dt>
                  <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                </dl>
              </dd>
            </dl>
      
            <a class="btn btn-success">Information suplémentaire</a>
      
          </div>
          <!-- Grid column -->
      
        </div>
        <!-- Grid row -->
      
      </div>
      <!-- News jumbotron -->

      <section>
        <div class="container" id="formscroll">
            <div class="row">
                <article>
                    <h2 class="block_title">Nous contactez</h2>
                </article>
            </div>


            <form method="post" action="index.php">

                <div class="form-row">
                    <div class="form-group col-3">
                        <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom"
                            value="<?php echo $prenom?>">
                    </div>
                    <div class="form-group col-3">
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom"
                            value="<?php echo $nom ?>">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                    <label for="E-mail"></label>
                        <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email"
                            value="<?php echo $email ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="selection pays"></label>
                        <select name="pays" class="mdb-select md-form" id="selectPays">
                            <option value="" disabled selected><?php echo $pays ?></option>
                            <option value="Belgique">Belgique</option>
                            <option value="France">France</option>
                            <option value="Italie">Italie</option>
                            <option value="Pays-bas">Pays-bas</option>
                        </select>

                        <label for="Sujet a selectionner"></label>
                        <select name="sujet" class="mdb-select md-form" id="subject">
                            <option value="" disabled selected><?php echo $sujet ?></option>
                            <option value="Probleme">Avis</option>
                            <option value="Remerciement">Remerciement</option>
                            <option value="Autres">Autres</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-10">
                        <label for="zone texte message"></label>
                        <textarea name="message" class="form-control" id="message" placeholder="Votre message..."
                            rows="5"><?php echo $messages ?></textarea>
                    </div>
                </div>
                <input name="btnphp" id="run" class="btn btn-secondary" type="submit" value="submit">
            </form>

        </div>
    </section>
    <hr>


































<!-- Footer -->
<footer class="page-footer font-small bg-dark text-white pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-2">
          <!-- Facebook -->
          <a class="fb-ic rounded-circle text-white" href="index.html">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic text-white" href="">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic text-white" href="">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic text-white" href="">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic text-white" href="">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic text-white" href="">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
    </ul>
    <!-- Call to action -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://weertz"> Joffrey weertz</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


    




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
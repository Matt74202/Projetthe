<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Thélépathie</title>
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/responsive.css" />
      <link rel="stylesheet" href="css/colors.css" />
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="css/custom.css" />
      <link rel="stylesheet" href="js/semantic.min.css" />
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="../traitement/traitement.php" method="post">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="nom" placeholder="E-mail" value="naly@gmail">
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="mdp" placeholder="Password" value="bbb"/>
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <input type="hidden" value="0" name="type">
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button id ="envoyer" class="main_bt">Sign In</button>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              
                            
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script src="js/custom.js">
        // document.addEventListener("DOMContentLoaded", function () {
        //     var date = document.getElementById('date');
        //     var input1 = document.getElementById('cueilleur');
        //     var input2 = document.getElementById('parcelle');
        //     var button = document.getElementById("valider");

        //     function listeCueilleur() {
        //         var xhrCuei = new XMLHttpRequest();

        //         xhrCuei.onreadystatechange = function () {
        //             if (xhrCuei.readyState == 4) {
        //                 let listeCueilleur = JSON.parse(xhrCuei.responseText);
        //                 for (const cueilleur of listeCueilleur) {
        //                     const option = document.createElement('option');
        //                     option.value = cueilleur.id;
        //                     option.textContent = cueilleur.nom;
        //                     select1.appendChild(option);
        //                 }
        //             }
        //         }
        //         xhrCuei.open("GET", "traitementUser.php?choix=0", true);
        //         xhrCuei.send();
        //     }
        //     listeCueilleur();

        //     function listeParcelle() {
        //         var xhrDep = new XMLHttpRequest();

        //         xhrDep.onreadystatechange = function () {
        //             if (xhrDep.readyState == 4) {
        //                 let listeParcelle = JSON.parse(xhrDep.responseText);
        //                 for (const parcelle of listeParcelle) {
        //                     const option = document.createElement('option');
        //                     option.value = parcelle.numero;
        //                     option.textContent = parcelle.surface;
        //                     select2.appendChild(option);
        //                 }
        //             }
        //         }
        //         xhrDep.open("GET", "traitementUser.php?choix=0", true);
        //         xhrDep.send();
        //     }
        //     listeParcelle();

        //     function sendData() {
        //         var xhr = new XMLHttpRequest();
        //         var formData = new FormData(form);

        //         xhr.open("POST", "traitementUser.php?choix=0");
        //         xhr.send(formData);
        //     }

        //     var form = document.getElementById("myForm");

        //     form.addEventListener("submit", function (event) {
        //         event.preventDefault(); // évite de faire le submit par défaut
        //         sendData();
        //     })
        // })

      </script>
   </body>
</html>
<?php
include('../fonction/fonction (1).php'); 
$cueilleur = getAll("t_cueilleurs");
$parcelle = getAll("t_parcelle");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>thétathéta</title>
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/responsive.css" />
      <link rel="stylesheet" href="css/colors.css" />
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="css/custom.css" />
      <script>
      window.addEventListener("load",  () => {
            var date = document.getElementById('date');
            var select1 = document.getElementById('cueilleur');
            var select2 = document.getElementById('parcelle');
            var poids = document.getElementById('poids');
            var button = document.getElementById("valider");

         
            function sendData() {
                var xhr = new XMLHttpRequest();
                var formData = new FormData(form);

                xhr.open("POST", "traitementUser.php");
                xhr.send(formData);
            }

            var form = document.getElementById("myForm");

            form.addEventListener("submit",  (e) => {
                var formData = new FromData(form);
                e.preventDefault(); // évite de faire le submit par défaut
               const getData = () => {
                  let xhr = new XMLHttpRequest();
                  xhr.onreadystatechange = () => {
                     if(xhr.readyState == 4 && xhr.status == 200){
                        let retour = JSON.parse(xhr.responseText);
                        if (retour==="erreur")
                        { alert ('Poids trop grand'); }
                     }

                  }
                  xhr.open("POST","traitementUser.php",true);
                  xhr.send(formData);
               }
                sendData();
            })
        })
    </script> 
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index1.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_info">
                           <h6>Client</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     
                        <li>
                            <a href="Cueillettes.php" ><i class="fa fa-diamond purple_color"></i> <span>Cueillette</span></a>
                         </li>
                         <li><a href="saisiedepense.php" ><i class="fa fa-table purple_color2"></i> <span>Saisie dépenses</span></a>
                         </li>
                         <li>
                           <a href="listepaiement.php"><i class="fa fa-object-group blue2_color"></i> <span>Liste paiement</span></a>
                        </li>
                         <li>
                            <a href="Resultat.php"><i class="fa fa-object-group blue2_color"></i> <span>Résultat</span></a>
                         </li>
                         <li>
                        <a href="prevision.php"><i class="fa fa-object-group blue2_color"></i> <span>prevision</span></a>
                     </li>
                      
                  </ul>
               </div>
            </nav>
          
            <div id="content">
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index1.html"></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">Client</span></a>
                                    <div class="dropdown-menu">                       
                                       <a class="dropdown-item" href="../page/login.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Miarahaba anao mpanjifa izahay</h2>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                              <div class="card">
                                 <div class="card-body">
                                   <h5 class="card-title">Inserer une Cueillette</h5>
                                     <form action="" method="post" class="my-4 p-4 border">
                                         <div class="mb-3 row">
                                             <label for="inputText" class="col-sm-2 col-form-label">Date d'insertion cueillette</label>
                                             <div class="col-sm-10">
                                                 <input id = "date" type="date" class="form-control" name="dateinsert" placeholder="Entrez la date d'insertion de cueillette" required>
                                             </div>
                                         </div>
                                         <div class="mb-3 row">
                                             <label for="inputText" class="col-sm-2 col-form-label">Choix du cueilleur</label>
                                             <div class="col-sm-10">
                                                
                                                <select class="form-select" aria-label= "Default select example" id="select1" name="cueilleur">
                                                <?php
                                                for($i=0;$i<count($cueilleur);$i++){
                                                ?>
                                                <option value="<?php echo($cueilleur[$i]['id']); ?>"><?php echo($cueilleur[$i]['nom']);?></option>
                                             <?php } ?>   
                                             </select>
                                             </div>
                                         </div>
                                         <div class="mb-3 row">
                                            <label for="inputText" class="col-sm-2 col-form-label">Choix de la parcelle</label>
                                            <div class="col-sm-10">
                                            <select class="form-select" aria-label= "Default select example" id="select2" name="parcelle">
                                            <?php
                                                for($i=0;$i<count($parcelle);$i++){
                                                ?>
                                                <option value="<?php echo($parcelle[$i]['numero']); ?>"><?php echo($parcelle[$i]['numero']);?></option>
                                             <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputText" class="col-sm-2 col-form-label">Poids cueilli</label>
                                            <div class="col-sm-10">
                                               <input id = "poids" type="text" class="form-control" name="poids" placeholder="Entrez le poids cueilli" required>
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                          <div class="col-sm-2"></div>
                                          <div class="col-sm-10">
                                              <button id = "boutton" type="submit" class="btn btn-primary w-100">Valider</button>
                                          </div>
                                      </div>
                           </div>
                           
                        </div>
                       
                       
                     
                    
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2024 Designed by Matthew All rights reserved.<br><br>
                           Ramefison Matthew Herintsoa ETU002774
                           <p>Randrianarisoa Aroniaina Lucas ETU002707</p>
                           <p>Andriamampianina Naly Malala Fitiavana ETU001749</p>
                        </a>
                        </p>
                     </div>
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
      <script src="js/owl.carousel.js"></script> 
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>
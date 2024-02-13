<?php 
   include ("../fonction/fonction (1).php");
   $paiements= getAll("t_paiement");

 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Qualithé</title>
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/responsive.css" />
      <link rel="stylesheet" href="css/colors.css" />
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="css/custom.css" />
    
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
                         <li><a href="Saisiedepenses.php" ><i class="fa fa-table purple_color2"></i> <span>Saisie dépenses</span></a>
                         </li>
                         <li>
                            <a href="listepaiement.php"><i class="fa fa-object-group blue2_color"></i> <span>Liste Paiement</span></a>
                         </li>
                         <li>
                            <a href="Resultat.php"><i class="fa fa-object-group blue2_color"></i> <span>Resultat </span></a>
                         </li>
                         <li>
                        <a href="prevision.php"><i class="fa fa-object-group blue2_color"></i> <span>prevision</span></a>
                     </li>
                        </ul>
                     
               </div>
            </nav>


            <div id="content">
               <!-- topbar -->
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
                              <h2>Miarahaba anao mpanjifa</h2>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                              <div class="card">
                                 <div class="card-body">
                                   <h5 class="card-title">Liste de paiements</h5>
                                     <form action="" method="post" class="my-4 p-4 border">
                                         <div class="mb-3 row">
                                             <label for="inputText" class="col-sm-2 col-form-label">Date de début</label>
                                             <div class="col-sm-10">
                                                 <input type="date" class="form-control" name="date" required>
                                             </div>
                                         </div>
                                         <div class="mb-3 row">
                                            <label for="inputText" class="col-sm-2 col-form-label">Date de fin</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="datef" required>
                                            </div>
                                         </div>
                                         <div class="mb-3 row">
                                            <label for="inputText" class="col-sm-2 col-form-label">Date de paiement </label>
                                            <div class="col-sm-10">
                                               <input type="date" class="form-control" name="dtn"  required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="">
                                                  <option value=""></option>
                                            </select>
                                          </div>

                                          <div class="table_section padding_infor_info">
                                            <div class="table-responsive-sm">
                                               <table class="table table-hover">
                                                  <thead>
                                                     <tr>
                                                        <th>Id cueilleur</th>
                                                        <th>Poids </th>
                                                        <th>% bonus</th>
                                                        <th>% mallus</th>
                                                        <th>Montant paiement</th>
                                                     </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php for ($i=0; $i<count($paiements); $i++)
                                                      { ?>
                                                         <tr>
                                                            <td> <?php echo ($paiements[$i]['idCueilleur']); ?> </td>
                                                            <td> <?php echo ($paiements[$i]['poids']); ?></td>
                                                            <td> <?php echo ($paiements[$i]['bonus']); ?> </td>
                                                            <td> <?php echo ($paiements[$i]['malus']); ?></td>
                                                            <td> <?php echo ($paiements[$i]['montant']); ?></td>
                                                         </tr>
                                           <?php      } ?>
                                                  </tbody>
                                               </table>
                                            </div>
                                         </div>
                                         <div class="mb-3 row">
                                          <div class="col-sm-2"></div>
                                          <div class="col-sm-10">
                                              <button type="submit" class="btn btn-primary w-100">Ajouter</button>
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
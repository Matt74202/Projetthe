<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>thétathéta</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
    
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_info">
                           <h6>Admin maitre be</h6>
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
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Varietes</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="inserervariete.php">> <span>Inserer varietes</span></a></li>
                           <li><a href="gestionvariete.php">> <span>Gestion des varietes</span></a></li>
                        </ul>
                     </li>
                     <li><a href="#elements"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-table purple_color2"></i> <span>Parcelle</span></a>
                        <ul class="collapse list-unstyled" id="elements">
                           <li><a href="insererparcelle.php">> <span>Inserer Parcelle</span></a></li>
                           <li><a href="gestionparcelle.php">> <span>Gestion des parcelles</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Cueilleurs</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="insertcueilleurs.php">> <span>Inserer cueilleurs</span></a></li>
                           <li><a href="gestiocueilleurs.php">> <span>Gestion des cueilleurs</span></a></li>
                        </ul>
                     </li>
                     <li><a href="categoriedepense.php"><i class="fa fa-briefcase blue1_color"></i> <span>Categorie de dépenses</span></a></li>
                     <li>
                        <a href="salaire.php" ><i class="fa fa-clone yellow_color"></i> <span>Salaire</span></a>
                     </li>
                     <li><a href="settings.php"><i class="fa fa-cog yellow_color"></i> <span>Modification</span></a></li>

                      
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">Admin</span></a>
                                    <div class="dropdown-menu">                       
                                       <a class="dropdown-item" href="Eto no apetraka ny link makany am index"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
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
                              <h2>Miarahaba anao Ramose Mpiandraikitra</h2>
                           </div>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table class="table table-hover">
                              <thead>
                                 <tr>
                                    <th>Type de Variete</th>
                                    <th>Occupation de la variété</th>
                                    
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Thé vert</td>
                                    <td>12</td>
                                    
                                 </tr>
                                 <tr>
                                    <td>Thé noir</td>
                                    <td>22</td>
                                   
                                 </tr>
                                 <tr>
                                    <td>Thé bio</td>
                                    <td>32</td>
                                    
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
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
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>
<?php
   require_once("../../config/conexion.php");
   if(isset($_SESSION["usu_id"])){ //Si "usu_id" es vacio o no esta, lo manda de nuevo al index
?>

<!doctype html>
<html lang="en" class="no-focus">
    <head>
       
        <?php require_once("../MainHead/mainhead.php");?>

        <title>Home | Consultorio Oftalmológico</title>

    </head>
    <body>
        <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed sidebar-inverse">
            <aside id="side-overlay">
                <div id="side-overlay-scroll">
                    <div class="content-header content-header-fullrow">
                        <div class="content-header-section align-parent">
                            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <div class="content-header-item">
                                <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar32" src="../../public/img/avatars/avatar15.jpg" alt="">
                                </a>
                                <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            
            <nav id="sidebar">
                <div id="sidebar-scroll">
                    <div class="sidebar-content">
                        
                        <?php require_once("../MainSidebar/mainsidebar.php");?>

                        <!-- Side Navigation -->

                        <?php require_once("../MainMenu/mainmenu.php");?>
                       
                        <!-- END Side Navigation -->
                    </div>
                </div>
            </nav>

            <!-- Header -->
           
            <?php require_once("../MainHeader/mainheader.php");?>

            <!-- Header -->

            <!-- Main Container -->

            <main id="main-container">
                <div class="content">
                    
                </div>
            </main>
            
            <!-- Main Container -->

            <!-- Footer -->

            <?php require_once("../MainFooter/mainfooter.php");?>

            <!-- END Footer -->

        </div>

        <?php require_once("../MainJs/mainjs.php");?>

    </body>
</html>

<?php
   }else{
    header("Location: index.php");
   } 
?>
<?php
   require_once("../../config/conexion.php");
   if(isset($_SESSION["usu_id"])){
?>
<!doctype html>
<html lang="en" class="no-focus">
    <head>
       
        <?php require_once("../MainHead/mainhead.php");?>

        <title>Consultar Status | Consultorio Oftalmológo</title>

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
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Listado de Pacientes <small>Consultorio  Oftalmológo</small></h3>
                        </div>
                        <button  type="button" id="btnnuevo" class="btn btn-outline-primary btn-block mg-b-10">Nuevo Registro</button>
                        <div class="block-content block-content-full">
                            <table id="Pacientes_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">Nombre</th>
                                        <th style="width: 10%;">Fecha</th>
                                        <th class="text-center" style="width: 15%;"></th>
                                        <th class="text-center" style="width: 15%;"></th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
           
            <?php require_once("../MainFooter/mainfooter.php");?>

            <?php require_once("modalpaciente.php");?>

        </div>

        <?php require_once("../MainJs/mainjs.php");?>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  
        <script type="text/javascript" src="consultarstatus.js"></script>

    </body>
</html>

<?php
   }else{
    header("Location: index.php");
   } 
?>
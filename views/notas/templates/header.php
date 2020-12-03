<!DOCTYPE html>
<html lang="es">
<head>

<?php  $url= base_url(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php $url ?>assets/css/stylemisnotas.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>misnotas</title>
</head>


<body id="body-pd">
    
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        
        <div class="info-user">
            <h1><?php echo  $_SESSION['name']." ".$_SESSION['surname'] ?></h1>
            <div class="header_img">
                <img src="<?php  $url ?>assets/img/users/defaultUser.png" alt="user">
            </div>
        </div>
    </header>


    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="<?= base_url(); ?>notas" class="nav_logo">
                    <i class="bx bx-layer nav_logo-icon"></i>
                    <span class="nav_logo-name">NotasWeb</span>
                </a>

                <div class="nav_list ">
                <a   class="nav_link active" id="listarNotas">
                    <i class="bx bx-note nav_icon"></i>
                    <span class="nav_name">Mis Notas</span>
                </a>

                <a  class="nav_link" id="trash">
                    <i class="bx bx-trash nav_icon"></i>
                    <span class="nav_name">Papelera</span>
                </a>

                <!-- <a href="#" class="nav_link">
                    <i class="bx bx-message-square-detail nav_icon"></i>
                    <span class="nav_name">Messages</span>
                </a>

                <a href="#" class="nav_link">
                    <i class="bx bx-bookmark nav_icon"></i>
                    <span class="nav_name">Favoritos</span>
                </a>

                <a href="#" class="nav_link">
                    <i class="bx bx-folder nav_icon"></i>
                    <span class="nav_name">Datos</span>
                </a> -->
                </div>
            </div>

            <a href="<?= base_url(); ?>/logout" class="nav_link">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">Cerrar Session</span>
            </a>
        </nav>
    </div>

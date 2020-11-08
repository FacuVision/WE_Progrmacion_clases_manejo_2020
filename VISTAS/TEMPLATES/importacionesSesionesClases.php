<?php

session_start();

    if (!empty($_SESSION['nombre'])) 
    {
        $listaClases = $_SESSION['listaClases']; 
        if(isset($_SESSION["seleccion"])){
            $instructorSeleccionado = $_SESSION["seleccion"];
        }
        if(isset($_SESSION["clase_manejo"])){
            $clase_manejo = $_SESSION["clase_manejo"];
        }
        if(isset($_SESSION['listaClasesManejoPorDia'])){
            $listaClasesManejoPorDia = $_SESSION['listaClasesManejoPorDia'];
        }

        $listaInstructores = $_SESSION['listaInstructores'];        
        $TodoInstructor = $_SESSION['TodoInstructor'];

        $nombre_mes = $_SESSION['fechas']["mes_nombre"];
        $numero_mes = $_SESSION['fechas']['mes'];
        $numero_agno = $_SESSION['fechas']["año"];
        $numero_dia = $_SESSION['fechas']["dia"];

        $listaCursos = $_SESSION['listaCursos'];
        $listaCoches = $_SESSION['listaCoches'] ;
        $listaAlumnos = $_SESSION['listaAlumnos'];

        $listahorarios = $_SESSION['horarios'];
        $listaPorTerminar = $_SESSION['lista_horarios'];
    } else{
        echo '<script> document.location.href="Login.php";</script>';  
    }

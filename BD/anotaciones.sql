
/* SESIONES CREADAS HASTA EL MOMENTO */
/*echo '<pre>' . var_export($lista, true) . '</pre>';*/




/*ADMIN*/

$_SESSION['id_administrador'];
$_SESSION['nombre'];

/*LISTA DE AÑOS*/
$_SESSION['lista_agnos'];

/*LISTA DE MESES*/
$_SESSION['lista_meses'];

$_SESSION['listaCoches'] 
$_SESSION['listaCursos'] 
$_SESSION['listaAlumnos']




/*array_de_fechas*/
$fechas = array("dia"=>1,"mes"=>2,"año"=>3,"mes_nombre"=>"");
$id_fechas = array("id_dia"=>1,"id_mes"=>2,"id_agno"=>3,"id_clase_manejo"=>4,"id_detalle_clase_manejo"=>5);
$horarios = array("1. 8am-9am", "2. 9am-10am", "3. 10am-11am", "4. 11am-12pm", "5. 12pm-1pm", "6. 1pm-2pm", "7. 2pm-3pm", "8. 3pm-4pm", "9. 4pm-5pm", "10. 5pm-6pm", "11. 6pm-7pm", "12. 7pm-8pm");

$_SESSION['fechas']= $fechas;
$_SESSION['id_fechas']= $id_fechas;

$_SESSION['horarios'] = $horarios;
$_SESSION['lista_horarios'] = $lista_horarios;





/*
Lista de Clases segun dia
$_SESSION['listaClases']
*/
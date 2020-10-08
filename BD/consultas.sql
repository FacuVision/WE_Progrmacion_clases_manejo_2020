/*CONSULTA PARA GENERAL*/
SELECT  class.clas_fecha, det.det_horario, cur.cur_nombre, cur.cur_horas, det.det_n_clase, alum.alum_nombre, alum.alum_apellido, emp.emp_nombre, co.coche_tipo 
,det.det_asistencia
FROM clases_manejo as class 
INNER JOIN detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo
INNEr JOIN alumnos as alum on alum.id_alumno=det.id_alumno
INNER JOIN instructores as ins on ins.id_instructor=class.id_instructor
INNER join coches as co on co.id_coche=det.id_coche
INNER JOIN cursos as cur on cur.id_curso=det.id_curso
INNER join empleados as emp on emp.id_empleado=ins.id_empleado





/*SELECCION DE LAS FECHAS*/
SELECT * FROM dia as dia INNER JOIN mes as mes on mes.id_mes=dia.id_mes
INNER JOIN agno as an on an.id_agno=mes.id_mes


/*SELECCION DE CUENTA ADMINISTRADOR*/
SELECT * FROM empleados as emp 
INNER JOIN administradores as adm on adm.id_empleado=emp.id_empleado
WHERE emp.emp_correo='olenka@gmail.com' and  adm.admin_contra='olenka@gmail.com';
/*CONSULTA PARA GENERAL*/

SELECT det.det_horario, clas.clas_fecha, alum.alum_nombre, ins.ins_nombre, co.coche_tipo, det.det_asistencia,  cur.cur_nombre, det.det_hora 
FROM clase_manejo as clas 
INNER JOIN detalle_clase_manejo as det on clas.id_clase_manejo=det.id_clase_manejo
INNER JOIN curso as cur on cur.id_curso = det.id_curso
INNER join coche as co on co.id_coche = det.id_coche
INNER JOIN instructor as ins on ins.id_instructor= clas.id_instructor
inner join alumno as alum on alum.id_alumno= det.id_alumno
order by det.id_detalle_clase_manejo




/*SELECCION DE LAS FECHAS*/
SELECT * FROM dia as dia INNER JOIN mes as mes on mes.id_mes=dia.id_mes
INNER JOIN agno as an on an.id_agno=mes.id_mes
$(document).ready(function () {
    var texto = $("#ninguno").text();

    if(texto != ""){
        $("#clase").hide(); 
    }   
    if(texto == ""){
        $("#clase").show();
    } 
});
//permite obtener el id de la clase  y colocarlo en el modal

function obtener_id(id_detalle, id_clase) {
    let id_detalle_env = id_detalle;
    let id_clase_env = id_clase;
    
    $("#detalle").val(id_detalle_env);
    $("#clase_antigua").val(id_clase_env);
}
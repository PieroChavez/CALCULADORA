/*=============================================
IMPRIMIR
=============================================*/

$(".ver_presupuesto").on("click", ".btnImprimir", function(){
	var idProyecto = $(this).attr("idProyecto");

	window.open("extensiones/factura.php?codigo="+idProyecto, "_blank"); 

})
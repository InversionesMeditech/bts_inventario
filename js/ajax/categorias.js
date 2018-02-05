$(document).ready(function(){
    load();
});

function load(){
    $('#table_categorias').DataTable( {
        destroy: true,
		ajax: {
			url: "./controller/controller_categoria?action=b",
            type: "POST"
		},					
		"columns": [
			{ "data": "id_categoria" },
			{ "data": "nombre_categoria" },
			{ "data": "descripcion_categoria" },
			{ "data": "date_added" },
            { "data": "acciones" }
            ],
        language: {
            url: './libraries/datatable_esEs.json'
        },    
	});
}

function eliminar(id){
    if (confirm('¿Realmente deseas eliminar?')){
            $.ajax({
                type: 'POST',
                url: './controller/controller_categoria?action=d&id='+id,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load();}});}}
    
$('#guardar_categorias').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './controller/controller_categoria',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load();}});
    event.preventDefault();})

$( '#actualizar_categorias' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './controller/controller_categoria',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load();}});
    event.preventDefault();})


$('#updcategorias').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var nombre_categoria = button.data('nombre_categoria')
    var descripcion_categoria = button.data('descripcion_categoria')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_nombre_categoria').val(nombre_categoria)
    modal.find('.modal-body #upd_descripcion_categoria').val(descripcion_categoria)
    modal.find('.modal-body #upd_id').val(id)})



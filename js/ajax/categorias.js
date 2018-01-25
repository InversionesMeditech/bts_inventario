$(document).ready(function(){
    load(1);
});
function load(page){
    var nombre_categoria = $('#nombre_categoria').val();
    var parametros = { 'action':'ajax','page':page,'nombre_categoria':nombre_categoria,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/categorias/buscar_categorias',
            beforeSend: function(objeto){
                        $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');},
            success: function(data){
                        $('.outer_div').html(data).fadeIn('slow');
                        $('#loader').html('');}})}
function eliminar(id){
    var q = $('#q').val();
    if (confirm('¿Realmente deseas eliminar?')){
            $.ajax({
                type: 'GET',
                url: './ajax_php/categorias/buscar_categorias',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_categorias').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/categorias/agregar_categorias',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_categorias' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/categorias/actualizar_categorias',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
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

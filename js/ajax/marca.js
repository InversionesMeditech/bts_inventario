$(document).ready(function(){
    load(1);
});
function load(page){
    var nom_marca = $('#nom_marca').val();
    var parametros = { 'action':'ajax','page':page,'nom_marca':nom_marca,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/marca/buscar_marca',
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
                url: './ajax_php/marca/buscar_marca',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_marca').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/marca/agregar_marca',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_marca' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/marca/actualizar_marca',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updmarca').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var nom_marca = button.data('nom_marca')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_nom_marca').val(nom_marca)
    modal.find('.modal-body #upd_id').val(id)})

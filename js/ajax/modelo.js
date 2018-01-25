$(document).ready(function(){
    load(1);
});
function load(page){
    var nom_modelo = $('#nom_modelo').val();
    var idmarca = $('#idmarca').val();
    var parametros = { 'action':'ajax','page':page,'nom_modelo':nom_modelo,'idmarca':idmarca,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/modelo/buscar_modelo',
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
                url: './ajax_php/modelo/buscar_modelo',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_modelo').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/modelo/agregar_modelo',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_modelo' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/modelo/actualizar_modelo',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updmodelo').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var nom_modelo = button.data('nom_modelo')
    var idmarca = button.data('idmarca')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_nom_modelo').val(nom_modelo)
    modal.find('.modal-body #upd_idmarca').val(idmarca)
    modal.find('.modal-body #upd_id').val(id)})

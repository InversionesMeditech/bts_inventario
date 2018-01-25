$(document).ready(function(){
    load(1);
});
function load(page){
    var fecha = $('#fecha').val();
    var parametros = { 'action':'ajax','page':page,'fecha':fecha,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/salidas/buscar_salidas',
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
                url: './ajax_php/salidas/buscar_salidas',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_salidas').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/salidas/agregar_salidas',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_salidas' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/salidas/actualizar_salidas',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updsalidas').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var fecha = button.data('fecha')
    var Detalles = button.data('Detalles')
    var idestado_salida = button.data('idestado_salida')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_fecha').val(fecha)
    modal.find('.modal-body #upd_Detalles').val(Detalles)
    modal.find('.modal-body #upd_idestado_salida').val(idestado_salida)
    modal.find('.modal-body #upd_id').val(id)})

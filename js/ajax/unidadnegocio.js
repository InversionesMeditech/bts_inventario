$(document).ready(function(){
    load(1);
});
function load(page){
    var Ruc = $('#Ruc').val();
    var parametros = { 'action':'ajax','page':page,'Ruc':Ruc,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/unidadnegocio/buscar_unidadnegocio',
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
                url: './ajax_php/unidadnegocio/buscar_unidadnegocio',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_unidadnegocio').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/unidadnegocio/agregar_unidadnegocio',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_unidadnegocio' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/unidadnegocio/actualizar_unidadnegocio',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updunidadnegocio').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var Ruc = button.data('Ruc')
    var UnegNombre = button.data('UnegNombre')
    var UnegDireccion = button.data('UnegDireccion')
    var UnegTelefono = button.data('UnegTelefono')
    var UnegCelular = button.data('UnegCelular')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_Ruc').val(Ruc)
    modal.find('.modal-body #upd_UnegNombre').val(UnegNombre)
    modal.find('.modal-body #upd_UnegDireccion').val(UnegDireccion)
    modal.find('.modal-body #upd_UnegTelefono').val(UnegTelefono)
    modal.find('.modal-body #upd_UnegCelular').val(UnegCelular)
    modal.find('.modal-body #upd_id').val(id)})

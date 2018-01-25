$(document).ready(function(){
    load(1);
});
function load(page){
    var firstname = $('#firstname').val();
    var parametros = { 'action':'ajax','page':page,'firstname':firstname,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/users/buscar_users',
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
                url: './ajax_php/users/buscar_users',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_users').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/users/agregar_users',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_users' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/users/actualizar_users',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updusers').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var lastname = button.data('lastname')
    var user_password_hash = button.data('user_password_hash')
    var user_email = button.data('user_email')
    var Admin = button.data('Admin')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_lastname').val(lastname)
    modal.find('.modal-body #upd_user_password_hash').val(user_password_hash)
    modal.find('.modal-body #upd_user_email').val(user_email)
    modal.find('.modal-body #upd_Admin').val(Admin)
    modal.find('.modal-body #upd_id').val(id)})

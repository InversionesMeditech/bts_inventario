$(document).ready(function(){
    load(1);
});
function load(page){
    var nom_proveedor = $('#nom_proveedor').val();
    var ruc_proveedor = $('#ruc_proveedor').val();
    var parametros = { 'action':'ajax','page':page,'nom_proveedor':nom_proveedor,'ruc_proveedor':ruc_proveedor,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/proveedor/buscar_proveedor',
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
                url: './ajax_php/proveedor/buscar_proveedor',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_proveedor').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/proveedor/agregar_proveedor',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_proveedor' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/proveedor/actualizar_proveedor',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updproveedor').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var nom_proveedor = button.data('nom_proveedor')
    var telf_proveedor = button.data('telf_proveedor')
    var cel_proveedor = button.data('cel_proveedor')
    var ruc_proveedor = button.data('ruc_proveedor')
    var dir_proveedor = button.data('dir_proveedor')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_nom_proveedor').val(nom_proveedor)
    modal.find('.modal-body #upd_telf_proveedor').val(telf_proveedor)
    modal.find('.modal-body #upd_cel_proveedor').val(cel_proveedor)
    modal.find('.modal-body #upd_ruc_proveedor').val(ruc_proveedor)
    modal.find('.modal-body #upd_dir_proveedor').val(dir_proveedor)
    modal.find('.modal-body #upd_id').val(id)})

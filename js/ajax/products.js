$(document).ready(function(){
    load(1);
});
function load(page){
    var nombre_producto = $('#nombre_producto').val();
    var id_categoria = $('#id_categoria').val();
    var idmaterial = $('#idmaterial').val();
    var idmodelo = $('#idmodelo').val();
    var parametros = { 'action':'ajax','page':page,'nombre_producto':nombre_producto,'id_categoria':id_categoria,'idmaterial':idmaterial,'idmodelo':idmodelo,};
    $('#loader').fadeIn('slow');
    $.ajax({
data: parametros,
            url: './ajax_php/products/buscar_products',
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
                url: './ajax_php/products/buscar_products',
                data: 'id=' + id,'q':q,
                beforeSend: function(objeto){
                        $('#resultados').html('Mensaje: Cargando...');},
                success: function(datos){
                        $('#resultados').html(datos);
    load(1);}});}}
$('#guardar_products').submit(function( event ) {
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/products/agregar_products',
            data: parametros,
            beforeSend: function(objeto){
                    $('#resultados_ajax').html('Mensaje: Cargando...');},
            success: function(datos){
                    $('#resultados_ajax').html(datos);
                    $('#guardar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$( '#actualizar_products' ).submit(function( event ){
    var parametros = $(this).serialize();
    $.ajax({
            type: 'POST',
            url: './ajax_php/products/actualizar_products',
            data: parametros,
            beforeSend: function(objeto){
                $('#resultados_ajax2').html('Mensaje: Cargando...');},
            success: function(datos){
                $('#resultados_ajax2').html(datos);
                $('#actualizar_datos').attr('disabled', false);
    load(1);}});
    event.preventDefault();})
$('#updproducts').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var codigo_producto = button.data('codigo_producto')
    var nombre_producto = button.data('nombre_producto')
    var precio_producto = button.data('precio_producto')
    var stock = button.data('stock')
    var id_categoria = button.data('id_categoria')
    var idmaterial = button.data('idmaterial')
    var idmodelo = button.data('idmodelo')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #upd_codigo_producto').val(codigo_producto)
    modal.find('.modal-body #upd_nombre_producto').val(nombre_producto)
    modal.find('.modal-body #upd_precio_producto').val(precio_producto)
    modal.find('.modal-body #upd_stock').val(stock)
    modal.find('.modal-body #upd_id_categoria').val(id_categoria)
    modal.find('.modal-body #upd_idmaterial').val(idmaterial)
    modal.find('.modal-body #upd_idmodelo').val(idmodelo)
    modal.find('.modal-body #upd_id').val(id)})

$(document).ready(function()
{
    load_Cmodelo(1);
    //load_Cproducto(1);
});

    function load_Cmodelo(page){
                    var q= $("#q").val();
                    var id_marcaCB= $("#id_marcaCB").val();                 
                    var parametros={'action':'ajax','page':page,'q':q,'id_marcaCB':id_marcaCB};
                    $("#loader").fadeIn('slow');
                    $.ajax({
                            data: parametros,
                            url:'./ajax/Combox/C_modelo.php',
                             beforeSend: function(objeto){
                             $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
                      },
                            success:function(data){
                                    $(".CBmodulo").html(data).fadeIn('slow');
                                    $('#loader').html('');

                            }
                    })
            }
      function load_Cproducto(page){
                    var idcategoria= $("#categoria").val();   
                    var idmaterial= $("#material").val();   
                    var id_marcaCB= $("#id_marcaCB").val();
                    var idmodeloCB= $("#id_modeloCB").val();   
                    var parametros={'action':'ajax','page':page,'idcategoria':idcategoria,'idmaterial':idmaterial,'id_marcaCB':id_marcaCB,'idmodeloCB':idmodeloCB};
                    $("#loader").fadeIn('slow');
                    $.ajax({
                            data: parametros,
                            url:'./ajax/Combox/C_productos.php',
                             beforeSend: function(objeto){
                             $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
                      },
                            success:function(data){
                                    $(".CBproducto").html(data).fadeIn('slow');
                                    $('#loader').html('');

                            }
                    })
            }

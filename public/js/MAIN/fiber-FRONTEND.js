$(document).ready(function(){


    if (typeof productos !== 'undefined') {
        productos.forEach(producto => {
            $('#descripcionProducto-'+producto.id).html(producto.descrip_corta);
        });
    }


    
});




function verProducto(producto,url){
    console.log(producto);
    $('#tituloProducto').html(producto.name);
    $('#precioProducto').html(producto.purchase_price+'€');
    $('#descripcionProducto').html(producto.description);
    $('#imgPrincipal').attr('src','storage/'+url);
    $('#ImgPrincipalpequeña').attr('src','storage/'+url);
    $('#product_modal').modal('show');
}
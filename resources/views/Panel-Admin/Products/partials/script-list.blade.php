<script>

     // Write on keyup event of keyword input element
    $(document).ready(function(){
        $("#product_search_name,#product_search_price").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#list-table tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });



    
    //Parte de activar o desactivar.
    $('div[id*=activo]').on('click',function(click){

        if(!click.currentTarget.hidden && click.currentTarget.id != 'activo'){
            click.currentTarget.id.split('-')[0] == 'activo' ? $('div#inactivo-'+click.currentTarget.id.split('-')[1]).attr('hidden',false) : $('div#inactivo-'+click.currentTarget.id.split('-')[1]).attr('hidden',true);
            click.currentTarget.id.split('-')[0] == 'inactivo' ? $('div#activo-'+click.currentTarget.id.split('-')[1]).attr('hidden',false) : $('div#activo-'+click.currentTarget.id.split('-')[1]).attr('hidden',true);
  
            if(click.currentTarget.id.split('-')[0] == 'activo'){

                $.ajax({
                    url : 'Productos/inactivo-'+click.currentTarget.id.split('-')[1],
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type : 'PATCH',
                }); 

            }else{

                $.ajax({
                    url : 'Productos/activo-'+click.currentTarget.id.split('-')[1],
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type : 'PATCH',
                }); 

            }
        };
    });
    



</script>
$(document).ready( function(){
   
    /**
     * Script de FiberMovil 
      * 
      * @Title: Administrar Fiber BACK-END
      * @Author: DaGoGi
      *  
      * @Vista : Importaciones Excel
      * @Title : 
      * @Author: DaGoGi
      * @description: Funciones
    */
   
     //Parte de Importaciones

     $("#search").keyup(function(){
      _this = this;
      // Show only matching TR, hide rest of them
      $.each($("#tablaImportar tbody tr"), function() {
      if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
      $(this).hide();
      else
      $(this).show();
      });
      });

     // --Parte de importaciones
    if(typeof producto != 'undefined'){
      $('.note-editable')[0].innerHTML = producto.description;
    }
    if(typeof productos != 'undefined'){
      productos.forEach(elemento =>{
        $('#Productos-'+elemento.id).html(elemento.description);
      });  
    }

  //Form Crear
  //Conversor de Datos
  $('#formularioCrearProducto').on('submit', function(e){

    $("#description")[0].value = $(".note-editable")[0].innerHTML;

    $('#sku').removeAttr('disabled');

  });

  //Ocultar o no Oferta
  $('#offer').on('blur',function(e){
    let valorOferta = e.currentTarget.value;
    
    if (valorOferta == 'Si'){
      $('.ventaCaliente').css('display','block');
    }else{
      $('.ventaCaliente').css('display','none');

    }
  });

  //Name
  $('#name').on('blur',function(e){
    nameS= $('#name').val();

    $('#sku').val(nameS);
  });


  $("#cat").on('change',function(){
    $('#id_cat').val($('#cat')[0].value);
    
  });


  //Eventos de Canones

  //editar
  $('#subC_editar').on('keyup',function(tecla){


    if(tecla.key == ',' && $('#subC_editar').val() != ','){
      console.log($('#subC_editar').val().slice(0, -1));
      $('#subC_editar').attr('background-color','blue');
    }
  });

  //Añadir Subcategoria a tabla
  $('#asociarInput').on('keyup',function(tecla){
    //Compruebo que la tecla dada es Enter
    if(tecla.key == 'Enter' && $('#asociarInput').val() != ""){

      
      let asociacion = "";

      
      asociacion = $('#asociarInput').val();

      let plantilla = "";

      //Creo la plantilla de la fila
      plantilla =`
      <tr class="gradeA" id="filaT">
        <td>`+asociacion+`</td>
        <td>`+$('#canonName').val()+`</td>
      </tr>
      `;
    
      //creo la plantilla

      //Compruebo que ese canon no esta añadido

      //Si hay mas de una fila en la tabla...
      if($('[id*="filaT"]').length > 0 )
      {
        //transformo todas las filas a un array para recorrerlo
        let filas =$('[id*="filaT"]').toArray();

        //recorro el array
        filas.forEach(fila =>{

          //Si el nombre de la fila es igual al de la asociacion...
          if(fila.cells[0].textContent == asociacion){

            console.log('valor repetido');

          }
          //de lo contrario,creo una fila
          else
          {
            console.log('Añadiendo Fila');
            if($('[id*="filaT"]').toArray()[$('[id*="filaT"]').toArray().length-1].cells[0].textContent === asociacion)
            {
              console.log('valor duplicado');
            }else{
              //La agrego
              $('#asociarCanonT').append(plantilla);
            
              //Creo el input para el formulario y trabajar despues con los datos
              let inputAsociacion = `<input type="hidden"  name="`+asociacion+`" value="`+asociacion.split('-')[0]+`"></input> `;

              //Lo agrego al formulario
              $('#fCrearAsociacion').append(inputAsociacion);
      
              //Limpio input
              $('#asociarInput').val('');
              }

          };
        });
      }
      else if($('[id*="filaT"]').length === 0)
      {
        let inputAsociacion = `<input type="hidden"  name="`+asociacion+`" value="`+asociacion.split('-')[0]+`"></input> `;

        $('#fCrearAsociacion').append(inputAsociacion);

        $('#asociarCanonT').append(plantilla);
      
        //Limpio input
        $('#asociarInput').val('');
      }
    };

  });


});

// Funciones Generales


//borrar
function borrar(){
  return confirm('¿Quieres Borrar el producto ?');
}

//Modales

//Subcategoria Ver
function SubcategoriaModal(id,nombre){

  let subcategoriaFinal = new Array;

  //Recorro todas las subcategorias y las asocio al id clickado
  subcategorias.forEach(subcategoria => {
    if (id == subcategoria.id_category){
      subcategoriaFinal.push(subcategoria);
    }
    
  });


  $("#verSubCategoryTittle").text("Subcategorias de "+nombre);
    let plantilla;
    let boton;
    
    boton = '';
    plantilla = '';
    subcategoriaFinal.forEach(subcategoria =>{

      plantilla +=`
          <tr class="gradeA">
          <td>`+subcategoria.name+`</td>
          <td>`+nombre+`</td>
          <td class="center hidden-phone" >
              <form action="SubCategorias/`+subcategoria.id+`" method="GET">
              <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
              </form>
          </td>
        </tr>
        `
      
    })
    
    $("#botonCrear").remove();
    boton = `<button class="btn btn-success" id="botonCrear" onclick="crearSubcategoria(`+id+`)"> Crear Subcategoria </button> `

    $("#cabeceraVerSubcategoria").append(boton);
    $("#tablaSubcategoria").html(plantilla);
    
    $("#verSubCategorias").modal('show');
  }

  //Crear Subcategoria Modal
  function crearSubcategoria(id){
    let inputId=`<input type="hidden" name="id" value="`+id+`">`;

    $('#formularioCrear').append(inputId);
    $("#crearSubcategoria").modal('show');
  }

  //editar Subcategoria
  function editarCategoria(id,categoria_name){
    let subcategoriaFinal = "";
    let subcategoriaID = new Array;
    //Nombre de la Categoría colocandolo en el input
    $('#category_name').val(categoria_name);

    //Recorro todas las subcategorias y las asocio al id clickado
    subcategorias.forEach(subcategoria => {

      if (id == subcategoria.id_category){
        console.log(subcategoriaFinal);
        subcategoriaFinal = subcategoria['name'] +','+subcategoriaFinal;
        subcategoriaID.push(id);
      }
    
    });

    $('#id').val(subcategoriaID);
    $('#subcategory').val(subcategoriaFinal);
    $('#formularioEditarCategoria').attr('action','Categorias/'+id);

    $('#editarCategoria').modal('show');

}

//Abrir Crear Canon
function crearCanon(){
  $('#crearCanon').modal('show');
}
//Abrir Creador de Categorias
function abrirCrearCategoria(){
  $('#ModalCrearCategorias').modal('show');
}

//Abrir Creador de Productos
function abrirCrearProductos(){
  $('#ModalCrearProductos').modal('show');
}

//Importar o Exportar
function abrirImportaroExportar(){
  $('#modalImportaruExportar').modal('show');
}

//Abrir Editar Imagenes
function abrirMostrarImagenes(img,productName){

  $('#tituloImgModal').text('Imagenes del Producto '+productName);
  //http://localhost:8000/storage/uploads/HOkp33VotAv9xLpDPXTY0AiCQajpruhqFIRYRUWn.jpeg

  $('#cajaImg').empty();


  if(img.length > 0){

    img.forEach(imgItem =>{
      if(imgItem.id != 1){
        //Hacemos la plantilla de la imagen
        plantilla_img = `<img id="`+imgItem.id+`" class="img"  style="width:100%;height:auto"  hidden src="http://localhost:8000/storage/`+imgItem.img+`"></img>`;

        $('#cajaImg').append(plantilla_img);
      }else{
          //Hacemos la plantilla de la imagen
          plantilla_img = `<img id="`+imgItem.id+`"  class="img"  style="width:100%;height:auto" src="http://localhost:8000/storage/`+imgItem.img+`"></img>`;

          $('#cajaImg').append(plantilla_img);
      }
    });
  }

  $('#modalImagenes').modal('show');
}

//Abrir editar Canon
function abrirEditarCanon(canon,subcategorias){

  //Reinicio el action 
  $('#formularioEditarCanon').attr('action','Canon');

  //recojo el URL normal
  let temporal = $('#formularioEditarCanon').attr('action');

  //le añado el ID del canon
  $('#formularioEditarCanon').attr('action',temporal+'/'+canon.id);
  $('#idCanon').remove();

  //Añado una plantilla de un campo secreto con la ID
  let inputSecret = `<input hidden id="idCanon" value="`+canon.id+`" name="id">`;
  
  //Relleno Campos
  $('#formularioEditarCanon').append(inputSecret);
  $('#editarname').val(canon.name);
  $('#impuestoEditar').val(canon.impuesto);
  if( canon.tipo == 'Fijo' ){
    $('#fijo').attr('selected','selected');
  }else{
    $('#porcentaje').attr('selected','selected');
  }

  //$('#subC_editar').val(canon.name);
  /*
  if( canon.status == 1){
    $('#switchEditar').empty();
    let plantilla = `
    <span class="onoffswitch-inner"></span>
    <span class="onoffswitch-switch"></span>`;
    $('#switchEditar').append(plantilla);
  }else{
    $('#switchEditar').empty();
    let plantilla = `
    <span class="onoffswitch-switch"></span>
    <span class="onoffswitch-inner"></span>`;
    $('#switchEditar').append(plantilla);
  }*/



  $('#editarCanon').modal('show');
}

function mostrarSCanon(canon,asociadas,subcategorias){

  let plantilla;
  plantilla = '';
  $('#tSCanon').empty();
  $('#TituloCanon').empty();
  $('#asociarBTN').remove();
  subcategorias.forEach(subcategoria =>{
    
    asociadas.forEach(asociada =>{

      if(subcategoria.id === asociada.id_subCategory){
        plantilla +=`
        <tr class="gradeA">
        <td>`+subcategoria.name+`</td>
        <td>`+canon.name+`</td>
        <td class="center hidden-phone" >
            <form action="Canon/SubCanones/`+asociada.id+`" method="GET">

            <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
            </form>
        </td>
      </tr>
      `
      }

    })
      
  });

  //Crear Boton
  //Parseo el Objeto con Stringify para poder usarlo
  let boton = `<button class="btn btn-primary" id="asociarBTN" onclick='asociarC(`+JSON.stringify(canon)+`)'> Asociar</button> `


  $('#cabeceraCanon').append(boton);
  $('#tSCanon').append(plantilla);
  $('#TituloCanon').append(canon.name);
  $('#mostrarSubcategorias').modal('show');
}

function asociarC(canon){
  $('#asociarCanontitle').text('Asociar a : ' +canon.name);
  let inputName = `<input type="hidden"  id="canonName" value="`+canon.name+`"></input> `;
  let inputId = `<input type="hidden"  id="canonId" name="idCanon" value="`+canon.id+`"></input> `;
  $('#fCrearAsociacion').append(inputName);
  $('#fCrearAsociacion').append(inputId);

  $('#asociarS').modal('show');
}
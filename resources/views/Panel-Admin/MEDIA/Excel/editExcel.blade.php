@extends('Panel-Admin.Layouts.index')

@section('ContenidoPrincipal')
<script>
    //Empezar con el aside de menu cerrado
    $('#container').addClass('sidebar-closed');
    $('#sidebar').css('margin-left','-210px');
    $('#nav-accordion').css('display','none');
    $('#main-content').css('margin-left','0px');

</script>

<section class="wrapper">
  <div class="content-panel">

    <h4><i class="fa fa-angle-right"></i>
       Importaciones del Excel
       <p id="contadorFilas" class="pull-right"><i class="fa fa-arrow-circle-o-left" id="atrasProductos"></i><i class="fa fa-arrow-circle-o-right" id="alanteProductos"></i></p>
    </h4>
    
    <section id="unseen">

      <form action="/panelAdministrador/prueba" method="POST">
        @csrf
        <table class="table table-bordered table-striped table-condensed" id="tablaImportar">
          <thead>
            <tr id="cabeceraInputs">
              <th><i class="fa fa-angle-left" id="AtrasCabecera"></i></th>
              @foreach($cabecera as $indice => $cab)
                <th id="{{$indice}}" >
                  <select name="{{$indice}}-{{$cab}}" class="form-control" id="{{$indice}}">
                    @foreach($caracteristicas as $caracteristica)
                      <option value="{{$caracteristica}}">{{$caracteristica}}</option>
                    @endforeach
                    <option id="nullOpt" value="null">{{$cab}}</option>
                  </select>
                </th>
              @endforeach
              <th><i class="fa fa-angle-right" id="AlanteCabecera"></i></th>
            </tr>
            <tr id="cabecera">
              <th></th>
              @foreach($cabecera as $indice => $cab)
                <th id="{{$indice}}" style="text-align:center" >{{$cab}}</th>
              @endforeach
              <th></th>
            </tr>
          </thead>
          <tbody id="cuerpo">
            @foreach($productos as $index => $producto)
              <tr id="tr-{{$index}}">
                <td style="border-style:none;border-bottom:none;background:white"></td>

                @foreach($cabecera as $indice => $cab)
                <td id="{{$indice}}">
                  <input type="text" class="form-control form-control-sm" id="{{$index}}-{{$indice}}" value="{{$producto[$cab]}}">                 
                </td>
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
        <input type="text" hidden id="dataI"  name="datos[]" >
        <small class="pull-right" style="">Con {{count($productos)}} entradas</small>
        
        <button class="btn btn-primary" style="width: 100%;margin:0px auto;position:relative;display:block">Importar</button>
      </form>
    </section>

  </div>
</section>

<script>
  
  //Pongo todos las opciones por defecto en los selects
  $('[id=nullOpt]').attr('selected',true);

  

  //Recojo los datos en primera instancia
  //-------------------------------------------------------------------------
  //  Recogida de datos del Parseo de Laravel
  //  1º.- Productos
  //  2º.-Caracteristicas
  //-------------------------------------------------------------------------

  //  1º.-Productos
  let datos = {!! json_encode($productos) !!};
  $('#dataI')[0].value = JSON.stringify(datos);

  //  2º.-Caracteristicas
  let caracteristicas = {!! json_encode($caracteristicas) !!};




  //Funciones referentes a la modificacion de Datos
  //  1-Inputs
  //  2-Selects Clasificadores de Información

  //Funciones referentes a edicion de las filas

  //------------------------------------------------------------------------
  //  1-INPUTS
  //------------------------------------------------------------------------

  //Funciones para actualizar los datos de los inputs
  //Cojo todas las filas, menos la cabecera  y la de los input.
  let tr = Array.from($('tr').slice(2,$('tr').length));

  tr.forEach( trItem => {
    
    $(trItem).on('click',function(event){

      //Recojo el valor en primera estancia
      let valor_input = event.target.value;

      //Hago un OnBlur del Input
      $(event.target).on('blur',function(event){

        //Si los valores son iguales, no hago cambios en el array
        if(valor_input === event.target.value){
          return false;
        }
        //Si son diferentes....Actualizo el Array con el valor actual
        else{
          
          //Identificador, donde el primer numero es el numero de Tr y el segundo el de la celda
          let identificadores = event.target.id;

          //Lo spliteo para tener en primer lugar el Tr y en segundo la celda de este
          identificadores  = identificadores.split('-');

          //Creo un JSON para que se vea mas claro
          identificadores = {
            'tr' : identificadores[0],
            'td' : identificadores[1]
          }

          console.log('Array!');

          //Cojo el placeholder, que es igual al array asociativo de los datos de los productos
          let index_asociativo = $('th#'+identificadores.td)[0].firstElementChild.placeholder;

          //Actualizo el elemento en el Array 
          datos[identificadores.tr][index_asociativo] = event.target.value;

          //Selecciono el input y lo actualizo con datos serializados con JSON_Parse
          $('#dataI')[0].value = JSON.stringify(datos);
        }
      });
    });
  });

  //------------------------------------------------------------------------
  //*************2-Selects Clasificadores de Información********************
  //------------------------------------------------------------------------

  //Cojo todos los selects
  let selectores = Array.from($('select'));

  //Recorro cada selector
  selectores.forEach(selector =>{
    
    selector.selectedOptions[0].value == 'null' ? $('select[id="'+selector.id+'"]').css('border-color','red') : console.log('err'); 

    //Añadiendo un evento a cada elemento
    $('select[id="'+selector.id+'"]').on('change',function(evento){

      //If acortado, commprobando dependiendo si es el valor nulo que se le asigna al valor por defecto.
      selector.selectedOptions[0].value != 'null' ? $('select[id="'+selector.id+'"]').css('border-color','grey') : $('select[id="'+selector.id+'"]').css('border-color','red');
      
      //El Valor actual seleccionado
      let valor_seleccionado = evento.currentTarget.selectedOptions[0].value;

      // Selecciono todos los input que acaben en... el id del selector
      // Esto es para actualizar todos esos input en funcion del valor que tengamos
      let input_delValor = Array.from($('input[id$="-'+selector.id+'"]'));


      //Llamo a la funcion para actualizar los inputs
      ActualizarInputs(input_delValor,valor_seleccionado);
    });


  });

  //Creacion y elementos de la tabla

  
  //-----------------------------------------------------------------------------
  //Elementos interaccionables
  //-----------------------------------------------------------------------------

  
  //Funciones para actualizar Productos de la tabla

  //-----------------------------------------------------------------------------
  //********************* Alante Productos***************************************
  //-----------------------------------------------------------------------------

  $('#alanteProductos').on('click',function(evento){

    //Creo un IDENTIFICADOR para reocrrer
    let id = 0 ;
    //Recojo los productos
    let productos = Array.from($('#cuerpo')[0].rows);
    //Creo el array de los que estan visibles
    let visibles = [];

    productos.forEach(Producto =>{

      if(!Producto.hidden){
        visibles.push(Producto);
        Producto.hidden = true;
      }

    });

    //Guardo el ultimo ID ,transformandolo en un array del TR  ya que el dato es TR-ID , cojo el ultimo para tener la referencia
    //Casteo el resultado porque esta en STRING en el ID lo parseo en base 10
    let id_LAST = parseInt(visibles[visibles.length-1].id.split('-')[1]);
    
    for(i=1;i<=10;i++){

      id = id_LAST + i;

      $('#tr-'+id).attr('hidden',false);
      
    }

    id_LAST = id_LAST +2;
    id = id+2;
    $('#atrasProductos').empty()
    $('#contadorFilas')[0].firstChild.append('Mostrando  del ' + id_LAST +  ' al ' +  id);


    
  });


  //-------------------------------------------------------------------------------
  //************************Funcion de Atras Productos*******************************
  //-------------------------------------------------------------------------------

  $('#atrasProductos').on('click',function(evento){

    //Creo un IDENTIFICADOR para reocrrer
    let id = 0 ;
    //Recojo los productos
    let productos = Array.from($('#cuerpo')[0].rows);
    //Creo el array de los que estan visibles
    let visibles = [];


    productos.forEach(Producto =>{

      if(!Producto.hidden){
        visibles.push(Producto);
      }

    });


    if(visibles[0].id.split('-')[1] === '0'){
      console.log('entra');
      return false;
    }else{
      productos.forEach(Producto =>{

        if(!Producto.hidden){
          visibles.push(Producto);
          Producto.hidden = true;
        }

      });


      //Guardo el ultimo ID ,transformandolo en un array del TR  ya que el dato es TR-ID , cojo el ultimo para tener la referencia
      //Casteo el resultado porque esta en STRING en el ID lo parseo en base 10
      let id_LAST = parseInt(visibles[visibles.length-1].id.split('-')[1]) -9;
      
      for(i=1;i<=10;i++){

        id = id_LAST - i;

        console.log('Visibilizando ' + id);
        $('#tr-'+id).attr('hidden',false);
        
      }

      id = id +1;
      //If Acortado 
      id_LAST == 10 ? id_LAST  : id_LAST = id_LAST +1;

      //Vaciando Atras Productos con las letras
      $('#atrasProductos').empty()

      //Agrego al Contador 
      $('#contadorFilas')[0].firstChild.append('Mostrando  del ' + id +  ' al ' +  id_LAST);
  
    }
    

    
  });

  //-------------------------------------------------------------------------------
  //************************Funcion de AtrasCabecera*******************************
  //-------------------------------------------------------------------------------
  
  $('#AtrasCabecera').on('click',function(evento){ 
    //Cojo las Celdas de la cabecera
    let cabecera = Array.from($('#cabecera')[0].cells);
    let inputC = Array.from($('#cabeceraInputs')[0].cells);
    let productos = Array.from($('#cuerpo')[0].rows);
    let visibles = [];

    //Para los Productos

    //Recorro cada Tr y cada celda dentro de este
    productos.forEach(elemento =>{

      if(!elemento.hidden){
        let tr = elemento;

        //Transformo en un array las Celdas TR
        let celdas_tr = Array.from(tr.cells);
  
        //Pongo el array a 0 me aseguro de que esta vacio
        visibles.length =0 ;
  
        celdas_tr.forEach(elemento =>{
          //Cojo el ID de este elemento Celda
          let id = elemento.id;
  
          //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
          if(
            !elemento.hidden && 
            id != ''  
            ){
              //Hago el control de Errores en el marcha atras 
              if(
                elemento.id === '0' ||
                elemento.id === '1' ||
                elemento.id === '2' ||
                elemento.id === '3'
              ){
                //Le retorno false, para que no actue de ninguna forma.
                return false;
              }else{
                visibles.push(elemento);
                //Coloco el elemento 
                elemento.hidden = 'true'
  
                if(id % 4 == 0){
                  id++;
                  for(b = 0 ; b < 4 ; b++){
  
                    id--;
  
                    celdas_tr.forEach(elemento =>{
  
                      if(elemento.cellIndex == id){
  
                        elemento.hidden = false;
                        
                      }
                    });
                  } 
                }
  
              }
          }
        });
      }

    });

  //Recorro cada Celda de la cabecera

  //Para las cabeceras
  visibles = [];
  cabecera.forEach(elemento =>{

    if(
        !elemento.hidden && 
        elemento.id != '')
        {
          if(
            elemento.id === '0' ||
            elemento.id === '1' ||
            elemento.id === '2' ||
            elemento.id === '3'
          ){
            return false;
          }else{
            //Cojo el ID de este elemento Celda
            let id = elemento.id;

            //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
            visibles.push(elemento);

            //Coloco el elemento 
            elemento.hidden = 'true';

            if(id % 4 == 0){

              id++;
              for(i = 0 ; i < 4 ; i++){

                id--;

                cabecera.forEach(elemento =>{

                  if(elemento.cellIndex == id){
                    elemento.hidden = false; 
                  }
                });
              } 
            }
          }
        }
    });

  visibles = [];
  inputC.forEach(elemento =>{

    if(
        !elemento.hidden && 
        elemento.id != ''){

          //Control de Errores para atras, que no vaya mas atras de estos elementos
          if(
            elemento.id === '0' ||
            elemento.id === '1' ||
            elemento.id === '2' ||
            elemento.id === '3'
          ){
            return false;
          }else{
          //Cojo el ID de este elemento Celda
          let id = elemento.id;

          //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
          visibles.push(elemento);

          //Coloco el elemento 
          elemento.hidden = 'true';

          if(id % 4 == 0){

            id++;
            for(i = 0 ; i < 4 ; i++){

              id--;

              inputC.forEach(elemento =>{

                if(elemento.cellIndex == id){
                  elemento.hidden = false; 
                }
              });
            } 
          }
        }
      } 
    });
  });

  //Funcion de alanteCabecera
  $('#AlanteCabecera').on('click',function(evento){

    //Cojo las Celdas de la cabecera
    let cabecera = Array.from($('#cabecera')[0].cells);
    let inputC = Array.from($('#cabeceraInputs')[0].cells);
    let productos = Array.from($('#cuerpo')[0].rows);
    let visibles = [];

    //Guardo la ultima ID

    // lOS DOS TH DE LAS FLECHAS Y EL TH QUE SOBRA PORQUE NOSOTROS CONTAMOS DESDE 0 LAS ID'S
    let lastId = cabecera.length-3;

    //Para los Productos
    productos.forEach(elemento =>{

      //Si el elemento no esta escondido lo cojo para hacer el avance
      if(!elemento.hidden){
         
        let tr = elemento;

        //Transformo en un array las Celdas TR
        let celdas_tr = Array.from(tr.cells);
        //Pongo el array a 0 me aseguro de que esta vacio
        visibles.length =0 ;

        celdas_tr.forEach(elemento =>{
          //Cojo el ID de este elemento Celda
          let id = elemento.id;

          //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
          if(
          !elemento.hidden && 
          id != ''  && 
          visibles.length != 4
          ){
            //Comprobación de errores, así no avanzara si el ID es el ultimo, osea si es la última celda
            if(elemento.id == lastId){
              return false;
            }else{
              //Lo agrego a Visibles
              visibles.push(elemento);
              //Coloco celdas del elemento  en oculto 
              elemento.hidden = 'true'
              id++;

              //Compruebo si es multiplo de 4 para mostrar las celdas de 4 en 4 
              if(id % 4 == 0){
                
                id = elemento.cellIndex;

                for(b = 0 ; b < 4 ; b++){

                  id++;

                  celdas_tr.forEach(elemento =>{

                    if(elemento.cellIndex == id){

                      elemento.hidden = false;
                      
                    }

                  });

                }
                
              }
            }
          
          }
        });
      }

    });

    //Reseteo la variable de Contador para las cabeceras
    visibles = [];

    //Recorro cada Celda de la cabecera
    //Para las cabeceras
    cabecera.forEach(elemento =>{

      //Cojo el ID de este elemento Celda
      let id = elemento.id;

      //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
      if(
        !elemento.hidden && 
        id != ''  && 
        visibles.length != 4
        ){

          if(elemento.id == lastId){
            return false;
          }else{

            visibles.push(elemento);
            //Coloco el elemento 
            elemento.hidden = 'true'
            id++;
            if(id % 4 == 0){

              id = elemento.cellIndex;

              for(i = 0 ; i < 4 ; i++){

                id++;

                cabecera.forEach(elemento =>{

                  if(elemento.cellIndex == id){

                    elemento.hidden = false;
                    
                  }

                });

              }
              
            }
          }
      
      }
    });

    //Reseteo la variable de Contador para los inputs
    visibles = [];
    //Recorro cada Celda de la cabeceraInput
    //Para las Input
    inputC.forEach(elemento =>{

      //Cojo el ID de este elemento Celda
      let id = elemento.id;

      //Compruebo que no este Oculto y su id no sea vacia [Las ID vacia son los botones de avance y retrocezo]
      if(
        !elemento.hidden && 
        id != ''  && 
        visibles.length != 4
        ){
          if(elemento.id == lastId){
            return false;
          }else{
            visibles.push(elemento);
            //Coloco el elemento 
            elemento.hidden = 'true'
            id++;
            if(id % 4 == 0){

              id = elemento.cellIndex;

              for(i = 0 ; i < 4 ; i++){

                id++;

                inputC.forEach(elemento =>{

                  if(elemento.cellIndex == id){

                    elemento.hidden = false;
                    
                  }

                });

              }
              
            }
          
          }
        }
    });

  });


  //Formateo de la tabla


  //Cortando la tabla
  if($('#cabecera')[0].cells.length >= 4){

    let cabecera = Array.from($('#cabecera')[0].cells);
    let productos = Array.from($('#cuerpo')[0].rows);
    let inputC = Array.from($('#cabeceraInputs')[0].cells);
    let visibles = [];

    //De los productos
    productos.forEach((producto,indice) =>{
      let celdas =  Array.from(producto.cells); 
      if(indice >= 10){
        
        producto.hidden = 'true';

      }
      celdas.forEach(celda =>{
        if(celda.id > 3 ){
          celda.hidden = 'true';
        };
      })
    });

    //Para poner el texto
    productos.forEach(PRODUCT =>{
      if(!PRODUCT.hidden){
        visibles.push(PRODUCT);
      };
    });

    let length = visibles.length;
    
    $('#contadorFilas')[0].firstChild.append('Mostrando  del ' + visibles[1].id.split('-')[1] +  ' al ' +  length);


    //Cabecera
    cabecera.forEach(elemento =>{
      if(elemento.id > 3){
        elemento.hidden = 'true';
      }
    });

    //Inputs
    inputC.forEach(elemento => {
      if(elemento.id > 3){
        elemento.hidden = 'true';
      }
    });

  }



  //-----------------------------------------------------------------------------------------------------
  // Funciones para el Script
  //-----------------------------------------------------------------------------------------------------

  //  Funcion de actualizar cada Input 

  function ActualizarInputs(inputs,selectorV){

    //Compruebo que Selector ha Seleccionado

    switch(selectorV){
      
      //Canon
      case 'Canon':
        console.log('Canon');
      break;

      //SubCategoria

      case 'SubCategoria':
        
        //Hago una expresion regular para comprobar si puedo autodetectar la categoria
        regex = /(\/)/;

        //Recorro cada input
        inputs.forEach(INPUT =>{

          if(regex.test(INPUT.value)){
            
            INPUT.value.replace(/[ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç]/gm , function(texto){
              if(texto == 'á'){
                return 'a';
              }else if(texto == 'ó'){
                return 'o';
              }else if(texto == 'é'){
                return 'e';
              }else if(texto == 'ú'){
                return 'u';
              }else if(texto == 'í'){
                return 'i';
              }

            console.log(INPUT.value);
            });
            //Recortando Array 
            //let inputArr = INPUT.value.split('/');


          }else{
            console.log('La autodeteccion no funciono :V');
          }
        });


      break;

    }
    
  }
</script>
@endsection
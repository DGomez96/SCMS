<div class="modal fade " id="modalImportaruExportar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="width:70% !important" role="document">
     <div class="modal-content">
       <div class="modal-header" style="background:#d9534f">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <h5 class="modal-title" id="ModalImportTitle" style="text-align:center">Importar y Exportar Productos</h5>

       </div>
       <div class="modal-body">
         <div id="rootwizard">
           <div class="navbar">
               <div class="navbar-inner form-wizard">
                   <ul class="nav nav-pills nav-justified steps">
                       <li class="active">
                           <a class="step" >
                             <img src="{{asset('images/excel.png')}}" style="width:10%;" alt="ExcelIcon">
                             <span class="desc">Excel</span>
                             <br>
                             <form action="{{ route('/panelAdministrador/importCatalogo') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <input type="file"  name="excelFile" >
                                 <button class="btn btn-primary" >Importar</button>
                             </form>
                             <br>
                             <a href="{{ url('/panelAdministrador/downloadCatalogoEX')   }}" class="btn btn-primary" style="width:50%;margin:0px auto;margin-top:1%;">Exportar</a>
                           </a>
                       </li>
                       <li>
                           <a href="#tab2" data-toggle="tab" class="step" aria-expanded="true">
                               <img src="{{asset('images/pdf-icon.png')}}" style="width:10%;" alt="PdfIcon">
                               <span class="desc">Pdf</span>
                               <br>
                               <a href="{{url('/panelAdministrador/downloadCatalogo')}}" class="btn btn-primary" style="font-weight:bold;width:50%;margin:0px auto;margin-top:1%;">Exportar</a>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
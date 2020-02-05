@extends("Panel-Admin.Layouts.index")

@section("ContenidoPrincipal")
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2 style="text-align:center">Crear Factura</h2>
                        </div>
                    </div>
                    <form action="#" class="form-vertical" id="validate" name="insert_invoice" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate" abineguid="0F0D4F42746D44A28EC955C32F89B93A">
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-sm-8" id="payment_from_1" style="display: block;">
                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">Comprador <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input list="compradores"  id="compradorInput"  class="form-control" placeholder="Comprador"  required=""  >
                                        <datalist id="compradores">
                                            @foreach($compradores as $comprador)
                                                <option id="{{$comprador->id}}" value="{{$comprador->name}}"></opt>
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class=" col-sm-3">
                                        <input id="myRadioButton_1" type="button" onclick="active_customer('payment_from_1')" class="btn checkbox_account color4 color5" name="customer_confirm" checked="checked" value="Nuevo Cliente">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8" id="payment_from_2" style="display: none;">
                                <div class="form-group row">
                                    <label for="customer_name_others" class="col-sm-3 col-form-label">Nombre del Comprador <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input autofill="off" type="text" size="100" name="customer_name_others" placeholder="Nombre del Comprador" id="customer_name_others" class="form-control" required="" aria-required="true">
                                        
                                    </div>

                                    <div class="col-sm-3">
                                        <input onclick="active_customer('payment_from_2')" type="button" id="myRadioButton_2" class="checkbox_account btn color4 color5" name="customer_confirm_others" value="Old Customer">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_name_others_address" class="col-sm-3 col-form-label">Direccion </label>
                                    <div class="col-sm-6">
                                        <input type="text" size="100" name="customer_name_others_address" class=" form-control" placeholder="Address" id="customer_name_others_address">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="store_id" class="col-sm-4 col-form-label">Tienda/Compañia <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Fecha <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control"  type="date" id="date" name="date"  required="" aria-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                <tr>
                                    <th class="text-center">Información del Producto <i class="text-danger">*</i></th>
                                    <th class="text-center" width="130">Variantes <i class="text-danger">*</i></th>
                                    <th class="text-center"></th>
                                    <th class="text-center">Unidades</th>
                                    <th class="text-center">Cantidad <i class="text-danger">*</i></th>
                                    <th class="text-center">Tarifa <i class="text-danger">*</i>
                                    </th>
                                    <th class="text-center">Dis/ Pcs </th>
                                    <th class="text-center">Total <i class="text-danger">*</i>
                                    </th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                <tr>
                                    <td>
                                        <input type="text" name="product_name" onkeyup="invoice_productList(1);" class="form-control productSelection" placeholder="Product Name" required="" id="product_name" aria-required="true">

                                        <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]">

                                        <input type="hidden" class="sl" value="1">

                                        <input type="hidden" class="baseUrl" value="">
                                    </td>
                                    <td class="text-center">
                                        <select name="variant_id[]" id="variant_id_1" class="form-control variant_id select2-hidden-accessible" required="" style="width: 100%" tabindex="-1" aria-hidden="true" aria-required="true">
                                            <option value=""></option>
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-variant_id_1-container"><span class="select2-selection__rendered" id="select2-variant_id_1-container"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </td>
                                    <td>
                                        <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_1" id="avl_qntt_1" placeholder="0" readonly="">
                                    </td>
                                    <td>
                                        <input type="text" id="" class="form-control text-right unit_1" placeholder="None" readonly="">
                                    </td>
                                    <td>
                                        <input type="number" name="product_quantity[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="total_qntt_1" class="form-control text-right" value="1" min="1" required="" aria-required="true">
                                    </td>
                                    <td>
                                        <input type="number" name="product_rate[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" placeholder="0.00" id="price_item_1" class="price_item1 form-control text-right" required="" min="0" aria-required="true">
                                    </td>
                                    <!-- Discount -->
                                    <td>
                                        <input type="number" name="discount[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="discount_1" class="form-control text-right" placeholder="0.00" min="0">
                                    </td>

                                    <td>
                                        <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" placeholder="0.00" readonly="readonly">
                                    </td>

                                    <td>
                                        
                                        <!-- Tax calculate start-->
                                            <input type="hidden" id="cgst_1" class="cgst">
                                            <input type="hidden" id="total_cgst_1" class="total_cgst" name="cgst[]">
                                            <input type="hidden" name="cgst_id[]" id="cgst_id_1">
                                                                                    <input type="hidden" id="sgst_1" class="sgst">
                                            <input type="hidden" id="total_sgst_1" class="total_sgst" name="sgst[]">
                                            <input type="hidden" name="sgst_id[]" id="sgst_id_1">
                                                                                    <input type="hidden" id="igst_1" class="igst">
                                            <input type="hidden" id="total_igst_1" class="total_igst" name="igst[]">
                                            <input type="hidden" name="igst_id[]" id="igst_id_1">
                                                                                <!-- Tax calculate end -->

                                        <!-- Discount calculate start-->
                                        <input type="hidden" id="total_discount_1" class="">
                                        <input type="hidden" id="all_discount_1" class="total_discount">
                                        <!-- Discount calculate end -->

                                        <button style="text-align: right;" class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this)">Borrar</button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                                                    <tr>

                                        <td style="text-align:right;" colspan="7"><b>Tasa 1:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_cgst" class="form-control text-right" name="total_cgst" placeholder="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                                                    <tr>
                                        <td style="text-align:right;" colspan="7"><b>Tasa 2:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_sgst" class="form-control text-right" name="total_sgst" placeholder="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                                                    <tr>
                                        <td style="text-align:right;" colspan="7"><b>Tasa 3:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_igst" class="form-control text-right" name="total_igst" placeholder="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                                                <tr>

                                    <td colspan="5" rowspan="4">
                                        <label for="invoice_details" class="">Detalles de la Facturas</label>
                                        <div id="edit" style="height:20rem;"></div >
                                    </td>

                                    <td style="text-align:right;" colspan="2">
                                        <b>Descuento del Producto:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" placeholder="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;" colspan="2">
                                        <b>Descuento de la Factura:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="invoice_discount" class="form-control text-right" name="invoice_discount" placeholder="0.00" onkeyup="calculateSum();" onchange="calculateSum();">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;" colspan="2"><b>Cargo por Servicio:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="service_charge" class="form-control text-right" name="service_charge" placeholder="0.00" onkeyup="calculateSum();" onchange="calculateSum();">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:right;" colspan="2">
                                        <b>Coste del Envio :</b>
                                        <select name="shipping_method" id="shipping_method" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option value=""></option>
                                            <option value="1" data-amount="10">MRW</option>
                                            <option value="2" data-amount="3">SEUR</option>
                                            <option value="9" data-amount="0">Correo Express</option>
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 230px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-shipping_method-container"><span class="select2-selection__rendered" id="select2-shipping_method-container"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </td>

                                    <td class="text-right">
                                        <input type="text" id="shipping_charge" class="form-control text-right" name="shipping_charge" onkeyup="calculateSum();" placeholder="0.00">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:right;"><b>El total:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" placeholder="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <input type="button" id="add-invoice-item" class="btn -btn-info color4 color5" name="add-invoice-item" onclick="addInputField('addinvoiceItem');" value="Añadir Producto">

                                    </td>
                                    <td style="text-align:right;" colspan="6"><b>Pago:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" placeholder="0.00">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="width: 220px">

                                        <input type="button" id="add-invoice" class="btn payment_button color4 color5" value="Pago">

                                    </td>

                                    <td style="text-align:right;" colspan="6"><b>Deuda:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" placeholder="0.00" readonly="readonly">
                                    </td>
                                </tr>

                                <!-- Payment method -->
                                <tr class="payment_method" style="display: none">
                                    <td colspan="7">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group row">
                                                    <label for="card_type" class="col-sm-4 col-form-label">Tipo de Tarjeta: </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2-hidden-accessible" name="card_type" id="card_type" tabindex="-1" aria-hidden="true">
                                                            <option value="Credit Card">Tarjeta de Credito</option>
                                                            <option value="Debit Card">Tarjeta de Debito</option>
                                                            <option value="Master Card">Master Card</option>
                                                            <option value="Amex">Amex</option>
                                                            <option value="Visa">Visa</option>
                                                            <option value="Paypal">Paypal</option>
                                                            <option value="Others">Otros</option>
                                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-card_type-container"><span class="select2-selection__rendered" id="select2-card_type-container" title="Credit Card"><span class="select2-selection__clear">×</span>Credit Card</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group row">
                                                    <label for="card_no" class="col-sm-4 col-form-label">Numero de Tarjeta                                                        :</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="card_no" id="card_no" placeholder="Card NO" required="" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </form>                </div>
            </div>
            <script type="text/javascript">

                // Counts and limit for invoice
                var count = 2;
                var limits = 500;

                //Add Invoice Field
                function addInputField(divName) {

                    if (count == limits) {
                        alert("You have reached the limit of adding " + count + " inputs");
                    } else {
                        var newdiv = document.createElement('tr');
                        var tabin = "product_name_" + count;

                        $("select.form-control:not(.dont-select-me)").select2({
                            placeholder: "Select option",
                            allowClear: true
                        });

                        newdiv.innerHTML = '<tr><td><input type="text" name="product_name" onkeyup="invoice_productList(' + count + ');" class="form-control productSelection" placeholder="Product Name" required="" id="product_name_' + count + '" ><input type="hidden" class="autocomplete_hidden_value product_id_' + count + '" name="product_id[]"/><input type="hidden" class="sl" value="' + count + '"><input type="hidden" class="baseUrl" value="http://softest3.bdtask.com/isshue1.9/" /></td>' +

                            '<td class="text-center"> <select name="variant_id[]" id="variant_id_' + count + '" class="form-control variant_id" required="" style="width: 100%"><option value=""></option></select></td>' +

                            '<td><input type="text" name="available_quantity[]"  class="form-control text-right available_quantity_' + count + '" id="avl_qntt_' + count + '" placeholder="0" readonly="1" /></td>' +

                            '<td><input type="text" id="" class="form-control text-right unit_' + count + '" placeholder="None" readonly="" /></td>' +

                            '<td><input type="number" onchange="quantity_limit(' + count + ')" name="product_quantity[]" ' +
                            'onkeyup="quantity_calculate(' +
                            count +
                            ');" onchange="quantity_calculate(' + count + ');" id="total_qntt_' + count + '" class="form-control text-right" value="1" min="1" required="" /></td>' +

                            '<td><input type="number" name="product_rate[]" onkeyup="quantity_calculate(' + count + ');" onchange="quantity_calculate(' + count + ');" placeholder="0.00" id="price_item_' + count + '" class="price_item' + count + ' form-control text-right" required="" min="0" /></td>' +

                            '<td><input type="number" name="discount[]" onkeyup="quantity_calculate(' + count + ');" onchange="quantity_calculate(' + count + ');" id="discount_' + count + '" class="form-control text-right" placeholder="0.00" min="0" /></td>' +

                            '<td><input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_' + count + '" placeholder="0.00" readonly="readonly" /></td>' +

                            '<td>' +

                            
                            '<input type="hidden" id="cgst_' + count + '" class="cgst"/> <input type="hidden" id="total_cgst_' + count + '" class="total_cgst" name="cgst[]" /> <input type="hidden" name="cgst_id[]" id="cgst_id_' + count + '">' +
                            
                            '<input type="hidden" id="sgst_' + count + '" class="sgst"/> <input type="hidden" id="total_sgst_' + count + '" class="total_sgst" name="sgst[]"/><input type="hidden" name="sgst_id[]" id="sgst_id_' + count + '">' +

                            
                            '<input type="hidden" id="igst_' + count + '" class="igst"/><input type="hidden" id="total_igst_' + count + '" class="total_igst" name="igst[]"/><input type="hidden" name="igst_id[]" id="igst_id_' + count + '">' +
                            

                            '<input type="hidden" id="total_discount_' + count + '" class="" />' +
                            '<input type="hidden" id="all_discount_' + count + '" class="total_discount"/><button style="text-align: right;" class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this)">Delete</button></td></tr>';
                        document.getElementById(divName).appendChild(newdiv);
                        document.getElementById(tabin).focus();
                        count++;

                        $("select.form-control:not(.dont-select-me)").select2({
                            placeholder: "Select option",
                            allowClear: true
                        });
                    }
                }


                //Select stock by product and variant id
                $('body').on('change', '.variant_id', function () {

                    var sl = $(this).parent().parent().find(".sl").val();
                    var product_id = $('.product_id_' + sl).val();
                    var avl_qntt = $('#avl_qntt_' + sl).val();
                    var store_id = $('#store_id').val();
                    var variant_id = $(this).val();

                    if (store_id == 0) {
                        alert('Please select store');
                        return false;
                    }

                    $.ajax({
                        type: "post",
                        async: false,
                        url: '',
                        data: {product_id: product_id, variant_id: variant_id, store_id: store_id},
                        success: function (data) {
                            // console.log(data);
                            if (data == 0) {
                                $('#avl_qntt_' + sl).val('');
                                alert('Product is not available in this store !');
                                return false;
                            } else {
                                $('#avl_qntt_' + sl).val(data);
                            }
                        },
                        error: function () {
                            alert('Request Failed, Please check your code and try again!');
                        }
                    });
                });
                //========================================================================================
                //after select variant check  limit to order limit
                $('#total_qntt_1').on('change', function () {
                    var current_quantity = $("#total_qntt_1").val();
                    var available_quantity = $("#avl_qntt_1").val();
                    if (parseInt(available_quantity) < parseInt(current_quantity)) {
                        alert('stock not available');
                        $("#total_qntt_1").val(1);
                        console.log('current qunatity' + current_quantity);
                        return false;
                    }
                });


               //select shipping method and amount
                $('#shipping_method').on('change', function () {
                    var shipping_charge = $("#shipping_method option:selected").attr("data-amount");

                    $('#shipping_charge').val(shipping_charge);
                    // var shipping_method_text = $("#shipping_method option:selected").text();
                    // $('#shipping_method_hidden').val(shipping_method_text);
                    calculateSum();


                })


                $('#compradorInput').on('blur',function(event){
                    console.log(event);
                });

            </script>
        </div>
@endsection
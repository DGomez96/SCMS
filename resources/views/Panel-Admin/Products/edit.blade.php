@extends('Panel-Admin.Layouts.index')

@section('ContenidoPrincipal')
<div id="page_heading">
    <h1 id="product_edit_name">Samsung Galaxy S6 edge, 64GB, Black</h1>
    <span class="uk-text-muted uk-text-upper uk-text-small" id="product_edit_sn">SM-G925TZKFTMB</span>
</div>
<div id="page_content_inner">
    <form action="" class="uk-form-stacked" id="product_edit_form">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin="">
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right">
                            <input type="checkbox" data-switchery="true" checked="" name="product_edit_active_control" id="product_edit_active_control" style="display: none;"><span class="switchery switchery-default" style="background-color: rgba(0, 150, 136, 0.5); border-color: rgba(0, 150, 136, 0.5); box-shadow: rgba(0, 150, 136, 0.5) 0px 0px 0px 7px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; background-color: rgb(0, 150, 136); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                        </div>
                        <label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Active</label>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <i class="md-icon material-icons"></i>
                        </div>
                        <h3 class="md-card-toolbar-heading-text">
                            Photos
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-margin-bottom uk-text-center uk-position-relative">
                            <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                            <img src="assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium dense-image dense-loading">
                        </div>
                        <ul class="uk-grid uk-grid-width-small-1-3 uk-text-center" data-uk-grid-margin="">
                            <li class="uk-position-relative">
                                <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                <img src="assets/img/ecommerce/s6_edge_1.jpg" alt="" class="img_small dense-image dense-loading">
                            </li>
                            <li class="uk-position-relative">
                                <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                <img src="assets/img/ecommerce/s6_edge_2.jpg" alt="" class="img_small dense-image dense-loading">
                            </li>
                            <li class="uk-position-relative">
                                <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                <img src="assets/img/ecommerce/s6_edge_3.jpg" alt="" class="img_small dense-image dense-loading">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Data
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="uk-icon-usd"></i>
                                </span>
                                <div class="md-input-wrapper md-input-filled"><label for="product_edit_price_control">Price</label><input type="text" class="md-input" name="product_edit_price_control" id="product_edit_price_control" value="540.00"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">%</span>
                                <div class="md-input-wrapper md-input-filled"><label for="product_edit_tax_control">Tax</label><input type="text" class="md-input" name="product_edit_tax_control" id="product_edit_tax_control" value="18"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="uk-icon-cubes"></i>
                                </span>
                                <div class="md-input-wrapper md-input-filled"><label for="product_edit_quantity_control">Quantity</label><input type="text" class="md-input" name="product_edit_quantity_control" id="product_edit_quantity_control" value="120"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="uk-icon-barcode"></i>
                                </span>
                                <div class="md-input-wrapper md-input-filled"><label for="product_edit_sku_control">SKU</label><input type="text" class="md-input" name="product_edit_sku_control" id="product_edit_sku_control" value="4319572394"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-7-10 uk-grid-margin">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Details
                        </h3>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin="">
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="product_edit_name_control">Product Name</label><input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="Galaxy S6 edge"><span class="md-input-bar"></span></div>
                                    
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="product_edit_manufacturer_control">Product Manufacturer</label><input type="text" class="md-input" id="product_edit_manufacturer_control" name="product_edit_manufacturer_control" value="Samsung"><span class="md-input-bar"></span></div>
                                    
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="product_edit_sn_control">Serial Number</label><input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" value="SM-G925TZKFTMB"><span class="md-input-bar"></span></div>
                                    
                                </div>
                                <div class="uk-form-row">
                                    <label for="product_edit_memory_control" class="uk-form-label">Internal memory</label>
                                    <select id="product_edit_memory_control" name="product_edit_memory_control" data-md-selectize="" tabindex="-1" style="display: none;" class="selectized"><option value="64gb" selected="selected">64GB</option></select><div class="selectize-control single"><div class="selectize-input items full has-options has-items"><div data-value="64gb" class="item">64GB</div><input type="text" autocomplete="off" tabindex="" style="width: 4px;"></div></div><div class="selectize_fix"></div>
                                </div>
                                <div class="uk-form-row">
                                    <label for="product_edit_color_control" class="uk-form-label">Color</label>
                                    <select id="product_edit_color_control" name="product_edit_color_control" data-md-selectize="" tabindex="-1" style="display: none;" class="selectized"><option value="black" selected="selected">Black</option></select><div class="selectize-control single"><div class="selectize-input items full has-options has-items"><div data-value="black" class="item">Black</div><input type="text" autocomplete="off" tabindex="" style="width: 4px;"></div></div><div class="selectize_fix"></div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-2 uk-grid-margin">
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="product_edit_tags_control">Tags</label>
                                    <select id="product_edit_tags_control" >Quad HD</option><option value="android_5" selected="selected">Android™ 5.0</option><option value="64gb" selected="selected">64GB</option></select><div class="selectize-control multi plugin-remove_button"><div class="selectize-input items not-full has-options has-items"><div data-value="lte" class="item">LTE<a href="javascript:void(0)" class="remove" tabindex="-1" title="Remove"></a></div><div data-value="quad_hd" class="item">Quad HD<a href="javascript:void(0)" class="remove" tabindex="-1" title="Remove"></a></div><div data-value="android_5" class="item">Android™ 5.0<a href="javascript:void(0)" class="remove" tabindex="-1" title="Remove"></a></div><div data-value="64gb" class="item">64GB</div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Options
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-2-10">
                                <span class="uk-display-block uk-margin-small-top uk-text-large">Colors <a href="#"><i class="material-icons uk-text-primary"></i></a></span>

                            </div>
                            <div class="uk-width-medium-8-10 uk-grid-margin">
                                <div class="uk-overflow-container">
                                    <table class="uk-table">
                                        <thead>
                                            <tr>
                                                <th class="uk-width-4-10 uk-text-nowrap">Color</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">In stock</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                                <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-medium" value="Black"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-center uk-text-middle"><div class="icheckbox_md checked"><input type="checkbox" data-md-icheck="" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="0.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-medium" value="White"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-center uk-text-middle"><div class="icheckbox_md"><input type="checkbox" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="+ 25.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-small" value="Red"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-center uk-text-middle"><div class="icheckbox_md checked"><input type="checkbox" data-md-icheck="" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td class="uk-text-nowrap uk-text-middle">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="- 10.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper"><input type="text" class="md-input md-input-width-medium" placeholder="Color"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-middle uk-text-center"><div class="icheckbox_md"><input type="checkbox" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper"><input type="text" class="md-input md-input-width-small uk-text-right" placeholder="Price"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-2-10">
                                <span class="uk-display-block uk-margin-small-top uk-text-large">Internal memory <a href="#"><i class="material-icons uk-text-primary"></i></a></span>
                            </div>
                            <div class="uk-width-medium-8-10 uk-grid-margin">
                                <div class="uk-overflow-container">
                                    <table class="uk-table">
                                        <thead>
                                            <tr>
                                                <th class="uk-width-4-10 uk-text-nowrap">Memory</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">In stock</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                                <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-medium" value="32GB"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-middle uk-text-center"><div class="icheckbox_md"><input type="checkbox" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="- 50.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-medium" value="64GB"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-middle uk-text-center"><div class="icheckbox_md checked"><input type="checkbox" data-md-icheck="" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="0.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-medium" value="128GB"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-middle uk-text-center"><div class="icheckbox_md checked"><input type="checkbox" data-md-icheck="" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                                <td>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper md-input-filled"><input type="text" class="md-input md-input-width-small uk-text-right" value="+ 80.00"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><div class="md-input-wrapper"><input type="text" class="md-input md-input-width-medium" placeholder="Memory"><span class="md-input-bar"></span></div></td>
                                                <td class="uk-text-middle uk-text-center">
                                                    <div class="icheckbox_md"><input type="checkbox" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                                </td>
                                                <td class="uk-text-right">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="uk-icon-usd"></i>
                                                        </span>
                                                        <div class="md-input-wrapper"><input type="text" class="md-input md-input-width-small uk-text-right" placeholder="Price"><span class="md-input-bar"></span></div>
                                                    </div>
                                                </td>
                                                <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-2-10">
                                <a class="md-btn" href="#">Add option</a>
                            </div>
                            <div class="uk-width-medium-8-10 uk-grid-margin">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<script>
    $('#product_edit_tags_control').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });
</script>
@endsection
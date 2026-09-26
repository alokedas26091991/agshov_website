<style>
.modal-dialog,
.modal-content {
    height: 90%;
}
.modal-body {
    max-height: calc(100% - 20px);
    overflow-y: scroll;
}
.openBtn {
    display: flex;
    justify-content: left;
}
.openButton {
    border: none;
    border-radius: 5px;
    background-color: #1c87c9;
    color: white;
    padding: 6px 16px;
    cursor: pointer;
}
.loginPopup {
    position: relative;
    text-align: center;
    width: 100%;
}
.formPopup {
    display: none;
    position: fixed;
    left: 45%;
    top: 5%;
    transform: translate(-50%, 5%);
    border: 3px solid #999999;
    z-index: 9;
}
.formContainer {
    max-width: 300px;
    padding: 20px;
    background-color: #fff;
}
.formContainer input[type=text],
.formContainer input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 20px 0;
    border: none;
    background: #eee;
}
.formContainer input[type=text]:focus,
.formContainer input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
    cursor: pointer;
    width: 100%;
    margin-bottom: 15px;
    opacity: 0.8;
}
.formContainer .cancel {
    background-color: #cc0000;
}
.formContainer .btn:hover,
.openButton:hover {
    opacity: 1;
}
</style>

<div ng-app="product" ng-controller="productCrt">
    <div class="page-breadcrumb" id="panel">
        <div class="row">
            <div class="col-12 align-self-center">
                <h4 class="page-title">Create Single Listing</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Alert Notifications -->
                        <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="zmdi zmdi-close"></i>
                            </button>
                            <strong><i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                        </div>
                        <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="zmdi zmdi-close"></i>
                            </button>
                            <strong><i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-one" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" ng-class="step==1?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,1)"><span class="hidden-xs-down">Category</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" ng-class="step==2?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,2)"> Key Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" ng-class="step==3?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,3)"><span class="hidden-xs-down"> Images</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" ng-class="step==4?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,4)"><span class="hidden-xs-down"> Attributes</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" ng-class="step==5?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,5)"><span class="hidden-sm-up"><span class="hidden-xs-down"> Shipping & Pricing</span></a>
                            </li>
                        </ul>

                        <!-- Tab Panes -->
                        <div class="tab-content tabcontent-border">

                            <!-- TAB 1: CATEGORY -->
                            <div class="tab-pane" ng-class="step==1?'active':''" id="category" role="tabpanel">
                                <div class="p-20">
                                    <div class="prodect_panel">
                                        <div class="sell-existing-panel">
                                            <div class="porduct-content">
                                                <form class="form-inline">
                                                    <input class="form-control mr-sm-2" type="search" ng-model="search" placeholder="Search Category Name" aria-label="Search">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-20 border-top">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="product-heading">1. Select Category</h6>
                                            <div class="list-group add-product-list-group">
                                                <a ng-repeat="c in categories | filter:search" href="javascript:void(0)" ng-click="categorieslist(c.id)" ng-class="product.category_id==c.id?'active':''" class="list-group-item list-group-item-action">{{c.name}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="product-heading">2. Select Sub-Category</h6>
                                            <div class="list-group add-product-list-group">
                                                <a ng-repeat="c in subcategories" href="javascript:void(0)" ng-click="typelist(c.id)" ng-class="product.sub_category_id==c.id?'active':''" class="list-group-item list-group-item-action">{{c.name}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 tab-actions-block mt-3">
                                            <button type="button" ng-click="!startLoader && saveProduct($event,2)" class="btn waves-effect waves-light btn-info float-right">
                                                <span ng-show="!startLoader">Next</span>
                                                <span ng-show="startLoader"><i class="fa fa-circle-o-notch fa-spin"></i> Saving..</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2: KEY DETAILS -->
                            <div class="tab-pane" ng-class="step==2?'active':''" id="key_details" role="tabpanel">
                                <div class="p-20">
                                    <h4 class="tab-label">Enter Product Details</h4>
                                    <form class="mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="for-inline-radio">
                                                    <div class="radio-type-name">
                                                        <p>Do you have variants ?</p>
                                                    </div>
                                                    <div class="for-radio-input">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" ng-model="product.variant" value="1" class="form-check-input" name="optradio" ng-change="filterOptionListVarient()" ng-checked="product.variant==1">Yes
                                                                <span class="radio"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" ng-model="product.variant" value="0" class="form-check-input" name="optradio" ng-checked="product.variant==0">No
                                                                <span class="radio"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" ng-show="product.variant==0">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input type="text" required class="form-control" ng-model="product.supc" placeholder="SKU">
                                                </div>
                                            </div>
                                            <div class="col-md-6" ng-show="product.variant==1">
                                                <div class="form-group">
                                                    <label>Multiple SKU</label>
                                                    <button type="button" class="btn btn-sm waves-effect waves-light btn-primary mt-3 mr-2" ng-click="multipleSKU(product)">Add</button>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" ck-editor required ng-model="product.introduction" placeholder="Description" rows="8" cols="50"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Short Description</label>
                                                    <textarea class="form-control" ck-editor required ng-model="product.short_description" placeholder="Short Description" rows="8" cols="50"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>GST Percentage</label>
                                                    <input type="text" required ng-model="product.gst_percentage" class="form-control" placeholder="GST Percentage">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>HSN Code</label>
                                                    <input type="text" required ng-model="product.hsn_code" class="form-control" placeholder="HSN Code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country Origin</label>
                                                    <input type="text" required ng-model="product.country" class="form-control" placeholder="Country Origin">
                                                </div>
                                            </div>
                                            <div class="col-md-6" ng-show="product.variant==0">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" required ng-model="product.name" class="form-control" placeholder="Title">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn waves-effect waves-light btn-info mt-3 mr-2" ng-click="changeStep($event,3)">Next</button>
                                    </form>
                                </div>
                            </div>

                            <!-- TAB 3: IMAGES -->
                            <div class="tab-pane" ng-class="step==3?'active':''" id="images" roll="tabpanel">
                                <div class="p-20" ng-repeat="img in productImageData">
                                    <h4 class="tab-label mb-4">Upload Images <span ng-show="img.supc || (img.filter_option && img.filter_option.name)"> for SKU {{img.supc}}<span ng-show="img.filter_option && img.filter_option.name">({{img.filter_option.name}})</span></span></h4>
                                    <div class="row">
                                        <div class="col-md-2" ng-click="uploadProductImage(img.id,1)">
                                            <div class="add-more-image singlelist-file-uploader p-3 border text-center">
                                                <button type="button" class="btn btn-sm btn-success">Add Main Image</button>
                                            </div>
                                            <div class="error-msg text-center small mt-1">Please upload the mandatory image(s)</div>
                                        </div>
                                        <div class="col-md-2" ng-show="img.photo || product.photo">
                                            <div class="singlelist-file-uploader border p-2 text-center">
                                                <img src="<?= UPLOAD_PRODUCT_IMAGE ?>{{img.photo || product.photo}}" style="max-height:140px!important;margin: 0 0 1em;" />
                                                <div class="small">{{img.photo || product.photo}}</div>
                                            </div>
                                            <div class="error-msg text-center small mt-1">Main Image</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-2" ng-click="uploadProductImage(img.id,2)">
                                            <div class="add-more-image singlelist-file-uploader p-3 border text-center">
                                                <button type="button" class="btn btn-sm btn-info">Add Gallery Image</button>
                                            </div>
                                            <div class="error-msg text-center small mt-1">Other Image</div>
                                        </div>
                                        <div class="col-md-2" ng-repeat="oimg in img.product_images">
                                            <div class="singlelist-file-uploader border p-2 text-center">
                                                <img src="<?= UPLOAD_PRODUCT_IMAGE ?>{{oimg.image}}" style="max-width:140px!important;max-height:140px!important;" />
                                            </div>
                                            <div class="error-msg text-center mt-1"><a href="javascript:void(0)" ng-click="deleteImage(oimg.id)"><i class="fa fa-trash text-danger"></i></a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <button type="button" class="btn waves-effect waves-light btn-info" ng-click="openAattribute($event,4)">Next</button>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 4: ATTRIBUTES -->
                            <div class="tab-pane" ng-class="step==4?'active':''" id="attributes" roll="tabpanel">
                                <div class="p-20">
                                    <div class="table-responsive table-scroll">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SKU Code</th>
                                                    <th>Add / Edit Attributes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="list in skuListData">
                                                    <td>{{list.supc}}</td>
                                                    <td><button class="btn btn-sm btn-primary" ng-click="openAttribute(list.id)"><i class="fa fa-plus"></i> Add</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 5: SHIPPING & PRICING -->
                            <div class="tab-pane" ng-class="step==5?'active':''" id="shipping_pricing" roll="tabpanel">
                                <div class="p-20">
                                    <form class="mt-4">
                                        <div ng-repeat="list in skuListData" class="mb-4 p-3 border rounded">
                                            <h4 class="tab-label mb-3">Update Shipping & Price <span> for SKU {{list.supc}}({{list.filter_option.name}})</span></h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Retail Price (INR)</label>
                                                        <input type="text" required class="form-control" ng-model="list.user_products[0].actual_price" placeholder="Retail Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Distributor Price (INR)</label>
                                                        <input type="text" required class="form-control" ng-model="list.user_products[0].offer_price" placeholder="Distributor Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>MRP (INR)</label>
                                                        <input type="text" required class="form-control" ng-model="list.user_products[0].mrp" placeholder="MRP">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="text" required ng-model="list.user_products[0].total_quantity" class="form-control" placeholder="Quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" ng-click="updatePrice($event)" class="btn btn-success">Save Product</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 1: SKU MANAGEMENT -->
    <div modal="showSKU" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product SKU</h4>
                    <button type="button" class="close" ng-click="cancelSKU()"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    <form id="productImage22" name="productImage22" ng-submit="!startskuadd && addSku($event)">
                        <div class="row" ng-if="addSkuShow">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" ng-model="newProduct.name" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" ng-model="newProduct.supc" placeholder="SKU Details" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Variant</label>
                                    <select class="form-control" ng-model="newProduct.filter_id" ng-change="getfilteroption()" required convert-to-number>
                                        <option ng-repeat="f in productvarientFilter" ng-value="f.id">{{f.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Variant Option</label>
                                    <select class="form-control" ng-model="newProduct.filter_option_id" required convert-to-number>
                                        <option ng-repeat="f in filteroption" ng-value="f.id">{{f.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button class="btn btn-primary" type="submit">
                                    <span ng-show="!startskuadd">Add</span>
                                    <span ng-show="startskuadd"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class="row" ng-if="!addSkuShow">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" ng-model="updateProduct.name" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" ng-model="updateProduct.supc" placeholder="SKU Details" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Variant</label>
                                    <select class="form-control" ng-model="updateProduct.filter_id" required convert-to-number ng-change="getfilteroption()">
                                        <option ng-repeat="f in productvarientFilter" value="{{f.id}}">{{f.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Variant Option</label>
                                    <select class="form-control" ng-model="updateProduct.filter_option_id" required convert-to-number>
                                        <option ng-repeat="f in filteroption" value="{{f.id}}">{{f.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button class="btn btn-primary" type="submit">
                                    <span ng-show="!startskuadd">Update</span>
                                    <span ng-show="startskuadd"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                                </button>
                                <button class="btn btn-secondary" type="button" ng-click="cancelAdd()">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Variant</th>
                                    <th>Variant Name</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="list in skuListData">
                                    <td>{{list.name}}</td>
                                    <td>{{list.supc}}</td>
                                    <td>{{list.filter.name}}</td>
                                    <td>{{list.filter_option.name}}</td>
                                    <td><a href="javascript:void(0)" ng-click="updateSku(list)"><i class="fa fa-pencil-square-o"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: IMAGE UPLOAD -->
    <div modal="showModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product Image</h4>
                    <button type="button" class="close" ng-click="cancel()"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    <form id="productImage" name="productImage">
                        <div class="form-group">
                            <input class="form-control" type="file" file-model="myFile" />
                            <button ng-show="startUpload" type="button" class="btn btn-primary mt-3" disabled><i class="fa fa-circle-o-notch fa-spin"></i> Uploading...</button>
                            <button ng-show="!startUpload" type="button" class="btn btn-primary mt-3" ng-click="uploadFile()">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 3: CHARGES -->
    <div modal="ModalCharge" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Charges</h4>
                    <button type="button" class="close" ng-click="closeCharge()"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Charge</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="c in charges">
                                    <td>{{c.name}}</td>
                                    <td>({{c.value}}%) {{(product.offer_price*c.value)/100}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 4: FILTER ATTRIBUTES -->
    <div modal="showModalFilter" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Product Specialization</h4>
                    <button type="button" class="close" ng-click="cancelFilter()"><span>&times;</span></button>
                </div>
                <div class="modal-body p-4">
                    <form id="productImage1" name="productImage1">
                        <div class="row">
                            <div class="col-md-6" ng-repeat="f in productFilter track by $index" ng-init="filterIndex=$index">
                                <div class="form-group">
                                    <label>{{f.filter.name}}</label>
                                    <select class="form-control" ng-model="f.select" ng-change="filterDataSend($event,filterIndex,f.select)" convert-to-number>
                                        <option value="-1">None</option>
                                        <option ng-repeat="fp in f.filter.filter_options track by $index" ng-init="filterOpIndex=$index" value="{{filterOpIndex}}" ng-selected="fp.checked">{{fp.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-success mt-3" role="alert" ng-show="showat">Data Saved!</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-primary" ng-click="saveattribute()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ajxUrl = '<?= $this->Url->build("/admin/products"); ?>';
    var ajxPageUrl = '<?= $this->Url->build("/admin/products"); ?>';
    var ajxPageUrladmin = '<?= $this->Url->build("/admin/products"); ?>';
    var productId = 0;
    var categories = <?= json_encode($categories); ?>;
    var charge = <?= json_encode($charge); ?>;
    var is_first = true;
</script>

<?= $this->Html->script([
    '/js/ckeditor/ckeditor',
    '/admin_template/js/angular-1.5.8/angular.min.js',
    '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min',
    '/admin_template/js/angular/ngprogress.min',
    '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js',
    '/admin_template/js/angular/product_add_seller.js?v=11'
], ['block' => 'scriptBottom']); ?>
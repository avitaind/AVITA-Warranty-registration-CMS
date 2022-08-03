 <!-- Modal -->
 <div class="modal fade" id="addModels" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="addModelsBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addModelsBackdropLabel">Product Model Registration</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <small>Items marked with an asterisk (*) must be filled
                     out.</small><br /><br />
                 <div class="ec-vendor-upload-detail">
                     <div class="col-md-12 ">
                         <div class="row">
                             <div class=" col-md-12">
                                 <form action="{{ route('model.store') }}" method="POST">
                                     {!! csrf_field() !!}
                                     <div class="row">
                                         <div class=" col-md-12">
                                             <label for="product_type" class="form-label">Product Type: <span
                                                     class="required">*</span></label>
                                         </div>
                                         <div class=" col-md-12 p-1">
                                             <div class="mb-3">
                                                 <select name="product_type" id="product_type" class="form-select">
                                                     <option hidden>Choose Product Type</option>
                                                     @foreach ($product_type as $item)
                                                         <option value="{{ $item->id }}">{{ $item->name }}
                                                         </option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                         <div class=" col-md-12">
                                             <label for="product_type" class="form-label">Product Series: <span
                                                     class="required">*</span></label>
                                         </div>
                                         <div class=" col-md-12 p-1">
                                             <div class="mb-3">
                                                 <select name="products_id" id="product_series"
                                                     class="form-select"></select>
                                             </div>
                                         </div>
                                         <div class=" col-md-12">
                                             <label for="product_type" class="form-label">Product Model: <span
                                                     class="required">*</span></label>
                                         </div>
                                         <div class=" col-md-12 p-1">
                                             <input type="text" class="form-select1" id="model_number"
                                                 name="model_number" value="">
                                         </div>
                                     </div>

                                     <div class="col-md-12 text-center mt-4">
                                         <button type="submit" class="btn btn-primary">Submit</button>
                                     </div>

                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery('#product_type').change(function() {
                let producttypeID = jQuery(this).val();
                jQuery('#product_model').html('<option value="">Select Product Model</option>')
                jQuery('#product_number').html('<option value="">Select Product Number</option>')
                // alert(producttypeID)
                jQuery('#product_series').html('<option value="">Select Product Series</option>')
                jQuery.ajax({
                    url: '/getproductseries',
                    type: 'post',
                    data: 'producttypeID=' + producttypeID + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        jQuery('#product_series').html(result)
                    }
                });
            });

            jQuery('#product_series').change(function() {
                let productSeriesID = jQuery(this).val();
                // alert(productSeriesID)
                jQuery.ajax({
                    url: '/getproductmodel',
                    type: 'post',
                    data: 'productSeriesID=' + productSeriesID + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        jQuery('#product_model').html(result)
                    }
                });
            });
        });
    </script>
@endsection

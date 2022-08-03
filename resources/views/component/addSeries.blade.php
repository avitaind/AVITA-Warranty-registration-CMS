 <!-- Modal -->
 <div class="modal fade" id="addSeries" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="addSeriesBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addSeriesBackdropLabel">Product Series Registration</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <small>Items marked with an asterisk (*) must be filled
                     out.</small><br /><br />
                 <div class="ec-vendor-upload-detail">
                     <div class="col-md-12 ">
                         <div class="row">
                             <div class=" col-md-12">
                                <form action="{{ route('series.store') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <label for="product_type" class="form-label">Product Type: <span
                                                    class="required">*</span></label>
                                        </div>
                                        <div class=" col-md-12 ">
                                            <div class="mb-3">
                                                <select name="product_types_id" id="product_type"
                                                    class="form-select">
                                                    <option hidden>Choose Product Type</option>
                                                    @foreach ($product_type as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-12">
                                            <label for="product_series" class="form-label">Product Series: <span
                                                    class="required">*</span></label>
                                        </div>
                                        <div class=" col-md-12 ">
                                            <div class="mb-3">
                                                <input type="text" class="form-select1" id="product_series"
                                                    name="name" value="" required>
                                            </div>
                                            <div class="col-md-12 text-center mt-4">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
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

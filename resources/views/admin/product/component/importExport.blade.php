<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" method="POST"
            action="{{ route('importProducts')}}" enctype="multipart/form-data">

                {!! csrf_field() !!}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Import File: <span
                                    class="required">*</span></label>
                        </div>
                        <div class="col-md-12 p-1">
                            <input type="file"
                                class="form-select1 @error('select_file') is-invalid @enderror"
                                name="select_file[]" id="purchaseInvoice" multiple>
                            @error('select_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('export-products') }}" class="btn btn-primary"> Export Product <i class="mdi mdi-arrow-down-bold"></i></a>
                    <button type="sumbit" class="btn btn-primary">Import Product <i class="mdi mdi-arrow-up-bold"></i></button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

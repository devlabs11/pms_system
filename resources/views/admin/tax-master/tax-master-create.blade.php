@extends('admin.common.main')

@section('containes')

<div class="col-xl-12">
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                       
                        <div style="display:none" class="card-header pt-7" id="kt_chat_contacts_header">
                          
                            <div style="display:none" class="card-title">
                                
                                <h2>Add GST</h2>
                            </div>
                        </div>

                        <div class="card-body pt-5">
                            <form method="POST" id="form" action="{{ route('tax-master-create') }}">
                            @csrf
                                
                                <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">SGST</span>
                                            </label>
                                            <input type="text" name="sgst" id="sgst" class="form-control form-control-solid">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">CGST</span>
                                            </label>
                                            <input type="text" name="cgst" id="cgst" class="form-control form-control-solid">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">IGST</span>
                                            </label>
                                            <input type="text" name="igst" id="igst" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div style="float:right;">
                                <span><button type="submit" id="submit" class="btn btn-primary">SUBMIT</button> </span>
           
            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



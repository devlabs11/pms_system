@extends('admin.common.main')

@section('containes')


<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
</div>
</div>
</div>
</div>

</div>


<main class="py-4">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="toolbar" id="kt_toolbar">

            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">


                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">


                        </div>

                        <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                    </div>
                </div>

                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">


                </div>


                <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
            </div>
        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-2 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            &nbsp;
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">

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
                                                <input type="text" name="sgst" id="sgst"
                                                    class="form-control form-control-solid" value="{{old('sgst')}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">

                                                @error('sgst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">CGST</span>
                                                </label>
                                                <input type="text" name="cgst" id="cgst"
                                                    class="form-control form-control-solid" value="{{old('cgst')}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">

                                                @error('cgst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">IGST</span>
                                                </label>
                                                <input type="text" name="igst" id="igst"
                                                    class="form-control form-control-solid" aria-required="true"
                                                    aria-invalid="true" value="{{old('igst')}}" autocomplete="off"
                                                    style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                @error('igst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div style="float:right;">

                                        <div class="d-flex justify-content-end">

                                            <button type="reset" onclick="history.back()" id="cancel_btn"
                                                class="btn btn-outline-danger"
                                                style="margin-right:10px;">Cancel</button>
                                            <button type="submit" id="submit" data-kt-contacts-type="submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Save</span>


                                            </button>
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
    </div>
    </div>
    </div>
    </div>


    <style>
    #sgst-error {
        color: red;
        padding-top: 15px;

    }

    #Errormsg {
        color: red;
        margin-top: 10px;

    }
    </style>

    <script>
    function removeBorderStyle(element) {
        if (element.value.trim() !== '') {
            element.style.border = 'none';
            element.style.padding = '13px';
        } else {

            element.style.border = '1px solid black';
            element.style.padding = '13px';
        }
    }
    </script>

    @endsection
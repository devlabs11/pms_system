@extends('admin.common.main')
@section('containes')

<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										
									</div>
									
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Wrapper-->
						</div>
						
					</div>
					

                    <main class="py-4">
                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   
    <div class="toolbar" id="kt_toolbar">
        
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                
         
            <div class="d-flex align-items-center gap-2 gap-lg-3">
               



                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                
               


              
                 </div>
             


                <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>

                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                
              
                 </div>
                <!--end::Secondary button-->
                <!--begin::Primary button-->


                <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            &nbsp;
                            <!--end::Svg Icon-->

                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">


                <div class="col-xl-12">
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                       
                        <div style="display:none" class="card-header pt-7" id="kt_chat_contacts_header">
                          
                            <div style="display:none" class="card-title">
                                
                                <h2>Add GST</h2>
                            </div>
                        </div>

                        <div class="card-body pt-5">
                            <form method="POST" id="form"  action="/update-tax-master/{{$editGst->id}}">

                            @csrf
                                
                                <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">SGST</span>
                                            </label>
                                            <input type="text" name="sgst" id="sgst" class="form-control form-control-solid"  value={{ $editGst->sgst}}>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">CGST</span>
                                            </label>
                                            <input type="text" name="cgst" id="cgst" class="form-control form-control-solid"  value={{ $editGst->cgst}}>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-2">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="">IGST</span>
                                            </label>
                                            <input type="text" name="igst" id="igst" class="form-control form-control-solid"  value={{ $editGst->igst}}>
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

                
                
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


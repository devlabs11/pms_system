@extends('admin.common.main')
@section('containes')



<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="http://erp-test.devharshinfotech.com/assets/media/avatars/300-1.jpg" />
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">
                        Nishant </div>
                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">


                    </a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->


    </div>

</div>

</div>
<!--end::Toolbar wrapper-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Container-->
</div>
<!--end::Header-->
<!--begin::Content-->

<main class="py-4">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul style="display:none" class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Customers</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Customer Listing</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->

                    <!--end::Filter menu-->
                    <!--begin::Secondary button-->

                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <!--begin::Page title-->
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                            <!--end::Title-->
                            <!--begin::Separator-->
                            <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                            <!--end::Separator-->
                            <!--begin::Breadcrumb-->

                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <div>
                                    <button type="reset" onclick="history.back()" id="cancel_btn"
                                        class="btn btn-outline-danger" style="margin-right:10px;">Cancel</button>
                                </div>
                                <br>
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
        <br>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <br>
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                &nbsp;

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="prospect-master">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th id="th">Id</th>
                                    <th id="th">SGST</th>
                                    <th id="th">CGST</th>
                                    <th id="th">IGST</th>
                                    <th id="th">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">

                                @foreach($TrashGst as $key=>$data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->sgst}}</td>
                                    <td>{{$data->cgst}}</td>
                                    <td>{{$data->igst}}</td>
                                    <td>
                                        <a href="{{route('trash-tax-master-restore' , ['id'=>$data->id]) }}"
                                            class="btn btn-outline-success" role="button">Restore</a>
                                        <a href="{{route('trash-tax-master-delete' , ['id'=>$data->id]) }}"
                                            class="btn btn-outline-danger" role="button">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
</div>


<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">


</div>
<style>
#th:hover {
    color: black;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<script>
$(document).ready(function() {
    console.log("ready!");
});
</script>
<script>
$(document).ready(function() {
    var table = $('#prospect-master').DataTable({
        "searching": true
    });
    $(".menu-item").click(function() {
        $(".menu-link").removeClass("active");
        $('.menu-link').addClass("active");
    });
});
</script>
</body>
<!--end::Body-->

</html>




@endsection
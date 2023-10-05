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
                    <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                            <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                            <ul style="display:none" class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">Customers</li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-dark">Customer Listing</li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">

                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <div>
                                    <a href="{{route('tax-master-create')}}" class="btn btn-outline-info"
                                        role="button">Add GST</a>
                                    <a href="{{route('trash-tax-master')}}" class="btn btn-outline-danger">Trash</a>

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

        @if(Session::has('message'))
        <div style="text-align: center;">
            <div style="width: 500px; margin: 0 auto;" class="alert alert-success">{{ Session::get('message') }}</div>
        </div>
        @endif
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
                                @foreach($showGst as $key=>$data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->sgst}}</td>
                                    <td>{{$data->cgst}}</td>
                                    <td>{{$data->igst}}</td>
                                    <td>
                                        <a href="/edit-tax-master/{{encrypt($data->id)}}" title="Edit"
                                            class="menu-link flex-stack px-3" style="font-weight:normal !important;"><i
                                                class="fa fa-edit" style="font-weight:normal !important;"></i></a>
                                        <a onclick="return confirm('Are you sure?')"
                                            href="/delete-tax-master/{{encrypt($data->id)}}" title="Delete"
                                            style="cursor: pointer;font-weight:normal !important;"
                                            class="menu-link flex-stack px-3"><i class="fa fa-trash" style="color:red;">
                                            </i></a>
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
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <style>
    #th:hover {
        color: black;
    }
    </style>
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
    <script>
    $("document").ready(function() {
        setTimeout(function() {
            $("div.alert-success").remove();
        }, 3000);
    });
    </script>
    </body>

    </html>
    @endsection
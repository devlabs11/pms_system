@extends('admin.common.main')
@section('containes')
<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
</div>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<?php $id=$id ?? 0; ?>
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


        <div class="col-lg-12 margin-tb">
            <div class="float-left">

                <button type="button" class="btn btn-primary btn-sm" id="add-record" data-toggle="modal"
                    data-target="#create-item">Add Record</button>
                <a href="{{ route('menu.orderData', ['id' => $id ?? '' ?? 0]) }}"
                    class="btn btn-info btn-sm">Listing</a>
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
                        <table class="table align-middle table-row-dashed fs-7 gy-5 yajra-datatable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th width="5%">Sr.</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th width="8%"></th>
                                    <th width="8%"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- for add  -->

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div id="breadcrum-add"></div>
                    <form data-toggle="validator" action="{{ route('Menus.store') }}" method="POST" id="form-add">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="title">Title:</label>
                            <input type="text" name="title" class="form-control" data-error="Please enter name."
                                required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">URL:</label>
                            <input type="text" name="url" class="form-control" data-error="Please enter url." />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="icon">Icon:</label>
                            <input type="text" name="icon" class="form-control" data-error="Please enter icon."
                                required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn crud-submit btn-primary" id="btnSubmit">Submit</button>
                        </div>
                        @if(!empty($id))
                        <input type="hidden" name="parent_id" class="form-control" value="{{ $id }}" />
                        @else
                        <input type="hidden" name="parent_id" class="form-control" value="0" />
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- for edit -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="eModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="eModalLabel">Edit Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div id="breadcrum-edit"></div>
                    <form data-toggle="validator" id="form-edit">
                        <div class="form-group">
                            <label class="control-label" for="title">Title:</label>
                            <input type="text" name="title" id="title_edit" class="form-control"
                                data-error="Please enter name." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">URL:</label>
                            <input type="text" name="url" id="url_edit" class="form-control"
                                data-error="Please enter url." />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="icon">Icon:</label>
                            <input type="text" name="icon" id="icon_edit" class="form-control"
                                data-error="Please enter icon." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btnEdit">Edit</button>
                        </div>
                        @if(!empty($id))
                        <input type="hidden" name="parent_id" class="form-control" value="{{ $id }}" />
                        @else
                        <input type="hidden" name="parent_id" class="form-control" value="0" />
                        @endif
                        <input type="hidden" name="id" id="id_edit" class="form-control" value="0" />
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    </div>

    <body>
        <style>
        #th:hover {
            color: #202020;
        }
        </style>


        <script>
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [1, "desc"]
                ],
                ajax: '{{ URL::to('menu-index?parent_id='.$id) }}',
                error : function(data) {
                    console.log(data);
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'icon',
                        name: 'icon'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action_del',
                        name: 'action_del',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* Create new Item */
            $("#add-record").click(function(e) {
                $(".modal-title").html('Add Record');
                $("#breadcrum-add").html($("#breadcrum").html());
                $('#form-add').attr('action', "{{ route('Menus.store') }}");
                $("#btnSubmit").html("Submit");
                $("#form-add").trigger("reset");

            });

            $(".crud-submit").click(function(e) {
                e.preventDefault();
                var form_action = $("#create-item").find("form").attr("action");
                formdata = $("#form-add").serialize();

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: form_action,
                    data: formdata
                }).done(function(data) {
                    table.ajax.reload();
                    $(".modal").modal('hide');
                    toastr.success('Record Created Successfully.', 'Success Alert', {
                        timeOut: 2000
                    });
                });
            });

            $("#btnEdit").click(function(e) {
                e.preventDefault();
                var form_action = "upload";
                var id = $('#id_edit').val();
                formdata = $("#form-edit").serialize();
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: form_action,
                    data: formdata
                }).done(function(data) {
                    table.ajax.reload();
                    $(".modal").modal('hide');
                    toastr.success('Record Edited Successfully.', 'Success Alert', {
                        timeOut: 2000
                    });
                });
                return false;
            });
            setTimeout(function() {
                $('#msgdiv').fadeOut('slow');
            }, 2000);
        });

        $(document).ready(function() {
            $('.yajra-datatable').on('click', 'a.edit-record', function(e) {
                e.preventDefault();

                $("#breadcrum-edit").html($("#breadcrum").html());
                $("#edit-item").modal('show');
                var mid = $(this).attr('id');

                $('#title_edit').attr('value', $(this).data('title'));
                $('#url_edit').attr('value', $(this).data('url'));
                $('#icon_edit').attr('value', $(this).data('icon'));
                $('#id_edit').attr('value', mid);

                $("#form-edit").trigger("reset");
            });
        });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    </body>

    </html>
    @endsection
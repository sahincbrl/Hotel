@extends('admin.main.app')
@section('css')
    <link href="{{asset('adminCssJs/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Menular
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('admin.menus.create')}}" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-plus"></i>
                            Yeni menu
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad</th>
                            <th>Name</th>
                            <th>Название</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($menus as $menu)
                            <tr>
                                <td>
                                    {{$menu->id}}
                                </td>
                                <td>
                                    {{$menu->name_az}}
                                </td>
                                <td>
                                    {{$menu->name_en}}
                                </td>
                                <td>
                                    {{$menu->name_ru}}
                                </td>
                                <td>
                                    {{$menu->url}}
                                </td>
                                <td>
                                    {{$menu->status}}
                                </td>
                                <td>
                                    <a href="{{route('admin.menus.edit',$menu)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-xs btn-danger"
                                            onclick="sil(this, {{$menu->id}})">
                                        <i class="la la-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('adminCssJs/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('adminCssJs/assets/js/pages/crud/datatables/menus.js')}}"></script>

    <script>
        function sil(setir, id) {
            var sira = setir.parentNode.parentNode.rowIndex;

            Swal.fire({
                title: "Silmek istəyirsinizmi?",
                text: "Silinən məlumatı geri qaytarmaq olmur!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sil",
                cancelButtonText: "Bağla",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "delete",
                        url: '/admin/menus/' + id,
                        data: {
                            'id': id,
                            '_token': CSRF_TOKEN,
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw">' +
                                    '<span class="sr-only">Loading...</span></i>',
                                text: 'Deleting process...',
                                showConfirmButton: false
                            });
                        },
                        success: function (response) {
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if (response.status === 'success') {
                                window.location.href = '/admin/menus';
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection

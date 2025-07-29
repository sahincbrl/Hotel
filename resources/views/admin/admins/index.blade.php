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
                            Adminlər
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('admin.admins.create')}}" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-plus"></i>
                            Yeni admin
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
                            <th>Şəkil</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>Telefon</th>
                            <th>E-poçt</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{$admin->id}}
                                </td>
                                <td>
                                   <img class="w-50px" src="{{asset('uploads/adminImages/'.$admin->image)}}" />
                                </td>
                                <td>
                                    {{$admin->name}}
                                </td>
                                <td>
                                    {{$admin->surname}}
                                </td>
                                <td>
                                    {{$admin->mobile}}
                                </td>
                                <td>
                                    {{$admin->email}}
                                </td>
                                <td>
                                    <a href="{{route('admin.admins.edit',$admin)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-xs btn-danger"
                                            onclick="sil(this, {{$admin->id}})">
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
    <script src="{{asset('adminCssJs/assets/js/pages/crud/datatables/admins.js')}}"></script>

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
                        url: '/admin/admins/' + id,
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
                                window.location.href = '/admin/admins';
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection

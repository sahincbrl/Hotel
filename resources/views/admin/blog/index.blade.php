@extends('admin.main.app')
@section('css')
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
                            Bloqlar
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('admin.blogs.create')}}" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-plus"></i>
                            Yeni bloq
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
                            <th>Sekil</th>
                            <th>Title (Az)</th>
                            <th>Title (En)</th>
                            <th>Title (Ru)</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($blogs as $blog)
                            <tr>
                                <td>
                                    {{$blog->id}}
                                </td>
                                <td>
                                    <img class="w-50px" src="{{asset('uploads/blogImages/'.$blog->title_image)}}"/>
                                </td>
                                <td>
                                    {{$blog->title_az}}
                                </td>
                                <td>
                                    {{$blog->title_en}}
                                </td>
                                <td>
                                    {{$blog->title_ru}}
                                </td>
                                <td>
                                    {{$blog->status}}
                                </td>
                                <td>
                                    <a href="{{route('admin.blogs.edit',$blog)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-xs btn-danger"
                                            onclick="sil(this, {{$blog->id}})">
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
    <script src="{{asset('adminCssJs/assets/js/pages/crud/datatables/blogs.js')}}"></script>

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
                        url: '/admin/blogs/' + id,
                        data: {
                            'id': id,
                            '_token': CSRF_TOKEN,
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw">' +
                                    '<span class="sr-only">Gözləyin...</span></i>',
                                text: 'Gözləyin silinir...',
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
                                window.location.href = '/admin/blogs';
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection

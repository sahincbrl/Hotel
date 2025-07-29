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
                            Rəylər
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Rating</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments as $comment)
                            <tr>
                                <td>
                                    {{$comment->id}}
                                </td>
                                <td>
                                    {{$comment->full_name}}
                                </td>
                                <td>
                                    {{$comment->email}}
                                </td>
                                <td>
                                    {{$comment->comment}}
                                </td>
                                <td>
                                    {{$comment->rating}}
                                </td>
                                <td>
                                    {{$comment->room->title_az}}
                                </td>
                                <td>
                                    {{$comment->status}}
                                </td>

                                <td>
                                    <button class="btn {{ $comment->status==1? 'btn-info' :'btn-success' }}"
                                            onclick="activeDeactive({{$comment->status}}, {{$comment->id}})">
                                        <i class="fa {{$comment->status==1? 'fa-window-close' : 'fa-check'}}"></i>
                                    </button>
                                    <button class="btn btn-xs btn-danger"
                                            onclick="sil(this, {{$comment->id}})">
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
    <script src="{{asset('adminCssJs/assets/js/pages/crud/datatables/comments.js')}}"></script>

    <script>

        function activeDeactive(status, id) {
            let title = '';
            let text = '';
            let btnText = '';
            let color = '';

            if (status == 1) {
                title = 'Bu rəyi saytdan gizləmək istəyirsinizmi?';
                text = 'Gizlənən rəyi, yenidən saytda yayınlamaq mümkündür!';
                btnText = 'Gizlə';
                color = '#d33';
            } else {
                title = 'Bu rəyi sayta yayınlamaq istəyirsinizmi?';
                text = 'Yayınlanan rəyi, yenidən gizləmək mümkündür!';
                btnText = 'Yayınla';
                color = '#0b9a00';
            }

            Swal.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: color,
                cancelButtonColor: "#3085d6",
                confirmButtonText: btnText,
                cancelButtonText: "Bağla",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "post",
                        url: '/admin/comments/active_deactive',
                        data:{
                            'id':id,
                            '_token':CSRF_TOKEN
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
                                window.location.href = '/admin/comments';
                            }
                        }
                    })

                }
            })

        }

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
                        url: '/admin/comments/' + id,
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
                                window.location.href = '/admin/comments';
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection

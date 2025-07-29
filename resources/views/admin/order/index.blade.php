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
                            Sifarişlər
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Qiymət</th>
                            <th>Ad, Soy Ad</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Giriş vaxtı</th>
                            <th>Çıxış Vaxtı</th>
                            <th>Böyük Say</th>
                            <th>Uşaq Say</th>
                            <th>Təsdiq?</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->price}}
                                </td>
                                <td>
                                    {{$order->name.' '.$order->surname}}
                                </td>
                                <td>
                                    {{$order->email}}
                                </td>
                                <td>
                                    {{$order->mobile}}
                                </td>
                                <td>
                                    {{$order->check_in}}
                                </td>
                                <td>
                                    {{$order->check_out}}
                                </td>
                                <td>
                                    {{$order->adult_count}}
                                </td>
                                <td>
                                    {{$order->child_count}}
                                </td>
                                <td>
                                    {{$order->is_apply}}
                                </td>
                                <td>
                                    <button class="btn btn-xs
                                            {{$order->is_apply==0 ? 'btn-success' : 'btn-dark'}}"
                                            onclick="apply({{$order->id}})">
                                        <i class="la
                                        {{$order->is_apply==0 ? 'la-check' : 'la-close'}}"></i>
                                    </button>
                                    <button class="btn btn-xs btn-danger"
                                            onclick="sil(this, {{$order->id}})">
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
    <script src="{{asset('adminCssJs/assets/js/pages/crud/datatables/orders.js')}}"></script>

    <script>
        function apply(id) {

            Swal.fire({
                title: "Təsdiq edirsinizmi?",
                text: "Təsdiq etdikdə mütəriyə mail göndəriləcək!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#08bb19",
                cancelButtonColor: "#ff0000",
                confirmButtonText: "Təsdiq et",
                cancelButtonText: "Bağla",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "post",
                        url: '/admin/orders/apply',
                        data: {
                            'id': id,
                            '_token': CSRF_TOKEN,
                        },
                        beforeSend: function () {
                            let timerInterval;
                            Swal.fire({
                                title: 'Gözləyin...',
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const b = Swal.getHtmlContainer().querySelector('b');
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft();
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
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
                                window.location.href = '/admin/orders';
                            }
                        }
                    })
                }
            });
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
                        url: '/admin/orders/' + id,
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
                                window.location.href = '/admin/orders';
                            }
                        }
                    })
                }
            });
        }
    </script>
@endsection

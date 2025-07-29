@extends('admin.main.app')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Admini yenilə
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="editAdmin" action="{{route('admin.admins.update', $admin)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <img class="w-50px mb-5" src="{{asset('uploads/adminImages/'.$admin->image)}}"/>
                                    <div class="form-group">
                                        <label>
                                            Şəkil
                                        </label>
                                        <input type="file" class="form-control" placeholder="Şəkil" name="image"/>
                                        <div data-input="image" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Fin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Fin"
                                               name="fin" value="{{$admin->fin}}"/>
                                        <div data-input="fin" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ad"
                                               name="name" value="{{$admin->name}}"/>
                                        <div data-input="name" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Soyad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Soyad"
                                               name="surname" value="{{$admin->surname}}"/>
                                        <div data-input="surname" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Telefon
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Telefon"
                                               name="mobile" value="{{$admin->mobile}}"/>
                                        <div data-input="mobile" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            E-poçt
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" placeholder="E-poçt"
                                               name="email" value="{{$admin->email}}"/>
                                        <div data-input="email" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Yenilə</button>
                                    <a href="{{route('admin.admins.index')}}" class="btn btn-secondary">Geri</a>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#editAdmin').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#editAdmin').attr('action'),
                    'processData': false,
                    'contentType': false,
                    'type': 'post',
                    'data': formData,
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
                        console.log({response})

                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false,
                        })
                        if (response.status === 'success') {
                            setTimeout(function () {
                                window.location.href = '/admin/admins';
                            }, 1000)
                        }
                    },
                    error: function (response) {
                        console.log({response})
                        let result = response.responseJSON;
                        console.log({result})
                        Swal.close();
                        if (result.status == 'validation-error') {
                            $.each(result.errors, function (key, value) {
                                const attribute = result.attributes[key];
                                console.log({attribute, key, value})
                                $('#editAdmin .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

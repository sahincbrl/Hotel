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
                                    Menunu yenilə
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="editMenu" action="{{route('admin.menus.update',$menu)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>
                                            Ad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ad"
                                               name="name_az" value="{{$menu->name_az}}"/>
                                        <div data-input="name_az" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Name"
                                               name="name_en" value="{{$menu->name_en}}"/>
                                        <div data-input="name_en" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Название
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Название"
                                               name="name_ru" value="{{$menu->name_ru}}"/>
                                        <div data-input="name_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="status" class="form-control">
                                            <option value="1" @selected($menu->status==1)>Aktiv</option>
                                            <option value="0" @selected($menu->status==0)>Passiv</option>
                                        </select>
                                        <div data-input="status" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Yenilə</button>
                                    <a href="{{route('admin.menus.index')}}" class="btn btn-secondary">Geri</a>
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
            $('#editMenu').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#editMenu').attr('action'),
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
                                window.location.href = '/admin/menus';
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
                                $('#editMenu .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

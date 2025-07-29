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
                                   Bloqu yenilə
                                </h3>
                                <div class="card-body">
                                    <h5>Cari şəkillər</h5>
                                    <div class="form-group d-flex">
                                        @foreach($blog->blogImages as $bq)
                                            <div class="form-group d-flex flex-column align-items-center">
                                                <img class="w-50 mb-2"
                                                     src="{{asset('/uploads/blogImages/'.$bq->image_name)}}"/>
                                                <button class="btn btn-xs btn-danger"
                                                        onclick="sil('{{$bq->id}}')">
                                                    <i class="la la-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5>Cari başlıq şəkli</h5>
                                    <div class="form-group">
                                        <img class="w-15" src="{{asset('/uploads/blogImages/'.$blog->title_image)}}"/>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <form id="editBlog" action="{{route('admin.blogs.update', $blog)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>
                                            Başlıq Şəkli
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control" placeholder="Şəkil"
                                               name="title_image" accept="image/*"/>
                                        <div data-input="title_image" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Digər Şəkillər
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control" placeholder="Şəkillər"
                                               name="other_images[]" multiple accept="image/*"/>
                                        <div data-input="other_images" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Title az
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Title az"
                                               name="title_az" value="{{$blog->title_az}}"/>
                                        <div data-input="title_az" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Title en
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Title en"
                                               name="title_en" value="{{$blog->title_en}}"/>
                                        <div data-input="title_en" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Title ru
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Title ru"
                                               name="title_ru" value="{{$blog->title_ru}}"/>
                                        <div data-input="title_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ətraflı az
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Ətraflı az"
                                                  name="description_az" rows="6">
                                            {{$blog->description_az}}
                                        </textarea>
                                        <div data-input="description_az" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ətraflı en
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Ətraflı en"
                                                  name="description_en" rows="6">
                                             {{$blog->description_en}}
                                        </textarea>
                                        <div data-input="description_en" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ətraflı ru
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Ətraflı ru"
                                                  name="description_ru" rows="6">
                                             {{$blog->description_ru}}
                                        </textarea>
                                        <div data-input="description_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="status">
                                            <option value="1"
                                                @selected($blog->status==1)>Aktiv
                                            </option>
                                            <option value="0"
                                                @selected($blog->status==0)>Passiv
                                            </option>
                                        </select>
                                        <div data-input="status" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Yarat</button>
                                    <a href="{{route('admin.blogs.index')}}" class="btn btn-secondary">Geri</a>
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
        function sil(id) {
            console.log(id)
            Swal.fire({
                title: "Bu şəkli silmək istəyirsinizmi?",
                text: "Silinən şəkli geri qaytarmaq olmur!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sil",
                cancelButtonText: "Bağla",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "post",
                        url: "/admin/blogs/deleteImage/" + id,
                        data: {
                            'id': id,
                            '_token': CSRF_TOKEN
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
                                window.location.href = '/admin/blogs/' + {{$blog->id}} + '/edit';
                            }
                        }
                    })
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('textarea').each(function () {
                $(this).val($(this).val().trim())
            });
            $('#editBlog').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#editBlog').attr('action'),
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
                                window.location.href = '/admin/blogs';
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
                                $('#editBlog .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

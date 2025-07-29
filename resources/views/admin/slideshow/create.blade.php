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
                                    Yeni slayd
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="addSlideshow" action="{{route('admin.slideshows.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image"
                                               accept=".jpg,.png,.jpeg,.gif"/>
                                        <div data-input="image" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Title (Az) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_az"
                                               placeholder="Title (Az)"/>
                                        <div data-input="title_az" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Title (En) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_en"
                                               placeholder="Title (En)"/>
                                        <div data-input="title_en" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Title (Ru) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_ru"
                                               placeholder="Title (Ru)"/>
                                        <div data-input="title_ru" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Short info (Az) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_az"
                                               placeholder="Short info (Az)"/>
                                        <div data-input="short_info_az" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Short info (En) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_en"
                                               placeholder="Short info (En)"/>
                                        <div data-input="short_info_en" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Short info (Ru) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_ru"
                                               placeholder="Short info (Ru)"/>
                                        <div data-input="short_info_ru" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Description (Az) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_az"
                                                  placeholder="Description (Az)">
                                        </textarea>
                                        <div data-input="description_az" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Description (En) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_en"
                                                  placeholder="Description (En)">
                                        </textarea>
                                        <div data-input="description_en" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (Ru) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_ru"
                                                  placeholder="Description (Ru)">
                                        </textarea>
                                        <div data-input="description_ru" class="invalid-feedback"></div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-2">Yarat</button>
                                        <a href="{{route('admin.slideshows.index')}}" class="btn btn-secondary">Geri</a>
                                    </div>
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
            $('textarea').each(function () {
                $(this).val($(this).val().trim())
            });
            $('#addSlideshow').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#addSlideshow').attr('action'),
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
                                window.location.href = '/admin/slideshows';
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
                                $('#addSlideshow .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

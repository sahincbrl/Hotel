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
                                    Slayd yenilə
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="editSlideshow" action="{{route('admin.slideshows.update',$slideshow)}}"
                                  method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Cari image</label>
                                        <img width="200" src="{{asset('uploads/slideshowImages/'.$slideshow->image)}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image"
                                               accept=".jpg,.png,.jpeg,.gif"/>
                                        <div data-input="image" class="invalid-feedback"></div>
                                    </div>


                                    <div class="form-group">
                                        <label>Title (Az) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_az"
                                               placeholder="Title (Az)" value="{{$slideshow->title_az}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Title (En) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_en"
                                               placeholder="Title (En)" value="{{$slideshow->title_en}}"/>
                                    </div>


                                    <div class="form-group">
                                        <label>Title (Ru) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title_ru"
                                               placeholder="Title (Ru)" value="{{$slideshow->title_ru}}"/>
                                    </div>


                                    <div class="form-group">
                                        <label>Short info (Az) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_az"
                                               placeholder="Short info (Az)" value="{{$slideshow->short_info_az}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Short info (En) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_en"
                                               placeholder="Short info (En)" value="{{$slideshow->short_info_en}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Short info (Ru) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="short_info_ru"
                                               placeholder="Short info (Ru)" value="{{$slideshow->short_info_ru}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Description (Az) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_az"
                                                  placeholder="Description (Az)">
                                                {{$slideshow->description_az}}
                                                     </textarea>
                                    </div>



                                    <div class="form-group">
                                        <label>Description (En) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_en"
                                                  placeholder="Description (En)">
                                                {{$slideshow->description_en}}
                                                     </textarea>
                                    </div>


                                    <div class="form-group">
                                        <label>Description (Ru) <span class="text-danger">*</span></label>
                                        <textarea rows="8" class="form-control" name="description_ru"
                                                  placeholder="Description (Ru)">
                                                {{$slideshow->description_ru}}
                                                     </textarea>
                                    </div>



                                    <div class="form-group">
                                        <label>
                                            Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="status" class="form-control">
                                            <option value="1" @selected($slideshow->status==1)>Aktiv</option>
                                            <option value="0" @selected($slideshow->status==0)>Passiv</option>
                                        </select>
                                        <div data-input="status" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Yenilə</button>
                                    <a href="{{route('admin.slideshows.index')}}" class="btn btn-secondary">Geri</a>
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
            $('#editSlideshow').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#editSlideshow').attr('action'),
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
                                $('#editSlideshow .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

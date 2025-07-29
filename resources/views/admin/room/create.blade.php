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
                                    Yeni otaq
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="addRoom" action="{{route('admin.rooms.store')}}" method="post">
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
                                        <input type="text" class="form-control" placeholder="Title az" name="title_az"/>
                                        <div data-input="title_az" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Title en
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Title en" name="title_en"/>
                                        <div data-input="title_en" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Title ru
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Title ru" name="title_ru"/>
                                        <div data-input="title_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Yataq sayı
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Yataq sayı"
                                               name="bed_count"/>
                                        <div data-input="bed_count" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Hamam sayı
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Hamam sayı"
                                               name="bath_count"/>
                                        <div data-input="bath_count" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            WiFi
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="wifi">
                                            <option value="{{null}}" selected>Seçim edin...</option>
                                            <option value="1">Var</option>
                                            <option value="0">Yoxdur</option>
                                        </select>
                                        <div data-input="wifi" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Tv
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="tv">
                                            <option value="{{null}}" selected>Seçim edin...</option>
                                            <option value="1">Var</option>
                                            <option value="0">Yoxdur</option>
                                        </select>
                                        <div data-input="tv" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Kondisoner
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="ac">
                                            <option value="{{null}}" selected>Seçim edin...</option>
                                            <option value="1">Var</option>
                                            <option value="0">Yoxdur</option>
                                        </select>
                                        <div data-input="ac" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Xidmət
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="laundry">
                                            <option value="{{null}}" selected>Seçim edin...</option>
                                            <option value="1">Var</option>
                                            <option value="0">Yoxdur</option>
                                        </select>
                                        <div data-input="laundry" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Nahar
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                name="dinner">
                                            <option value="{{null}}" selected>Seçim edin...</option>
                                            <option value="1">Var</option>
                                            <option value="0">Yoxdur</option>
                                        </select>
                                        <div data-input="dinner" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ətraflı az
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Ətraflı az"
                                                  name="description_az" rows="6">
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
                                        </textarea>
                                        <div data-input="description_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Qiymətlər haqqında az
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Qiymətlər haqqında az"
                                                  name="pricing_description_az" rows="6">
                                        </textarea>
                                        <div data-input="pricing_description_az" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Qiymətlər haqqında en
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Qiymətlər haqqında en"
                                                  name="pricing_description_en" rows="6">
                                        </textarea>
                                        <div data-input="pricing_description_en" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Qiymətlər haqqında ru
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Qiymətlər haqqında ru"
                                                  name="pricing_description_ru" rows="6">
                                        </textarea>
                                        <div data-input="pricing_description_ru" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Gecəlik qiymət
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Gecəlik qiymət"
                                               name="nightly_price"/>
                                        <div data-input="nightly_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Aylıq qiymət
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Aylıq qiymət"
                                               name="monthly_price"/>
                                        <div data-input="monthly_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Həftəlik qiymət
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Həftəlik qiymət"
                                               name="weekly_price"/>
                                        <div data-input="weekly_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Həftə sonu qiyməti
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Həftə sonu qiyməti"
                                               name="weekend_price"/>
                                        <div data-input="weekend_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Əlavə qiymətlər
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Əlavə qiymətlər"
                                               name="additional_price"/>
                                        <div data-input="additional_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Depozit qiymət
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="Depozit qiymət"
                                               name="security_deposit_price"/>
                                        <div data-input="security_deposit_price" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Kateqoriyalar
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control selectpicker"
                                                name="category_id" data-live-search="true">
                                            <option value="{{null}}" disabled selected>Seçim edin...</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_az}}</option>
                                            @endforeach
                                        </select>
                                        <div data-input="category_id" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Yarat</button>
                                    <a href="{{route('admin.rooms.index')}}" class="btn btn-secondary">Geri</a>
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
            $('#addRoom').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#addRoom').attr('action'),
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
                                window.location.href = '/admin/rooms';
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
                                $('#addRoom .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

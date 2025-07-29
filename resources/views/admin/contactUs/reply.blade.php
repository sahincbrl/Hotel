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
                                    Cavabla
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form id="postReplyContact" action="{{route('admin.contacts.reply_post')}}"
                                  method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>
                                            Ad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ad"
                                               name="name" value="{{$contact->name}}" readonly/>
                                        <div data-input="name" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Email"
                                               name="email" value="{{$contact->email}}" readonly/>
                                        <div data-input="email" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Subject
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Subject"
                                               name="subject" value="{{$contact->subject}}" readonly/>
                                        <div data-input="subject" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Mesaj
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Mesaj"
                                                  name="message" rows="8" readonly>
                                            {{$contact->message}}
                                        </textarea>
                                        <div data-input="message" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Cavab
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Mesaj"
                                                  name="answer" rows="8">
                                        </textarea>
                                        <div data-input="answer" class="invalid-feedback"></div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Göndər</button>
                                    <a href="{{route('admin.contacts.index')}}" class="btn btn-secondary">Geri</a>
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
            $('#postReplyContact').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#postReplyContact').attr('action'),
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
                                window.location.href = '/admin/contacts';
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
                                $('#postReplyContact .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

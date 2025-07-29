@extends('frontend.main.app')
@section('css')
    <link rel="stylesheet" href="{{asset('jsValidate/sweetalert2.css')}}"/>
@endsection
@section('content')

    <div class="container-xxl py-5 my-50 mb-10">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">
                    {{__('app.contact_us')}}
                </h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">

                        {{__('app.contact')}}

                    </span>

                    {{__('app.for any query')}}

                </h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">
                                {{__('app.booking')}}
                            </h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i><a
                                    href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="e78588888ca7829f868a978b82c984888a">[email&#160;protected]</a></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">
                                {{__('app.general')}}
                            </h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i><a
                                    href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="c8a1a6aea788adb0a9a5b8a4ade6aba7a5">[email&#160;protected]</a></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">
                                {{__('app.technical')}}
                            </h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i><a
                                    href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="c7b3a2a4af87a2bfa6aab7aba2e9a4a8aa">[email&#160;protected]</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen aria-hidden="false"
                            tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="contact-form wow fadeInUp" data-wow-delay="0.2s">
                        <div id="alertMessage"></div>
                        <form id="createContactForm" method="post"
                              action="{{route('post.contact-us')}}">
                            @csrf
                            <div class="row gx-3">
                                <div class="col-md-6 control-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" placeholder="Ad">
                                        <label for="name">
                                            Ad
                                        </label>
                                        <div data-input="name" class="invalid-feedback"></div>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 control-group">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" placeholder="email">
                                        <label for="email">
                                            Email
                                        </label>
                                        <div data-input="email" class="invalid-feedback"></div>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12 control-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject" placeholder="Mövzu">
                                        <label for="subject">
                                            Mövzu
                                        </label>
                                        <div data-input="subject" class="invalid-feedback"></div>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12 control-group mb-5">
                                    <div class="form-floating">
                                        <textarea class="form-control h-auto" placeholder="Mesaj"
                                                  rows="10" name="message">
                                        </textarea>
                                        <label for="message">
                                            Mesaj
                                        </label>
                                        <div data-input="message" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        Mesaj Gonder
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('textarea').each(function () {
                $(this).val($(this).val().trim())
            });
            $('#createContactForm').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#createContactForm').attr('action'),
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
                                window.location.href = '/contact-us';
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
                                $('#createContactForm .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

@extends('frontend.main.app')
@section('css')
    <link rel="stylesheet" href="{{asset('jsValidate/sweetalert2.css')}}"/>
@endsection
@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel"
                         data-wow-delay="0.1s">
                        <div class="carousel-inner">
                            @foreach($room->roomImages as $key =>$roomImage)
                                <div class="carousel-item
                                {{$key==0 ? 'active' : ''}}
                                ">
                                    <img class="w-100" src="{{asset('uploads/roomImages/'.$roomImage->image_name)}}"
                                         alt="Image1">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#room-carousel"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#room-carousel"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h1 class="mb-0">
                                {{$room->title_az}}
                            </h1>
                            <p>
                                Category: {{$room->category->name_az}}
                            </p>
                        </div>
                        <div class="ps-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap pb-4 m-n1">
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-bed text-primary me-2"></i>
                            {{$room->bed_count}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-bath text-primary me-2"></i>
                            {{$room->bath_count}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-wifi text-primary me-2"></i>
                            {{$room->wifi == 1 ? 'Var' : 'Yoxdur'}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-tv text-primary me-2"></i>
                            {{$room->tv == 1 ? 'Var' : 'Yoxdur'}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-fan text-primary me-2"></i>
                            {{$room->ac == 1 ? 'Var' : 'Yoxdur'}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-user-cog text-primary me-2"></i>
                            {{$room->laundry == 1 ? 'Var' : 'Yoxdur'}}
                        </small>
                        <small class="bg-light rounded py-1 px-3 m-1">
                            <i class="fa fa-utensils text-primary me-2"></i>
                            {{$room->dinner == 1 ? 'Var' : 'Yoxdur'}}
                        </small>
                    </div>
                    <p>
                        {{$room->description_az}}
                    </p>
                    <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-flex justify-content-evenly border-bottom mb-4">

                            <li class="nav-item">
                                <a class="d-flex align-items-center py-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <i class="fa fa-dollar text-primary me-2"></i>
                                    <h6 class="mb-0">Pricing</h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center py-3" data-bs-toggle="pill" href="#tab-2">
                                    <i class="fa fa-star text-primary me-2"></i>
                                    <h6 class="mb-0">Rəy ({{$room->comments->count()}})</h6>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <p>
                                    {{$room->pricing_description_az}}
                                </p>
                                <div class="row g-4">
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Nightly:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->nightly_price}}</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Weekly:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->weekly_price}}</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Monthly:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->monthly_price}}</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Weekends:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->weekend_price}}</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Additional Guest:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->additional_price}}</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                        <span>Security Deposit:</span>
                                        <hr class="flex-grow-1 my-0 mx-3">
                                        <span>{{$room->security_deposit_price}}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="mb-4">
                                    <h4 class="mb-4">{{$room->comments->count()}} Rəy</h4>

                                    @foreach($room->comments->where('parent_id',null) as $comment)

                                        <div class="d-flex mb-4">
                                            <img src="img/user.jpg" class="img-fluid rounded"
                                                 style="width: 45px; height: 45px;">
                                            <div class="ps-3">
                                                <h6>{{$comment->full_name}} <small
                                                        class="text-body fw-normal fst-italic">
                                                        {{$comment->created_at}}
                                                    </small></h6>
                                                <div class="mb-2">
                                                    @for($i=1; $i<=$comment->rating; $i++)
                                                        <small class="fas fa-star text-primary"></small>
                                                    @endfor
                                                    @if($comment->rating - floor($comment->rating) >= 0.5)
                                                        <small class="fas fa-star-half-alt text-primary"></small>
                                                    @endif
                                                </div>
                                                <p class="mb-2">
                                                    {{$comment->comment}}
                                                </p>
                                                <a href><i class="fa fa-reply me-2"></i> Cavabla</a>
                                            </div>
                                        </div>

                                        @if($comment->children->count()>0)
                                            @foreach($comment->children as $cc)
                                                <div class="d-flex ms-5 mb-4">
                                                    <img src="img/user.jpg" class="img-fluid rounded"
                                                         style="width: 45px; height: 45px;">
                                                    <div class="ps-3">
                                                        <h6>
                                                            {{$cc->full_name}}
                                                            <small class="text-body fw-normal fst-italic">
                                                                {{$cc->created_at}}
                                                            </small></h6>
                                                        <div class="mb-2">
                                                            @for($i=1; $i<=$cc->rating; $i++)
                                                                <small class="fas fa-star text-primary"></small>
                                                            @endfor
                                                            @if($cc->rating - floor($cc->rating) >= 0.5)
                                                                <small class="fas fa-star-half-alt text-primary"></small>
                                                            @endif
                                                        </div>
                                                        <p class="mb-2">
                                                            {{$cc->comment}}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    @endforeach

                                </div>
                                <div class="bg-light p-4 p-md-5">
                                    <h4 class="mb-4">
                                        Rəy yazın
                                    </h4>
                                    <form id="createRoomComment" method="post"
                                          action="{{route('post.room_comment')}}">
                                        @csrf
                                        <input hidden value="{{$room->id}}" name="room_id">
                                        <div class="row g-3">
                                            <div class="col-12 d-flex align-items-center">
                                                <h6 class="mb-0 me-2">Ulduz:</h6>
                                                <div id="halfstarsReview" class="fs-3 me-2"></div>
                                                <input type="text" value readonly id="halfstarsInput" name="rating"
                                                       class="border-0 bg-transparent" style="width: 30px;">
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control bg-white border-0"
                                                       placeholder="Ad Soyad" name="full_name" style="height: 55px;">
                                                <div data-input="full_name" class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="email" class="form-control bg-white border-0"
                                                       placeholder="E-poçt" name="email" style="height: 55px;">
                                                <div data-input="email" class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control bg-white border-0" rows="5"
                                                          placeholder="Rəy" name="comment"></textarea>
                                                <div data-input="comment" class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">
                                                    Göndər
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">

                    @if($room->status==1)

                        <form id="postOrder" action="{{route('post.order')}}" method="post">
                            @csrf
                            <input value="{{$room->id}}" name="room_id" hidden/>
                            <input value="{{$room->nightly_price}}" name="price" hidden/>
                            <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                                    <span class="align-top fs-4 lh-base">$</span>
                                    <span class="align-middle fs-1 lh-sm fw-bold">
                                {{$room->nightly_price}}
                            </span>
                                    <span class="align-bottom fs-6 lh-lg">/ Night</span>
                                </div>
                                <div class="row g-3 p-4 pt-2">

                                    <div class="col-12">
                                        <div class="date">
                                            <input type="text" class="form-control" placeholder="Name"
                                                   name="name"/>
                                            <div data-input="name" class="invalid-feedback"></div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="date">
                                            <input type="text" class="form-control" placeholder="Surname"
                                                   name="surname"/>
                                            <div data-input="surname" class="invalid-feedback"></div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="date">
                                            <input type="text" class="form-control" placeholder="Email"
                                                   name="email"/>
                                            <div data-input="email" class="invalid-feedback"></div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="date">
                                            <input type="text" class="form-control" placeholder="Mobile"
                                                   name="mobile"/>
                                            <div data-input="mobile" class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="date" id="date3" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input"
                                                   placeholder="Check in"
                                                   data-target="#date3" data-toggle="datetimepicker" name="check_in"/>
                                            <div data-input="check_in" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="date" id="date4" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input"
                                                   placeholder="Check out"
                                                   data-target="#date4" data-toggle="datetimepicker" name="check_out"/>
                                            <div data-input="check_out" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" name="adult_count">
                                            <option value="{{null}}" selected>Adult</option>
                                            <option value="1">Adult 1</option>
                                            <option value="2">Adult 2</option>
                                            <option value="3">Adult 3</option>
                                        </select>
                                        <div data-input="adult_count" class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" name="child_count">
                                            <option value="{{null}}" selected>Child</option>
                                            <option value="1">Child 1</option>
                                            <option value="2">Child 2</option>
                                            <option value="3">Child 3</option>
                                        </select>
                                        <div data-input="child_count" class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary py-3 w-100">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @elseif($room->status==2)
                        <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                                <h4 class="align-middle fs-1 lh-sm fw-bold">
                                    Mesguldur
                                </h4>
                            </div>
                        </div>
                    @endif
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title text-start mb-4">Category</h4>
                        <div class="category-list d-flex flex-column">
                            @foreach($categories as $category)
                                <a class="text-body d-flex mb-3" href>
                                    {{$category->name_az}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="container-xxl py-5 mb-10">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">
                    Bənzər
                </h6>
                <h1 class="mb-5">
                    Otaqlar
                </h1>
            </div>
            <div class="row g-4">

                @foreach($room->category->rooms as $sameRoom)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item rounded">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{asset('uploads/roomImages/'.$sameRoom->title_image)}}"
                                     alt>
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                    {{$room->nightly_price}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15"
                                         height="15">
                                        <path d="M192 32c-17.7 0-32 14.3-32 32l0 34.7C69.2 113.9 0 192.9 0
    288L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-59.6 40.8-109.8
    96-124l0 284c0 17.7 14.3 32 32 32s32-14.3 32-32l0-284c55.2 14.2 96
    64.3 96 124l0 160c0 17.7 14.3 32 32 32s32-14.3
    32-32l0-160c0-95.1-69.2-174.1-160-189.3L224
    64c0-17.7-14.3-32-32-32z" fill="white"/>
                                    </svg>
                                </small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">
                                        {{$room->title_az}}
                                    </h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3">
                                        {{$room->category->name_az}}
                                    </small>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>
                                        {{$room->bed_count}} Yataq
                                    </small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>
                                        {{$room->bath_count}} Hamam
                                    </small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>
                                        Wifi:
                                        @if($room->wifi==1)
                                            Var
                                        @else
                                            Yoxdur
                                        @endif
                                    </small>
                                </div>
                                <p class="text-body mb-3">
                                    {{$room->description_az}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                       href="{{route('get.room.show', $room->id)}}">
                                        Ətraflı
                                    </a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href>
                                        Sifariş edin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.9s">
                    <a href class="btn btn-primary py-3 px-5">
                        Bütün otaqlar
                    </a>
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

            $('#createRoomComment').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#createRoomComment').attr('action'),
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
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rooms/{{$room->id}}';
                            }
                        });
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
                                $('#createRoomComment .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })

            $('#postOrder').submit(function (e) {
                e.preventDefault()
                var formData = new FormData($(this)[0]);
                $('.invalid-feedback').removeClass('d-block').text();

                console.log({formData})
                $.ajax({
                    'url': $('#postOrder').attr('action'),
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
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rooms/{{$room->id}}';
                            }
                        });
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
                                $('#postOrder .invalid-feedback[data-input="' + attribute + '"]').addClass('d-block').text(value)
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection

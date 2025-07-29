@extends('frontend.main.app')
@section('css')
    {{--    //css kodlarimiz--}}
@endsection
@section('content')

    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach($slideshows as $key => $slideshow)
                    <div class="carousel-item
                    {{$key == 0 ? 'active' : ''}}
                    ">
                        <img class="w-100" src="{{asset('uploads/slideshowImages/'.$slideshow->image)}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                                    {{$slideshow->title_az}}
                                </h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">
                                    {{$slideshow->short_info_az}}
                                </h1>
                                <a href class="btn btn-light py-md-3 px-md-5 animated slideInRight">Daha Ətraflı</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Hotelier</span></h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                        amet</p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="mb-0">Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href>Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg"
                                 style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">
                    Otaqlar
                </h6>
                <h1 class="mb-5">
                    Otaqlarımızı
                    <span class="text-primary text-uppercase">
                        kəşf edin
                    </span>
                </h1>
            </div>
            <div class="row g-4">

                @foreach($rooms as $room)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item rounded">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{asset('uploads/roomImages/'.$room->title_image)}}" alt>
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
                                        @if(App::getLocale()=='az')
                                            {{$room->title_az}}
                                        @elseif(App::getLocale()=='en')
                                            {{$room->title_en}}
                                        @elseif(App::getLocale()=='ru')
                                            {{$room->title_ru}}
                                        @endif
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
                                        @if(App::getLocale()=='az')
                                            {{$room->category->name_az}}
                                        @elseif(App::getLocale()=='en')
                                            {{$room->category->name_en}}
                                        @elseif(App::getLocale()=='ru')
                                            {{$room->category->name_ru}}
                                        @endif
                                    </small>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>
                                        {{$room->bed_count .' '.__('app.bed')}}
                                    </small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>
                                        {{$room->bath_count.' '.__('app.bath')}}
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
                                    @if(App::getLocale()=='az')
                                        {{$room->description_az}}
                                    @elseif(App::getLocale()=='en')
                                        {{$room->description_en}}
                                    @elseif(App::getLocale()=='ru')
                                        {{$room->description_ru}}
                                    @endif

                                </p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                       href="{{route('get.room.show', $room->id)}}">
                                        {{__('app.detail')}}
                                    </a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href>
                                        @if($room->status==1)
                                            {{__('app.type_free')}}
                                        @elseif($room->status==2)
                                            {{__('app.type_busy')}}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Rooms & Appartment</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Food & Restaurant</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-spa fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Spa & Fitness</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-swimmer fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Sports & Gaming</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Event & Party</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <a class="service-item text-center rounded" href>
                        <div class="service-icon bg-transparent border rounded mx-auto mb-4 p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-dumbbell fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">GYM & Yoga</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed
                            diam stet diam sed stet lorem.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl testimonial my-50 py-5 bg-dark wow fadeIn mb-10" data-wow-delay="0.1s">
        <div class="container">
            <div class="owl-carousel testimonial-carousel py-5">
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                        stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                             style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                        stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                             style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                        stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                             style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
            </div>
        </div>
    </div>

@endsection

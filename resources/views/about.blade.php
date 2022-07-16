@extends('layouts.main')

@push('head')
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
@endpush

@push('header')
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2e2e2e" fill-opacity="1"
            d="M0,224L24,224C48,224,96,224,144,213.3C192,203,240,181,288,186.7C336,192,384,224,432,224C480,224,528,192,576,176C624,160,672,160,720,176C768,192,816,224,864,202.7C912,181,960,107,1008,112C1056,117,1104,203,1152,218.7C1200,235,1248,181,1296,149.3C1344,117,1392,107,1416,101.3L1440,96L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
        </path>
    </svg>
@endpush

@section('main')
    <section id="header">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="icons/android-chrome-512x512.png" alt="" width="144"
                height="114">

            <h1 class="display-5 fw-bold">VnBlog</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/home" type="button" class="btn btn-secondary btn-lg px-4 gap-3">
                        Home Page
                    </a>
                    <a href="#contact" class="btn btn-outline-primary btn-lg px-4">Contact</a>
                </div>
            </div>
        </div>
    </section>

    <section id="accordion" class="d-flex justify-content-center mb-4">
        <div class="col-11 col-md-8 col-lg-6">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2e2e2e" fill-opacity="1"
            d="M0,160L24,181.3C48,203,96,245,144,240C192,235,240,181,288,160C336,139,384,149,432,176C480,203,528,245,576,261.3C624,277,672,267,720,229.3C768,192,816,128,864,133.3C912,139,960,213,1008,229.3C1056,245,1104,203,1152,160C1200,117,1248,75,1296,90.7C1344,107,1392,181,1416,218.7L1440,256L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
        </path>
    </svg>

    <section id="contact" class="pt-0 mt-0" style="background-color: #2e2e2e">
        <h2 class="text-center py-3">Contact Me</h2>
        <form action="#" class="d-flex flex-column justify-content-center align-items-center">
            <div class="form-floating mb-3 col-11  col-md-8 col-lg-6">
                <input type="text" maxlength="255" class="form-control" id="name" placeholder="Your Name">
                <label for="name">Name<span class="text-danger">*</span></label>
            </div>
            <div class="form-floating mb-3 col-11 col-md-8 col-lg-6">
                <input type="text" class="form-control" id="subject" placeholder="Email Subject">
                <label for="subject">Subject<span class="text-danger">*</span></label>
            </div>
            <div class="form-floating mb-3 col-11 col-md-8 col-lg-6">
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email address<span class="text-danger">*</span></label>
            </div>
            <div class="mb-3 col-11 col-md-8 col-lg-6">
                <textarea class="form-control" id="message" placeholder="Message" rows="8"></textarea>
            </div>
            <div class="d-grid col-11 col-md-8 col-lg-6 pb-2">
                <button class="btn btn-outline-success">
                    Send <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </form>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2e2e2e" fill-opacity="1"
            d="M0,160L24,160C48,160,96,160,144,144C192,128,240,96,288,106.7C336,117,384,171,432,160C480,149,528,75,576,64C624,53,672,107,720,138.7C768,171,816,181,864,192C912,203,960,213,1008,224C1056,235,1104,245,1152,256C1200,267,1248,277,1296,250.7C1344,224,1392,160,1416,128L1440,96L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
        </path>
    </svg>
@endsection

{{-- @push('footer')
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f8f9fa" fill-opacity="1"
            d="M0,64L34.3,74.7C68.6,85,137,107,206,128C274.3,149,343,171,411,197.3C480,224,549,256,617,240C685.7,224,754,160,823,138.7C891.4,117,960,139,1029,160C1097.1,181,1166,203,1234,181.3C1302.9,160,1371,96,1406,64L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
    </svg>
    <section id="footer">
        <h1 class="text-center visually-hidden">Footer Goes Here</h1>
        @include('home.template.footer')
    </section>
@endpush --}}

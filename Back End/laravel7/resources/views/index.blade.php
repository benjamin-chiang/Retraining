{{-- 繼承哪一個模板 --}}
@extends('layouts.template')

@section('css')
    {{-- 用asset引入外部css檔，css檔必須先放入public資料夾中 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}">
@endsection

@section('main')
    <section>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('/img/bar1.jpeg') }}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('/img/bar2.jpg') }}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/bar3.jpg') }}" class="d-block w-100" alt="...">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section>
        <div class="container-lg d-flex flex-column justify-content-center align-items-center py-5 my-5">
            <div class="textarea-l mb-5">
                <h1>Raw Denim Heirloom Man Braid</h1>
                <span>Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice
                    poutine, ramps microdosing banh mi pug.</span>
            </div>
            <div class="cards-l3 d-flex flex-column flex-md-row justify-content-center align-items-center mb-5">
                <div class="card d-flex justify-content-center align-items-center mx-2">
                    <div class="icon-a rounded-circle d-flex align-items-center justify-content-center  color-a mb-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <!-- <i class="fas fa-user-circle fa-5x color-a mb-3"></i> -->
                    <p>Shooting Stars</p>
                    <span>Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo
                        juice
                        poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                    <a href="" class=" color-a  text-decoration-none mt-3">Learn More <svg fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                            viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="card  d-flex justify-content-center align-items-center mx-2 mt-3">
                    <div class="icon-a rounded-circle d-flex align-items-center justify-content-center  color-a mb-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                    </div>
                    <!-- <i class="fas fa-user-circle fa-5x color-a mb-3"></i> -->
                    <p>The Catalyzer</p>
                    <span>Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo
                        juice
                        poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                    <a href="" class=" color-a  text-decoration-none mt-3">Learn More <svg fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                            viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg></a>
                </div>
                <div class="card  d-flex justify-content-center align-items-center mx-2 mt-3">
                    <div class="icon-a rounded-circle d-flex align-items-center justify-content-center  color-a mb-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <!-- <i class="fas fa-user-circle fa-5x color-a mb-3"></i> -->
                    <p>Neptune</p>
                    <span>Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo
                        juice
                        poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                    <a href="" class="color-a  text-decoration-none mt-3">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <button type="button" class=" btn btn-primary backgroundcolor-a size-a">Button</button>
        </div>
    </section>
    <section>
        <div class="container-lg  py-5 my-5">
            <div class="textarea-c  d-flex mb-5 flex-column flex-lg-row">
                <h1>Master Cleanse Reliac Heirloom</h1>
                <p>Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                    farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom.
                </p>
            </div>

            <div class="imgs d-flex ">
                <div class="left-img w-50  d-flex flex-wrap">
                    <img class="w-50 p-2" src="https://dummyimage.com/500x300" alt="">
                    <img class="w-50 p-2" src="https://dummyimage.com/501x301" alt="">
                    <img class="w-100 p-2" src="https://dummyimage.com/600x360" alt="">
                </div>
                <div class="right-img w-50 d-flex flex-wrap">
                    <img class="w-100 p-2" src="https://dummyimage.com/601x361" alt="">
                    <img class="w-50 p-2" src="https://dummyimage.com/502x302" alt="">
                    <img class="w-50 p-2" src="https://dummyimage.com/503x303" alt="">

                </div>
            </div>
    </section>
    <section>
        <div class="container-lg  py-5 my-5 d-flex  flex-column justify-content-center align-items-center">
            <div class="textarea-l  mb-5">
                <h1>Pricing</h1>
                <span>Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct
                    trade mumblecore 3 wolf moon twee</span>
            </div>
            <div class="table-block w-75">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Plan</th>
                            <th scope="col">Speed</th>
                            <th scope="col">Storage</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Start</td>
                            <td>5 Mb/s</td>
                            <td>15 GB</td>
                            <td>Free</td>
                            <td><input type="radio" name="plan"></td>
                        </tr>
                        <tr>
                            <td>Pro</td>
                            <td>25 Mb/s</td>
                            <td>25 GB</td>
                            <td>$24</td>
                            <td><input type="radio" name="plan"></td>
                        </tr>
                        <tr>
                            <td>Business</td>
                            <td>36 Mb/s</td>
                            <td>40 GB</td>
                            <td>$50</td>
                            <td><input type="radio" name="plan"></td>
                        </tr>
                        <tr>
                            <td>Exclusive</td>
                            <td>48 Mb/s</td>
                            <td>120 GB</td>
                            <td>$72</td>
                            <td><input type="radio" name="plan"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="under-table d-flex justify-content-between">
                    <a href="" class=" text-decoration-none">Learn More <svg fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                            viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <button type="button" class="btn btn-primary">Button</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-lg  py-5 my-5">
            <div class="textarea-c   d-flex mb-5 flex-column flex-lg-row">
                <h1 class="d-flex col-12 col-lg-6">Pitchfork Kickstarter Taxidermy</h1>
                <p class="d-flex col-12 col-lg-6">
                    Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                    farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom
                    prism food truck ugh squid celiac humblebrag.
                </p>
            </div>
            <div class="cards-4 d-flex row  justify-content-between">

                <div class="card   col-md-6 col-lg-3 border-0 mb-3">
                    <div class="card-block p-4 rounded">
                        <img src="https://dummyimage.com/720x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="color-a ">SUBTITLE</span>
                            <h5 class="card-title">Chichen Itza</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="card   col-md-6 col-lg-3 border-0 mb-3">
                    <div class="card-block p-4 rounded">
                        <img src="https://dummyimage.com/720x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="color-a ">SUBTITLE</span>
                            <h5 class="card-title">Chichen Itza</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="card   col-md-6 col-lg-3 border-0 mb-3">
                    <div class="card-block p-4 rounded">
                        <img src="https://dummyimage.com/720x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="color-a ">SUBTITLE</span>
                            <h5 class="card-title">Chichen Itza</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="card   col-md-6 col-lg-3 border-0 mb-3">
                    <div class="card-block p-4 rounded">
                        <img src="https://dummyimage.com/720x400" class="card-img-top" alt="...">
                        <div class="card-body">
                            <span class="color-a ">SUBTITLE</span>
                            <h5 class="card-title">Chichen Itza</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-lg d-flex flex-column justify-content-center align-items-center py-5 my-5">
            <div class="cards-r3 w-75 ">
                <div class="card   d-flex flex-row justify-content-center align-items-center mx-2 py-4">
                    <div class="icon-b rounded-circle d-flex align-items-center justify-content-center  color-a mb-3 me-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="card-r d-flex flex-column ">
                        <p>Shooting Stars</p>
                        <span class="mb-2">Blue bottle crucifix vinyl post-ironic four dollar toast vegan
                            taxidermy.
                            Gastropub indxgo
                            juice
                            poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                        <a href="" class="color-a text-decoration-none">Learn More <svg fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg></a>
                    </div>

                </div>
                <div class="card  d-flex flex-row justify-content-center align-items-center mx-2  py-4">

                    <div class="card-r d-flex flex-column">
                        <p>The Catalyzer</p>
                        <span class="mb-2">Blue bottle crucifix vinyl post-ironic four dollar toast vegan
                            taxidermy.
                            Gastropub indxgo
                            juice
                            poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                        <a href="" class="color-a text-decoration-none">Learn More <svg fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg></a>
                    </div>
                    <div class="icon-b rounded-circle d-flex align-items-center justify-content-center  color-a mb-3 ms-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                    </div>
                </div>
                <div class="card  d-flex flex-row justify-content-center align-items-center mx-2  mb-5 py-4">
                    <div
                        class="icon-b rounded-circle d-flex align-items-center justify-content-center  color-a mb-3  me-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="card-r d-flex flex-column">
                        <p>Neptune</p>
                        <span class="mb-2">Blue bottle crucifix vinyl post-ironic four dollar toast vegan
                            taxidermy.
                            Gastropub indxgo
                            juice
                            poutine, ramps microdosing banh mi pug VHS try-hard.</span>
                        <a href="" class="color-a text-decoration-none">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary backgroundcolor-a">Button</button>
        </div>
    </section>
    <section>
        <div class="container-lg d-flex justify-content-center align-items-center py-5 my-5 w-75 flex-column flex-lg-row ">
            <img class="big-img col-12 col-lg-6" src="https://dummyimage.com/400x400" alt="">
            <div class="block-r col-12 col-lg-6 ps-lg-5 py-3">
                <h2>BRAND NAME</h2>
                <h1>The Catcher in the Rye</h1>
                <div class="svg-block d-flex mb-3">
                    <div class="star color-a">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="reviews ms-3">
                        <span>4 Reviews</span>
                    </div>
                    <div class="ftw ms-2 ps-2 border-start ">
                        <a href="" class="text-decoration-none">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <p>Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde
                    DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine
                    tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed
                    umami cardigan.</p>
                <div class="color-size d-flex align-items-center pb-3 mb-3 border-bottom ">
                    <div class="color">
                        <span class="me-1">Color</span>
                        <button type="button" class="btn btn-primary rounded-circle border border-2 p-3 me-1 "></button>
                        <button type="button" class="btn btn-primary rounded-circle border border-2 p-3 me-1"></button>
                        <button type="button" class="btn btn-primary rounded-circle border border-2 p-3 "></button>
                    </div>
                    <div class="size ms-4">
                        <span>Size</span>
                        <select class="p-2 rounded">
                            <option value="">SM</option>
                            <option value="">M</option>
                            <option value="">L</option>
                            <option value="">XL</option>
                        </select>
                    </div>
                </div>
                <div class="total d-flex">
                    <span class="me-auto">$58.00</span>
                    <button type="button" class="btn btn-primary backgroundcolor-a">Button</button>
                    <button class="heart p-2 rounded-circle border-0 ms-3">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="container-lg d-flex flex-wrap mb-5">
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/420x260" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">The Catalyzer</h2>
                <span>$16.00</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/421x261" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">Shooting Stars</h2>
                <span>$21.15</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/422x262" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">Neptune</h2>
                <span>$12.00</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/423x263" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">The 400 Blows</h2>
                <span>$18.40</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/424x264" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">The Catalyzer</h2>
                <span>$16.00</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/425x265" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">Shooting Stars</h2>
                <span>$21.15</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/427x267" alt="">
                <h3 class="fs-6">CATEGORY</h3>
                <h2 class="fs-5">Neptune</h2>
                <span>$12.00</span>
            </div>
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="https://dummyimage.com/428x268" alt="">
                <h3 class="fs-6">The 400 Blows</h3>
                <h2 class="fs-5">Neptune</h2>
                <span>$18.40</span>
            </div>
        </div>
    </section>
    <section class="position-relative mb-3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14566.398584717037!2d120.654491!3d24.11557075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgooglemap!5e0!3m2!1szh-TW!2stw!4v1631860947676!5m2!1szh-TW!2stw"
            width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <form action="/contact_us/store" method="post">
            @csrf
            <div id="contact-us"
                class="position-card position-absolute top-50 end-0 translate-middle-y bg-white me-5 p-4 h-80 col-10  col-md-5  col-xl-3 rounded">
                <span>聯絡我們</span>
                <div class="name d-flex flex-wrap mb-3">
                    <span>姓名</span>
                    <input type="text" class=" w-100 rounded" name="name">
                </div>
                <div class="email d-flex flex-wrap mb-3">
                    <span>信箱</span>
                    <input type="email" class=" w-100 rounded" name="email">
                </div>
                <div class="phone d-flex flex-wrap mb-3">
                    <span>電話</span>
                    <input type="text" class=" w-100 rounded" name="phone">
                </div>
                <div class="title d-flex flex-wrap mb-3">
                    <span>主旨</span>
                    <input type="text" class=" w-100 rounded" name="title">
                </div>
                <div class="message  d-flex flex-wrap h-25 mb-5">
                    <span>內文</span>
                    <textarea name="content" id="" cols="30" rows="5" class=" w-100 h-100 rounded"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-2">Button</button>
            </div>
        </form>
    </section>
@endsection

@section('js')

@endsection

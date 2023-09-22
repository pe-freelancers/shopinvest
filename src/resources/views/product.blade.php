@extends('main')
@section('content')
    <!-- Product section-->
    <div class="row" style="width: 100%;">
        <div class="col-md-6 text-center row no-padding-mobile">
            <div class="col-md-12 col-xs-12 no-padding-mobile">
                <img class="product-image" id="mainImage" src="{{ asset('assets/image_3.jpg') }}" alt="..." />
            </div>
            <div class="col-md-12 col-xs-12 row container-image-child">
                <div class="image-child">
                    <img class="product-image-child" src="{{ asset('assets/image_3.jpg') }}" alt="..."
                        onclick="changeImage(this)" />
                </div>
                <div class="image-child">
                    <img class="product-image-child" src="{{ asset('assets/image_1.png') }}" alt="..."
                        onclick="changeImage(this)" />
                </div>
                <div class="image-child">
                    <img class="product-image-child" src="{{ asset('assets/image_4.png') }}" alt="..."
                        onclick="changeImage(this)" />
                </div>
                <div class="image-child">
                    <img class="product-image-child" src="{{ asset('assets/image_2.jpg') }}" alt="..."
                        onclick="changeImage(this)" />
                </div>
            </div>
        </div>
        <div class="col-md-6 content-product">
            <div class="row product-header-info">
                <div class="col-md-6">
                    <div class="title-product-info display-5 fw-bolder">Product name</div>
                </div>
                <div class="col-md-6">
                    <div class="title-product-info product-price display-5 fw-bolder">
                        <span class="text-decoration-line-through">$45.00</span>
                        <span>$40.00</span>
                    </div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="description">
                    <div class="row d-flex justify-content-center nopadding">
                        <div class="col-sm-12 nopadding">
                            <div class="">
                                <ul class="nav nav-pills" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab"
                                            href="#home2" role="tab" aria-controls="home" aria-selected="true">My
                                            Description</a></li>
                                    <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab"
                                            href="#profile2" role="tab" aria-controls="profile" aria-selected="false">My
                                            Delivery</a></li>
                                    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab"
                                            href="#contact2" role="tab" aria-controls="contact" aria-selected="false">My
                                            Guarantees Payment</a></li>
                                </ul>
                            </div>
                            <div class="tab-content mb-4">
                                <div class="tab-pane fade active in" id="home2" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <p class="lead">Description</p>
                                </div>
                                <div class="tab-pane fade" id="profile2" role="profile" aria-labelledby="home-tab">
                                    <p class="lead">Delivery</p>
                                </div>
                                <div class="tab-pane fade" id="contact2" role="contact" aria-labelledby="home-tab">
                                    <p class="lead">Guarantees Payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row product-header-info">
                <div class="col-md-6 col-xs-8 row container-addcard">
                    <div class="col-md-4 col-xs-5">
                        Amount
                    </div>
                    <div>
                        <button class="btn btn-sm" onclick="decreaseItem()">-</button>
                        <input class="text-center me-3" id="inputAmount" pattern="^[1-9]\d*$" value="1"
                            style="max-width: 3rem" />
                        <button class="btn btn-sm" onclick="increaseItem()">+</button>
                    </div>
                </div>
                <div class="col-md-6 col-xs-4">
                    <button onclick="addToCard()" class="btn-add-cart btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

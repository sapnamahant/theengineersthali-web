<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>The Engineers Thali</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('assets/web/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('assets/web/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/web/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('assets/web/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/web/css/responsive.css')}}">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="{{asset('assets/web/css/colors/orange.css')}}" />

    <!-- Modernizer -->
    <script src="{{asset('assets/web/js/modernizer.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="{{route('index')}}">
                                        <img src="{{asset('assets/web/images/m_logo.png')}}" alt="" style="width: 80px;">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#banner">Home</a></li>
                                    <li><a href="{{asset('assets/web/#about')}}">About us</a></li>
                                    <li><a href="{{asset('assets/web/#menu')}}">Menu</a></li>
                                    <li><a href="{{asset('assets/web/#our_team')}}">Team</a></li>
                                    <li><a href="{{asset('assets/web/#gallery')}}">Gallery</a></li>
                                    <!-- <li><a href="{{asset('assets/web/#blog')}}">Blog</a></li> -->
                                    <li><a href="{{asset('assets/web/#pricing')}}">pricing</a></li>
                                    <li><a href="{{asset('assets/web/#reservation')}}">Reservaion</a></li>
                                    <li><a href="{{asset('assets/web/#footer')}}">Contact us</a></li>
                                </ul>
                            </div>
                            <!-- end nav-collapse -->
                        </nav>
                        <!-- end navbar -->
                    </div>
                </div>
                
            </div>
            <!-- end container-fluid -->
        </header>
        <!-- end header -->
    </div>
	<!-- end site-header -->
	
    <div id="banner" class="banner full-screen-mode parallax">
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cell">
                            <h1> Lunch & Dinner with us  <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Friends:Family:Officemates" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                            <h2>Let's Eat Together! </h2>
                            <p>Welcome to the Engineer's Thali. You will find happiness and Food here.</p>
                            <div class="book-btn">
                                <a href="{{asset('assets/web/#reservation')}}" class="table-btn hvr-underline-from-center">Book my Table</a>
                            </div>
                            <a href="{{asset('assets/web/#about')}}">
                                <div class="mouse"></div>
                            </a>
                        </div>
                        <!-- end banner-cell -->
                    </div>
                    <!-- end banner-text -->
                </div>
                <!-- end banner-static -->
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end banner -->

    <div id="about" class="about-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title"> About Us </h2>
                        <h3>Welcome to the Engineer's Thali. You will find happiness and Food here.</h3>
                        <p> Good health is through good food..No matter what food you eat here, we provide the highest quality version of that food available.</p>

                        <p> The Engineer's Thali is the one-stop-shop for all customer needs, whatever the time of day or night. Customers can find the best Thali, Biryani & Beverages on the Store & they can order online. The ready-to-eat food counters feature the best quality Food.</p>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="about-images">
                            <img class="about-main" src="{{asset('assets/web/images/about.jpg')}}" alt="About Main Image">
                            <img class="about-inset img-fluid" src="{{asset('assets/web/images/about-inset.jpg')}}" alt="About Inset Image">
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- end container -->
    </div>

    <div class="special-menu pad-top-100 parallax" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title color-white text-center"> Today's Special </h2>
                        <h5 class="title-caption text-center"> Welcome to the Engineer's Thali. You will find happiness and Food here. </h5>
                    </div>
                    <div class="special-box">
                        <div id="owl-demo">
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            Biryani
                                            <div class="line"></div>
                                            <div class="dit-line">Biryani is a mixed rice dish originating among the Muslims of the Indian subcontinent. It is made with Indian spices, rice, either with meat, or eggs or vegetables such as potatoes.</div>
                                           
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="{{asset('assets/web/images/biryanii01.jpg')}}"  style="height:40%;width:100%"  alt="sp-menu" >
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            Veg Thali
                                            <div class="line"></div>
                                             <div class="dit-line">Veg-Thali is used to refer to an Indian-style meal made up of a selection of various dishes which are served on a platter.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="{{asset('assets/web/images/paneerr.jpg')}}" style="height:30%;width:100%"   alt="sp-menu"  >
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                        Non-veg Thali
                                            <div class="line"></div>
                                            <div class="dit-line">Non-vegetarian food is a term commonly used in India for food that has meat, fish or eggs in it. It is more commonly called non-veg food.+</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="{{asset('assets/web/images/fry.jpg')}}" style="height:40%;width:100%"   alt="sp-menu">
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            Ice-Cream
                                            <div class="line"></div>
                                            <div class="dit-line">Ice cream is a sweetened frozen food typically eaten as a snack or dessert. </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="{{asset('assets/web/images/icee.jpg')}}" alt="sp-menu">
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            Thali
                                            <div class="line"></div>
                                            <div class="dit-line">Thali (meaning "plate") or Bhojanam (meaning "full meal") is a round platter used to serve food in South Asia & Southeast Asia. </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="{{asset('assets/web/images/thalii.jpg')}}" style="height:40%;width:100%"  s alt="sp-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end special-box -->
                </div>
                
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end special-menu -->
<!-- 
    <div id="menu" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
						Our Menu 	
					</h2>
                        <p class="title-caption text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                    </div>
                    <div class="tab-menu">
                        <div class="slider slider-nav">
                            <div class="tab-title-menu">
                                <h2>STARTERS</h2>
                                <p> <i class="flaticon-canape"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>MAIN DISHES</h2>
                                <p> <i class="flaticon-dinner"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>DESERTS</h2>
                                <p> <i class="flaticon-desert"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>DRINKS</h2>
                                <p> <i class="flaticon-coffee"></i> </p>
                            </div>
                        </div>
                        <div class="slider slider-single">
                            <div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-01.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>GARLIC BREAD</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$8.5</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-02.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>MIXED SALAD</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$25</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-03.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>BBQ CHICKEN WINGS</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$10</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-04.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>MEAT FEAST PIZZA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$5</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-05.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>CHICKEN TIKKA MASALA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-------------price">$15</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-06.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>SPICY MEATBALLS</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$6.5</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-07.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>CHOCOLATE FUDGECAKE</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$4.5</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-08.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>CHICKEN TIKKA MASALA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$9.5</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-09.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>CHICKEN TIKKA MASALA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$10</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-10.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>MEAT FEAST PIZZA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$12.5</span>
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-09.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3>CHICKEN TIKKA MASALA</h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$9.5</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-08.jpg" alt="" class="img-responsive">
                                        
                                        <div>
                                            
                                            <h3>CHICKEN TIKKA MASALA</h3>
                                            
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis eleifend dapibus.
                                            </p>
                                        </div>
                                        <span class="offer-price">$5.5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
     -->

		<!-- Start Menu -->
        <div class="menu-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-title text-center">
                            <h2>Special Menu</h2>
                            <p>"We Never Compromise on Quality, Hygiene and Taste"</p>
                        </div>
                    </div>
                </div>
                
                <div class="row inner-menu-box">
                    <div class="col-3 col-lg-3 col-md-3 col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" onclick="allMenus()" data-toggle="pill" href="{{asset('assets/web/javascript:void(0)')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                            <a class="nav-link" id="v-pills-profile-tab" onclick="drink()" data-toggle="pill" href="{{asset('assets/web/javascript:void(0)')}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Breakfast</a>
                            <a class="nav-link" id="v-pills-messages-tab" onclick="lunch()" data-toggle="pill" href="{{asset('assets/web/javascript:void(0)')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lunch</a>
                            <a class="nav-link" id="v-pills-settings-tab" onclick="dinner()" data-toggle="pill" href="{{asset('assets/web/javascript:void(0)')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a>
                        </div>
                    </div>
                    
                    <div class="col-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/bf1.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Breakfast 1</h4>
                                                <p>Puri bhaji is a dish, originating from the Indian subcontinent, of puri and aloo bhaji.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/bf4.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Breakfast 2</h4>
                                                <p>Paratha is a flatbread native to the Indian subcontinent.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/gallery6.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Breakfast 3</h4>
                                                <p>Roti is a flatbread made with wholemeal wheat flour. At Roti, we're proud to serve Food That Loves You Back </p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/lunch1.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 1</h4>
                                                <p>A meal eaten in the middle of the day, typically one that is lighter or less formal than an evening meal.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/lunch2.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 2</h4>
                                                <p>A meal eaten in the middle of the day, typically one that is lighter or less formal than an evening meal.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/lunch3.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 3</h4>
                                                <p>A meal eaten in the middle of the day, typically one that is lighter or less formal than an evening meal.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/dinner1.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 1</h4>
                                                <p>The main meal of the day, taken either around midday or in the evening.</p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/dinner2.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 2</h4>
                                                <p>The main meal of the day, taken either around midday or in the evening.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/dinner3.png')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 3</h4>
                                                <p>The main meal of the day, taken either around midday or in the evening.</p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-01.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Drinks 1</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-02.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Drinks 2</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid drinks">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-03.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Drinks 3</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-04.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 1</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-05.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 2</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid lunch">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-06.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Lunch 3</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-07.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 1</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5>60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/images/img-08.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 2</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 special-grid dinner">
                                        <div class="gallery-single fix">
                                            <img src="{{asset('assets/web/imaes/img-09.jpg')}}" class="img-fluid" alt="Image">
                                            <div class="why-text">
                                                <h4>Special Dinner 3</h4>
                                                <p>Sed id magna vitae eros sagittis euismod.</p>
                                                <h5> 60/-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End Menu -->


        <!-- team Start-->
        <div id="our_team" class="team-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
						Our Team 	
					</h2>
                        <p class="title-caption text-center">We Never Compromise on Quality, Hygiene & Taste. </p>
                    </div>
                    <div class="team-box">

                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                <a href="#"><img src="{{asset('assets/web/images/abhinav.jpg')}}" style="height:300px;width:100%" alt=""></a>

                                    <div class="text-col">
                                        <h3>Abhinav Gupta</h3>
                                        <p>Head Chef</p>
                                        <ul class="team-social">
                                            <li><a href="https://www.facebook.com/The-Engineers-Thali-104273732205770"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                    <a href="#"><img src="{{asset('assets/web/images/rajkumar.jpg')}}"  style="height:300px;width:100%"  alt=""></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Raj Kumar</h3>
                                        <p>Chef</p>
                                        <ul class="team-social">
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('assets/web/images/shivani.jpg')}}"  style="height:300px;width:100%"  alt=""></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Shivani Verma</h3>
                                        <p>Chef</p>
                                        <ul class="team-social">
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end team-box -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end team-main -->

        <!-- team End-->





    <div id="gallery" class="gallery-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
						Our Gallery	
					</h2>
                        <p class="title-caption text-center">There are many variations of Thali, Biryani, and Ice cream available.</p>
                    </div>
                    <div class="gal-container clearfix">
                        <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#1">
                                    <img src="{{asset('assets/web/images/gallery1.jpg')}}" alt="" />
                                </a>
                                <div class="modal fade" id="1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery1.jpg')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 1 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#2">
                                    <img src="{{asset('assets/web/images/gallery4.png')}}" alt="" />
                                </a>
                                <div class="modal fade" id="2" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery4.png')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 2 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#3">
                                    <img src="{{asset('assets/web/images/gallery5.png')}}" alt="" />
                                </a>
                                <div class="modal fade" id="3" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery5.png')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 3 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#4">
                                    <img src="{{asset('assets/web/images/gallery_02.jpg')}}" alt="" />
                                </a>
                                <div class="modal fade" id="4" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery_02.jpg')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 4 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#5">
                                    <img src="{{asset('assets/web/images/gallery2.png')}}" alt="" />
                                </a>
                                <div class="modal fade" id="5" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery2.png')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 5 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#9">
                                    <img src="{{asset('assets/web/images/gallery6.png')}}" alt="" />
                                </a>
                                <div class="modal fade" id="9" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery6.png')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 6 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#10">
                                    <img src="{{asset('assets/web/images/gallery3.png')}}" alt="" />
                                </a>
                                <div class="modal fade" id="10" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery3.png')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 7 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#11">
                                    <img src="{{asset('assets/web/images/gallery_08.jpg')}}" alt="" />
                                </a>
                                <div class="modal fade" id="11" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery_08.jpg')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 8 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#12">
                                    <img src="{{asset('assets/web/images/gallery_09.jpg')}}" alt="" />
                                </a>
                                <div class="modal fade" id="12" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery_09.jpg')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 9 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#13">
                                    <img src="{{asset('assets/web/images/gallery_10.jpg')}}" alt="" />
                                </a>
                                <div class="modal fade" id="13" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="{{asset('assets/web/images/gallery_10.jpg')}}" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>This is the 10 one on my Gallery</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end gal-container -->
                </div>
                
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end gallery-main -->

    <!-- <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="block-title text-center">
					Our Blog 	
				</h2>
                    <div class="blog-box clearfix">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{asset('assets/web/images/featured-image-01.jpg')}}" alt="" />
                                        <div class="overlay">
                                            <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span>25 NOVEMBER, 2014</span></p>
                                        <h2>LATEST RECIPES JUST IN!</h2>
                                        <h5>BY John Doggett</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{asset('assets/web/images/featured-image-02.jpg')}}" alt="" />
                                        <div class="overlay">
                                            <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span>2 NOVEMBER, 2014</span></p>
                                        <h2>NEW RECRUITS HAVE ARRIVED!</h2>
                                        <h5>BY Jeffrey Spender</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{asset('assets/web/images/featured-image-03.jpg')}}" alt="" />
                                        <div class="overlay">
                                            <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span>4 NOVEMBER, 2014</span></p>
                                        <h2>BAKING TIPS FROM THE PROS</h2>
                                        <h5>BY Monica Reyes</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{asset('assets/web/images/featured-image-04.jpg')}}" alt="" />
                                        <div class="overlay">
                                            <a href=""><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span>12 NOVEMBER, 2014</span></p>
                                        <h2>ALL YOUR EGGS BELONG TO US</h2>
                                        <h5>BY John Doggett</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="blog-btn-v">
                        <a class="hvr-underline-from-center" href="#">View the Blog</a>
                    </div>

                </div>
                
            </div>
            
        </div>
    </div> -->
    <!-- end blog-main -->

    <div id="pricing" class="pricing-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="block-title text-center">
						Pricing 	
					</h2>
                    <p>Welcome To the Engineer's Thali. The Engineer's Thali is Bhilai's  Most Trusted  Mess Service. Who believe to deliver Quality food to all engineer's and others at reasonable rates with all precaution.</p>
                </div>
                <div class="panel-pricing-in">
                    <!-- item -->
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="panel panel-pricing">
                            <div class="panel-heading">
                                <div class="pric-icon">
                                    <img src="{{asset('assets/web/images/store.png')}}" alt="" />
                                </div>
                                <h3>REGULAR</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>2250/-<span>Per Month</span></strong></p>
                            </div>
                            <ul class="list-group text-center">
                                <li class="list-group-item"><i class="fa fa-check"></i> 4-Roti</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Dal</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Rice</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Seasonal sabzi</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Salad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Papad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Pickle</li>
                                <!-- <li class="list-group-item"><i class="fa fa-check"></i> Spoon</li> -->
                                <li class="list-group-item"><i class=""></i>- </li>
                                <li class="list-group-item"><i class=""></i>- </li>
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block hvr-underline-from-center" href="#">Purchase Now!</a>
                            </div>
                        </div>
                    </div>
                    <!-- /item -->

                    <!-- item -->
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="panel panel-pricing">
                            <div class="panel-heading">
                                <div class="pric-icon">
                                    <img src="{{asset('assets/web/images/food.png')}}" alt="" />
                                </div>
                                <h3>PREMIUM</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>2950/-<span>Per Month</span></strong></p>
                            </div>
                            <ul class="list-group text-center">
                                <li class="list-group-item"><i class="fa fa-check"></i> 4-Roti</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Dal</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Rice</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> 2 Sabzi(1 Seasonal, 1 Special)</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Salad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Papad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Pickle</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Raita</li>
                                <!-- <li class="list-group-item"><i class="fa fa-check"></i> Spoon</li> -->
                                <li class="list-group-item"><i class=""></i> -</li>
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block hvr-underline-from-center" href="#">Purchase Now!</a>
                            </div>
                        </div>
                    </div>
                    <!-- /item -->

                    <!-- item -->
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="panel panel-pricing">
                            <div class="panel-heading">
                                <div class="pric-icon">
                                    <img src="{{asset('assets/web/images/coffee.png')}}" alt="" />
                                </div>
                                <h3>VIP</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>4450/-<span>Per Month</span></strong></p>
                            </div>
                            <ul class="list-group text-center">
                                <li class="list-group-item"><i class="fa fa-check"></i> 4-Roti</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Dal Tadka</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Rice</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> 2 Special Sabzi</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Salad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Papad</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Pickle</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Raita</li>
                                <li class="list-group-item"><i class="fa fa-check"></i> Sweet</li>
                                <!-- <li class="list-group-item"><i class="fa fa-check"></i> Spoon (Special Packing)</li> -->
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block hvr-underline-from-center" href="#">Purchase Now!</a>
                            </div>
                        </div>
                    </div>
                    <!-- /item -->
                </div>
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end pricing-main -->

    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
						Reservations			
					</h2>
                        </div>
                        <h4 class="form-title">BOOKING FORM</h4>
                        <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p>

                        <form method="post" class="reservations-box" name="contactform" action="{{route('add-appointment')}}">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="name" id="form_name" placeholder="Name" required="required" data-error="Firstname is required.">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="email" name="email" id="email" placeholder="E-Mail ID" required="required" data-error="E-mail id is required.">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="contact" id="phone" placeholder="contact no." required="required">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                <input type="text" name="no_of_person" id="no_of_persons" required="required" placeholder="no. of persons">

                                    <!-- <select name="no_of_person" id="no_of_persons" class="selectpicker">
                                        <option selected disabled>No. Of persons</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>3</option>
                                    </select> -->
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="date" id="date-picker" placeholder="Date" required="required" data-error="Date is required." />
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="time" id="time-picker" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <select name="preferred_food" id="preferred_food" class="selectpicker">
                                        <option selected disabled>preferred food</option>
                                        <option value="Thali">Thali</option>
                                        <option value="Biryani">Biryani</option>
                                        <option value="Icecream">Icecream</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <select name="occasion" id="occasion" class="selectpicker">
                                        <option selected disabled>Occasion</option>
                                        <option>Wedding</option>
                                        <option>Birthday</option>
                                        <option>Anniversary</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">BOOK MY TABLE </button>
                                </div>
                            </div>
                            
                        </form>
                        <!-- end form -->
                    </div>
                    
                </div>
                <!-- end reservations-box -->
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->

    <div id="footer" class="footer-main">
        <div class="footer-news pad-top-100 pad-bottom-70 parallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="ft-title color-white text-center"> Newsletter </h2>
                            <p>Welcome to the Engineer's Thali. You will find happiness and Food here. </p>
                        </div>
                        <form>
                            <input type="email" placeholder="Enter your e-mail id">
                            <a href="#" class="orange-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                        </form>
                    </div>
                    
                </div>
                
            </div>
            <!-- end container -->
        </div>
        <!-- end footer-news -->
        <div class="footer-box pad-top-70">
            <div class="container">
                <div class="row">
                    <div class="footer-in-main">
                        <div class="footer-logo">
                            <div class="text-center">
                                <img src="{{asset('assets/web/images/m_logo.png')}}" alt="" style="width: 80px;" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-a">
                                <h3>About Us</h3>
                                <p>The Engineer's Thali is the one-stop-shop for all customer needs, whatever the time of day or night. </p>
                                    <p>Customers can find the best Thali, Biryani & Beverages on the Store & they can order online. The ready-to-eat food counters feature the best quality Food.</p>
                                <ul class="socials-box footer-socials pull-left">
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa  fa-facebook"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-twitter"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-google-plus"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-pinterest"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-linkedin"></i></div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <!-- end footer-box-a -->
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-b">
                                <h3>New Menu</h3>
                                <ul>
                                    <li><a href="#">Thali</a></li>
                                    <li><a href="#">Veg Thali</a></li>
                                    <li><a href="#">Non-veg Thali</a></li>
                                    <li><a href="#">Biryani</a></li>
                                    <li><a href="#">Ice-cream</a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <!-- end footer-box-b -->
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-c">
                                <h3>Contact Us</h3>
                                <p>
                                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                                    <span>Add:- Junwani Road, Smriti Nagar, Bhilai(C.G.)</span>
                                </p>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <span>
									+91 7024748824 
								</span>
                                </p>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span><a href="#">dreamfoodpoint@gmail.com</a></span>
                                </p>
                            </div>
                            <!-- end footer-box-c -->
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-d">
                                <h3>Opening Hours</h3>

                                <ul>
                                    <li>
                                        <p>Monday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Tuesday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Wednessday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Thursday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Friday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Saturday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <p>Sunday </p>
                                        <span> 11:00 AM - 11:00 PM</span>
                                        <!-- <span> 11:00 AM - 11:00 PM</span> -->
                                    </li>
                                    <!-- <li>
                                        <p>Friday - Saturday </p>
                                        <span>  11:00 AM - 5:00 PM</span>
                                    </li> -->
                                </ul>
                            </div>
                            <!-- end footer-box-d -->
                        </div>
                        
                    </div>
                    <!-- end footer-in-main -->
                </div>
                
            </div>
            <!-- end container -->
            <div id="copyright" class="copyright-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6 class="copy-title"> Copyright &copy; 2022 The Engineer's Thali is powered by <a href="https://xamptech.com" target="_blank">Xamptech</a> </h6>
                        </div>
                    </div>
                    
                </div>
                <!-- end container -->
            </div>
            <!-- end copyright-main -->
        </div>
        <!-- end footer-box -->
    </div>
    <!-- end footer-main -->

    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <!-- <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section> -->

    <!-- ALL JS FILES -->
    <script src="{{asset('assets/web/js/all.js')}}"></script>
    <script src="{{asset('assets/web/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('assets/web/js/custom.js')}}"></script>
    <script src="{{asset('assets/web/https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
    <script>
        function drink(){
            $('#v-pills-profile-tab').addClass('active');
            $('#v-pills-messages-tab').removeClass('active');
            $('#v-pills-settings-tab').removeClass('active');
            $('#v-pills-home-tab').removeClass('active');
            $('.lunch').css('display','none');
            $('.dinner').css('display','none');
            $('.drinks').css('display','block');
        }
        function lunch(){
            $('#v-pills-messages-tab').addClass('active');
            $('#v-pills-settings-tab').removeClass('active');
            $('#v-pills-home-tab').removeClass('active');
            $('#v-pills-profile-tab').removeClass('active');
            $('.lunch').css('display','block');
            $('.dinner').css('display','none');
            $('.drinks').css('display','none');
        }
        function dinner(){
            $('#v-pills-settings-tab').addClass('active');
            $('#v-pills-home-tab').removeClass('active');
            $('#v-pills-profile-tab').removeClass('active');
            $('#v-pills-messages-tab').removeClass('active');
            $('.lunch').css('display','none');
            $('.dinner').css('display','block');
            $('.drinks').css('display','none');
        }
        function allMenus(){
            $('#v-pills-home-tab').addClass('active');
            $('#v-pills-profile-tab').removeClass('active');
            $('#v-pills-messages-tab').removeClass('active');
            $('#v-pills-settings-tab').removeClass('active');
            $('.lunch').css('display','block');
            $('.dinner').css('display','block');
            $('.drinks').css('display','block')
        }
		

    </script>

</body>

</html>
<header class="header-area">
    <!-- Header top area start -->
    <div class="header-top-area">

        <div class="container">
  
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="top-bar-left">
                        <!-- welcome -->
                        <div class="welcome">
                            <p>FiberMovil tu mayorista de confianza</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="topbar-nav">
                        <div class="wpb_wrapper">
                            <!-- my account -->
                            <div class="menu-my-account-container">
                                @auth
                                    <a href="/miCuenta">Mi Cuenta <i class="ion-ios-arrow-down"></i></a>
                                @endauth

                                @guest
                                    <a href="/logeo">Logueate  <i class="ion-ios-arrow-down"></i></a>
                                @endguest

                                <ul>
                                    @auth
                                    <li><a href="/miCuenta">Mi Cuenta </a></li>
                                    <li><a href="checkout.html">Revisar</a></li>
                                    @endauth
                                    @guest
                                    <li><a href="/logeo">Loguearse</a></li>
                                    <li><a href="/sigin">Registrarse</a></li>
                                    @endguest
                                </ul>
                            </div>
                            <div class="switcher">
                                <!-- language-menu -->
                                <div class="language">
                                    <a href="#">
                                        <img src="images/icons/SP.png" alt="language-selector">Español
                                        <i class="ion-ios-arrow-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="images/icons/UK.png" alt="english">
                                                <span>Ingles</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- currency-menu -->
                                <div class="currency">
                                    <a href="#">€ EUR<i class="ion-ios-arrow-down"></i></a>
                                    <ul>
                                        <li><a href="#">$ USD</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar area end -->
    <!-- Header middle area start -->
    <div class="header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-md-12">
                    <!-- site-logo -->
                    <div class="site-logo">
                        <a href="/"><img src="images/logo/fiber.png" alt="Nikado"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <!-- header-search -->
                    <div class="header-search clearfix">
                        <div class="category-select pull-right">
                            <select class="nice-select-menu">
                                <option data-display="Todas las Categorias">Todas las Categorias</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria['category_name']}}">{{$categoria['category_name']}}</option>
                                @endforeach
                            </select> 
                        </div> 
                        <div class="header-search-form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Busca tu producto aquí...">
                                <input type="submit" name="submit" value="Buscar">
                            </form>                                    
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <!-- shop-cart-menu -->
                    <div class="shop-cart-menu pull-right">
                        <ul>
                            <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                            <li><a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a></li>
                            <li><a href="#">
                                <span class="cart-icon">
                                    <i class="ion-bag"></i><sup>3</sup>
                                </span>
                                <span class="cart-text">
                                    <span class="cart-text-title">Carrito <br> <strong>145.00€</strong> </span>
                                </span>
                            </a>
                                <ul>
                                    <li>
                                        <!-- single-shop-cart-wrapper -->
                                        <div class="single-shop-cart-wrapper">
                                            <div class="shop-cart-img">
                                                <a href="#"><img src="images/product/1.jpg" alt="Image of Product"></a>
                                            </div>
                                            <div class="shop-cart-info">
                                                <h5><a href="cart.html">Xiaomi</a></h5>
                                                <span class="price">515.00€</span>
                                                <span class="quantaty">Cantidad: 1</span>
                                                <span class="cart-remove"><a href="#"><i class="fa fa-times"></i></a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- single-shop-cart-wrapper -->
                                        <div class="single-shop-cart-wrapper">
                                            <div class="shop-cart-img">
                                                <a href="#"><img src="images/product/2.jpg" alt="Image of Product"></a>
                                            </div>
                                            <div class="shop-cart-info">
                                                <h5><a href="cart.html">Samsung</a></h5>
                                                <span class="price">100.00€</span>
                                                <span class="quantaty">Cantidad: 1</span>
                                                <span class="cart-remove"><a href="#"><i class="fa fa-times"></i></a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- single-shop-cart-wrapper -->
                                        <div class="single-shop-cart-wrapper">
                                            <div class="shop-cart-img">
                                                <a href="#"><img src="images/product/3.jpg" alt="Image of Product"></a>
                                            </div>
                                            <div class="shop-cart-info">
                                                <h5><a href="cart.html">Pellentesque men</a></h5>
                                                <span class="price">£265.00</span>
                                                <span class="quantaty">Qty: 1</span>
                                                <span class="cart-remove"><a href="#"><i class="fa fa-times"></i></a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- shop-cart-total -->
                                        <div class="shop-cart-total">
                                            <p>Subtotal: <span class="pull-right">£880.00</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shop-cart-btn">
                                            <a href="checkout.html">Checkout</a>
                                            <a href="cart.html" class="pull-right">View Cart</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header middle area end -->
    <!-- Header bottom area start -->
    <div class="header-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 hidden-md hidden-sm pull-left category-wrapper">
                    <div class="categori-menu">
                    <span class="categorie-title">Categorias</span>
                    <nav>
                        <ul class="categori-menu-list menu-hidden"> 
                            <li v-for="categoria in categorias">
                                <a href="shop.html"><span :key="categoria.id"><img src="images/icons/1.png" alt="menu-icon"></span><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <!-- categori Mega-Menu Start -->
                                <ul class="ht-dropdown megamenu first-megamenu">
                                    <!-- Single Column Start -->
                                    <li class="single-megamenu" style="width:100%" >
                                        
                                    </li>
                                
                                    <!-- Single Column End -->
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                </div>
                <div class="col-lg-9">
                    <!-- main-menu -->
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="current"><a href="/">Bievenido</i></a></li>
                                <li><a href="/Tienda">Tienda</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                                <li><a href="#">Features <i class="fa fa-angle-down"></i></a>
                                    <ul class="megamenu-3-column">
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="contact-us.html">Contact Us</a></li>
                                                <li><a href="service.html">Services</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="faq.html">Frequently Questins</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog-no-sidebar.html">None Sidebar</a></li>
                                                <li><a href="blog.html">Sidebar right</a></li>
                                                <li><a href="single-blog.html">Image Format</a></li>
                                                <li><a href="single-blog-gallery.html">Gallery Format</a></li>
                                                <li><a href="single-blog-audio.html">Audio Format</a></li>
                                                <li><a href="single-blog-video.html">Video Format</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Shop</a>
                                            <ul>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="shop-list.html">Shop List View</a></li>
                                                <li><a href="shop-right.html">Shop Right</a></li>
                                                <li><a href="single-product.html">Shop Single</a></li>
                                                <li><a href="cart.html">Shoping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">Home Shop 1</a></li>
                                            <li><a href="index-2.html">Home Shop 2</a></li>
                                            <li><a href="index-3.html">Home Shop 3</a></li>
                                            <li><a href="index-4.html">Home Shop 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li><a href="#">Features</a>
                                        <ul>
                                            <li><a href="#">Pages</a>
                                                <ul>
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="service.html">Services</a></li>
                                                    <li><a href="service-2.html">Services Two</a></li>
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="faq.html">Frequently Questins</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Blog</a>
                                                <ul>
                                                    <li><a href="blog-no-sidebar.html">None Sidebar</a></li>
                                                    <li><a href="blog.html">Sidebar right</a></li>
                                                    <li><a href="single-blog.html">Image Format</a></li>
                                                    <li><a href="single-blog-gallery.html">Gallery Format</a></li>
                                                    <li><a href="single-blog-audio.html">Audio Format</a></li>
                                                    <li><a href="single-blog-video.html">Video Format</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-list.html">Shop List View</a></li>
                                                    <li><a href="shop-right.html">Shop Right</a></li>
                                                    <li><a href="single-product.html">Shop Single</a></li>
                                                    <li><a href="cart.html">Shoping Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header bottom area end -->
    <!-- Header bottom area end -->
</header>
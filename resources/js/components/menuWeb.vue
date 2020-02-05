<template>
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
                                            <a href="shop.html"><span :key="categoria.id"><img src="images/icons/1.png" alt="menu-icon"></span>{{categoria.category_name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <!-- categori Mega-Menu Start -->
                                            <ul class="ht-dropdown megamenu first-megamenu">
                                                <!-- Single Column Start -->
                                                <li class="single-megamenu" style="width:100%" >
                                                    <ul v-for="subCategorias in sub" v-if="subCategorias.id_category === categoria.id">
                                                        <li>{{subCategorias.name}}</li>
                                                    </ul>
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
    
</template>

<style lang="css" scoped>
    @import "../../../public/css/main.css";

</style>    
<script>

    //Parte Javascript
    import Axios from  'axios-observable';
    //Librerias a Importar
    //Rxjs
    import Observable from 'axios-observable';
    //Exportación

    const myObservable = Observable.create((observer) => {
        observer.next(Math.random()); // generamos un número aleatorio
    });
    export default {
        name: 'menuweb',

        //Al Montar el Componente
        mounted(){
            
            //Url Actual
            var URLactual = window.location.pathname;

            //Si es diferente al Path, aparecera por defecto Cerrado
            if(URLactual != '/'){
                console.log('Tienda');
                $('.categori-menu-list').slideToggle();
            }
            //Abrir y Cerrar Modal
            $('.categorie-title').on('click', function () {
                $('.categori-menu-list').slideToggle();
            });

        },

        //Datos
        data() {
            return {
                categorias: [],
                sub: [],
            }
        },

        //Al crearse el componente
        created: function() {
            //Inicio el Componente con get Categorias
            this.getCategorias();
            this.getSub();
        },
        //Metodos
        methods: {
            getCategorias: function(){
                var urlCategorias = '/api/getCategorias';
                
                Axios.get(urlCategorias)
                .subscribe(
                    response => this.categorias = response.data,
                    error => console.log(error)
                );
            },
            getSub: function(){
                var urlSub = '/api/getSub';
                Axios.get(urlSub).subscribe(
                    response => this.sub = response.data,
                    error => console.log(error)
                );
            }
        },

        //Metodo para comprobar cuando un valor fue cambiado 
        watch:{
            categorias:function(newValue,oldValue){
                console.log(newValue);
            }
        }

    }
</script>

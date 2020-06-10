@extends('layouts.layout')

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/novedades/newsletter-novedades.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Novedades</h1>
            <p class="mb-5"><strong class="text-white">de la Industra Mobiliaria.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!-- Blog Section Begin -->
 <section class="blog-section spad" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-2 order-lg-1">
                    <div class="side-bar">
                        <div class="sidebar-box">
                            <div class="categories">
                                <h3><br>Categorias</h3>
                                <li><a href="#">Noticias <span>(12)</span></a></li>
                                <li><a href="#">Eventos <span>(22)</span></a></li>
                                <li><a href="#">Moda <span>(37)</span></a></li>
                                <li><a href="#">Mobiliarios <span>(42)</span></a></li>
                               
                            </div>
                        </div>
                        
                        <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                                <a href="#">Tableros</a>
                                <a href="#">Fabricacion</a>
                                <a href="#">Maquilado</a>
                                <a href="#">Corte</a>
                                <a href="#">Routeado</a>
                                <a href="#">Pantografiado</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    <div class="blog-post">

                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="images/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="blog-text">
                                <h4>En marzo 2020 comienza feria del mueble CCCT.</h4>
                                <div class="blog-widget">
                                <div class="mx-2">
                                        <img src="images/clock.png" alt="">
                                        <span>February 17, 2018</span><span class="mx-2">&bullet;
                                        </span><i class="lnr lnr-user"></i> Bryan Becerra
                                    </div>
                                                                       
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                    ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                    orci. ...</p>
                                <p><a href="{{ url('/post') }}#post1" class="btn btn-primary btn-sm">Leer Mas</a></p>
                                <!--<a href="#">Continue Reading <i class="lnr lnr-arrow-right"></i></a>-->
                               

                            </div>
                        </div>
                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="images/blog/blog-2.jpg" alt="">
                            </div>
                            <div class="blog-text">
                                <h4>Llegaron los ultimos modelos de mobiliareio para el hogar.</h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                    <img src="images/clock.png" alt="">
                                        <span>February 17, 2018</span><span class="mx-2">&bullet;
                                        </span><i class="lnr lnr-user"></i> Bryan Becerra
                                    </div>
                                   
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                    ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                    orci. ...</p>
                                    <a href="">Continuar Leyendo</a>
                            </div>
                        </div>
                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="images/blog/blog-3.jpg" alt="">
                            </div>
                            <div class="blog-text">
                                <h4>Vive la expericna de los modulares para oficnas</h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                    <img src="images/clock.png" alt="">
                                        <span>February 17, 2018</span><span class="mx-2">&bullet;
                                        </span><i class="lnr lnr-user"></i> Bryan Becerra
                                    </div>
                                    
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                    ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                    orci. ...</p>
                                    <a href="">Continuar Leyendo</a>
                            </div>
                        </div>
                        <!--
                        <div class="blog-pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
 

    
@endsection    
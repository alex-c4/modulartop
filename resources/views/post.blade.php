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


 <!-- Blog particular -->
 <section class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-8 blog-content">
          <div class="vcard bio">
                    <img src="images/blog/blog-1.jpg" alt="Image placeholder">
                  </div>
            <p class="lead"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae expedita cumque necessitatibus ducimus debitis totam, quasi praesentium eveniet tempore possimus illo esse, facilis? Corrupti possimus quae ipsa pariatur cumque, accusantium tenetur voluptatibus incidunt reprehenderit, quidem repellat sapiente, id, earum obcaecati.</p>

            <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit quaerat aperiam minima eveniet quis placeat.</p></blockquote>

            <p>Eveniet deleniti accusantium nulla natus nobis nam asperiores ipsa minima laudantium vero cumque cupiditate ipsum ratione dicta, expedita quae, officiis provident harum nisi! Esse eligendi ab molestias, quod nostrum hic saepe repudiandae non. Suscipit reiciendis tempora ut, saepe temporibus nemo.</p>
            <p>Accusamus, temporibus, ullam. Voluptate consectetur laborum totam sunt culpa repellat, dolore voluptas. Quaerat cum ducimus aut distinctio sit, facilis corporis ab vel alias, voluptas aliquam, expedita molestias quisquam sequi eligendi nobis ea error omnis consequatur iste deleniti illum, dolorum odit.</p>
            <p>In adipisci corporis at delectus! Cupiditate, voluptas, in architecto odit id error reprehenderit quam quibusdam excepturi distinctio dicta laborum deserunt qui labore dignissimos necessitatibus reiciendis tenetur corporis quas explicabo exercitationem suscipit. Nisi quo nulla, nihil harum obcaecati vel atque quos.</p>
            <p>Amet sint explicabo maxime accusantium qui dicta enim quia, nostrum id libero voluptates quae suscipit dolor quam tenetur dolores inventore illo laborum, corporis non ex, debitis quidem obcaecati! Praesentium maiores illo atque error! Earum, et, fugit. Sint, delectus molestiae. Totam.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa iste, repudiandae facere aperiam sapiente, officia delectus soluta molestiae nihil corporis animi quos ratione qui labore? Sint eaque perspiciatis minus illum.</p>
            <p>Consectetur porro odio quod iure quaerat cupiditate similique, dolor reprehenderit molestias provident, esse dolorum omnis architecto magni amet corrupti neque ratione sunt beatae perspiciatis? Iste pariatur omnis sed ut itaque.</p>
            <p>Id similique, rem ipsam accusantium iusto dolores sit velit ex quas ea atque, molestiae. Sint, sed. Quisquam, suscipit! Quisquam quibusdam maiores fugiat eligendi eius consequuntur, molestiae saepe commodi expedita nemo!</p>
            <div class="pt-5">
              <p>Categories:  <a href="#">Design</a>, <a href="#">Events</a>  Tags: <a href="#">#html</a>, <a href="#">#trends</a></p>
            </div>
    
                         

          </div>
          <div class="col-md-4 sidebar">
           
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Creatives <span>(12)</span></a></li>
                <li><a href="#">News <span>(22)</span></a></li>
                <li><a href="#">Design <span>(37)</span></a></li>
                <li><a href="#">HTML <span>(42)</span></a></li>
                <li><a href="#">Web Development <span>(14)</span></a></li>
              </div>
            </div>
            <div class="sidebar-box">
              <!--
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              <h3>Bryan Becerra</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              -->
              <div class="recent-post" id="post1">
                        <h3 class="text-black">POST RECIENTES</h3>
                            <div class="single-recent-post">
                                <div class="recent-pic">
                                    <img src="images/blog/blog-1.jpg" alt="">
                                </div>
                                <div class="recent-text">

                                <h5 class="font-size-regular"><a href="{{ url('/post') }}"><br>En marzo 2020 comienza feria del mueble CCCT</a></h5>
                                  <div class="meta mb-4">Bryan 
                                    <span class="mx-2">&bullet;</span> Jan 18, 2020
                                    <span class="mx-2">&bullet;</span> 
                                    <a href="{{ url('/post') }}">Leer</a>
                                  </div>
                                   
                                                                 
                                </div>
                            </div>
                            <div class="single-recent-post">
                                <div class="recent-pic">
                                    <img src="images/blog/blog-2.jpg" alt="">
                                </div>
                                <div class="recent-text">
                                <h5 class="font-size-regular"><a href="{{ url('/post') }}"><br>Llegaron los ultimos modelos de mobiliareio para el hogar.</a></h5>
                                  <div class="meta mb-4">Bryan 
                                    <span class="mx-2">&bullet;</span> Jan 18, 2020
                                    <span class="mx-2">&bullet;</span> 
                                    <a href="{{ url('/post') }}">Leer</a>
                                  </div>


                                </div>
                            </div>
                            <div class="single-recent-post">
                                <div class="recent-pic">
                                    <img src="images/blog/blog-3.jpg" alt="">
                                </div>
                                <div class="recent-text">
                                   <h5 class="font-size-regular"><a href="{{ url('/post') }}"><br>Vive la expericna de los modulares para oficnas</a></h5>
                                  <div class="meta mb-4">Bryan 
                                    <span class="mx-2">&bullet;</span> Jan 18, 2020
                                    <span class="mx-2">&bullet;</span> 
                                    <a href="{{ url('/post') }}">Leer</a>
                                  </div>

                                </div>
                            </div>
                        </div>
            </div>

            
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->
 

    
@endsection    
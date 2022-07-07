<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>TimeTable</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('HomePage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('HomePage/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('HomePage/assets/css/templatemo-edu-meeting.css')}}">
    <link rel="stylesheet" href="{{asset('HomePage/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('HomePage/assets/css/lightbox.css')}}">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="/" class="logo">
                          Time Table
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          @auth
                          <li class="has-sub">
                            <a href="javascript:void(0)">My Account</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('login')}}">My Dashboard</a></li>
                                <li><a href="#">Bonjour {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">Se Deconnecter</a>
                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form></li>
                            </ul>
                        </li>
                          @else
                          <li ><a class="scroll-to-section" href="{{route('login')}}">Se Connecter</a></li>
                          @endauth


                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">

      <img src="{{asset('HomePage/assets/images/image.jpg')}}" alt="">
      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Emploie de temps</h6>

              <h2>UY1 FACULTE DES SCIENCES</h2>
              <p>Etudiants et enseignants consultez vos emplois de temps officiels en tout temps. Pour vous, membres du service charge de la creation des emplois de temps, produisez les emplois de temps facilement et rapidement. Connectez vous pour en savoir plus.</p>
              <div class="main-button-red">
              <a href="{{route('connectStudent')}}">Rechercher un emploie de temps</a>
              <h6>Qui suis-je?</h6>
                  <div class=""><a href="{{route('connectTeacher')}}">Enseignant</a>
                  <a href="{{route('connectStudent')}}">Etudiant</a>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
         
          @foreach($class as $cls)
          <div class="meeting-item">
                <div class="thumb">

                  <a href="{{route('displayTTStud',['spec'=>1,'filiere'=>$cls->id_filiere, 'niveau'=>$cls->id_niveau] )}}"><img src="{{asset('HomePage/assets/images/Capture.PNG')}}" style="filter:blur(2px); "></a>
                </div>
                <div class="down-content">

                  <a href="{{route('displayTTStud',['spec'=>1,'filiere'=>$cls->id_filiere, 'niveau'=>$cls->id_niveau] )}}"><h4>Emploi de temps {{$cls->nom_filiere}} {{$cls->nom_niveau}}</h4></a>

                </div>
              </div>
            @endforeach


          </div>
          <div class="main-button-red">
              <a href="{{route('voirToutUser')}}">voir tout</a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">

  </section>

  <section class="apply-now" id="apply">

  </section>

  <section class="our-courses" id="courses">

  </section>

  <section class="our-facts">

  </section>

  <section class="contact-us" id="contact">

  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{asset('HomePage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('HomePage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('HomePage/assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/lightbox.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/tabs.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/video.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/slick-slider.js')}}"></script>
    <script src="{{asset('HomePage/assets/js/custom.js')}}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=utf-8" 
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Site keywords here" />
    <meta name="description" content="#" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    

    <!-- Site Title -->
    <title>Zomur - Modern Bootstrap Dashboard Template</title>
    <link rel="icon" href="{{asset('assets')}}/cdn/shop/files/Black White Minimalist SImple Monogram Typography Logo (1)_preview_rev_1.png" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/font-awesome-all.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/charts.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/datatables.min.css" />
    `<link rel="stylesheet" href="{{asset('assets')}}/css/fancy-box.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/nice-select.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/pikaday.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/reset.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/style.css" />
  </head>
  <body id="crancy-dark-light">
    <div class="body-bg">
      <section class="crancy-wc crancy-wc__full crancy-bg-cover">
        @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
       
            <div class="crancy-wc__form-inner">
              <div class="crancy-wc__logo">
                <a href="index.html"><img src="{{asset('assets')}}/cdn/shop/files/Black White Minimalist SImple Monogram Typography Logo (1)_preview_rev_1.png" alt="#" /></a>
              </div>
              <div class="crancy-wc__form-inside">
                <div class="crancy-wc__form-middle">
                  <div class="crancy-wc__form-top">
                    <div class="crancy-wc__heading pd-btm-20">
                      <h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0" style="text-align: center">
                        ĐĂNG NHẬP TÀI KHOẢN CỦA BẠN
                      </h3>
                    </div>
                    <!-- Sign in Form -->
                    <form class="crancy-wc__form-main" id="postForm" action="{{ route('alogin') }}" method="post">
                      @csrf <!-- Thêm CSRF Token -->
                      <!-- Form Group -->
                      <div class="form-group">
                          <div class="form-group__input">
                              <input
                                  class="crancy-wc__form-input"
                                  type="email"
                                  id="email"
                                  name="email"
                                  placeholder="Email"
                                  required="required"
                              />
                          </div>
                      </div>
                      <!-- Form Group -->
                      <div class="form-group">
                          <div class="form-group__input">
                              <input
                                  class="crancy-wc__form-input"
                                  placeholder="Password"
                                  id="password-field"
                                  type="password"
                                  name="mat_khau"
                                  minlength="8"
                                  maxlength="20"
                                  required="required"
                              />
                              <span class="crancy-wc__toggle"><i class="fas fa-eye" id="toggle-icon"></i></span>
                          </div>
                      </div>
                    
                      <div class="form-group mg-top-30">
                          <div class="crancy-wc__button">
                              <button class="ntfmax-wc__btn" type="submit">
                                  Đăng nhập với email
                              </button>
                          </div>
                         
                      </div>
                      <div class="form-group mg-top-30">
                        <a href="{{route('index.signup')}}">Đăng ký tài khoản</a>
                      </div>
                      
                  </form>
                    <!-- End Sign in Form -->
                  </div>
                 
                </div>
              </div>
            </div>
      </section>
    </div>
    <!--  Scripts -->
    <script src="{{asset('assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery-migrate.js"></script>
    <script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/charts.js"></script>
    <script src="{{asset('assets')}}/js/final-countdown.min.js"></script>
    <script src="{{asset('assets')}}/js/fancy-box.min.js"></script>
    <!-- <script src="/js/datatables.min.js"></script> -->
    <script src="{{asset('assets')}}/js/circle-progress.min.js"></script>
    <script src="{{asset('assets')}}/js/nice-select.min.js"></script>
    <script src="{{asset('assets')}}/js/pikaday.min.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>

    <script>
      var crancyWCSlider = jQuery(".crancy-wc__slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        fade: true,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
      });
    </script>
   
  </body>
</html>

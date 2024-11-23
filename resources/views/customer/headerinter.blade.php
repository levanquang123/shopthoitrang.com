<header class="header header-transparent header-fullwidth header-style-1" id="section-header" style="height: 130px;">
    <div class="header-inner fixed-header fixed-header-2">
      <div class="container-fluid">
       
    <div class="row align-items-center">
      <div class="col-xl-5 col-lg-6">
        <!-- Main Navigation Start Here -->
       <nav class="main-navigation">
    <ul class="mainmenu">
      <li class="mainmenu__item menu-item-has-children megamenu-holder">
        <img src="{{asset('assets/cdn/shop/files/Black White Minimalist SImple Monogram Typography Logo (1)_preview_rev_1.png')}}" 
        style="width: 90px; height: 60px; padding-bottom: 10px">
    </li>
      <li class="mainmenu__item menu-item-has-children megamenu-holder">
        <a href="{{ route('maininterface', ['showPhu' => 'true'])}}" class="mainmenu__link" id="mainmenuLink">
            <span class="mm-text" style="font-size: 20px">Trang Chủ</span>
        </a>
    </li>
    <li class="mainmenu__item menu-item-has-children megamenu-holder">
        <a href="{{ route('maininterface', ['luot_xem' => 'luot_xem']) }}" class="mainmenu__link">
            <span class="mm-text" style="font-size: 20px">Sản Phẩm</span>
        </a>
        <ul class="megamenu">
            @foreach ($rootCategories as $category)
            <li class="mega-menu-tree">
                <a class="megamenu-title" href="{{ route('maininterface', $category->ma_loai) }}" style="font-size: 20px">
                    <span class="mm-text">{{ $category->ten_loai }}</span>
                </a>
                @if ($category->children->isNotEmpty())
                <ul>
                    @foreach ($category->children as $child)
                    <li>
                        <a href="{{ route('maininterface', $child->ma_loai) }}">
                            <span style="font-size: 20px" class="mm-text">{{ $child->ten_loai }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </li>
    </ul>
  </nav>
        <!-- Main Navigation End Here -->
      </div>
      <div class="col-xl-2 col-lg-4 col-md-9 col-8"></div>
      <div class="col-xl-5 col-lg-4 col-md-9 col-8" >
        <ul class="header-toolbar text-right" >
          <li class="header-toolbar__item user-info-menu-btn" style="font-size: 20px">
            <a href="#">
              <i class="fa fa-user-circle-o fa-lg"></i>
            </a>
            @if (Auth::guard('customers')->check())
    <!-- Nếu đã đăng nhập -->
                <ul class="user-info-menu" id="dadangnhap">
                    @if(session()->has('ten_khach_hang'))
                        <li><a href="#">{{ session('ten_khach_hang') }}</a></li>
                    @endif
                    <li>
                      <a href="{{ route('show.signup', ['ma_khach_hang' => Auth::guard('customers')->user()->ma_khach_hang]) }}">Tài khoản của bạn</a>
                    </li>
                    <li><a href="{{route('cart.index')}}">Giỏ hàng</a></li>
                    {{-- <li><a href="#">Danh sách mua hàng</a></li> --}}
                    <li>
                        <a href="{{ route('logoutcus') }}">
                            Đăng xuất
                        </a>
                        
                    </li>
                </ul>
            @else
                <!-- Nếu chưa đăng nhập -->
                <ul class="user-info-menu" id="chuadangnhap">
                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('index.signup') }}">Đăng ký</a></li>
                </ul>
            @endif

          </li>
          <li class="header-toolbar__item">
            <a href="{{route('cart.index')}}" class="mini-cart-btn" style="width: 50px;">
                <i class="dl-icon-cart4 fa-lg"></i>
                <sup class="mini-cart-count bigcounter" style="background: red; color: white">
                  @auth('customers')
                      {{ $carts->sum('so_luong') }} <!-- Tổng số lượng sản phẩm trong giỏ hàng -->
                  @else
                      0 <!-- Hiển thị 0 nếu không có người dùng đăng nhập -->
                  @endauth
                </sup>
            </a>
          </li>
          
          <li>
            <form class="crancy-header__form-inner" action="{{ route('search') }}" method="GET">
                @csrf
                <i class="dl-icon-search1 fa-lg" style="color: black"></i>
                <input name="search" value="" style="width: 300px; height: 40px; font-size: 16px;" type="text" id="search-input" placeholder="Nhập sản phẩm bạn muốn tìm..."/>
            </form>
          </li>
          <li class="header-toolbar__item d-lg-none">
            <a href="#" class="menu-btn"></a>                 
          </li>
        </ul>
      </div>
    </div>
  </div>
<style>
    
    #section-header .main-navigation .mainmenu__link {
      color: #282828;
  }
    
      #section-header .main-navigation .mainmenu__link:hover {
      color: #cf987e;
  }
    
    #section-header .sticky-header .main-navigation .mainmenu__item > a {
      color: #282828;
  } 
      #section-header .sticky-header .main-navigation .mainmenu__item > a:hover {
      color: #cf987e;
  } 
  
     #section-header.header:not(.header-transparent) .main-navigation .mainmenu__link{
      color: #282828;
  }
       #section-header.header:not(.header-transparent) .main-navigation .mainmenu__link:hover{
      color: #cf987e;
  }
  
    #section-header .main-navigation .mainmenu .sub-menu li a {
      color: #8a8a8a;
  }
    
    #section-header .main-navigation .mainmenu .sub-menu li a:hover {
      color: #cf987e;
  }
      
    #section-header .main-navigation .mainmenu__item.menu-item-has-children > ul.megamenu > li a.megamenu-title {
      color: #282828;
  }
      #section-header .main-navigation .mainmenu__item.menu-item-has-children > ul.megamenu > li a.megamenu-title:hover {
      color: #cf987e;
  }
    
    #section-header .main-navigation .mainmenu__item.menu-item-has-children > ul.megamenu > li a {
      color: #8a8a8a;
  }
    #section-header .main-navigation .mainmenu__item.menu-item-has-children > ul.megamenu > li a:hover {
      color: #cf987e;
  }
    #section-header  .header-toolbar__item > a {
      color:  #282828;
  }
      #section-header .header-toolbar__item > a:hover {
    color: #cf987e;
    }
    
    #section-header .sticky-header .header-toolbar__item > a {
      color: #282828;
  }
      #section-header .sticky-header .header-toolbar__item > a:hover {
      color: #cf987e;
  }
    #section-header.header:not(.header-transparent) .header-toolbar__item > a{
      color: #282828;
  }
      #section-header.header:not(.header-transparent) .header-toolbar__item > a:hover{
      color: #cf987e;
  }
     #section-header .user-info-menu li a{
      color: #8a8a8a;
  }
       #section-header .user-info-menu li a:hover{
      color: #cf987e;
  }
    
</style>
<script>
  // Kiểm tra trạng thái đăng nhập và hiển thị phù hợp
  @if (Auth::guard('customers')->check())
      document.getElementById('chuadangnhap').style.display = 'none';
      document.getElementById('dadangnhap').style.display = 'block';
  @else
      document.getElementById('chuadangnhap').style.display = 'block';
      document.getElementById('dadangnhap').style.display = 'none';
  @endif
</script>
</div>
</header>
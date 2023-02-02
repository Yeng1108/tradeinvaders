<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trade-Invaders</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
      <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    <div class="pogi1">
        <nav  class="navbar navbar-expand-md navbar-light shadow-sm" >
            <div class="container">
                
                {{-- <a class="navbar-brand d-flex" href="{{ url('/profile/{ $user-id }') }}"> --}}
                {{-- <a class="navbar-brand d-flex" href="{{ (auth()->user()) ? auth()->user()->id : '/' }}"> --}}
                    
                    {{-- <div class=""><img src="/img/logo.gif" alt="" style="height: 25px; border-right: 1px solid #333;" class="pr-3"></div> --}}
                    <div class="pl-2"> </div>
                {{-- </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div></div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto flex-nowrap">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-right" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">Trade-Invaders</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
              <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Dashboard</span>
            </a>
             <span class="tooltip">Dashboard</span>
          </li>
          <li>
           <a href="#">
             <i class='bx bx-user' ></i>
             <span class="links_name">User</span>
           </a>
           <span class="tooltip">User</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-chat' ></i>
             <span class="links_name">Messages</span>
           </a>
           <span class="tooltip">Messages</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-pie-chart-alt-2' ></i>
             <span class="links_name">Analytics</span>
           </a>
           <span class="tooltip">Analytics</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-folder' ></i>
             <span class="links_name">File Manager</span>
           </a>
           <span class="tooltip">Files</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-cart-alt' ></i>
             <span class="links_name">Order</span>
           </a>
           <span class="tooltip">Order</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-heart' ></i>
             <span class="links_name">Saved</span>
           </a>
           <span class="tooltip">Saved</span>
         </li>
         <li>
           <a href="#">
             <i class='bx bx-cog' ></i>
             <span class="links_name">Setting</span>
           </a>
           <span class="tooltip">Setting</span>
         </li>
         <li class="profile">
             <div class="profile-details">
               <!--<img src="profile.jpg" alt="profileImg">-->
               <div class="building">
                 <div class="name">Toyota North Edsa</div>
                 <div class="job">& Service Center</div>
                 <i class='bx bxs-buildings bx-tada bx-flip-horizontal' ></i>
               </div>
             </div>
             <i class='bx bxs-buildings' id="log_out" ></i>
             <font-awesome-icon icon="fa-solid fa-building" />
             
             
         </li>
        </ul>
      </div>

      
      <section class="home-section">
          {{-- <div class="text">Dashboard</div> --}}
          @yield('content')
         
      </section>
      <script>
      let sidebar = document.querySelector(".sidebar");
      let closeBtn = document.querySelector("#btn");
      let searchBtn = document.querySelector(".bx-search");
    
      closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
      });
    
      searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
      });
    
      // following are the code to change sidebar button(optional)
      function menuBtnChange() {
       if(sidebar.classList.contains("open")){
         closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
       }else {
         closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
       }
      }
      </script>
</body>
</html>

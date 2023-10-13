<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">FeedBack Project<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('all_feedbacks')}}">FeedBacks</a></li>
          <li><a class="nav-link scrollto" href="{{url('feedback_form')}}">Feedback Form</a></li>

          @if(Route::has('login'))

            @auth
            <li><a class="nav-link scrollto" href="{{url('my_feedbacks')}}">My Feedbacks</a></li>    
            <li class="scroll-to-section"><x-app-layout> </x-app-layout></li>                                    
                
                @else
                        <li><a class="nav-link scrollto " href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
            @endauth
            @endif

                  </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
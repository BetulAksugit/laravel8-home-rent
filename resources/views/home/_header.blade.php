<header>
    <!-- Navbar
  ================================================== -->
    <div class="navbar navbar-static-top">

        <div class="container">
            <!-- logo -->
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('assets')}}/img/logo.png" alt="" /></a>
            </div>
            <!-- end logo -->
            <br><br>
            <!-- top menu -->
            @php
                $parentCategories=\App\Http\Controllers\HomeController::categoryList();
            @endphp
            <div class="navigation">
                <nav>
                    <ul class="nav topnav">
                        <li><div></div></li>


                        <li class="active">
                            <a href="{{route('home')}}"><i class="icon-home"></i> Ana Sayfa </a>
                        </li>



                        @foreach($parentCategories as $rs)
                            <li class="dropdown">
                                <a href="{{route('categoryhouses',['id'=>$rs->id,'slug'=>$rs->title])}}"> {{$rs->title}}</a>
                            </li>
                        @endforeach
                        <li class="dropdown">
                            @auth
                                <a href="#"><i class="icon-user"></i>{{Auth::user()->name}}<i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('userprofile')}}">Profilim{{Auth::user()->roles->pluck('name')}}</a></li>
                                    <li><a href="{{route('user_houses')}}">İlanlarım</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            @endauth

                            @guest
                                <a href="#"><i class="icon-user"></i>Giriş<i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/login"><i class="icon-user"></i>Giriş</a></li>
                                    <li><a href="/register"><i class="icon-lock"></i>Kayıt Ol</a></li>


                                </ul>

                            @endguest



                        </li>
                    </ul>
                </nav>
            </div>
            <!-- end menu -->

        </div>
    </div>

</header>


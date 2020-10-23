<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('img/logo.png')}}" alt="BackLinkApp">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                   <a class="nav-link" href="/">Home</a>
               </li>

               <li class="nav-item">
                <a class="nav-link text-orange hover-blue" href="{{route('domain.create')}}">Submit Your <strong>Domain</strong></a>
            </li>
            </ul>
        </div>
    </div>
</nav>
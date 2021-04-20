<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
    style="background-image: url(../argon/img/theme/mprofile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-12 col-lg-12">
                            <h6 class="h2 text-white d-inline-block mb-0">{{ $title }}</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users') }}">{{ $title }}</a>
                                    </li>
                                    @if (isset($description) && $description)
                                        <li class="breadcrumb-item active" aria-current="page">{{ $description }}</li>
                                    @endif

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

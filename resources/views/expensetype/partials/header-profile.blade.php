<div class="header pb-7 pt-4 pt-lg-4 d-flex align-items-center"
    style="background-color:#1e1a55; color: #1e1a55">
    <!-- Mask -->
    <span></span>
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

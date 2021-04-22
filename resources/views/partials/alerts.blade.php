@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>{{ session()->get('success') }}</strong></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

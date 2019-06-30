<div class="alert alert-{{ session('flash.class') }} alert-dismissible fade show mb-5" role="alert">
    {{ session('flash.message') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
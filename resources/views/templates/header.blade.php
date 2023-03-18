<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @if (isset($title))
                <div class="col-6">
                    <h1>{{ $title }}</h1>
                </div>
            @endif
            @if (isset($breadcrumb))
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach ($breadcrumb as $nombre => $crumb)
                            @if ($crumb != '')
                                <li class="breadcrumb-item"><a href="{{ $crumb }}">{{ $nombre }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ $nombre }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    </div>
</section>

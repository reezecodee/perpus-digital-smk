<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if ($routepdf)
                    <form class="d-inline" action="{{ $routepdf }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                    </form>
                @endif
                @if ($routeexcel)
                    <form class="d-inline" action="{{ $routeexcel }}" method="post">
                        @csrf
                        <button class="btn btn-success" type="submit"><i class="fas fa-file-excel"></i></button>
                    </form>
                @endif
            </div>
            @if ($addbtn ?? false)
                <div>
                    <a href="{{ $addroute }}">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> {{ $title }}
                        </button>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

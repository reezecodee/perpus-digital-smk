@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            @foreach (session('error') as $error)
                <li>
                    <strong>Baris:</strong> {{ implode(', ', $error['row']) }} <br>
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($error['errors'] as $msg)
                            <li>{{ $msg }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    @php
        session()->forget('error');
    @endphp
@endif

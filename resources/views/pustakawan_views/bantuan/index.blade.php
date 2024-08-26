@extends('pustakawan_views.layouts.main')
@section('master_data_content')
    <x-pustakawan.card.basic-nav :routepdf="route('print_pdf_helps')" :routeexcel="route('export_helps')" />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($helps as $item)
                        <tr>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>
                                <x-pustakawan.button.detail :route="route('detail_help', $item->id)" />
                                <x-pustakawan.button.print :route="route('print_help_report', $item->id)" />
                                <x-pustakawan.button.delete :id="$item->id" :route="route('delete_help', $item->id)"></x-pustakawan.button.delete>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

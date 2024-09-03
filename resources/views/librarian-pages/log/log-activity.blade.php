<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.card.basic-nav :routepdf="route('print_pdf_logs')" :routeexcel="route('export_logs')" />
    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Pengguna</th>
                        <th>Peran</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $item)
                        <tr>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->user->getRoleNames()->first() }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-librarian-layout>

<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.card.basic-nav :routepdf="route('print_pdf_helps')" :routeexcel="route('export_helps')" />
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
                                <x-librarian.button.detail :route="route('detail_help', $item->id)" />
                                <x-librarian.button.print :route="route('print_help_report', $item->id)" />
                                <x-librarian.button.delete :id="$item->id" :route="route('delete_help', $item->id)"></x-librarian.button.delete>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-librarian-layout>

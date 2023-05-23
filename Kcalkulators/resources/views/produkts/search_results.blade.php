
@if ($produkts->count() > 0)
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Nosaukums</th>
                <th>Kategorija</th>
                <th>Kaloritāte</th>
                <th>Papildu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produkts as $produkt)
                <tr>
                    <td>{{ $produkt->nosaukums }}</td>
                    <td>{{ $produkt->kategorija }}</td>
                    <td>{{ $produkt->kaloritate }}</td>
                    <td><a href="{{ route('produkts.info', $produkt->id) }}">Atvērt</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Nosaukums</th>
                <th>Kategorija</th>
                <th>Kaloritāte</th>
                <th>Papildu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4" class="text-left">Nav atrasts neviens rezultāts.</td>
            </tr>
        </tbody>
    </table>
@endif

@if ($recipes->count() > 0)
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Nosaukums</th>
                <th>Apraksts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->nosaukums }}</td>
                    <td>{{ $recipe->apraksts }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <table class="table">
        <thead class="table-light">
        <tr>
            <th>Nosaukums</th>
            <th>Apraksts</th>
        </tr>
    </thead>
    <tbody>
    <td colspan="2" class="text-left">Nav atrasts neviens ēdiens.</td>
    </tbody>
    </table>
@endif

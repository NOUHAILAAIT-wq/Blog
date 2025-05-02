<div class="container">
    <h1>Liste des Circulaires</h1>

    @foreach($circulaires as $circulaire)
        <tr>
            <td>{{ $circulaire->file_nom }}</td>
            <td>{{ $circulaire->code_tarifaire }}</td>
            <td>{{ $circulaire->conclusion }}</td>
            <td>
                <a href="{{ route('classement_tarifaire.edit', $circulaire->id) }}">✏️ Modifier</a>
                <a href="{{ route('classement_tarifaire.copy', $circulaire->id) }}">📄 Copier</a>
                <form action="{{ route('classement_tarifaire.destroy', $circulaire->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Supprimer cette circulaire ?')">🗑️ Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</div>
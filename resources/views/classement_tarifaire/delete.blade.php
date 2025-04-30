<div class="container">
    <h2>Supprimer une Circulaire</h2>
    <div class="alert alert-warning">
        Êtes-vous sûr de vouloir supprimer cette circulaire ?
    </div>
    <form method="POST" action="{{ route('classement.destroy', $circulaire->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="{{ route('classement.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
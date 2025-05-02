<div class="container"
    style="max-width: 700px; margin: 0 auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;">
    <h1 class="mb-4" style="text-align: center; font-size: 2rem; color: #333; font-weight: 600;">✏️ Éditer la circulaire
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger"
            style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; font-size: 1rem; text-align: center; margin-bottom: 20px;">
            <strong>Erreurs :</strong>
            <ul style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li style="padding: 5px 0;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('classement_tarifaire.update', $circulaire->id) }}" method="POST"
        style="background: #fff; padding: 25px; border-radius: 8px; width: 100%; max-width: 600px; display: flex; flex-direction: column; align-items: center;">
        @csrf
        @method('PUT')


        <div class="form-group mb-3" style="width: 100%;">
            <label for="file_nom" style="font-size: 1rem; color: #333;">Nom du fichier</label>
            <input type="text" name="file_nom" id="file_nom" value="{{ old('file_nom', $circulaire->file_nom) }}"
                class="form-control" required
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
        </div>


        <div class="form-group mb-3" style="width: 100%;">
            <label for="code_tarifaire" style="font-size: 1rem; color: #333;">Code Tarifaire</label>
            <input type="text" name="code_tarifaire" id="code_tarifaire"
                value="{{ old('code_tarifaire', $circulaire->code_tarifaire) }}" class="form-control" required
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
        </div>


        <div class="form-group mb-4" style="width: 100%;">
            <label for="conclusion" style="font-size: 1rem; color: #333;">Conclusion</label>
            <textarea name="conclusion" id="conclusion" class="form-control" rows="4"
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">{{ old('conclusion', $circulaire->conclusion) }}</textarea>
        </div>

        <div class="form-group mb-3" style="width: 100%;">
            <label for="date_publication" style="font-size: 1rem; color: #333;">Date de publication</label>
            <input type="date" name="date_publication" id="date_publication"
                value="{{ old('date_publication', $circulaire->date_publication ? $circulaire->date_publication->format('Y-m-d') : '') }}"
                class="form-control"
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
        </div>


        <div class="form-group mb-3" style="width: 100%;">
            <label for="date_expiration" style="font-size: 1rem; color: #333;">Date d'expiration</label>
            <input type="date" name="date_expiration" id="date_expiration"
                value="{{ old('date_expiration', $circulaire->date_expiration ? $circulaire->date_expiration->format('Y-m-d') : '') }}"
                class="form-control"
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
        </div>


        <div class="form-group mb-3" style="width: 100%;">
            <label for="decision" style="font-size: 1rem; color: #333;">Décision prise</label>
            <input type="text" name="decision" id="decision" value="{{ old('decision', $circulaire->decision) }}"
                class="form-control" required
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
        </div>


        <div class="form-group mb-3" style="width: 100%;">
            <label for="etat" style="font-size: 1rem; color: #333;">État</label>
            <select name="etat" id="etat" class="form-control" required
                style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; margin-top: 8px; width: 100%;">
                <option value="actif" {{ old('etat', $circulaire->etat) == 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ old('etat', $circulaire->etat) == 'inactif' ? 'selected' : '' }}>Inactif
                </option>
            </select>
        </div>


        <div class="d-flex flex-column align-items-center gap-3">
            <a href="{{ route('classement_tarifaire.search') }}" class="btn btn-secondary"
                style="padding: 10px 20px; background-color: #6c757d; color: white; border-radius: 5px; text-decoration: none; font-weight: 500; transition: background-color 0.3s; width: 100%; max-width: 300px;">⬅️
                Retour à la recherche</a><br>
        </div><br>
        <button type="submit" class="btn btn-primary"
            style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-weight: 500; cursor: pointer; transition: background-color 0.3s; width: 100%; max-width: 300px;">✅
            Mettre à jour</button>
</div>
</form>
</div>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form-control {
        font-size: 1rem;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn {
        font-size: 1rem;
        padding: 10px 20px;
        font-weight: 500;
        border-radius: 5px;
        transition: background-color 0.3s;
        width: 100%;
        max-width: 300px;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>

    <style>
        /* Global */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f6ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }

        /* Formulaire de recherche */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        form input {
            width: 75%;
            padding: 14px 20px;
            font-size: 1rem;
            border: 2px solid #ddd;
            border-radius: 30px;
            margin-right: 15px;
            transition: 0.3s;
        }

        form input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
        }

        form button {
            padding: 14px 25px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        form button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        /* Alertes */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            background-color: #e8f5e9;
            color: #388e3c;
            border-radius: 5px;
            font-size: 1rem;
            text-align: center;
        }

        /* Tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
            color: #333;
        }

        table th {
            background-color: #4caf50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Style des boutons d'action */
        .action-buttons a,
        .action-buttons button {
            width: 40px;
            height: 40px;
            padding: 0;
            text-align: center;
            line-height: 40px;
            font-size: 1.2rem;
            text-decoration: none;
            color: white;
            border-radius: 50%;
            cursor: pointer;
            display: inline-block;
        }

        .action-buttons .edit {
            background-color: #28a745;
        }

        .action-buttons .copy {
            background-color: #ffc107;
        }

        .action-buttons .delete {
            background-color: #dc3545;
        }

        .action-buttons .edit:hover {
            background-color: #218838;
        }

        .action-buttons .copy:hover {
            background-color: #e0a800;
        }

        .action-buttons .delete:hover {
            background-color: #c82333;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination a {
            padding: 12px 20px;
            margin: 0 8px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
        }

        .pagination a:hover {
            background-color: #45a049;
        }

        .pagination a.active {
            background-color: #388e3c;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>🔍 Résultats de la recherche</h1>

        <form action="{{ route('classement_tarifaire.search') }}" method="GET" class="mb-4">
            <input type="text" name="query" value="{{ request('query') }}" placeholder="Recherche..."
                class="form-control mb-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(request('query'))
            @if(isset($circulaires) && count($circulaires) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom du fichier</th>
                            <th>Code Tarifaire</th>
                            <th>Conclusion</th>
                            <th>Date Décision</th>
                            <th>Date Diffusion</th>
                            <th>Date Validité</th>
                            <th>Décision</th>
                            <th>Désignation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($circulaires as $circulaire)
                            <tr>
                                <td>{{ $circulaire->file_nom }}</td>
                                <td>{{ $circulaire->code_tarifaire }}</td>
                                <td>{{ $circulaire->conclusion }}</td>
                                <td>{{ \Carbon\Carbon::parse($circulaire->date_decision)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($circulaire->date_diffusion)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($circulaire->date_validite)->format('d-m-Y') }}</td>
                                <td>{{ $circulaire->decision }}</td>
                                <td>{{ $circulaire->designation }}</td>
                                <td>{{ $circulaire->statut == 'draft' ? 'Brouillon' : ($circulaire->statut == 'published' ? 'Publiée' : 'Archivée') }}
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('classement_tarifaire.edit', $circulaire->id) }}" class="edit"
                                            aria-label="Modifier la circulaire {{ $circulaire->file_nom }}">✏️</a>
                                        <a href="{{ route('classement_tarifaire.copy', $circulaire->id) }}" class="copy"
                                            aria-label="Copier la circulaire {{ $circulaire->file_nom }}">📄</a>
                                        <form action="{{ route('classement_tarifaire.destroy', $circulaire->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Supprimer cette circulaire ?')"
                                                class="delete"
                                                aria-label="Supprimer la circulaire {{ $circulaire->file_nom }}">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucune circulaire trouvée.</p>
            @endif
        @endif
    </div>

</body>

</html>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar películas</title>
    <style>
        body {
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial;
            margin: 0;
            background: #f6f7fb;
        }

        .wrap {
            max-width: 980px;
            margin: 0 auto;
            padding: 24px;
        }

        .searchbar {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        input[type="text"] {
            flex: 1;
            padding: 14px 16px;
            border: 1px solid #d7dbe6;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            padding: 14px 18px;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            margin-top: 16px;
            display: flex;
            gap: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
        }

        .poster {
            width: 92px;
            height: 138px;
            border-radius: 10px;
            background: #e9ecf5;
            object-fit: cover;
        }

        .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .meta {
            color: #667085;
            margin: 6px 0 10px;
            font-size: 14px;
        }

        .overview {
            margin: 0;
            color: #333;
            line-height: 1.35;
        }

        .hint {
            color: #667085;
            margin-top: 16px;
        }

        .error {
            background: #ffe7e7;
            border: 1px solid #ffb3b3;
            padding: 12px 14px;
            border-radius: 10px;
            margin-top: 16px;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <form class="searchbar" method="GET" action="{{ route('movies.search') }}">
            <input type="text" name="q" value="{{ $query }}" placeholder="Buscar película (ej. Minions)"
                autocomplete="off">
            <button type="submit">Buscar</button>
        </form>

        @if ($error)
            <div class="error">{{ $error }}</div>
        @endif

        @if ($query === '')
            <p class="hint">Escribe un título y presiona “Buscar”.</p>
        @endif

        @foreach ($movies as $m)
            @php
                $poster = $m['poster_path'] ?? null;
                $posterUrl = $poster ? "https://image.tmdb.org/t/p/w200{$poster}" : null;
                $title = $m['title'] ?? 'Sin título';
                $date = $m['release_date'] ?? null;
                $overview = $m['overview'] ?? '';
            @endphp

            <div class="card">
                @if ($posterUrl)
                    <img class="poster" src="{{ $posterUrl }}" alt="{{ $title }}">
                @else
                    <div class="poster"></div>
                @endif

                <div>
                    <p class="title">{{ $title }}</p>
                    <p class="meta">
                        {{ $date ? \Illuminate\Support\Carbon::parse($date)->translatedFormat('F j, Y') : 'Fecha desconocida' }}
                    </p>
                    <p class="overview">{{ $overview !== '' ? $overview : 'Sin descripción.' }}</p>
                </div>
            </div>
        @endforeach

        @if ($query !== '' && count($movies) === 0 && !$error)
            <p class="hint">No se encontraron resultados.</p>
        @endif
    </div>
</body>

</html>

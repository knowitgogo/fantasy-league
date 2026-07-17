<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Team Report</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        p {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #eeeeee;
        }

    </style>
</head>

<body>

<h1>{{ $team->team_name }}</h1>

<p>
    Total Players :
    {{ $team->players->count() }}
</p>

<table>

    <thead>

        <tr>

            <th>Player</th>

            <th>Country</th>

            <th>Age</th>

            <th>Price</th>

        </tr>

    </thead>

    <tbody>

    @foreach($team->players as $player)

        <tr>

            <td>{{ $player->player_name }}</td>

            <td>{{ $player->country }}</td>

            <td>{{ $player->age }}</td>

            <td>{{ $player->player_price }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

</body>
</html>
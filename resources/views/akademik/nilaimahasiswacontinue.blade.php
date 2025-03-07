<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .d-inline-block {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nilai Mahasiswa</h1>

        @forelse ($mahasiswa as $mhs)
            @continue($mhs['nilai'] < 50) {{-- Lewati mahasiswa dengan nilai di bawah 50 --}}
            
            <div>
                <h4>Nama: {{ $mhs['nama'] }}<br>NIM: {{ $mhs['nim'] }}</h4>
                <div class="alert alert-info d-inline-block">Nilai: {{ $mhs['nilai'] }}</div>
            </div>
        @empty
            <p class="alert alert-danger">Tidak ada data mahasiswa.</p>
        @endforelse

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Total Nilai</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($mahasiswa as $mhs)
                    @continue($mhs['nilai'] < 50) {{-- Lewati mahasiswa dengan nilai di bawah 50 --}}

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $mhs['nama'] }}</td>
                        <td>{{ $mhs['nim'] }}</td>
                        <td>{{ $mhs['nilai'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <h4 style="text-align: center;" class="container">Padang, &copy; {{ date('Y') }}</h4>
</body>

</html>

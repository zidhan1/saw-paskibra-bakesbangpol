<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid" style="margin-bottom: 3rem; text-align: center;">
        <h4 style="margin-bottom: 0.75rem; margin-top: 0.75rem; color: #333; font-weight: bold; text-transform: uppercase;">DAFTAR PESERTA SELEKSI PASKIBRAKA {{$data_tahun}}</h4>
        <table class="table table-striped table-sm" style="border: 1px solid #ddd; width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">No</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Nama Lengkap</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Jenis Kelamin</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Alamat</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Tempat, Tanggal Lahir</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Agama</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Asal Sekolah</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">No HP</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Nilai Seleksi</th>
                    <th scope="col" style="border: 1px solid #ddd; padding: 8px;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $dt)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$loop->iteration}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->nama_lengkap}}</td>
                    @if($dt->jenis_kelamin == "L")
                    <td style="border: 1px solid #ddd; padding: 8px;">Laki - laki</td>
                    @else
                    <td style="border: 1px solid #ddd; padding: 8px;">Perempuan</td>
                    @endif
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->alamat}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->tempat_lahir}}, {{date('d-M-y', strtotime($dt->tanggal_lahir))}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->agama}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->asal_sekolah}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->no_hp}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$dt->hasil}}</td>
                    @if($dt->validation == "validated")
                    <td style="border: 1px solid #ddd; padding: 8px; color: #28a745; font-weight: bold;">Lolos seleksi</td>
                    @else
                    <td style="border: 1px solid #ddd; padding: 8px; color: #dc3545; font-weight: bold;">Tidak lolos</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
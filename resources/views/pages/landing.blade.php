<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pendukung Keputusan Seleksi Paskibraka</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            min-height: 100vh;
            /* Memastikan halaman penuh di layar */
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 20px;
        }

        .container-nav {
            margin: 5px 40px;
        }

        .container-header {
            max-width: 960px;
            margin-left: 20px;
            padding: 40px;
            padding-top: 100px;
            padding-bottom: 100px;
        }

        header {
            /* background: #333; */
            background-image: url('{{asset("img/bg-lp.png")}}');
            background-repeat: no-repeat;
            background-position: bottom;
            color: #fff;
            text-align: left;
            /* padding: 80px 0; */
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        header p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #eb8484;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #333;
        }

        section {
            flex: 1;
            /* Bagian konten dapat memanjang sesuai kebutuhan */
            padding: 40px 0;
            text-align: center;
        }

        section h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .feature {
            margin-bottom: 40px;
        }

        .feature h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

        footer p {
            font-size: 0.8em;
        }

        .schedule {
            margin-top: 40px;
        }

        .schedule h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .schedule ul {
            list-style-type: none;
            padding-left: 0;
            text-align: left;
        }

        .schedule ul li {
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .schedule ul li strong {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            /* Menata kartu secara horizontal dan berdampingan */
            flex-wrap: wrap;
            /* Jika layar tidak cukup lebar, kartu akan pindah ke baris baru */
            margin-top: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: calc(33.33% - 20px);
            /* Menghitung lebar kartu, dengan margin di antara */
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.1em;
            line-height: 1.6;
        }

        span {
            color: #eb8484;
        }

        .navbar-transparent {
            background: transparent;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-transparent">
            <div class="container-nav">
                <a class="navbar-brand" href="{{url('/login')}}">
                    <img src="{{asset('img/logo_kediri.svg')}}" alt="" style="width: 50px" />
                </a>
            </div>
        </nav>
        <div class="container-header">
            <h1>
                Sistem Pendukung Keputusan <br />
                <span>Penerimaan Peserta Paskibraka </span> <br />
                Bakesbangpol <span>Kota Kediri</span>
            </h1>
            <p>
                Memudahkan dalam proses seleksi anggota Paskibraka dengan teknologi
                terkini.
            </p>
            <a href="{{url('/login')}}" class="btn">Masuk</a>
        </div>
    </header>

    <section id="features">
        <div class="container">
            <h2>Fitur <span>Utama</span></h2>
            <div class="card-container">
                <div class="card">
                    <h3>Analisis Data</h3>
                    <p>
                        Sistem ini dapat menganalisis data calon anggota Paskibraka secara
                        efisien untuk memprediksi kemungkinan keberhasilan.
                    </p>
                </div>
                <div class="card">
                    <h3>Interaktif</h3>
                    <p>
                        Pengguna dapat dengan mudah memasukkan data dan mendapatkan hasil
                        seleksi dengan cepat.
                    </p>
                </div>
                <div class="card">
                    <h3>Dashboard</h3>
                    <p>
                        Dashboard yang intuitif untuk melihat rangkuman dan statistik dari
                        proses seleksi.
                    </p>
                </div>
            </div>

            <div class="schedule">
                <h2>Materi <span>Seleksi</span></h2>
                <ul>
                    <!-- Tes Parade -->
                    <li class="text-center">
                        <b> <span>Tes Parade</span></b>
                        <ul class="text-center">
                            <li><b>Disiplin:</b> Ketepatan waktu, keseragaman langkah, dan kerapian barisan.</li>
                            <li>
                                <b>Koordinasi:</b> Seluruh anggota harus mengikuti aba-aba dengan tepat.
                            </li>
                            <li>
                                <b>Penampilan: </b>Seragam harus rapi, sepatu bersih, dan atribut lengkap.
                            </li>
                        </ul>
                    </li>
                    <!-- Tes PBB (Peraturan Baris Berbaris) -->
                    <li class="text-center">
                        <b><span>Tes PBB (Peraturan Baris Berbaris)</span></b>
                        <ul class="text-center">
                            <li><b>Sikap sempurna:</b> Berdiri tegak dengan kaki rapat dan tangan di samping.</li>
                            <li>
                                <b>Istirahat di tempat:</b> Kaki kiri digeser selebar bahu dan tangan diletakkan di belakang.
                            </li>
                            <li><b>Lencang kanan/kiri:</b> Mengangkat tangan kanan/kiri sejajar dengan bahu.</li>
                            <li>
                                <b>Hadap kanan/kiri:</b>Berputar ke kanan/kiri dengan tumpuan kaki kanan/kiri.
                            </li>
                        </ul>
                    </li>
                    <!-- Tes Samapta (Fisik) -->
                    <li class="text-center">
                        <b><span>Tes Samapta (Fisik)</span></b>
                        <ul class="text-center">
                            <li>
                                <b>Lari 12 menit:</b> Mengukur daya tahan kardiovaskular.
                            </li>
                            <li>
                                <b>Push-up:</b> Mengukur kekuatan otot lengan.
                            </li>
                            <li>
                                <b>Sit-up:</b> Mengukur kekuatan otot perut.
                            </li>
                            <li>
                                <b>Shuttle run: </b> Mengukur kelincahan dan kecepatan.
                            </li>
                        </ul>
                    </li>
                    <!-- Tes Wawancara -->
                    <li class="text-center">
                        <b><span>Tes Wawancara</span></b>
                        <ul class="text-center">
                            <li>
                                <b>Motivasi: </b> Mengapa ingin menjadi anggota paskibra?
                            </li>
                            <li>
                                <b>Pengalaman:</b> Apakah pernah mengikuti kegiatan serupa sebelumnya?
                            </li>
                            <li>
                                <b>Pengetahuan:</b> Apa yang kamu ketahui tentang paskibra?
                            </li>
                        </ul>
                    </li>
                    <!-- Tes Wawasan Kebangsaan -->
                    <li class="text-center">
                        <b><span>Tes Wawasan Kebangsaan</span></b>
                        <ul class="text-center">
                            <li>
                                <b>Sejarah nasional:</b> Proklamasi kemerdekaan, perjuangan pahlawan nasional.
                            </li>
                            <li>
                                <b>Pancasila: </b> Nilai-nilai yang terkandung dalam Pancasila dan implementasinya.
                            </li>
                            <li>
                                <b>Bhinneka Tunggal Ika:</b> Makna keberagaman dan persatuan Indonesia.
                            </li>
                        </ul>
                    </li>
                    <!-- Tes Pengetahuan Umum -->
                    <li class="text-center">
                        <b><span>Tes Pengetahuan Umum</span></b>
                        <ul class="text-center">
                            <li>
                                <b>Geografi Indonesia:</b> Letak geografis, provinsi, kota besar, dan sumber daya alam.
                            </li>
                            <li>
                                <b>Sosial dan budaya: </b> Tradisi, adat istiadat, dan bahasa daerah.
                            </li>
                            <li>
                                <b>Peristiwa terkini:</b> Berita terbaru tentang politik, ekonomi, dan perkembangan teknologi.
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="schedule">
                <h2>Jadwal Seleksi <span>Paskibraka 2024</span></h2>
                <ul>
                    <li><strong>Pendaftaran Online:</strong> 1 Juli - 15 Juli 2024</li>
                    <li>
                        <strong>Seleksi Administrasi:</strong> 20 Juli - 25 Juli 2024
                    </li>
                    <li>
                        <strong>Ujian Tulis dan Wawancara:</strong> 1 Agustus - 5 Agustus
                        2024
                    </li>
                    <li><strong>Pengumuman Hasil:</strong> 10 Agustus 2024</li>
                    <li>
                        <strong>Pelatihan Anggota Baru:</strong> 15 Agustus - 20 Agustus
                        2024
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>
                &copy; 2024 Sistem Pendukung Keputusan Seleksi Paskibraka |
                Dikembangkan oleh Bakesbangpol Kota Kediri
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

// default routing
Route::get('/', function () {
    return view('welcome');
});

Route::post('submit', function () {
    return 'form submitted!!';
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::view('/hello', 'hello', ['nama' => 'Erland']);

Route::get('/listmahasiswa', function () {
    $arrmhs = ['Erland Agsya', 'Acumalaka', 'Entok', 'Asu'];
    return view('akademik.mahasiswa', ['mhs' => $arrmhs]);
});

Route::put('update/{id}', function ($id) {
    return 'update data for id:' . $id;
});


Route::delete('delete/{id}', function ($id) {
    return 'delete data for id:' . $id;
});

Route::get('/profile', function () {
    echo '<h1>Profile</h1>';
    return '<p> Jurusan teknologi informasi-Politeknik Negeri Padang</p>';
});


Route::get('mahasiswa/ti/latifa', function () {
    echo "<p style='font-size:40;color:orange'>Jurusan Teknologi Informasi";
    echo "<h1> Selamat Datang Latifa...</h1>";
    echo "<hr>";
    echo "<p> lorem .........................</p>";
});


//route with parameter
Route::get('mahasiswa/{nama}', function ($nama) {
    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});


//route with optional parameter
Route::get('mahasiswa/{nama?}', function ($nama = 'tidak ada') {
    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "tidak ada", $tahun_lahir = "2025") {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});


//route with regular expression
Route::get('user/{id}', function ($id) {
    return '<p> user admin memiliki id <b>' . $id . '</b></p>';
})->where('id', '[0-9]+');


//route redirect
Route::redirect('public', 'mahasiswa');


//route group
Route::prefix('login')->group(function () {
    Route::get('mahasiswa', function () {
        return '<h2> login sebagai mahasiswa</h2>';
    });
    Route::get('dosen', function () {
        return '<h2> login sebagai dosen</h2>';
    });
    Route::get('admin', function () {
        return '<h2> login sebagai admin</h2>';
    });
});

// Tugas 1
// route group = Blog routes
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return 'Blog index';
    });

    Route::get('/{slug}', function ($slug) {
        return 'Blog post: ' . $slug;
    });

    Route::get('/category/{category}', function ($category) {
        return 'Posts in category: ' . $category;
    });
});

// route group = Admin panel routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'Dashboard Admin';
    });

    Route::get('/users', function () {
        return 'Profil pengguna';
    });

    Route::get('/settings', function () {
        return 'Pengaturan';
    });

    Route::get('/reports', function () {
        return 'Analisis laporan';
    });
});

//route fallback
Route::fallback(function () {
    return response()->view('404', [], 404);
});

Route::get("listmahasiswa", function () {
    $mhs1 = "Erland";
    $mhs2 = "Acalumaka";
    $mhs3 = "Ambatron";

    return view("akademik.mahasiswalist", compact("mhs1", "mhs2", "mhs3"));
});

Route::get("nilaimahasiswa", function () {
    $nama = "Erland";
    $nim = "2311083007";
    $total_nilai = "100";

    return view("akademik.nilaimahasiswa", compact("nama", "nim", "total_nilai"));
});

Route::get("nilaimahasiswaswitch", function () {
    $nama = "Erland";
    $nim = "2311083007";
    $total_nilai = "100";

    return view("akademik.nilaimahasiswaswitch", compact("nama", "nim", "total_nilai"));
});

Route::get("nilaimahasiswaforloop", function () {
    $nama = "Erland";
    $nim = "2311083007";
    $total_nilai = "100";

    return view("akademik.nilaimahasiswaforloop", compact("nama", "nim", "total_nilai"));
});

Route::get("nilaimahasiswawhile", function () {
    $nama = "Erland";
    $nim = "2311083007";
    $total_nilai = "100";

    return view("akademik.nilaimahasiswawhile", compact("nama", "nim", "total_nilai"));
});

Route::get("nilaimahasiswaforeach", function () {
    $nama = ["Aldo", "Asue", "Kimai", "Kiaz", "Erland"];
    $nim = ["2311082001", "2311081001", "2311083016", "2311083007", "2311084005"];
    $total_nilai = [20, 30, 40, 50, 100];

    $mahasiswa = [];
    for ($i = 0; $i < count($nama); $i++) {
        $mahasiswa[] = [
            "nama" => $nama[$i],
            "nim" => $nim[$i] ?? "N/A",
            "nilai" => $total_nilai[$i] ?? 0
        ];
    }

    return view("akademik.nilaimahasiswaforeach", compact("mahasiswa"));
});

Route::get("nilaimahasiswaforelse", function () {

    $nama = ["Aldo", "Asue", "Kimai", "Kiaz", "Erland"];
    $nim = ["2311082001", "2311081001", "2311083016", "2311083007", "2311084005"];
    $total_nilai = [20, 30, 40, 50, 100];

    $mahasiswa = [];
    for ($i = 0; $i < count($nama); $i++) {
        $mahasiswa[] = [
            "nama" => $nama[$i],
            "nim" => $nim[$i] ?? "N/A",
            "nilai" => $total_nilai[$i] ?? 0
        ];
    }

    return view("akademik.nilaimahasiswaforelse", compact("mahasiswa"));
});

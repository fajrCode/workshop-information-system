<?php
if (isset($_SESSION['peserta'])) {
  $test = 'peserta';
  header("Location: dashboard.php");
  exit;
} elseif (isset($_SESSION['admin'])) {
  $test = 'admin';
  header("Location: dashboard.php");
  exit;
}

//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_workshop";
$conn = mysqli_connect($host, $user, $pass, $db);

$now = date("Y-m-d");

// validasi koneksi db
if (!$conn) {
  die("Koneksi dengan database gagal: " . mysqli_connect_error());
}

//function hapus data damin berdsarkan id
function hapusData($table, $field, $isi_field)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM $table WHERE $field = '$isi_field'");
  return mysqli_affected_rows($conn);
}

// function upload gambar ke repositori
function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $sizeFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 0) {

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $explodeGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($explodeGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
      alert('Hanya boleh upload gambar (jpg, jpeg, png)!');
      </script>";
      return false;
    }

    //cek jika ukuran besar 2,5mb
    if ($sizeFile > 20000000) {
      echo "<script>
    alert('Ukuran file terlalu besar (max 2.5mb');
    </script>";
      return false;
    }
  }

  // generate nama file gambar baru, supaya tidak double saat simpan di repositori
  $newFile = rand(1, 999);
  $newFile .= '-';
  $newFile .= reset($explodeGambar);
  $newFile .= '.';
  $newFile .= $ekstensiGambar;


  // lolos pengecekan, gambar siap diupload
  move_uploaded_file($tmpName, '../gambar/' . $newFile);

  return $newFile;
}

//function registrasi users (sign up)
function registrasi($data)
{
  global $conn;

  $email = strtolower($data['email']);
  $nama = htmlspecialchars($data['nama']);
  $password = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //pengecekan validasi string email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
          alert('Maaf email yang anda masukkan tidak sesuai.');
          </script>";
    return false;
  }

  //pengecekan email apakah double
  $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Maaf email yang anda gunakan sudah terdaftar');
          </script>";
    return false;
  }

  //cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!')
          </script>";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan user baru ke database
  $query = "INSERT INTO users VALUES 
                  ('',
                  '$email',
                  '$password',
                  '$nama',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '',
                  'peserta'
                  )";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//function ubah email
function ubahEmail($data)
{
  global $conn;

  $idUsers = htmlspecialchars($data['id_users']);
  $newEmail = strtolower($data['newEmail']);
  $password = mysqli_real_escape_string($conn, $data['password']);

  // cek password apakah benar
  $result = mysqli_query($conn, "SELECT password FROM users WHERE id_users = '$idUsers'");
  $row = mysqli_fetch_assoc($result);
  if (!password_verify($password, $row["password"])) {
    echo "<script>
            alert('Maaf, Password yang anda masukkan sudah salah');
          </script>";
    return false;
  }

  //cek email baru apakah double
  $cekEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$newEmail'");
  if (mysqli_fetch_assoc($cekEmail)) {
    echo "<script>
              alert('Maaf, email yang anda masukkan sudah terdaftar');
            </script>";
    return false;
  }

  $query = "UPDATE users SET 
            email = '$newEmail'
            WHERE 
            id_peserta = '$idUsers'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//function forgot password saat login
function forgotPassword($data)
{
  global $conn;

  $email = strtolower($data['email']);

  $password = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //pengecekan validasi string email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
          alert('Maaf email yang anda masukkan tidak sesuai.');
          </script>";
    return false;
  }

  //pengecekan email apakah double
  $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

  if (!mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Maaf email yang anda masukkan belum terdaftar');
          </script>";
    return false;
  }

  //cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
            alert('Konfirmasi password tidak sesuai!')
          </script>";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //update password user ke database
  $query = "UPDATE users SET 
            email='$email',
            password='$password',
            type = 'peserta'
            WHERE 
            email = '$email'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//function ubah password users (profiles)
function ubahPassword($data)
{
  global $conn;

  $idUsers = htmlspecialchars($data['id_users']);
  $password = mysqli_real_escape_string($conn, $data['password']);
  $newPassword = mysqli_real_escape_string($conn, $data['newpassword']);
  $renewPassword = mysqli_real_escape_string($conn, $data['renewpassword']);

  //query data
  $result = mysqli_query($conn, "SELECT password FROM users WHERE id_users = '$idUsers'");
  $row = mysqli_fetch_assoc($result);

  // cek password apakah benar
  if (!password_verify($password, $row["password"])) {
    echo "<script>
            alert('Maaf, Password yang anda masukan salah');
          </script>";
    return false;
  }

  //cek konfirmasi password
  if ($newPassword !== $renewPassword) {
    echo "<script>
            alert('Konfirmasi password tidak sesuai!')
          </script>";
    return false;
  }

  //enkripsi password
  $newPassword = password_hash($password, PASSWORD_DEFAULT);

  //update password user ke database
  $query = "UPDATE users SET 
            password ='$newPassword'
            WHERE 
            id_users = '$idUsers'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// function query pagination, menampilkan select data dengan limit
function showAllData($table)
{
  $query = "SELECT * FROM $table";
  $show = queryShow($query);
  return $show;
}

//function query select all data users
function queryShow($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

//function query select data berdasarkan id
function querySelect($table, $field, $isi_field)
{
  global $conn;
  $result = mysqli_query($conn, "SELECT * FROM $table WHERE $field='$isi_field'");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row; //hasil array multi dimensi
  }
  return $rows;
}

//function query select data users berdasarkan id
function select($table, $field, $isi_field)
{
  $show = queryShow("SELECT * FROM $table WHERE $field = $isi_field");

  return $show;
}

// function tambah users
function addusers($query)
{
  global $conn;
  $email = strtolower($query['email']);
  $password = mysqli_real_escape_string($conn, $query['password']);

  //pengecekan validasi string email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
          alert('Maaf email yang anda masukkan tidak sesuai.');
          </script>";
    return false;
  }

  //pengecekan email apakah double
  $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Maaf email yang anda gunakan sudah terdaftar');
          </script>";
    return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  $nama = htmlspecialchars($query['nama']);

  //upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO users VALUES 
                  ('',
                  '$email',
                  '$password',
                  '$nama',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '',
                  '$gambar',
                  'peserta'
                  )";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function update data users berdasarkan id
function updateusers($query)
{
  global $conn;

  $id_users = htmlspecialchars($query['id_users']);
  $email = strtolower($query['email']);
  $password = mysqli_real_escape_string($conn, $query['password']);

  //pengecekan validasi string email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
          alert('Maaf email yang anda masukkan tidak sesuai.');
          </script>";
    return false;
  }

  //pengecekan email apakah double
  $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Maaf email yang anda gunakan sudah terdaftar');
          </script>";
    return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  $nama = htmlspecialchars($query['nama']);
  $jk_users = htmlspecialchars($query['jk_users']);
  $tgl_lahir = htmlspecialchars($query['tgl_lahir']);
  $no_wa = htmlspecialchars($query['no_wa']);
  $pekerjaan = htmlspecialchars($query['pekerjaan']);
  $instansi = htmlspecialchars($query['instansi']);
  $alamat = htmlspecialchars($query['alamat']);
  $kota = htmlspecialchars($query['kota']);
  $type = htmlspecialchars($query['type']);
  $gambarLama = $query['gambarLama'];

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE users SET 
            email='$email',
            password='$password',
            nama='$nama',
            jk_users='$jk_users',
            tgl_lahir='$tgl_lahir',
            no_wa='$no_wa',
            pekerjaan='$pekerjaan',
            instansi='$instansi',
            alamat='$alamat',
            kota='$kota',
            gambar='$gambar',
            type='$type'
            WHERE 
            id_users = '$id_users'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function update data profile peserta
function updateProfile($query)
{
  global $conn;

  $id_users = htmlspecialchars($query['id_users']);
  $nama = htmlspecialchars($query['nama']);
  $jk_users = htmlspecialchars($query['jk_users']);
  $tgl_lahir = htmlspecialchars($query['tgl_lahir']);
  $no_wa = htmlspecialchars($query['no_wa']);
  $pekerjaan = htmlspecialchars($query['pekerjaan']);
  $instansi = htmlspecialchars($query['instansi']);
  $alamat = htmlspecialchars($query['alamat']);
  $kota = htmlspecialchars($query['kota']);
  $gambarLama = $query['gambarLama'];

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE users SET 
            nama='$nama',
            jk_users='$jk_users',
            tgl_lahir='$tgl_lahir',
            no_wa='$no_wa',
            pekerjaan='$pekerjaan',
            instansi='$instansi',
            alamat='$alamat',
            kota='$kota',
            gambar='$gambar'
            WHERE 
            id_users = '$id_users'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function tambah data absen
function addAbsen($query)
{
  global $conn;
  $idDaftar = htmlspecialchars($query['id_pendaftaran']);
  $absensi = htmlspecialchars($query['absen']);

  $query = "INSERT INTO absensi VALUES 
                  ('$idDaftar',
                  '$absensi',
                  ''
                  )";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// Kumpulan Function Pemateri
// function tambah Pemateri
function addPemateri($query)
{
  global $conn;
  $namaPemateri = htmlspecialchars($query['nama_pemateri']);
  $jkPemateri = htmlspecialchars($query['jk_pemateri']);
  $job = htmlspecialchars($query['job']);
  $waPemateri = htmlspecialchars($query['wa_pemateri']);
  $deskripsi = htmlspecialchars($query['deskripsi']);

  //upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO pemateri VALUES 
                  ('',
                  '$namaPemateri',
                  '$jkPemateri',
                  '$job',
                  '$waPemateri',
                  '$gambar',
                  '$deskripsi'
                  )";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function update data pemateri berdasarkan id
function updatePemateri($query)
{
  global $conn;

  $idPemateri = htmlspecialchars($query['id_pemateri']);
  $namaPemateri = htmlspecialchars($query['nama_pemateri']);
  $jkPemateri = htmlspecialchars($query['jk_pemateri']);
  $job = htmlspecialchars($query['job']);
  $waPemateri = htmlspecialchars($query['wa_pemateri']);
  $deskripsi = htmlspecialchars($query['deskripsi']);

  $gambarLama = $query['gambarLama'];

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE pemateri SET 
            nama_pemateri='$namaPemateri',
            jk_pemateri='$jkPemateri',
            job='$job',
            wa_pemateri='$waPemateri',
            gambar='$gambar',
            deskripsi='$deskripsi'
            WHERE 
            id_pemateri = '$idPemateri'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// Kumpulan Function Workshop
// function query pagination, menampilkan select data dengan limit
function showAllWorkshop($table)
{
  $show = queryShow("SELECT $table.*, pemateri.nama_pemateri
                    FROM pemateri, $table
                    WHERE
                    pemateri.id_pemateri = $table.id_pemateri");

  return $show;
}

//function query select data users berdasarkan id
function querySelectWorkshop($table, $field, $isi_field)
{
  global $conn;
  $query = "SELECT $table.*, pemateri.nama_pemateri
            FROM pemateri, $table
            WHERE pemateri.id_pemateri = $table.id_pemateri AND
            $field='$isi_field'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row; //hasil array multi dimensi
  }
  return $rows;
}

// function query, menampilkan select data untuk workshop yang sudah terdaftar dan berdasarkan tanggal daftar terbaru
function showAllWorkshopSort()
{
  $show = queryShow("SELECT workshop.*, pemateri.nama_pemateri
                    FROM pemateri, workshop
                    WHERE
                    pemateri.id_pemateri = workshop.id_pemateri
                    ORDER BY workshop.tgl_mulai DESC
                    LIMIT 5
                    ");

  return $show;
}

//Function tambah workshop
function addWorkshop($query)
{
  global $conn;
  $judul = htmlspecialchars($query['judul']);
  $idPemateri = htmlspecialchars($query['id_pemateri']);
  $kuota = $query['kuota'];
  $deskripsi = htmlspecialchars($query['deskripsi']);
  $tglMulai = $query['tgl_mulai'];
  $tglSelesai = $query['tgl_selesai'];
  $startDate = new DateTime($tglMulai);
  $endDate = new DateTime($tglSelesai);
  $lama = $startDate->diff($endDate);
  $lamaWorkshop = ($lama->days) + 1 . " Hari";
  $lokasi = htmlspecialchars($query['lokasi']);
  $biaya = $query['biaya'];



  //upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO workshop VALUES 
                  ('',
                  '$judul',
                  '$idPemateri',
                  '$deskripsi',
                  '$kuota',
                  '$tglMulai',
                  '$tglSelesai',
                  '$lamaWorkshop',
                  '$lokasi',
                  '$gambar',
                  '$biaya'
                  )";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function update data workshop berdasarkan id
function updateWorkshop($query)
{
  global $conn;
  $idWorkshop = htmlspecialchars($query['id_workshop']);
  $judul = htmlspecialchars($query['judul']);
  $namaPemateri = htmlspecialchars($query['nama_pemateri']);
  $kuota = $query['kuota'];
  $deskripsi = htmlspecialchars($query['deskripsi']);
  $tglMulai = $query['tgl_mulai'];
  $tglSelesai = $query['tgl_selesai'];
  $startDate = new DateTime($tglMulai);
  $endDate = new DateTime($tglSelesai);
  $lama = $startDate->diff($endDate);
  $lamaWorkshop = ($lama->days) + 1 . " Hari";
  $lokasi = htmlspecialchars($query['lokasi']);
  $biaya = $query['biaya'];
  $status = htmlspecialchars($query['status']);
  $gambarLama = $query['gambarLama'];

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE workshop
            JOIN pemateri ON workshop.id_pemateri = pemateri.id_pemateri
            SET workshop.judul = '$judul',
            workshop.id_pemateri = (SELECT id_pemateri FROM pemateri WHERE nama_pemateri = '$namaPemateri'), 
            workshop.deskripsi = '$deskripsi', 
            workshop.kuota = '$kuota', 
            workshop.tgl_mulai = '$tglMulai', 
            workshop.tgl_selesai = '$tglSelesai', 
            workshop.lama_workshop = '$lamaWorkshop', 
            workshop.lokasi = '$lokasi', 
            workshop.gambar = '$gambar', 
            workshop.biaya = '$biaya', 
            workshop.status = '$status'
            WHERE workshop.id_workshop = '$idWorkshop'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// Kumpulan Function Pendaftaran
// hitung jumlah semua data pendaftaran
function countData($table)
{
  global $conn;
  $query = "SELECT COUNT(*) FROM $table";
  $hasil = mysqli_query($conn, $query);

  // Menampilkan jumlah data
  $jumlah_data = mysqli_fetch_array($hasil)[0];
  return $jumlah_data;
}

// hitung jumlah data pendaftaran dengan syarat
function countSelectData($idWorkshop)
{
  global $conn;
  $query = "SELECT COUNT(*) FROM pendaftaran WHERE id_workshop='$idWorkshop'";
  $hasil = mysqli_query($conn, $query);

  // Menampilkan jumlah data
  $jumlah_data = mysqli_fetch_array($hasil)[0];
  return $jumlah_data;
}

// function query, menampilkan select data
function showAllPendaftaran()
{
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri, users.nama
                    FROM workshop, pendaftaran, pemateri, users
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    pendaftaran.id_users = users.id_users AND
                    workshop.id_workshop = pendaftaran.id_workshop
                    ");

  return $show;
}

function showAllPendaftaranSort()
{
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri, users.nama
                    FROM workshop, pendaftaran, pemateri, users
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    pendaftaran.id_users = users.id_users AND
                    workshop.id_workshop = pendaftaran.id_workshop
                    ORDER BY pendaftaran.tgl_daftar DESC
                    LIMIT 5
                    ");

  return $show;
}

// function query, menampilkan select data untuk workshop yang sudah terdaftar
function showSelectPendaftaran($idUsers)
{
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri
                    FROM workshop, pendaftaran, pemateri
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    workshop.id_workshop = pendaftaran.id_workshop AND
                    pendaftaran.id_users = '$idUsers'
                    ");

  return $show;
}

// function query, menampilkan select data untuk workshop yang sudah terdaftar
function showSelectPendaftaranCompleted($idUsers)
{
  global $now;
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri, absensi.absen
                    FROM workshop, pendaftaran, pemateri, absensi
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    workshop.id_workshop = pendaftaran.id_workshop AND
                    pendaftaran.id_pendaftaran = absensi.id_pendaftaran AND
                    pendaftaran.id_users = '$idUsers' AND
                    absensi.absen = 'hadir'
                    ");

  return $show;
}

// function query, menampilkan select data untuk workshop yang sudah terdaftar
function showSelectPendaftaranBaru($idUsers)
{
  global $now;
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri
                    FROM workshop, pendaftaran, pemateri
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    workshop.id_workshop = pendaftaran.id_workshop AND
                    workshop.tgl_mulai >= '$now' AND
                    pendaftaran.id_users = '$idUsers'
                    ");

  return $show;
}

// function query, menampilkan select data untuk workshop yang sudah terdaftar dan berdasarkan tanggal daftar terbaru
function showSelectPendaftaranSort($idUsers)
{
  $show = queryShow("SELECT pendaftaran.*, workshop.*, pemateri.nama_pemateri
                    FROM workshop, pendaftaran, pemateri
                    WHERE
                    workshop.id_pemateri = pemateri.id_pemateri AND
                    workshop.id_workshop = pendaftaran.id_workshop AND
                    pendaftaran.id_users = '$idUsers'
                    ORDER BY pendaftaran.tgl_daftar DESC
                    LIMIT 5
                    ");

  return $show;
}

//function query select data users berdasarkan id
function querySelectPendaftaran($table, $field, $isi_field)
{
  global $conn;
  $query = "SELECT $table.*, users.nama, workshop.judul
            FROM workshop, $table, users
            WHERE
            users.id_users = $table.id_users AND
            workshop.id_workshop = $table.id_workshop AND
            $field='$isi_field'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row; //hasil array multi dimensi
  }
  return $rows;
}

// function cek apakah sudah mendaftar
function cekDaftar($idUsers, $idWorkshop)
{
  global $conn;
  $cekDaftar = mysqli_query($conn, "SELECT id_users, id_workshop FROM pendaftaran WHERE id_users = '$idUsers' AND id_workshop = '$idWorkshop'");
  if (mysqli_fetch_assoc($cekDaftar)) {
    $status = 1;
    return $status;
  }
}

//Function tambah Pendaftaran
function addPendaftaran($query)
{
  global $conn;
  $idUsers = htmlspecialchars($query['id_users']);
  $idWorkshop = htmlspecialchars($query['id_workshop']);
  $tglDaftar = date("Y-m-d H:i:s");
  $metode = htmlspecialchars($query['metode']);
  $tglBayar = $tglDaftar;
  //upload gambar
  $gambar = upload();


  $query = "INSERT INTO pendaftaran VALUES 
            ('',
            '$idUsers',
            '$idWorkshop',
            '$tglDaftar',
            '$metode',
            '$tglBayar',
            '$gambar',
            'Terdaftar')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// function update data Pendaftaran berdasarkan id untuk absen
function updatePendaftaran($query)
{
  global $conn;
  $idPendaftaran = htmlspecialchars($query['id_Pendaftaran']);
  $judul = htmlspecialchars($query['judul']);
  $namaPemateri = htmlspecialchars($query['nama_pemateri']);
  $kuota = $query['kuota'];
  $deskripsi = htmlspecialchars($query['deskripsi']);
  $tglMulai = $query['tgl_mulai'];
  $tglSelesai = $query['tgl_selesai'];

  $startDate = new DateTime($tglMulai);
  $endDate = new DateTime($tglSelesai);
  $lama = $startDate->diff($endDate);
  $lamaPendaftaran = ($lama->days) + 1 . " Hari";

  $lokasi = htmlspecialchars($query['lokasi']);
  $biaya = $query['biaya'];
  $status = htmlspecialchars($query['status']);
  $gambarLama = $query['gambarLama'];

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE Pendaftaran
            JOIN pemateri ON Pendaftaran.id_pemateri = pemateri.id_pemateri
            SET Pendaftaran.judul = '$judul',
            Pendaftaran.id_pemateri = (SELECT id_pemateri FROM pemateri WHERE nama_pemateri = '$namaPemateri'), 
            Pendaftaran.deskripsi = '$deskripsi', 
            Pendaftaran.kuota = '$kuota', 
            Pendaftaran.tgl_mulai = '$tglMulai', 
            Pendaftaran.tgl_selesai = '$tglSelesai', 
            Pendaftaran.lama_Pendaftaran = '$lamaPendaftaran', 
            Pendaftaran.lokasi = '$lokasi', 
            Pendaftaran.gambar = '$gambar', 
            Pendaftaran.biaya = '$biaya', 
            Pendaftaran.status = '$status'
            WHERE Pendaftaran.id_Pendaftaran = '$idPendaftaran'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
?>

<!-- numpang script js di sini untuk sweet alert hehe -->
<script text="text/javascript">
  function pesan(kata) {
    swal({
      text: kata,
      button: false,
    });
  }

  function sweetConfirm(alamat) {
    Swal.fire({
      title: 'Ciuss niih?',
      text: "Yakin, sama pilihannya?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, yakin',
      cancelButtonText: 'Batalkan'
    }).then((result) => {
      if (result.value) {
        window.location.href = alamat;
      }
    });
  }

  function alertSucces(kata) {
    swal({
      icon: "success",
      text: kata,
      showConfirmButton: false,
    });
  }

  function alertFail(kata) {
    swal({
      icon: "error",
      text: kata,
      showConfirmButton: false,
    });
  }

  function alertSuccesGo(kata, alamat) {
    swal({
      icon: "success",
      text: kata,
      showConfirmButton: false,
    }).then(function() {
      window.location.href = alamat;
    });
  }

  function alertFailGo(kata, alamat) {
    swal({
      icon: "error",
      text: kata,
      showConfirmButton: false,
    }).then(function() {
      window.location.href = alamat;
    });
  }
</script>
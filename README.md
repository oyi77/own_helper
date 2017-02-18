# own_helper
Custom UserMade Helper for CodeIgniter

Untuk menggunakan Custom Helper ini caranya : 
1. Download repositori ini
2. Masuk ke direktori CodeIgniter lalu ke system -> helper
3. Pastekan file own_helper.php kedalamnya
4. Agar bisa digunakan pada autoload di bagian helper masukkan 'own'
5. Dan helper siap digunakan 

Fungsi yang bisa digunakan antara lain :

1. LOGIN
  cara untuk mempermudah pembuatan login di controller dengan ini sudah tidak perlu bikin model lagi dan otomatis membuat session berdasarkan primary key dari tabelnya
  syntaxnya : 
  login('nama_tabel_diDB', 'username', 'password');
  
  jika password anda menggunakan enkripsi bisa juga langsung dimasukkan pada parameter ke 4
  syntaxnya :
  login('nama_tabel_diDB', 'username', 'password', 'tipe_enkripsi');
  
  tipe enkripsi yang bisa digunakan : 
  - md5
  - password_hash
  
2. REGISTER
  cara termudah untuk membuat action register di controller namun syaratnya ketika membuat form input name nya harus sama dengan kolom didatabase 
  kemudian buat variabel $data = $this->input->post();
  syntaxnya :
  register('nama_table', $data);
  
3. SET SESSION
  cara lebih singkat untuk membuat sesi
  syntaxnya : 
  set_sesi('nama_sesi', 'datanya');
  
4. AMBIL SESSION
  cara lebih singkat untuk mengambil sesi
  syntaxnya :
  ambil_sesi('nama_sesi');
  
5. HAPUS SESSION
  cara lebih singkat untuk menghapus atau mengunset sesi
  syntaxnya : 
  -Untuk destroy session
    hapus_sesi();
  -Untuk unset session 
   hapus_sesi('nama_sesi');
   
6. CEK VARIABEL ARRAY
  untuk melakukan cek variable array, hasil pemersingkat dan menjadikan rapi dari print_r
  syntaxnya :
  echo cek(variabel_arraynya);
  
7. ALERT DI PHP
  untuk membuat alert menggunakan php, hasil pemersingkat dari javascript
  syntaxnya :
  echo alert('pesannya');
  
8. MENGAMBIL NAMA COLUMN YANG DIJADIKAN PRYMARY KEY DI DB
  untuk mengambil nama kolom yang merupakan primary_key di database
  syntaxnya :
  ambil_primary('nama_tabel_diDB');

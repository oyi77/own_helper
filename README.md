# own_helper
Custom UserMade Helper for CodeIgniter

Untuk menggunakan Custom Helper ini caranya : 
  * Download repositori ini
  * Masuk ke direktori CodeIgniter lalu ke system -> helper
  * Pastekan file own_helper.php kedalamnya
  * Agar bisa digunakan pada autoload di bagian helper masukkan 'own'
  * Dan helper siap digunakan 

Fungsi yang bisa digunakan antara lain :

1. LOGIN
  cara untuk mempermudah pembuatan login di controller dengan ini sudah tidak perlu bikin model lagi dan otomatis membuat session berdasarkan primary key dari tabelnya
  
  syntaxnya : 
  ```php
  login('nama_tabel_diDB', 'username', 'password');
  ```
  
  jika password anda menggunakan enkripsi bisa juga langsung dimasukkan pada parameter ke 4
  syntaxnya :
  ```php
  login('nama_tabel_diDB', 'username', 'password', 'tipe_enkripsi');
  ```
  
  tipe enkripsi yang bisa digunakan : 
  - md5
  - password_hash
  
2. REGISTER
  cara termudah untuk membuat action register di controller namun syaratnya ketika membuat form input name nya harus sama dengan kolom didatabase kemudian buat variabel : 
  ```
  $data = $this->input->post();
  //ini akan otomatis membuat array sesuai dengan database
  ```
  atau bisa juga dengan di deskripsi secara manual :
  ```php 
  	$data = array(
     'email' => $this->input->post('email'),
			  'password' => $this->input->post('password'),
     'confirm_password' => $this->input->post('confirm_password'),
			  'username' => $this->input->post('username')
     );
  ```
  jika ingin menggunakan konfirmasi password gunakan seperti contoh diatas untuk namanya
  
  syntaxnya :
  ```php
  register('nama_table', $data);
  ```
  jika ingin password anda menggunakan enkripsi bisa juga langsung dimasukkan pada parameter ke 3
  syntaxnya :
  ```php
  register('nama_tabel_diDB', $data, 'tipe_enkripsi');
  ```
  
  tipe enkripsi yang bisa digunakan : 
  - md5
  - password_hash
  
3. SET SESSION
  cara lebih singkat untuk membuat sesi
  syntaxnya : 
  ```php
  set_sesi('nama_sesi', 'datanya');
  ```
  
4. AMBIL SESSION
  cara lebih singkat untuk mengambil sesi
  syntaxnya :
  ```php
  ambil_sesi('nama_sesi');
  ```
5. HAPUS SESSION
  cara lebih singkat untuk menghapus atau mengunset sesi
  syntaxnya : 
  
  -Untuk destroy session
  ```php
    hapus_sesi();
  ```
  
  -Untuk unset session 
  ```php
    hapus_sesi('nama_sesi');
  ```
  
6. CEK VARIABEL ARRAY
  untuk melakukan cek variable array, hasil pemersingkat dan menjadikan rapi dari print_r
  syntaxnya :
  ```php
  echo cek(variabel_arraynya);
  ```
  
7. ALERT DI PHP
  untuk membuat alert menggunakan php, hasil pemersingkat dari javascript
  syntaxnya :
  ```php
  echo alert('pesannya');
  ```
  
8. MENGAMBIL NAMA COLUMN YANG DIJADIKAN PRYMARY KEY DI DB
  untuk mengambil nama kolom yang merupakan primary_key di database
  syntaxnya :
  ```php
  ambil_primary('nama_tabel_diDB');
  ```

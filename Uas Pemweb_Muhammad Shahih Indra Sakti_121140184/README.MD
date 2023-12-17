**MUHAMMAD SHAHIH INDRA SAKTI**
**121140184**

Bagian 1: Client-side Programming
1.1 membuat halaman tampilan table data penjualan gadget disertai CRUD. membuat form input dengan 5 data Menampilkan data dari server kedalam index menggunakan tag `table`

1.2 Membuat beberapa event untuk menghandle interaksi pada halaman web berupa input

Bagian 2: Server-side Programming 
2.1 Implementasikan script PHP untuk mengelola data dari formulir pada diatas file create, edit, delete menggunakan variabel `$_POST`  dan `$_GET`.


2.2  Buatlah sebuah objek PHP berbasis OOP yaitu `Connection` dan `Lagu`yang merupakan turunan dari `Connection` yang memiliki metode dan menggunakan objek tersebut dalam skenario koneksi ke database dan crud.


Bagian 3: Database Management
3.1 Buatlah sebuah tabel pada database MySQL

Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata :
   CREATE TABLE Lagu (
    id_lagu INT PRIMARY KEY AUTO_INCREMENT,
    nama_lagu VARCHAR(255),
    penyanyi VARCHAR(255),
    jumlah_terjual INT,
    tanggal_rilis DATE,
    genre VARCHAR(255)
);

INSERT INTO Lagu (nama_lagu, penyanyi, jumlah_terjual, tanggal_rilis, genre) VALUES
    ('Love Story', 'Taylor Swift', 500000, '2020-01-15', 'pop'),
    ('Bohemian Rhapsody', 'Queen', 750000, '1975-10-31', 'rock'),
    ('Whats Going On', 'Marvin Gaye', 300000, '1971-05-21', 'jazz'),
    ('Shape of You', 'Ed Sheeran', 900000, '2017-01-06', 'pop'),
    ('Stairway to Heaven', 'Led Zeppelin', 700000, '1971-11-08', 'rock'),
    ('Fly Me to the Moon', 'Frank Sinatra', 400000, '1964-06-29', 'jazz'),
    ('Someone Like You', 'Adele', 600000, '2011-01-24', 'pop'),
    ('Hotel California', 'Eagles', 800000, '1976-12-08', 'rock'),
    ('Take Five', 'Dave Brubeck', 250000, '1959-09-21', 'jazz'),
    ('Dancing Queen', 'ABBA', 550000, '1976-08-15', 'pop');

3.2  membuat konfigurasi koneksi ke database MySQL pada file `classConnection`.

3.3  melakukan manipulasi data pada tabel database dengan menggunakan query SQL dalam form crud. Misalnya, tambah data `$_POST`, ambil data `$_GET`, atau update data `$_POST`.

Bagian 4: State Management
4.1 membuatlah skrip PHP yang menggunakan session untuk menyimpan state pengguna user kedalam variabel global `$_SESSION` dengan isi :  
 $_SESSION['form_data'] = compact('nama_lagu', 'penyanyi', 'jumlah_terjual', 'tanggal_rilis', 'genre')
.

4.2 menerapkan manajemen status (state) dengan memanfaatkan cookie dan penyimpanan lokal pada sisi klien menggunakan JavaScript. Sertakan skrip khusus yang akan dieksekusi saat pengguna berada di halaman indeks, untuk memastikan pengelolaan data status yang efektif dan responsif.

Bagian Bonus: Hosting Aplikasi Web 

- Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
 Dengan memilih provider hosting website yang gratis, lalu daftar dan login, setelah itu request untuk buat websitenya, buat database lalu atur cpanel.

- Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
 Pilihan penyedia layanan yang optimal telah dibuat, mempertimbangkan faktor biaya, khususnya karena hosting gratis di 000webhost tidak menimbulkan beban biaya bulanan atau tahunan, menjadikannya opsi yang hemat biaya.
 Layanan ini juga sangat sesuai untuk proyek-proyek kecil atau eksperimen, menyediakan lingkungan pengembangan yang lengkap.
 Proses pendaftaran dan konfigurasi dengan 000webhost berlangsung dengan cepat, memungkinkan pengguna untuk segera memulai hosting situs web tanpa menunggu lama.
 Layanan hosting gratis ini dirancang khusus untuk pemula yang mungkin belum memiliki pengetahuan mendalam tentang administrasi server, dengan menyajikan panel kontrol yang sederhana.

- Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
 Keamanan aplikasi web yang dihosting telah ditingkatkan dengan menggunakan Protokol HTTPS digunakan untuk mengenkripsi data yang dikirimkan

- Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
 Konfigurasi server yang digunakan untuk hosting gratis ini tidak banyak, mungkin hanya dengan mengkonfigurasikan versi PHP.

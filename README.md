- Aplikasi Point Of Sale
- Tools: Laravel 9, Blade, PHP 8.0, Javascript, Jquery, Bootstrap 5, Laragon/xampp, VSCode, Chrome, Yajra datatable v10.
- Cara Clone Project:
  1. clone projectnya bisa pake gitbash, (git clone https://projectnya...)
  2. buka projectnya di text editor (vscode)
  3. buka terminal lalu ketik "composer install atau update" untuk install atau update package dependensi nya dan lainnya (jika ada pesan error baca errornya lalu perbaiki. jika error pada versi php nya silahkah switch dulu ke versi php yg dibutuhkan si projectnya).
  4. copy file env.example dengan nama ".env"
  5. ke terminal ketik "php artisan key:generate". 
  6. pada file .env, isi koneksi dan nama database dan lainnya. co: DB_CONNECTION=mysql (ini pakai dbms apa), DB_DATABASE=namanya_bebas (saran saya samakan dengan nama projectnya), DB_USERNAME=root DB_PASSWORD= (defaultnya seperti ini).
  7. create database nya di dbms dan namanya harus sama dengan DB_DATABASE
  8. ke terminal ketik "php artisan migrate --seed". (pakai --seed karena saya ada sedikit sample factory data nya di file seedernya, tidak pakai juga ga masalah)
  9. ke terminal ketik "npm i/npm install", setelah beres instal lalu "npm run dev"
  10. ke terminal ketik "php artisan serve" untuk jalanin server laravelnya (atau pake apache juga boleh), lalu buka di web browser projectnya

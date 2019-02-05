#setup mysql

#### command mysql
    1. cek validation password dan policy mysql
```
    SHOW VARIABLES LIKE 'validate_password%';
```
    2. set global value untuk policy mysql
```
    SET GLOBAL validate_password_number_count = 0
```
    **validate_password_number_count bisa di ganti dengan validation yang lain yang ada saat langkah 1 dijalankan

    3. ganti akses user dan password database
```
    ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
```
    4. jalankan perintah berikut setelah selesai langkah 3
```
    FLUSH PRIVILEGES;
```
    4. buka [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

        ** jika masih ada error 404 jalnkan perintah berikut

        1. sudo nano /etc/apache2/apache2.conf
        2. Include /etc/phpmyadmin/apache.conf
        3. save
        4. sudo /etc/init.d/apache2 restart

#### error pada php7.2
    jika menggunakan php 7.2 kemunginan ada error
    “Warning in ./libraries/sql.lib.php#613 count(): Parameter must be an array or an object that implements Countable”
    solusi dari masalah di atas jalankan perintah berikut

    1. backup sql.lib.php
```
    sudo cp /usr/share/phpmyadmin/libraries/sql.lib.php /usr/share/phpmyadmin/libraries/sql.lib.php.bak
```
    2.edit file tersebut
```
sudo nano /usr/share/phpmyadmin/libraries/sql.lib.php
```
    3. pencet CTRL + W dan cari (count($analyzed_sql_results['select_expr'] == 1)
    4. ganti (count($analyzed_sql_results['select_expr'] == 1) dengan ((count($analyzed_sql_results['select_expr']) == 1)
    5. save
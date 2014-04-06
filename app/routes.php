<?php
# Halaman muka, untuk menampilkan semua data biodata yang ada. [localhost:8000/]
Route::get('/', array('as' => 'beranda', 'uses' => 'BiodataController@index'));

# Halaman yang berisi Form inputan Biodata baru [localhost:8000/buat]
Route::get('buat', array('as' => 'baru', 'uses' => 'BiodataController@baru'));

# Memproses Form lalu mengirimnya kedalam database [localhost:8000/buat]
Route::post('buat', array('as' => 'buat', 'uses' => 'BiodataController@buat'));

# Menampilkan Biodata perorangan [localhost:8000/lihat/{id}]
Route::get('lihat/{id}', array('as' => 'lihat', 'uses' => 'BiodataController@lihat'));

# Form untuk mengubah isi Biodata dalam database [localhost:8000/ubah/{id}]
Route::get('ubah/{id}', array('as' => 'ubah', 'uses' => 'BiodataController@ubah'));

# Memproses Form lalu mengirim yang baru kedalam database [localhost:8000/ubah/{id}]
Route::put('ubah/{id}', array('as' => 'ganti', 'uses' => 'BiodataController@ganti'));

# Tindakan untuk menghapus Biodata [localhost:8000/{id}/hapus]
Route::get('hapus/{id}', array('as' => 'hapus', 'uses' => 'BiodataController@hapus'));
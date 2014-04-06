<?php
class Biodata extends Eloquent {
	# Penamaan tabel yang digunakan
	protected $table = 'biodata';
	# MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)
	protected $fillable = array('nama', 'usia', 'jenis_kelamin', 'telepon', 'email');
}
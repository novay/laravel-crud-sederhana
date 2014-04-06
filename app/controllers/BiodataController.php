<?php
class BiodataController extends BaseController {
	# GET localhost:8000/
	public function index() {
		# Tarik semua isi tabel biodata kedalam variabel
		$biodata = Biodata::all();
		# Tampilkan View
		return View::make('biodata.index', compact('biodata'));
	}

	# GET localhost:8000/buat
	public function baru() {
		# Buat dropdown jenis kelamin
		$jenis_kelamin = array(
			'Laki-laki' => 'Laki-laki', 
			'Perempuan' => 'Perempuan');
		# Tampilkan halaman pembuatan biodata
		return View::make('biodata.buat', compact('jenis_kelamin'));
	}

	# POST localhost:8000/buat
	public function buat() {
		# Tarik semua inputan dari form kedalam variabel input
		$input = Input::all();
		# Buat aturan validasi
		$aturan = array(
			'nama' => 'required|min:3', 
			'usia' => 'required', 
			'telepon' => 'required', 
			'email' => 'required|email'
		);
		# Buat pesan error validasi manual
		$pesan = array(
			'nama.required' => 'Inputan Nama wajib diisi.',
			'nama.min' => 'Inputan Nama minimal 3 karakter.',
			'usia.required' => 'Inputan Usia wajib diisi.',
			'telepon.required' => 'Inputan Telepon wajib diisi.',
			'email.required' => 'Inputan Email wajib diisi.',
			'email.email' => 'Inputan harus berupa Email.'
		);
		# Validasi
		$validasi = Validator::make($input, $aturan, $pesan);
		# Bila validasi gagal
		if($validasi->fails()) {
			# Kembali kehalaman yang sama dengan pesan error
			return Redirect::back()->withErrors($validasi)->withInput();
		# Bila validasi sukses
		} else {
			# Buatkan variabel tiap inputan
			$nama = Input::get('nama');
			$usia = Input::get('usia');
			$jenis_kelamin = Input::get('jenis_kelamin');
			$telepon = Input::get('telepon');
			$email = Input::get('email');
			# Isi kedalam database
			Biodata::create(compact('nama', 'usia', 'jenis_kelamin', 'telepon', 'email'));
			# Kehalaman beranda dengan pesan sukses
			return Redirect::route('beranda')->withPesan('Biodata baru berhasil ditambahkan.');
		}
	}

	# GET localhost:8000/lhat/{id}
	public function lihat($id) {
		# Ambil data dalam berdasarkan berdasarkan id
		$biodata = Biodata::find($id);
		# Tampilkan view
		return View::make('biodata.lihat', compact('biodata'));
	}

	# GET localhost:8000/ubah/{id}
	public function ubah($id) {
		# Buat dropdown jenis kelamin
		$jenis_kelamin = array(
			'Laki-laki' => 'Laki-laki', 
			'Perempuan' => 'Perempuan');
		# Tentukan biodata yang ingin diubah berdasarkan id
		$biodata = Biodata::find($id);
		# Tampilkan view
		return View::make('biodata.ubah', compact('jenis_kelamin', 'biodata'));
	}

	# PUT localhost:8000/ubah/{id}
	public function ganti($id) {
		# Tarik semua inputan dari form kedalam variabel input
		$input = Input::all();
		# Buat aturan validasi
		$aturan = array(
			'nama' => 'required|min:3', 
			'usia' => 'required', 
			'telepon' => 'required', 
			'email' => 'required|email'
		);
		# Buat pesan error validasi manual
		$pesan = array(
			'nama.required' => 'Inputan Nama wajib diisi.',
			'nama.min' => 'Inputan Nama minimal 3 karakter.',
			'usia.required' => 'Inputan Usia wajib diisi.',
			'telepon.required' => 'Inputan Telepon wajib diisi.',
			'email.required' => 'Inputan Email wajib diisi.',
			'email.email' => 'Inputan harus berupa Email.'
		);
		# Validasi
		$validasi = Validator::make($input, $aturan, $pesan);
		# Bila validasi gagal
		if($validasi->fails()) {
			# Kembali kehalaman yang sama dengan pesan error
			return Redirect::back()->withErrors($validasi)->withInput();
		# Bila validasi sukses
		} else {
			# Ubah isi database berdasarkan id
			$ganti = Biodata::find($id);

			$ganti->nama			= Input::get('nama');
			$ganti->usia 			= Input::get('usia');
			$ganti->jenis_kelamin 	= Input::get('jenis_kelamin');
			$ganti->telepon 		= Input::get('telepon');
			$ganti->email 			= Input::get('email');
			$ganti->save();
			# Kehalaman beranda dengan pesan sukses
			return Redirect::route('beranda')->withPesan('Biodata baru berhasil ditambahkan.');
		}
	}

	# DELETE localhost:8000/hapus/{id}
	public function hapus($id) {
		# Hapus biodata berdasarkan id
		Biodata::find($id)->delete();
		# Kembali kehalaman yang sama dengan pesan sukses
		return Redirect::back()->withPesan('Biodata berhasil dihapus.');
	}
}
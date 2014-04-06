<html>
	<head>
		<title>CRUD Biodata Sederhana</title>
	</head>
	<body>
		<h3>Daftar Biodata</h3>
		<!-- Siapkan variabel pesan untuk menampilkan isinya bila diterima -->
		@if(Session::has('pesan'))
			{{ Session::get('pesan') }}
		@endif
		<!-- Jika tabel biodata memiliki isi, tampilkan isi berikut -->
		@if($biodata->count())
		<!-- Siapkan tombol untuk membuat biodata baru -->
		<p><a href="{{ route('baru') }}">Tambah</a></p>
		<table>
			<thead>
				<tr>
					<th>Nama</th>
					<th>Usia</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- Lakukan Perulangan untuk menampilkan seluruh isi tabel -->
				@foreach($biodata as $data)
				<tr>					
					<td>{{ $data->nama }}</td>
					<td>{{ $data->usia }}</td>
					<td>{{ $data->jenis_kelamin }}</td>
					<td>{{ $data->telepon }}</td>
					<td>{{ $data->email }}</td>
					<!-- Siapkan tombol untuk edit dan hapus item tertentu -->
					<td>
						<a href="{{ route('lihat', $data->id) }}">Lihat</a>
						<a href="{{ route('ubah', $data->id) }}">Edit</a>
						<a href="{{ route('hapus', $data->id) }}">Hapus</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- Sedangkan, bila tidak ada isinya, tampilkan isi berikut -->
		@else
		<p>Anda belum memiliki isi pada tabel biodata.</p>
		<p><a href="{{ route('baru') }}">Tambah</a></p>
		@endif
	</body>
</html>
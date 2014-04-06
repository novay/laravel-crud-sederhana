<html>
	<head>
		<title>Biodata {{ $biodata->nama }}</title>
	</head>
	<body>
		<h2>Informasi Biodata</h2>
		<p>Nama : {{ $biodata->nama }}</p>
		<p>Usia : {{ $biodata->usia }}</p>
		<p>Jenis Kelamin : {{ $biodata->jenis_kelamin }}</p>
		<p>Telepon : {{ $biodata->telepon }}</p>
		<p>Email : {{ $biodata->email }}</p>
		<br/>
		<a href="{{ route('beranda') }}">Kembali ke Index</a>
	</body>
</html>
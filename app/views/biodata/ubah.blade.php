<html>
	<head>
		<title>Ubah Biodata {{ $biodata->nama }}</title>
	</head>
	<body>
		<h2>Ubah Informasi Biodata</h2>
		<!-- Kita gunaka model karena kita akan mengubah data yang telah ada -->
		{{ Form::model($biodata, array('route' => array('ganti', $biodata->id), 'method' => 'PUT')) }}
			{{ Form::label('nama', 'Nama') }}
			<!-- Parameter kedua merupakan value, jadi terlihat terisi dengan data nama sebelumnya -->
			{{ Form::text('nama', $biodata->nama) }}
			<!-- Bila ada errors validasi letakkan disini 
			variabel errors ($errors) berasal dari Controller ['withErrors'] -->
			@if($errors->has('nama'))
				{{ $errors->first('nama') }}
			@endif
			<br/>
			{{ Form::label('usia', 'Usia') }}
			{{ Form::text('usia', $biodata->usia) }}
			<!-- Penjelasan sama seperti diatas -->
			@if($errors->has('usia'))
				{{ $errors->first('usia') }}
			@endif
			<br/>
			{{ Form::label('jenis_kelamin', 'Jenis Kelamin') }}
			<!-- Untuk select, parameter 1 = id, parameter 2 = option, parameter 3 = value -->
			{{ Form::select('jenis_kelamin', $jenis_kelamin, $biodata->jenis_kelamin) }}
			@if($errors->has('jenis_kelamin'))
				{{ $errors->first('jenis_kelamin') }}
			@endif
			<br/>
			{{ Form::label('telepon', 'Telepon') }}
			{{ Form::text('telepon', $biodata->telepon) }}
			@if($errors->has('telepon'))
				{{ $errors->first('telepon') }}
			@endif
			<br/>
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', $biodata->email) }}
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
			<br/>
			{{ Form::submit('Ubah') }}
		{{ Form::close() }}
		<a href="{{ route('beranda') }}">Kembali ke index</a>
	</body>
</html>
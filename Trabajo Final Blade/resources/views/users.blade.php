<!DOCTYPE html>
<html>
<head>
	<title>users
	</title>
</head>
<body>

	<h1>Hola usuarios</h1>

	<ul>
		@foreach ($users as $user)
		<li>{{ $user }}</li>
		@endforeach
	</ul>

</body>
</html>
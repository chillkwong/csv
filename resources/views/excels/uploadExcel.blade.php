<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="/importClients" enctype="multipart/form-data">
		{{ csrf_field() }}
		
		<label>Upload File:</label>
		<input type="file" name="excel">
		<button type="submit">Submit</button>

	</form>

</body>
</html>
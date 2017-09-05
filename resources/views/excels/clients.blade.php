<!DOCTYPE html>
<html>
<head>
	<title>clients</title>
</head>
<body>
<table>
	<tr>
		<th>Price</th>
		<th>GIA no.</th>
	</tr>
	@foreach($clients as $client)
	<tr>
	<td> {{ $client->lab }} </td>
	<td> {{ $client->cut }} </td>
	</tr>
	@endforeach
</table>

</body>
</html>
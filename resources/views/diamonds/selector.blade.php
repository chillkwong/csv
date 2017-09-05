<!DOCTYPE html>
<html>
<head>
	<title>selector</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="/css/app.css">

</head>

<body class="container" >

    <div class="row" id="app">

    <form action="/diamonds" method="POST">
    	{{csrf_field() }}

    	      <div class="col-md-6">
	        <input type="submit" id="d"  name="color" value="D" class="btn btn-info" >
	        <input type="submit" id="e"  name="color" value="E" class="btn btn-info" >
	        <input type="submit" id="f"  name="color" value="F" class="btn btn-info" >
	        <input type="submit" id="g"  name="color" value="G" class="btn btn-info" >
	        <input type="submit" id="h"  name="color" value="H" class="btn btn-info" >
	        <input type="submit" id="i"  name="color" value="I" class="btn btn-info" >
	        <input type="submit" id="j"  name="color" value="J" class="btn btn-info" >
	      </div>

    	      <div class="col-md-6">
	        <input type="submit" id="EX"  name="cut" value="EX" class="btn btn-info" >
	        <input type="submit" id="VG"  name="cut" value="VG" class="btn btn-info" >
	        <input type="submit" id="GD"  name="cut" value="GD" class="btn btn-info" >
	        <input type="submit" id="FR"  name="cut" value="FR" class="btn btn-info" >	       
	      </div>

	      <div class="col-md-6">
	      	        <input type="range" name="price" value="Price">
	      </div>
    </form>



    </div>

<div class="table-responsive">
<table class="table table-hover">
	<tr class="info">
		<td>Price</td>
		<td>Shape</td>
		<td>Weight</td>
		<td>Color</td>
		<td>Clarity</td>
		<td>Cut</td>
		<td>Polish</td>
		<td>Symmetry</td>
		<td>Fluroscence</td>
		<td>Certificate</td>

	</tr>
	@foreach($diamonds as $diamond)
		<tr >
			<td>{{ $diamond->netPrice *1.1* $rate }}</td>
			<td>{{ $diamond->shape }}</td>
			<td>{{ $diamond->weight }}</td>
			<td>{{ $diamond->color }}</td>
			<td>{{ $diamond->clarity }}</td>
			<td>{{ $diamond->cut }}</td>
			<td>{{ $diamond->polish }}</td>
			<td>{{ $diamond->symmetry }}</td>
			<td>{{ $diamond->fluroscence }}</td>
			<td>{{ $diamond->certificate }}</td>

		</tr>
	@endforeach
  </table>
  {{ $diamonds->links() }}
</div>
<script src="/js/app.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/productdetails.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
    
<body>
	<dvi class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Product Details</h4>
			</div>
			<div class="card-body">
                <h5>Product Category : {{$data['category']}}</h5>
                <h5>Product Name : {{$data['name']}}</h5>
                <h5>Warranty Started : {{$data['startdate']}}</h5>
                <h5>Warranty Ends : {{$data['EndWarrenty']}}</h5>
                <a href="{{route('customer.search')}}" name="SIGNUP"  class="btn btn-info btn-sm">Back</a>
			</div>
		</div>
	</div>
	</dvi>
</body>
</html>
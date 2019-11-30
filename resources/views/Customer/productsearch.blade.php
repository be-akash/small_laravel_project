<!DOCTYPE html>
<html>
<head>
	<title>Customer Interface</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customer.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
    
<body>
	<dvi class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Customer Interface</h4>
			</div>
			<div class="card-body">
				<form action="/searchproduct" method="post">
					<div id="dynamic_container">
						<div class="input-group mt-3">
							<input type="text" autocomplete="off" name="code" id="code"  placeholder="Enter a unique code" class="form-control" required/>
							
						</div>
						<div  id='productList'></div>
						
						{{csrf_field()}}
                        
                        <div class="input-group mt-3">
                            <button class="search">Search</button>
						</div>
					</div>
					@csrf
					<div class="input-group mt-3">
				<p class="success">Want to add a product?</p>
				<a href="{{route('admin.index')}}" name="SIGNUP" class="btn btn-info btn-sm">Add Product</a>
                           
			</div>
				</form>
			</div>
		</div>
	</div>
	</dvi>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#code').keyup(function()
		{
			var query=$(this).val();
			if(query != ' ')
			{
				var _token=$('input[name="_token"]').val();
				$.ajax({
					url:"{{route('customer.fetch')}}",
					method:"post",
					data:{query:query,_token:_token},
					success:function(data)
					{
						console.log("Hello");
						$('#productList').fadeIn();
						$('#productList').html(data);
					}


				})

			}

		});
		$(document).on('click', 'li', function(){  
        $('#code').val($(this).text());  
        $('#productList').fadeOut();  
    }); 

	});
	
	
</script>
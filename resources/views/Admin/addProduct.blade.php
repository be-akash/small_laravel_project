
<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
    
<body>
	<dvi class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Product Selection</h4>
			</div>
			<div class="card-body">
				<form action="/addProduct" method="post">
					<div id="dynamic_container">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fab fa-product-hunt"></i></span>
							</div>
                            <select name="productcategory" id="productcategory" class="form-control input-lg dynamic" id="productcategory">
                                <option selected="true" value='0'>Select product category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->productcategoryid}}">{{$category->productcategoryname}}</option>
                                @endforeach
                            </select>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fab fa-product-hunt"></i></span>
							</div>
							<select name="productname" id="productname" class="form-control input-lg " >
                                <option value='0'>Select product name</option>
                            
                            </select>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-keyboard"></i></span>
							</div>
							<input type="text" name="Code" id="Code" placeholder="Enter a unique code" class="form-control" required/>
						</div>
                        
                        <div class="input-group mt-3">
                        	@if(session('message'))
                        	<div class="success">{{session('message')}}</div>
                        	@else


                            <div class="success">Unique code must be alphabet and exactly 7 letters</div>
                            @endif
						</div>

@csrf
					</div>
					</div>
					@if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
			<div >
				<button class="btn btn-success btn-sm float-right submit_btn"><i class="fas fa-arrow-alt-circle-right"></i> Submit</button>
				<div class="input-group mt-3">
				<p class="success">Want to search a product?</p>
				<a href="{{route('customer.search')}}" name="SIGNUP"  class="btn btn-outline-info btn-sm">Search</a>        
				</div>
			</div>
			

				</form>
				
			
	</div>
	</dvi>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('change','.dynamic',function(){
				var id=$(this).val();
				//console.log(id);
				$.ajax({
					type:'get',
					url:'{!!URL :: to('findProductName')!!}',
					data:{'productcategoryid':id},
					success:function(data){
						console.log('success');
						console.log(data);

						/*for(var i=0;i<data.length;i++){
							console.log(data[i].productname);
							$('#productname').append($('<option>').val(data[i].productnameid).text(data[i].productname) );
				   }*/
				  
				   $('#productname').children().remove().end()
.append('<option selected value="0">Select product name</option>') ;
				   $.each(data, function(index) {
				   	console.log(data[index].proudctname);
				   	$('#productname').append($('<option>').val(data[index].productnameid).text(data[index].proudctname) );
				   });


					},
					error:function()
					{

					}


				});


			});

		});
	</script>
</body>
</html>
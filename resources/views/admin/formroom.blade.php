<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Rentahouse | SETEC INSTITUTE</title>
</head>

<body>
	<div class="main">
			<main class="content ">
				<div class="container-fluid bg-light p-4">
					<div class="shadow-sm border p-4 bg-white rounded">

					<h1 class="h3 mb-5">Room</h1>
					<form
					action="{{ route('addrooms') }}"
					id="room__form"
					method="POST"
					>
					@csrf
						<div class="row">
						
							<div class="col-12 col-lg-6">
								<div class="form-group shadow-sm border p-4">
									<label >Title</label>
									<input type="text" 
									class="form-control mt-3" 
									id="title" 
									placeholder="Input"
									name="title"
									value="{{ old('title') }}"/>
								
									@error('title')
										<div class="text-danger">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group shadow-sm border p-4">
									<label >Description</label>
									<textarea class="form-control mt-3" 
									rows="4" 
									placeholder="description" 
									name="description"
									value="{{ old('description') }}"></textarea>								
								
									@error('lastname')
										<div class="text-danger">
											{{ $description }}
										</div>
									@enderror
								</div>

								<div class="form-group shadow-sm border p-4">
									<label >Address</label>
									<textarea class="form-control mt-3" 
									rows="4" 
									placeholder="Address" 
									name="address"
									value="{{ old('address') }}"></textarea>								
								
									@error('address')
										<div class="text-danger">
											{{ $message }}
										</div>
									@enderror	
								</div>														
															
							</div>

							<div class="col-12 col-lg-6">
								<div class="form-group shadow-sm border p-4">
									<label >Price</label>
									<input type="number" min="0.00" max="10000.00" step="0.01" 
									class="form-control mt-3" 
									id="price" 
									placeholder="0.00$" 
									name="price"
									value="{{ old('price') }}"/>
								
									@error('price')
										<div class="text-danger">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group shadow-sm shadow-sm border p-4">	
									<label >Room Quantity</label>
										<select class="custom-select my-1 mr-sm-2" 
										id="qty" 
										name="qty"
										value="{{ old('qty') }}">
											<option selected value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>

									<label class="mt-3">Room Status</label>
									<div class="custom-control custom-switch ">
										<input type="checkbox" 
										class="custom-control-input" 
										id="switch"
										name="available"
										value="1"/
										checked>
										<label class="custom-control-label" for="switch">Available</label>
									</div>	

								</div>						


								<div class="form-group shadow-sm border p-4">	
									<label>Number of Guest</label>
										<select 
										class="custom-select my-1 mr-sm-2" 
										id="inlineFormCustomSelectPref" 
										name="guest"
										value="{{ old('guest') }}">
											<option selected value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
										@error('guest')
										<div class="text-danger">
											{{ $message }}
										</div>
										@enderror
								</div>
								
								
								<div class="form-group shadow-sm border p-4">
									<label>Room Image</label>
									<div class="border">	
									<input 
									name="image" 
									type="file" 
									class="file" 
									data-show-preview="true">
									</div>
									@error('image')
									<div class="text-danger">
									{{ $message }}
									</div>
									@enderror	
								</div>						

							</div>

							<div class="col-12 col-lg-12 mt-4 pr-5">
								<div class="p-2 float-left">
									<div class="text-primary">tip</div>
									<div class="text-muted mt-1">Please check all form before click the button Add</div>
								</div>	

								<div class=" float-right">																	
									<button
										type="submit"
										class="btn btn-lg btn-success">
										Add
									</button>
									<button
										type="reset"
										class="btn btn-lg btn-secondary">
										Reset
									</button>							
								</div>
							</div>					
						</div> <!--endrow -->
						
						

					<form>	
				</div>
				</div>
			</main>
	</div>

</body>

</html>
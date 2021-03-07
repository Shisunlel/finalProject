@extends('layouts.default') @section('style')
<link rel="stylesheet" href="/css/main.css" />
@endsection @section('content')
<div class="main">
    <main class="content">
        <div class="container-fluid bg-light p-4">
            <div class="shadow-sm border p-4 bg-white rounded">
				
                <h1 class="h3 mb-5 text-center text-uppercase text-warning">
                   add new room
				</h1>
                <form
                    action="/room"
                    id="room__form"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3 shadow-sm border p-4">
                                <label>Title</label>
                                <input
                                    type="text"
                                    class="form-control mt-3"
                                    id="title"
                                    placeholder="John's Olivia Beautiful Riverside Apartment"
                                    name="title"
                                    value="{{ old('title') }}"
                                />

                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 shadow-sm border p-4">
                                <label>Description</label>
                                <textarea
                                    class="form-control mt-3"
                                    rows="4"
                                    placeholder="With an amazing balcony for you to enjoy with your s.o"
                                    name="description"
                                >{{ old('description') }}</textarea>

                                @error('lastname')
                                <div class="text-danger">
                                    {{ $description }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 shadow-sm border p-4">
                                <label>Address</label>
                                <textarea
                                    class="form-control mt-3"
                                    rows="4"
                                    placeholder="John's Street"
                                    name="address"
                                >{{ old('address') }}</textarea>

                                @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3 shadow-sm border p-4">
                                <label>Price</label>
                                <input
                                    type="number"
                                    min="0.00"
                                    max="500.00"
                                    step="0.01"
                                    class="form-control mt-3"
                                    id="price"
                                    placeholder="0.00$"
                                    name="price"
                                    value="{{ old('price') }}"
                                />

                                @error('price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 shadow-sm shadow-sm border p-4">
                                <label>Room Quantity</label>
                                <select
                                    name="qty"
                                    class="custom-select my-1 me-sm-2"
                                    id="qty"
                                    name="qty"
                                    value="{{ old('qty') }}"
                                >
                                    <option selected value="1">1</option>
                                    @for ($i = 2; $i < 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <p class="form-text">
                                    If you have more room of the same type
                                    change the control otherwise you can leave
                                    them untouched
                                </p>
                            </div>

                            <div class="mb-3 shadow-sm border p-4">
                                <label>Number of Guest</label>
                                <select
                                    class="custom-select my-1 me-sm-2"
                                    id="inlineFormCustomSelectPref"
                                    name="guest"
                                    value="{{ old('guest') }}"
                                >
                                    <option selected value="1">1</option>
                                    @for ($i = 2; $i < 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <p class="form-text">
                                    Basically how many people can fit the room
                                </p>
                                @error('guest')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 shadow-sm border p-4">
                                <label>Room Image</label>
                                <div class="border">
                                    <input
                                        name="image[]"
                                        type="file"
                                        accept=".png,.jpg,.jpeg,.webp,.svg"
                                        class="file"
                                        data-show-preview="true"
                                        multiple
                                    />
                                </div>
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
						
						<div class="col-12">
                            <div class="mb-3 shadow-sm border p-4">
                                <label>Available Facilities</label>
                                <div class="p-2">
									@foreach ($facilities as $facility)
										<div class="col-6 col-md-2 form-check form-check-inline">
											<input class="form-check-input" name="facility[]" type="checkbox" id="facility{{$loop->iteration}}" value="{{$facility->id}}">
											<label class="form-check-label" for="facility{{$loop->iteration}}">{{ $facility->facility }}</label>
										</div>
									@endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 pr-5">
                            <div class="p-2 float-left">
                                <div class="text-primary">tip</div>
                                <div class="text-muted mt-1">
                                    Please check all form before click the
                                    button Add
                                </div>
                            </div>

                            <div class="float-right">
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-success"
                                >
                                    Add
                                </button>
                                <button
                                    type="reset"
                                    class="btn btn-lg btn-secondary"
                                >
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--endrow -->
                </form>
            </div>
        </div>
    </main>
</div>
@endsection

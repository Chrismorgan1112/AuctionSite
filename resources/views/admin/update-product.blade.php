@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/updateProduct.css') }}">
@endpush

@section('content')
<div class="container col-6 mt-5">
    <div class="card">
        <h5 class="card-header">Update Product</h5>
        <div class="card-body">
            {{-- IPATH ACTION MASIH HARDCODE ID, NANTI HRS DIGANTI --}}
            <form enctype="multipart/form-data" method="POST" action="/api/update-product/{{ $product->product_id }}">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror"
                    name="category" id="category">
                        <option>Select Category</option>
                        {{-- Dynamically Show Category from DB --}}
                        @foreach ($categories as $c)
                            <option
                                @if($c->category_id == $product->category_id) selected @endif
                                value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                     name="title" id="title" value={{ $product->product_title }}>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                    name="description" id="description" cols="20" rows="5">{{ $product->product_desc }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Open Bid Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                     name="price" id="price" value={{ $product->product_price }}>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Bid Status</label>
                    <select class="form-select @error('status') is-invalid @enderror"
                    name="status" id="status">
                        <option
                            @if($product->status == 'open') selected @endif
                            value="open">Open</option>
                        <option
                            @if($product->status == 'close') selected @endif
                            value="close">Close</option>
                    </select>
                    @error('Status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">Close Bid Date</label>
                    <input type="datetime-local" name='end_date' class="@error('end_date') is-invalid @enderror">
                    @error('end_date')
                    <div class="invalid-feedback error-message">
                        {{ $message }}
                    </div>
                    @enderror                  
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Product Image</label>
                    <input class="form-control @error('image') is-invalid @enderror"
                     name="image" type="file" id="image">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-primary col-5 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

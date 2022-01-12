@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/welcomeStyle.css') }}">
@endpush

@section('content')
    @auth
        <div class="container">
            <div class="d-flex justify-content-evenly align-items-center flex-wrap content w-100">
                @foreach ($product as $prod)
                <div class="card product-card">
                    <img class="card-img-top" src="{{ Storage::url($prod->image_path) }}" alt="{{ $prod->product_title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $prod->product_title }}</h5>
                    <p class="card-text">{{ $prod->product_desc }}</p>
                    @if($prod->status == 'open')
                        <p class="text-success">Open Bid</p>
                    @else
                        <p class="text-danger">Close Bid</p>
                    @endif
                    @if (Auth::user()->role == 'admin')
                        <a href="/delete-product/{{ $prod->product_id }}" class="btn btn-danger mb-2">Delete Product</a>
                        <a href="/update-product/{{ $prod->product_id }}" class="btn btn-danger mb-2">Update Product</a>
                    @endif
                    <a href="{{ route('productDetail', $prod->product_id) }}" class="btn btn-primary">Product Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container">
            <div class="d-flex justify-content-evenly align-items-center flex-wrap content">
                @foreach ($product as $prod)
                <div class="card product-card">
                    <img class="card-img-top" src="{{ Storage::url($prod->image_path) }}" alt="{{ $prod->product_title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $prod->product_title }}</h5>
                    <p class="card-text">{{ $prod->product_desc }}</p>
                    @if($prod->status == 'open')
                        <p class="text-success">Open Bid</p>
                    @else
                        <p class="text-danger">Close Bid</p>
                    @endif
                    <a href="{{ route('productDetail', $prod->product_id) }}" class="btn btn-primary">Product Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endauth
@endsection

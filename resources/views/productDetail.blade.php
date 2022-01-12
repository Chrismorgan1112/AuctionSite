@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/productStyle.css') }}">
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <img src="{{ Storage::url($detailProduct->image_path) }}" alt="{{ $detailProduct->product_title }}" class="col-5">
            <div class="col-7">
                <h1>{{ $detailProduct->product_title }}</h1>
                <h5>Description : </h5>
                <p class="desc">{{ $detailProduct->product_desc }}</p>
                <h5>Open Bid Price : </h5>
                <p>Rp. {{ $detailProduct->product_price }} ,-</p>
                <h5>Status : </h5>
                @if($detailProduct->status == 'open')
                    <p class="text-success">Open</p>
                @else
                    <p class="text-danger">Close</p>
                @endif
                <h5>Close Bid Date: </h5>
                <p>{{ $detailProduct->end_date }}</p>
                @auth
                    @if (Auth::user()->role == 'customer' && $detailProduct->status == 'open')
                        <h3>Bid</h3>
                        <form action="/bid/{{ $detailProduct->product_id }}">
                            <div class="form-row justify-content-center">
                                <label for="price" class="col-2">Input Price : </label>
                                <input type="number" id="price" name="price" class="form-control col-10 @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="invalid-feedback error-message">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection

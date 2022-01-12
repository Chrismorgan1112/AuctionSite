@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-3">Cart</h3>
            <?php
                $number = 1;
                $grandTotal = 0;
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Final Bid Price</th>
                      </tr>
                </thead>
                @if (count($cart) != 0)
                <tbody>
                    @foreach ($cart as $crt)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $crt->product->product_title }}
                            </td>
                            <td>
                                {{ $crt->price }}
                            </td>
                        </tr>
                        <?php
                            $number += 1;
                            $grandTotal += $crt->price;
                        ?>
                    @endforeach
                </tbody>
                
                @else
                <tbody>
                    <tr>
                        <td>
                            No Data
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
            @if (count($cart) != 0)
                <div class="d-flex flex-row-reverse">
                    <p>Grand Total: Rp.{{ $grandTotal }},-</p>
                </div>
                <div class="d-flex flex-row-reverse">
                    <form action="/checkout" method="POST">
                        @csrf
                        <button type='submit' class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            @endif
    </div>
@endsection
@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-3">Bidding Item List</h3>
            <?php
                $number = 1;
                $grandTotal = 0;
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope='col'>Open Bid Price</th>
                        <th scope="col">Your Bidding Price</th>
                        <th scope="col">Delete</th>
                      </tr>
                </thead>
                @if (count($bidList) != 0)
                <tbody>
                    @foreach ($bidList as $item)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $item->product->product_title }}
                            </td>
                            <td>
                                {{ $item->product->product_price }}
                            </td>
                            <td>
                                {{ $item->price }}
                            </td>
                            <td>
                                <form action="/delete-item-bid/{{ $item->transaction_id }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type='submit' class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $number += 1;
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
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
    </div>
@endsection
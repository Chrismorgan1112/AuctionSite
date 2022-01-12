@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-3">Transaction Detail</h3>
            <?php
                $number = 1;
                $grandTotal = 0;
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Detail</th>
                        <th scope="col">Final Bid Price</th>
                      </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $trans->product->product_title }}
                            </td>
                            <td>
                                {{ $trans->product->product_desc }}
                            </td>
                            <td>
                                {{ $trans->price }}
                            </td>
                        </tr>
                        <?php
                            $number += 1;
                            $grandTotal += $trans->price;
                        ?>
                </tbody>
            </table>
    </div>
@endsection
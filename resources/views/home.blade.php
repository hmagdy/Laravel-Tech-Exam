@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Quantity in stock</th>
                        <th scope="col">Price per item</th>
                        <th scope="col">Datetime submitted</th>
                        <th scope="col">Total Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->datetime_submitted}}</td>
                        <td>{{$product->total}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td>{{$totalQuantity}}</td>
                        <td>{{$totalPrice}}</td>
                        <td></td>
                        <td>{{$total}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready( function () {
            $('.table').DataTable( {
                "order": [[ 3, "desc" ]],
                scrollCollapse: true,
                paging: false,
                searching: false,
                fixedColumns: true
            } );
        } );
    </script>
@endsection

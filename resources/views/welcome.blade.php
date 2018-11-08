@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
            <form id="product-form" action="{{url('/save/product')}}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="product">Product name</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Product name">
                </div>

                <div class="form-group">
                    <label for="product">Quantity in stock</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity in stock">
                </div>

                <div class="form-group">
                    <label for="product">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price per item">
                </div>
                <div class="form-group">
                    <input class="btn btn-lg btn-primary" id="submit" type="submit" value="Save" name="submit" />
                </div>

            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

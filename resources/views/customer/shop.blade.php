@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Shop</h3>
    <div class="row justify-content-center">
        <div id="shop_table_group" class="col-12">
            <table id="shop_table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>category</th>
                    <th>options</th>
                </tr>
            </thead>
            <tbody id="shop_tbody">
            </tbody>
            </table>
        </div>

        <div id="shop_form_group" class="col-12 d-none">
            <div class="d-flex justify-content-start mb-2">
                <button id="close_add_cart" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i></button>
            </div>
           <form id="shop_form">
                <div class="form-group">
                    <h6 class="text-center">Add to cart</h6>
                    <h6 id="product_name" class="text-center"></h6>
                    <div class="text-center"> In Stock: <span id="in_stock"></span></div>
                    <div class="text-center"> Price: <span id="product_price"></span></div>
                    <label>Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantity"/>
                </div>
                <div class="d-flex justify-content-end">
                    <button id="add_to_cart" type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add to Cart</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
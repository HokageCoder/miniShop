@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Products</h3>
    <div class="row justify-content-center">
        <div id="products_table_group" class="col-12">
            <div class="d-flex justify-content-end mb-2">
                <button id="add_products" type="button" class="btn btn-outline-primary">Add Products</button>
            </div>
            <table id="products_table" class="table table-striped table-bordered">
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
            <tbody id="products_tbody">
            </tbody>
            </table>
        </div>

        <div id="products_form_group" class="col-12 d-none">
            <div class="d-flex justify-content-start mb-2">
                <button id="close_add_products" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i></button>
            </div>
           <form id="product_form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantity"/>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="Price"/>
                </div>
                <div class="form-group">
                    <label>Catergory</label>
                    <input type="text" id="category" name="category" class="form-control" placeholder="Category"/>
                </div>
                
                <div class="d-flex justify-content-end">
                    <button id="save_product" type="button" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection
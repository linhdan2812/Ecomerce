@extends('layouts.admin-layout')
@section('content')
    <div class="col-md-12 mb-5">
        <h2>Add product</h2>
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Summary</label>
                <input type="text" name="summary" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <input type="text" name="size" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="cat_id" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Discount</label>
                <input type="text" name="discount" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category ID</label>
                <select class="form-control" name="cat_id" id="category_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand ID</label>
                <select class="form-control" name="brand_id" id="brand_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

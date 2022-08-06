@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="col-md-12 mb-5">
            <h2>Add product</h2>
            <form method="post" action="" enctype="multipart/form-data">
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
                    <select class="form-control" name="status" id="status">
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
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($brands as $item)
                            <option value="<?= $item->id ?>"><?= $item->title ?></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand_id">Brand ID</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        @foreach ($categories as $item)
                            <option value="<?= $item->id ?>"><?= $item->id ?></option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

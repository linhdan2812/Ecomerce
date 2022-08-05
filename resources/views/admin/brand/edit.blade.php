@extends('layouts.admin-layout')
@section('content')

<div class="col-md-12 mb-5">
    <h2>Add brand</h2>
    <form action="" method="post">
        @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $brand->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="status"></label>
                <select name="status" class="form-control" value="{{ $brand->status }}">
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
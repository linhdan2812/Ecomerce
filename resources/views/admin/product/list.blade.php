@extends('layouts.admin-layout')
@section('content')

<div class="col-md-12">
    <h2>This is product List</h2>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Slug</th>
              <th scope="col">Summary</th>
              <th scope="col">Description</th>
              <th scope="col">Photo</th>
              <th scope="col">Stock</th>
              <th scope="col">Size</th>
              <th scope="col">Condition</th>
              <th scope="col">Status</th>
              <th scope="col">Price</th>
              <th scope="col">Discount</th>
              <th scope="col">Is featured</th>
              <th scope="col">Category ID</th>
              <th scope="col">Brand ID</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->summary }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->photo }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->condition }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->discount }}</td>
                    <td>{{ $item->is_featured }}</td>
                    <td>{{ $item->cat_id }}</td>
                    <td>{{ $item->brand_id }}</td>
                </tr>
                
            @endforeach
          </tbody>
    </table>
</div>
@endsection
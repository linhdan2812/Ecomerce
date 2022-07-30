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
                    <th scope="col">Status</th>
                    <th scope="col"><a class="btn btn-primary" href="{{ route('admin.brand.add') }}">Add</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('admin.brand.edit',['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.brand.delete',['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

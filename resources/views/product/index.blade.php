@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('Products.create') }}">Create</a></li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
            <div class="col-md-9">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset($product->image) }}" alt="" width="66"></td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('Products.edit', ['id' => $product->id]) }}"
                                   class="btn btn-info btn-sm">Edit</a>
                                |
                                <a href="{{ route('Products.destroy', ['id' => $product->id]) }}"
                                   class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                    {{ $products->links() }}
            </div>
        </div>

    </div>
@endsection

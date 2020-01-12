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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('Products.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                               placeholder="Enter name" id="name" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                               placeholder="Enter price" id="price">
                    </div>

                    {{--<div class="form-group">--}}
                    {{--<label for="image">Browse an preview image</label>--}}
                    {{--<input type="file" name="image" class="form-control" id="image">--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="Leave a description" rows="10">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-outline-dark">Save post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

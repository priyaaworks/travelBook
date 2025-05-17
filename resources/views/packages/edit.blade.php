@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Package</h1>

    <form method="POST" action="/admin/package/update/{{ $package->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $package->title }}" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control" required>{{ $package->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Price (₹):</label>
            <input type="number" name="price" class="form-control" value="{{ $package->price }}" required>
        </div>

        <div class="form-group">
            <label>Current Image:</label><br>
            <img src="{{ asset('storage/'.$package->image) }}" alt="Package Image" width="200"><br><br>

            <label>Change Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Package</button>
    </form>
</div>
@endsection

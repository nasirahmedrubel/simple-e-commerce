@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <h4>Product Add</h4>
        <form action="{{url('/color')}}" method="post">
            @csrf
        <div class="form-group mb-2">
            <label for="color">Color Name</label>
            <input type="text" name='name' class="form-control" id="color">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div> {{-- Form row end --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{$color->id}}</td>
                        <td>{{$color->name}}</td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@extends('admin.admin-layouts.main')

@section('content')
<div class="container">
    @foreach ($getfiles as $item)
        <img src="{{url('$item')}}" alt="">
    @endforeach
</div>
@endsection
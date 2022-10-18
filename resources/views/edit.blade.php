@extends('layouts.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Topping
        </div>
        <form class="form-group" action="{{route('update',[$id, $toppingId])}}" method="post">
            @csrf
            {{-- @method('PUT') --}}
            <div class="card-body">
                <input class="form-control" name="toppings" value="{{$filteredTopping['type']}}" />
            </div>
            <div class="card-footer">
                <input class="btn btn-secondary" type="submit" value="Edit"/>
            </div>
        </form>
    </div>
@endsection

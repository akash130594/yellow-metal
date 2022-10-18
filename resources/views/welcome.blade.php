@extends('layouts.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Batter
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Id</td>
                    <td>Type</td>
                    <td>Name</td>
                    <td>batter</td>
                    <td>Topping</td>
                    <td>Actions</td>
                </tr>
                @foreach ($list as $item)
                    @foreach ($item['batters'] as $data)
                        @foreach ($item['topping'] as $top)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['type']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$data['type']}}</td>
                                <td>{{$top['type']}}</td>
                                <td>
                                    <a href="{{route('delete', [$item['id'], $top['id']])}}">Delete</a>
                                    <a style="float: right;" href="{{route('edit',[$item['id'], $top['id']])}}">Edit Topping</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Lists') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="table">
                    <thead>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($users as $data)
                        <tr>
                        <td>
                            @if($data->photo)
                            <img src="{{asset('profile/'.$data->photo)}}" class="profile">
                            @else
                            <img src="{{asset('noimg.png')}}" class="profile">
                            @endif
                        </td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->phone_number}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->address}}</td>
                        <td><a href="{{route('view',$data->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{route('edit',$data->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{route('delete',$data->id)}}" class="btn btn-danger" onclick="return(confirm('Are you sure delete this user ?'))"><i class="fa fa-trash"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.index') }}"> Back</a>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            
                        </tr>
                        
                            <tr>
                                <td>{{ $posts->firstname }}</td>
                                <td>{{ $posts->lastname }}</td>
                                <td>{{ $posts->age }}</td>

                               
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

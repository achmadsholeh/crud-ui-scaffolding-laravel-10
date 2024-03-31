@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif
                    <a href="{{ route('posts.create') }}"> Create</a>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->firstname }}</td>
                                <td>{{ $post->lastname }}</td>
                                <td>{{ $post->age }}</td>

                                <form onsubmit="return confirm('Anda Yakin ??')" action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Show</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                    
                                </form>
                            </tr>
                        @empty
                            
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

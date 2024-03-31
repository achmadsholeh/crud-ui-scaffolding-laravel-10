@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>
                <a href="{{ route('posts.index') }}"> Back</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('posts.update', $posts->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="card">
                        <div class="mt-4">
                            <label for="form-label">First Name</label>
                            <input type="text" name="firstname" value="{{ $posts->firstname }}" class="form-control form-control-sm" placeholder="First Name">
                        </div>
                        <div class="mt-4">
                            <label for="form-label">Last Name</label>
                            <input type="text" name="lastname" value="{{ $posts->lastname }}" class="form-control form-control-sm" placeholder="Last Name">
                        </div>
                        <div class="mt-4">
                            <label for="form-label">Age</label>
                            <input type="text" name="age" value="{{ $posts->age }}"  class="form-control form-control-sm" placeholder="Age">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-sm"> Update </button>
                            <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                            
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

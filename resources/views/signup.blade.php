@extends('layouts.app')


@section('title')
Sign Up
@endsection

@section('content')
    <div class="container">
        @if( session('success') )
            <div class="alert alert-success">
               You have successfulllly signed up! A mail has been sent to this effect.
            </div>
        @endif
        <h2>Enter your details below to subscribe to the Email Platform</h2>
        <form action="{{ config('app.url') . '/savesubscribers' }}" method="POST">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" />
            <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" />
            </div>
            <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" />
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
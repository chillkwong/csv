@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Account</div>

                <form method="POST" action="/settings/account">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                	<div class="form-group">
                		<label for="name">Name</label>
                		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                	</div>

                	<div class="form-group">
                		<label for="email">E-mail</label>
                		<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                	</div>

                	<button type="Submit" class="btn btn-primary">Update Account</button>
                </form>

                @if(count($errors)>0)
                	<div class="alert alert-danger">
                		<ul>
                			@foreach($errors->all() as $error )
                			<li>{{ $error }}</li>
                			@endforeach
                		</ul>
                	</div>
                @endif

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

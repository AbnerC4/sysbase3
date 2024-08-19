<!-- Username Field -->
<div class="col-sm-12">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $capacitacionUser->username }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $capacitacionUser->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $capacitacionUser->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $capacitacionUser->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $capacitacionUser->password }}</p>
</div>

<!-- Provider Field -->
<div class="col-sm-12">
    {!! Form::label('provider', 'Provider:') !!}
    <p>{{ $capacitacionUser->provider }}</p>
</div>

<!-- Provider Uid Field -->
<div class="col-sm-12">
    {!! Form::label('provider_uid', 'Provider Uid:') !!}
    <p>{{ $capacitacionUser->provider_uid }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $capacitacionUser->remember_token }}</p>
</div>


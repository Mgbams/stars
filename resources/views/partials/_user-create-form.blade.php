<div class="form-group">
    {{ Form::label('name', 'Nom', ['class' => 'name']) }}
    {{ Form::text('name',  '', ['id' => 'name', 'class' => 'form-control '.($errors->has('name') ? 'error':'')]) }}

        <!-- Error -->
    @if ($errors->has('name'))
    <div class="error nomError">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('email', 'Email', ['class' => 'email']) }}
    {{ Form::email('email', '', ['id' => 'email', 'class' => 'form-control  '.($errors->has('email') ? 'error':'')]) }}

    <!-- Error -->
    @if ($errors->has('email'))
    <div class="error prenomError">
        {{ $errors->first('email') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('password', 'Password')}} 
    {{ Form::password('password',array('class' => 'form-control  '.($errors->has('password') ? 'error':''))) }}

     <!-- Error -->
    @if ($errors->has('password'))
    <div class="error prenomError">
        {{ $errors->first('password') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('password_confirmation', 'Confirm Password')}} 
    {{ Form::password('password_confirmation',array('class' => 'form-control  '.($errors->has('password_confirmation') ? 'error':''))) }}

     <!-- Error -->
    @if ($errors->has('password_confirmation'))
    <div class="error prenomError">
        {{ $errors->first('password_confirmation') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('roles') }}
    {{ Form::select('roles', $roles, null, array('class'=>'form-control  '.($errors->has('roles') ? 'error':''), 'placeholder'=>'Please select ...')) }}

     <!-- Error -->
    @if ($errors->has('roles'))
    <div class="error prenomError">
        {{ $errors->first('roles') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::file('image'), ['id' => 'image', 'class' => 'form-control  '.($errors->has('image') ? 'error':'')] }}

    <!-- Error -->
    @if ($errors->has('image'))
    <div class="error fileError">
        {{ $errors->first('image') }}
    </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('name', 'Nom', ['class' => 'name']) }}
    {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control '.($errors->has('name') ? 'error':'')]) }}

        <!-- Error -->
    @if ($errors->has('name'))
    <div class="error nomError">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('email', 'Email', ['class' => 'email']) }}
    {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control  '.($errors->has('email') ? 'error':'')]) }}

    <!-- Error -->
    @if ($errors->has('email'))
    <div class="error prenomError">
        {{ $errors->first('email') }}
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

<!-- hidden input for saving a star's id -->
<div class="form-group">
    {{ Form::hidden('user_id', $user->id) }}
</div>

<div class="form-group">
    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
</div>
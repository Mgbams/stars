<div class="form-group">
                {{ Form::label('nom', 'Nom', ['class' => 'nom']) }}
                {{ Form::text('nom', old('nom'), ['id' => 'nom', 'class' => 'form-control '.($errors->has('nom') ? 'error':'')]) }}

                 <!-- Error -->
                @if ($errors->has('nom'))
                <div class="error nomError">
                    {{ $errors->first('nom') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('prenom', 'Prénom', ['class' => 'prenom']) }}
                {{ Form::text('prenom', old('prenom'), ['id' => 'prenom', 'class' => 'form-control  '.($errors->has('prenom') ? 'error':'')]) }}

                <!-- Error -->
                @if ($errors->has('prenom'))
                <div class="error prenomError">
                    {{ $errors->first('prenom') }}
                </div>
                @endif
            </div>

             <div class="form-group">
                {{ Form::label('description', 'description', ['class' => 'description']) }} <br />
                {{ Form::textarea('description', old('description'), 
                    ['id' => 'description', 'class' => 'form-conrol description '.($errors->has('description') ? 'error':''), 
                    'rows' => 5, 'placeholder'=> 'Entrez la description du star'
                    ]) 
                }}

                <!-- Error -->
                @if ($errors->has('description'))
                <div class="error descriptionError">
                    {{ $errors->first('description') }}
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
                {{ Form::hidden('star_id', $star->id) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
            </div>
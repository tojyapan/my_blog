<div class="col-xs-9">
  <div class="box">
  
    <div class="box-body ">

      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        @if ($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
        {!! Form::label('slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}

        @if ($errors->has('slug'))
          <span class="help-block">{{ $errors->first('slug') }}</span>
        @endif
      </div>
  
      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label('email') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}

        @if ($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}

        @if ($errors->has('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        {!! Form::label('password_confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

        @if ($errors->has('password_confirmation'))
          <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
        @if (! isset($hideRoleDropdown))
          {!! Form::label('role') !!}
          {!! Form::select('role', App\Role::pluck('display_name', 'id'), $user->exists ? $user->roles->first()->id : null, ['class' => 'form-control', 'placeholder' => 'Choose a role']) !!}  
        @endif
        
        @if ($errors->has('role'))
          <span class="help-block">{{ $errors->first('role') }}</span>
        @endif
      </div>

      <div class="form-group">
        {!! Form::label('bio') !!}
        {!! Form::textarea('bio', null, ['rows' => 5, 'class' => 'form-control']) !!}

        @if ($errors->has('bio'))
          <span class="help-block">{{ $errors->first('bio') }}</span>
        @endif
      </div>
  

    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save' }}</button>
      <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
</div>

@section('script')
    <script type="text/javascript">
      $('#name').on('blur', function() {
        let theName = this.value.toLowerCase().trim();
        let slugInput = $('#slug');
        let theSlug = theName.replace(/&/g, '-and-')
                              .replace(/[^ぁ-んァ-ン０-９a-zA-Z0-9\-]+/g, '-')
                              .replace(/\s/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
      });
    </script>
@endsection


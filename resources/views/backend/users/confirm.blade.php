@extends('layouts.backend.main')

@section('title', 'Myblog | Delete Confirmation')
    
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
                <small>Delete Confirmation</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                  <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                  <a href="{{ route('users.index') }}">User</a>
                </li>
                <li class="active">
                  Delete Confirmation
                </li>
            </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
              {!! Form::model($user, [
                'method' => 'DELETE',
                'route' => ['users.destroy', $user->id],
                ]) !!}
              @csrf

              <div class="col-xs-9">
                <div class="box">
                  <div class="box-body">
                    <p>
                      You have specified this user for deletion:
                    </p>
                    <p>
                      ID #{{ $user->id }}: {{ $user->name }}
                    </p>
                    <p>
                      What should be done with content own by this user?
                    </p>
                    <p>
                      <input type="radio" name="delete_option" value="delete" checked> Delete All Content
                    </p>
                    <p>
                      <input type="radio" name="delete_option" value="attribute"> Attribute content to:
                      {!! Form::select('selected_user', $users, null) !!}
                    </p>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                  </div>
                </div>
              </div>

              {!! Form::close() !!}
            </div>
          <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

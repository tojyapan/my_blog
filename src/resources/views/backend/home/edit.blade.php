@extends('layouts.backend.main')

@section('title', 'Myblog | Edit Account')
    
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Account
                <small>Edit account</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                  <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active">
                  Edit account
                </li>
            </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
              @include('backend.partials.message')
              {!! Form::model($user, [
                'method' => 'POST',
                'url' => '/edit-account',
                'id' => 'user-form'
                ]) !!}
              @csrf

              @include('backend.users.form', ['hideRoleDropdown' => true])

              {!! Form::close() !!}
            </div>
          <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

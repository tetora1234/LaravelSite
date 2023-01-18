@extends('layout.main')

@section('content')
{{ Form::open(['method'=>'post', 'route' => ['user.store'] ]) }}
<div class="d-flex flex-column align-items-center">
  <div class="mt-5">
    <label class="form-label">name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <div class="my-1">
    <label class="form-label">pw</label>
    <input type="text" class="form-control" name="pw" placeholder="pw">
  </div>
  <div class="my-1">
    <label class="form-label">mail</label>
    <input type="text" class="form-control" name="mail" placeholder="mail">
  </div>
  <div class="my-4">
    {{Form::submit('登録する', ['class'=>'btn btn-primary btn-lg'])}}
  </div>
</div>
{{ Form::close() }}
@endsection
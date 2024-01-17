@extends('layouts.Mainlayout')  
<script>
  Livewire.on('userRegistered', function() {
    print('successfully Registed ');
    window.location.href = '/task';
  });
</script>
@section('title','Register') 
<!-- @section('projectName')
  <h1 class="text-center font-bold text-2xl bg-gray-200 py-4">  User Registration Form </h1>
@endsection -->
@section('main-content')
@if($user)
  <livewire:register-user :user="$user" />
  @else
    <livewire:register-user />
  @endif
@endsection

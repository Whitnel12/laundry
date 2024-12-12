@extends('layouts.app')

@section('title','register')

@section('content')
  

        @if (session('success'))
          <div style="color: red">{{ session('success') }}</div>
        @endif

       <div>halaman home</div>
       <div>selamat datang {{ auth()->user()->name }}</div>
       
@endsection
  


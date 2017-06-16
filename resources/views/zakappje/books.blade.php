@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ZakAppje
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @isset ($requirement)
          <h1>{{$requirement->requirements_name}}</h1>
          @isset ($instructions)  
          @foreach ($instructions as $instruction)
            <p class="pre">{{strip_tags($instruction->instructions_desc)}}</p> 
          @endforeach
             
          @endisset
      @endisset
    </section>
  </div>
@endsection
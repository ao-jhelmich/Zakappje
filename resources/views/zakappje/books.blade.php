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
            <div class="pre">{{$instruction->instructions_desc}}</div> 
          @endforeach
          <p><iframe allowfullscreen="" frameborder="0" height="360" src="https://www.youtube.com/embed/L_jWHffIx5E?rel=0" width="640"></iframe></p>
             
          @endisset
      @endisset
    </section>
  </div>
@endsection
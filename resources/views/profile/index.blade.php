@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profiel van: {{Auth::user()->name}}
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      Naam: {{Auth::user()->name . Auth::user()->lastName}}
      Adress gegevens: {{Auth::user()->streetAdress . Auth::user()->houseNumber}}
      Stad: {{Auth::user()->city}}
    </section>
</div>
@endsection
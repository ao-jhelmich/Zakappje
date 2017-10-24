@extends('layout.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Klasseneisen van de dag!</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        @php
        foreach ($MainrequirementOfTheDay as $key => $value) {
         if ($value->mainrequirements_rank_id == Auth::user()->users_rank_id) {
              $mrName = $value->mainrequirements_name;
              $mrDesc = $value->mainrequirements_description;
           }  
        }
        @endphp 
        Vandaag staat, {{$mrName}} in het zonnetje.
        Dit betekent dat je dit tegen komt tijdens het programma. 
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
      <!-- /.box-footer-->
    </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Welkom bij het Zakappje!</h3>
      </div>
      <div class="box-body">
        <p>Je zal je zelf vast wel afvragen wat het Zakappje precies inhoud. Hieronder ga je dat vinden.</p>
        <p>Op dit "appje" zal je het klassieke verkenners boekje vinden. Hierdoor willen wij als leiding de klassen eisen vernieuwen op een wijze waardoor het toegankelijker word en vooral leuker om de eisen te behalen en de beste scout van jouw lichting te worden!</p>
        @if (Auth::check())
        <h3>Je bent ingelogd wat nu?</h3>
        <a href="#"></a>
        <p>Nu je ingelogd bent kan je gaan beginnen met het behalen van de eisen. Klik hieronder om naar de uitleg te gaan!</p>
        <p><a href="/uitleg"><button class="btn btn-block btn-succes" type="button">Uitleg!</button></a></p>
        
        @else
        <h3>Log eerst even in!</h3>
        <p>Je kan inloggen door rechts boven in op inloggen te drukken of druk hieronder op inloggen</p>
        <p>Mocht je nog geen account hebben maak dan een account aan!</p>
        <p><a data-toggle="modal" data-target="#loginModel" href="#"><button class="btn btn-block btn-primary" type="button">Log in</button></a></p>
        <a data-toggle="modal" data-target="#registerModel" href="#"><button class="btn btn-block btn-info" type="button">register</button></a>
        @endif
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      
    </section>
    <!-- /.content -->
  </div>
  @if (Auth::check())
  @if (!isset(Auth::user()->streetAdress, Auth::user()->houseNumber, Auth::user()->city, Auth::user()->postal_code, Auth::user()->user_phone_number, Auth::user()->user_parent_name, Auth::user()->user_parent_email, Auth::user()->user_parent_phone))
  <script>
  function askExtraInfo() {
  var answer = confirm ("We missen nog wat info van je! wil je die nu invullen?")
  if (answer)
  window.location="home/info";
  }
  askExtraInfo()
  </script>
  @endif
  @endif
  @endsection
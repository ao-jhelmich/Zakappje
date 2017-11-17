@extends('layout.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Uitleg over het Zakappje!</h3>
      </div>
      <div class="box-body">
        @if (!Auth::check())
          <h2>Log eerst even in</h2>
        @endif
        <p>Welkom op de uitleg pagina van het zakappje. Binnen dit "appje" vind je meerdere dingen. Over al deze dingen vind je hieronder wat uitleg.
        </p>
          <ul>
            <li>Klassen eisen aftekenen</li>
            <li>Leaderboard</li>
            <li>Profiel</li>
          </ul>
        <h4>Klassen eisen aftekenen</h4>
        <p>Hier links je een menu'tje staan met de naam Klasseneisen. Binnen dit menu vind je de actieve klasseneisen. Deze staan onderverdeeld in 4 klassen. 1e, 2e, 3e en 4e klasse. als je een van deze klassen aan klikt zie je de onderdelen die eronder vallen. Klik je op 1 van die klasseneisen dan zie je daar de onderdelen die daar bij horen. Mocht je zo op klasse 1 drukken dan zal je daaronder pionieren vinden en de knopen die bij pionieren klasse 1 horen. Klik je dan op de knoop die je wilt oefenen en of wilt laten aftekenen. Vind je de instructie pagina over het gekozen onderdeel en rechts boven in een knop met aftekenen. Als je denkt dat je hem goed kan klik dan op aftekenen. Dan verdwijnt voor jouw de knop en kan de leiding hem aftekenen voor jouw. Als dit perongeluk gaat dan verdwijnt de knop ook. Zeg dan even bij de volgende opkomst dat het perongeluk ging, dan word de aanvraag verwijdert.</p>
        <h4>Leaderboard</h4>
        <p>In dit leaderboard vind je alle verkenners en de afgeronde klasseneisen. Per klasse word je gerankt. Dus mocht je alle 1e klass onderdelen hebben gedaan dan ga je door naar de 2e klas leaderboard. En sta je weer onderaan de lijst.</p>
        <h4>Profiel</h4>
        <p>Op je profiel zie je jouw behaalde klassen. Maar ook de info die jij in hebt gevuld en een optie om die aan te passen.</p>
      </div>
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </section>
  
  <!-- /.content -->
</div>
@endsection
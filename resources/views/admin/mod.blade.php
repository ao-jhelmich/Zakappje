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
                <h3 class="box-title">Klassen eisen van de dag</h3>
            </div>
            <div class="box-body">
                <h3>Zet hieronder de klassen eis die bij jouw programma past!</h3>
                {{Form::open(['url' => 'mod/store', 'role' => 'form', 'method' => 'put'])}}
                {{Form::label('mainrequirement', 'mainrequirement', 'Sub klassen:' )}}
                {{Form::select('mainrequirement', $selectMainrequirement ,['class' => 'form-control'])}}
                {{Form::submit()}}
                {{Form::close()}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
    </section>
    <!-- /.content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$("#select option").val(function(idx, val) {
  $(this).siblings("[value='"+ val +"']").remove();
});
</script>
@endsection
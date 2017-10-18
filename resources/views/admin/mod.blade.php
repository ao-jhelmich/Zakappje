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
                
                
                <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                    <label for="lastName" class="col-md-4 control-label">Klasse 1:</label>
                    <div class="col-md-6">
                        <select id="select1" class="form-control select2" style="width: 100%;" required>
                            @foreach ($mainrequirementsRank1s as $mainrequirementsRank1)
                            <option>
                                {{$mainrequirementsRank1->mainrequirements_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <label>
                    Klasse 2:
                </label>
                <select class="form-control select2" style="width: 100%;">
                    @foreach ($mainrequirementsRank2s as $mainrequirementsRank2)
                    <option>
                        {{$mainrequirementsRank2->mainrequirements_name}}
                    </option>
                    @endforeach
                </select>
                <label>
                    Klasse 3:
                </label>
                <select class="form-control select2" style="width: 100%;">
                    @foreach ($mainrequirementsRank3s as $mainrequirementsRank3)
                    <option>
                        {{$mainrequirementsRank3->mainrequirements_name}}
                    </option>
                    @endforeach
                </select>
                <label>
                    Klasse 4:
                </label>
                <select class="form-control select2" style="width: 100%;">
                    @foreach ($mainrequirementsRank4s as $mainrequirementsRank4)
                    <option>
                        {{$mainrequirementsRank4->mainrequirements_name}}
                    </option>
                    @endforeach
                </select>
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
<script src="{{ asset('/css/adminlte/plugins/select2/select2.full.min.js')}}"></script>
<script>
$(function () {
//Initialize Select2 Elements
$(".select2").select2();
}
</script>
@endsection
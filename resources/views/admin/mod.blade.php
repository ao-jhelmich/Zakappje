@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div> 
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Klassen eisen van de dag</h3>
            </div>
            <div class="box-body">
                <h3>Zet hieronder de klassen eis die bij jouw programma past!</h3>
                {{Form::open(['url' => 'mod/set', 'role' => 'form', 'method' => 'put'])}}
                
                
                <div class="form-group">
                    <label for="lastName" class="col-md-4 control-label">Klasse 1:</label>
                    <select name="mainrequirementsRank1" class="form-control select2" style="width: 100%;" required>
                        @foreach ($mainrequirementsRank1s as $mainrequirementsRank1)
                            @php
                                if ($mainrequirementsRank1->ModFlag == 2){
                                    $selected = "selected";
                                }else{
                                    $selected = 'class';
                                }
                            @endphp
                            <option value="{{$mainrequirementsRank1->mainrequirements_id}}" {{$selected}}>
                                {{$mainrequirementsRank1->mainrequirements_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-md-4 control-label">Klasse 2:</label>
                    <select name="mainrequirementsRank2" class="form-control select2" style="width: 100%;">
                        @foreach ($mainrequirementsRank2s as $mainrequirementsRank2)
                         @php
                                if ($mainrequirementsRank2->ModFlag == 2){
                                    $selected = "selected";
                                }else{
                                    $selected = 'class';
                                }
                            @endphp
                        <option value="{{$mainrequirementsRank2->mainrequirements_id}}" {{$selected}}>
                            {{$mainrequirementsRank2->mainrequirements_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-md-4 control-label">Klasse 3:</label>
                    <select name="mainrequirementsRank3" class="form-control select2" style="width: 100%;">
                        @foreach ($mainrequirementsRank3s as $mainrequirementsRank3)
                        @php
                                if ($mainrequirementsRank3->ModFlag == 2){
                                    $selected = "selected";
                                }else{
                                    $selected = 'class';
                                }
                            @endphp
                        <option value="{{$mainrequirementsRank3->mainrequirements_id}}"{{$selected}}>
                            {{$mainrequirementsRank3->mainrequirements_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-md-4 control-label">Klasse 4:</label>
                    <select name="mainrequirementsRank4" class="form-control select2" style="width: 100%;">
                        @foreach ($mainrequirementsRank4s as $mainrequirementsRank4)
                        @php
                                if ($mainrequirementsRank4->ModFlag == 2){
                                    $selected = "selected";
                                }else{
                                    $selected = 'class';
                                }
                            @endphp
                        <option value="{{$mainrequirementsRank4->mainrequirements_id}}"{{$selected}}>
                            {{$mainrequirementsRank4->mainrequirements_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                {{Form::submit('Opslaan', array('class' => 'btn btn-block btn-flat', 'type' => 'button'))}}
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
@endsection
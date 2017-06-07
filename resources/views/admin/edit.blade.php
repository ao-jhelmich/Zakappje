@extends('layout.master')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>ZakAppje</h1>
        </section>
    <!-- Main content -->
    <section class="content">
    @php
        echo $Info;
    @endphp
    @foreach ($Info as $inf)
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit {{$tablename}}</h3>
            </div>
        <div class="box-body">   
            {{Form::open(['url' => 'admin/' . $inf->mr_id, 'role' => 'form', 'method' => 'put'])}}
                    {{ Form::hidden('tablename', $tablename)}}
                <div class="form-group">
                    {{ Form::label('name', $tablename . ' name: ') }}
                    {{ Form::text('name', $inf->mr_name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    @if ($tablename == "Instruction")
                    {{ Form::label('desc', 'Desc: ') }}
                    {{ Form::textarea('desc',null, ['id' => 'editor1']) }}
                    @else
                    {{ Form::label('desc', 'Desc: ') }}
                    {{ Form::text('desc', $inf->mr_description,['class' => 'form-control'])}}
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('select', 'Toekennen aan: ')}}
                    {{Form::select('select', $Select, $inf->mr_class_id,['class' => 'form-control'])}}
                </div>                
                <div class="form-group">
                    {{ Form::label('flag', 'Flag: ')}}
                    {{Form::select('flag', ['1' => 'Active', '0' => 'Unactive'], $inf->flag , ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                {{ Form::submit('Save')}}
                </div>
            {{Form::close()}}
    @endforeach
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
@endsection
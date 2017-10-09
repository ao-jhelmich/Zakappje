@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>ZakAppje</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (isset($mainRequirement))
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">
                {{Form::open(['url' => 'admin/mainrequirement/' . $mainRequirement->mainrequirements_id, 'role' => 'form', 'method' => 'put'])}}
                {{ Form::hidden('tablename', 'MainRequirement')}}
                <div class="form-group">
                    {{ Form::label('name', 'MainRequirement' . ' name: ') }}
                    {{ Form::text('name', $mainRequirement->mainrequirements_name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('desc', 'Desc: ') }}
                    {{ Form::text('desc', $mainRequirement->mainrequirements_description,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('select', 'Toekennen aan: ')}}
                    {{Form::select('select', $Select, $mainRequirement->mainrequirements_rank_id,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('flag', 'Flag: ')}}
                    {{Form::select('flag', ['1' => 'Active', '0' => 'Unactive'], $mainRequirement->flag , ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::submit('Save')}}
                </div>
                {{Form::close()}}
            </div>
        </div>
        @elseif(isset($requirement))
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">
                {{Form::open(['url' => 'admin/requirement/' . $requirement->requirements_id, 'role' => 'form', 'method' => 'put'])}}
                {{ Form::hidden('tablename', 'MainRequirement')}}
                <div class="form-group">
                    {{ Form::label('name', 'MainRequirement' . ' name: ') }}
                    {{ Form::text('name', $requirement->requirements_name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('select', 'Toekennen aan: ')}}
                    {{Form::select('select', $select, $requirement->requirements_mainrequirements_id,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('flag', 'Flag: ')}}
                    {{Form::select('flag', ['1' => 'Active', '0' => 'Unactive'], $requirement->flag , ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::submit('Save')}}
                </div>
                {{Form::close()}}
            </div>
        </div>
        @elseif(isset($instruction))
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">
                {{Form::open(['url' => 'admin/instruction/' . $instruction->instructions_id, 'role' => 'form', 'method' => 'put'])}}
                {{ Form::hidden('tablename', 'MainRequirement')}}
                <div class="form-group">
                    {{ Form::label('name', 'Instruction' . ' name: ') }}
                    {{ Form::text('name', $instruction->instructions_name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('desc', 'Desc: ') }}
                    {{ Form::textarea('desc',$instruction->instructions_desc, ['id' => 'editor1']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('select', 'Toekennen aan: ')}}
                    {{Form::select('select', $select, $instruction->instructions_requirements_id,['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('flag', 'Flag: ')}}
                    {{Form::select('flag', ['1' => 'Active', '0' => 'Unactive'], $instruction->flag , ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::submit('Save')}}
                </div>
                {{Form::close()}}
            </div>
        </div>
        @endif
    </section>
    <!-- /.content -->
</div>
@endsection
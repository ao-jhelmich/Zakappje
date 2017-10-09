@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ZakAppje
        </h1>
    </section>
    @php
    dd($mainRequirements);
    @endphp
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        @foreach ($mainRequirements->mainrequirements_rank_id as $id)
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$id->mainrequirements_rank_id}}</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($mainRequirements))
                        @foreach ($mainRequirements as $mainRequirement)
                        <tr>
                            <td>{{$mainRequirement->mainrequirements_name}}</td>
                            <td>
                                <a href="{{url('admin/mainrequirement/' . $mainRequirement->mainrequirements_id . '/edit')}}"><button class="btn btn-default">Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Naam</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            @endforeach
            
        </section>
        <!-- /.content -->
    </div>
    @endsection
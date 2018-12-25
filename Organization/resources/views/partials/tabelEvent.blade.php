<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->


@extends('layouts.master')

@section('content')
 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tabel Event</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

@if(session()->has('message'))
    @if (session()->get('message')== "Event sudah dikonfirmasi")
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
    @else
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
@endif
{{$table}}


@endsection
</html>
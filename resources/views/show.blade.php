@extends('layouts.admin')
@section('title')
@endsection
@section('css')
@endsection
@section('content')

    <div class="page-wrapper">

        <div class="container-fluid">

            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">

                        <div class="text-center">
                            <h2 class="text-dark mb-1 w-1000 text-truncate font-weight-medium">{{$post->body}}</h2>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('js')
@endsection

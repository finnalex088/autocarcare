@extends('layouts.admin')

@section('content')
<section class="dashboard">
       

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Employee</span>
                        <span class="number">{{$employee}}</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total Jobs</span>
                        <span class="number">{{$job}}</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Parts name</span>
                        <span class="number">{{$part}}</span>
                    </div>
                </div>
            </div>
@endsection
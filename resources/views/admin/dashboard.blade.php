@extends('layouts.admin')

@section('content')
<section class="dashboard">
       

        <div class="dash-content">
            <div class="overview">
                <div>
                <div class="title">
                    <div style="display:flex">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                   </div>
                   <div class="dropdown user">
                    <button class="dropbtn">Welcome, {{ auth()->user()->name }}</button>
                    <div class="dropdown-content">
                    <a href="{{route('userAddUpdate', ['id' => auth()->user()->id])}}">Profile</a>
                    </div>
                </div>
                </div>
            </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <a href="{{route('employee.index')}}"><span class="text">Total Employee</span></a>
                        <span class="number">{{$employee}}</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <a href="{{route('job_card.index')}}"><span class="text">Total Jobs</span></a>
                        <span class="number">{{$job}}</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                       <a href="{{route('partissue.index')}}"> <span class="text">Total Parts</span></a>
                       <span class="number">{{$part}}</span>
                    </div>
                </div>
            </div>
@endsection
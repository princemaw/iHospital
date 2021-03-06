@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
{!! HTML::script('js/staff.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/editStaffProfile')) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติส่วนตัว</h3>
  </div>
  <div class="panel-body">
    <div id ="staffProfile">
      <div class="row">
        <div class="col-md-4"> <span class="bold">ชื่อ : </span> <span id='staffName'>{{ $staff->name() }}</span>
        </div>
        <div class="col-md-8"><span class="bold">นามสกุล : </span> <span id='staffSurname'>{{ $staff->surname() }}</span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4"> <span class="bold">แผนก : </span> <span id='staffDepartment'>{{ $staff->department()->departmentName }}</span>
         <span id='departmentDropdown' style='display:none'>{!! Form::select('departmentId', $departments, $staff->department()->departmentId,["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}</span>
        </div>
        <div class="col-md-8"><span class="bold">อีเมล : </span> <span id='staffEmail'>{{ $staff->email() }}</span>
        </div>
      </div>
      <br>
      <br>
      <div id ='editProfileButton'>
        <button class ="btn btn-warning" onClick="editProfile()">แก้ไข</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop
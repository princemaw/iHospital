<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>iHospital</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
  <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">
  <link href="{{asset('css/calendar.css')}}" rel="stylesheet">
  @yield('css')
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/locales/bootstrap-datepicker.th.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker-thai.js')}}"></script>

  <!-- Calendar core JavaScript -->
  <script src="{{asset('js/underscore-min.js')}}"></script>
  <script src="{{asset('js/calendar.js')}}"></script>
  <script src="{{asset('js/language/th-TH.js')}}"></script>
  <script src="{{asset('js/jstimezonedetect/jstz.min.js')}}"></script>

  <!--Selectize search -->
   <link href="{{ asset('selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
  <!-- // <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
  <script type="text/javascript" src='{{ asset("selectize/js/standalone/selectize.min.js") }}'></script>
</head>

<body>

  <nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h3><a href="{{ url('/') }}">iHospital</a></h3>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">{{ Auth::user()->name }} &nbsp; {{ Auth::user()->lastname }}</a></li>
          <li><a href="{{ url('/doctorProfile') }}">ข้อมูลส่วนตัว</a></li>
          <li><a href="{{ url('/logout') }}">ออกจากระบบ</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="{{ Request::is('searchPatientProfileByDoctor') ? 'active' : '' }}">
            <a href="{{ url('/searchPatientProfileByDoctor') }}"> ค้นหาผู้ป่วย<span class="sr-only">(current)</span></a>
          </li>
          <li class="{{ Request::is('diagnose') ? 'active' : '' }}">
            <a href="{{ url('/diagnose') }}">บันทึกการวินิจฉัย</a>
          </li>
          <li class="{{ Request::is('doctorScheduleByDoctor') ? 'active' : '' }}">
            <a href="{{ url('/doctorScheduleByDoctor') }}">ตารางการออกตรวจ</a>
          </li>
          <li class="{{ Request::is('diagnosisHistory') ? 'active' : '' }}">
            <a href="{{ url('/diagnosisHistory') }}">สถิติการออกตรวจ</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @yield('content')
      </div>
    </div>
  </div>
</body>

<!-- selectize -->
<script type="text/javascript" src='{{ asset("js/searchSelectize.js") }}'></script>

</html>

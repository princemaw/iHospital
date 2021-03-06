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
  @yield('css')
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- // <script src="js/datepicker.js"></script> -->
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/locales/bootstrap-datepicker.th.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker-thai.js')}}"></script>
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
          <li><a href="{{ url('/patientProfile') }}">ข้อมูลส่วนตัว</a></li>
          <li><a href="{{ url('/logout') }}">ออกจากระบบ</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="{{ Request::is('createAppointment') ? 'active' : '' }}">
            <a href="{{ url('/createAppointment') }}">สร้างนัดหมาย<span class="sr-only">(current)</span></a>
          </li>
          <li class="{{ Request::is('editProfile') ? 'active' : '' }}">
            <a href="{{ url('/editProfile') }}">แก้ไขข้อมูลส่วนตัว</a>
          </li>
          <li class="{{ Request::is('patientAppointmentSchedule') ? 'active' : '' }}">
            <a href="{{ url('/patientAppointmentSchedule') }}">ตารางการนัดหมาย</a>
          </li>
          <li class="{{ Request::is('doctorList') ? 'active' : '' }}">
            <a href="{{ url('doctorList') }}">ข้อมูลแพทย์</a>
          </li>
          <li class="{{ Request::is('diagnosisRecord') ? 'active' : '' }}">
            <a href="{{ url('diagnosisRecord') }}">ประวัติการรักษา</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>

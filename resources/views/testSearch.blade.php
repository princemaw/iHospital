<head>
  <link href="{{ asset('selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">

  <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
  <script type="text/javascript" src='{{ asset("selectize/js/standalone/selectize.min.js") }}'></script>

</head>

<body>
<select id="searchbox" name="q" placeholder="Search patients..." class="form-control"></select>
<br><br>


<!-- @foreach($patient->appointments as $app)
	{{ $app->diagnosisRecord['doctorAdvice'] }} <br>
@endforeach -->

<!-- @foreach($doctor->schedules as $schedule)
	{{ $schedule['diagDate'] }} <br>
@endforeach -->

<!-- @foreach($sc->appointments as $app)
	{{ $app->patient->fullname() }} <br>
@endforeach
 -->

<!-- @foreach($department->doctors as $doc)
	{{ $doc->fullname() }} <br>
@endforeach -->

<!-- {{ $ap->diagnosisRecord['doctorAdvice'] }}
{{ $ap->physicalRecord['weight'] }} <br>
@foreach($ap->prescription->medicines as $med)
	{{ $med->medicineName }} <br>
@endforeach -->

{{ $sc->patientsAmount() }}

</body>
<script>
	 var root = '{{url("/")}}';
	 var searchAddress = '/search/importDoctorSchedule';
</script>

<script type="text/javascript" src='{{ asset("js/searchSelectize.js") }}'></script>

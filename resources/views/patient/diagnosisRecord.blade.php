@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ประวัติการรักษา</h3>
	</div>
	<div class="panel-body">
		<form>
			<div class="form-group row">
				<div class="col-xs-12">
					@if(count($appointments) > 0)
					<table class="table table-bordered">
						<thead >
							<br>
							<tr>
								<th style="width: 15%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 20%; text-align:center;">แผนก</th>
								<th style="width: 50%; text-align:center;">แพทย์</th>
								<th style="width: 15%; text-align:center;">ดูผลการตรวจ</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($appointments as $app)
								<tr>
									<td>{{ $app->diagDate() }}</td>
									<td>{{ $app->department()->departmentName }}</td>
									<td>{{ $app->doctor()->fullname() }}</td>
									<td ><a href="{{ url('/diagnosisRecord/' . $app->appointmentId) }}" class="btn btn-warning">ดู</a></td>
								</tr>
							@endforeach

						</tbody>
					</table>
					@else
						ไม่พบประวัติการรักษา
					@endif
				</div>
			</div>
		</form>
	</div>
</div>
@stop
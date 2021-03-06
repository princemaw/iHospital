@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
{!! HTML::script('js/doctor.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/diagnose')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บันทึกการวินิจฉัยผู้ป่วย</h3>
	</div>
	<div class="panel-body">
		@if(!isset($search))
			<div id ="searchPatientForm">
		      <div>{!! Form::label('patient', 'กรอกชื่อหรือนามสกุลผู้ป่วยเพื่อค้นหา'); !!}</div>
		      <div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือนามสกุลผู้ป่วย" class="form-control"></select></div>
		    </div>
		@elseif(!isset($appointment))
			ผู้ป่วยคนดังกล่าวไม่มีการนัดหมายที่ยังไม่ได้รับการวินิจฉัย
		@else
		<div id="diagnosisForm">
			<div class="form-group row">  
				<label class="col-xs-2 bold">รหัสผู้ป่วย</label>
				<label class="col-xs-10">{{ $appointment->patient->hospitalNo }}</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2 bold">ผู้ป่วย</label>
				<label class="col-xs-10">{{ $appointment->patient->fullname() }}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">น้ำหนัก</label>
				<label class="col-xs-10">{{ $phys->weight }}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">ส่วนสูง</label>
				<label class="col-xs-10">{{ $phys->height }}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">ความดันโลหิต</label>
				<label class="col-xs-10">{{ $phys->bloodPressure() }}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">อัตราการเต้นของหัวใจ</label>
				<label class="col-xs-10">{{ $phys->heartRate }}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รหัสโรค</label>
				<div class="col-xs-2">{!! Form::text('diseaseCode', '', ["class" => "form-control", 'placeholder' => 'AOE2342']) !!}

				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('diseaseCode') )
					<p class="text-danger"> {{ $errors->first('diseaseCode') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รายละเอียดการตรวจ</label>
				<div class="col-xs-7">
					{!! Form::textarea('diagnosisDetail', '', ["class" => "form-control", "rows" => "5", 'placeholder' => 'ปวดหัว ตัวร้อน เป็นไข้']) !!}
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('diagnosisDetail') )
					<p class="text-danger"> {{ $errors->first('diagnosisDetail') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">คำแนะนำจากแพทย์</label>
				<div class="col-xs-2">{!! Form::textarea('doctorAdvice', '', ["class" => "form-control", "rows"=>"5", 'placeholder' => 'นอนพักผ่อนให้เพียงพอ']) !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('doctorAdvice') )
					<p class="text-danger"> {{ $errors->first('doctorAdvice') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รายการยา
					<div id="addBtn" data-toggle="collapse" data-target="#addMedCollapse" class="glyphicon glyphicon-plus-sign"></div>
				</label>
				<div class="col-xs-7">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width: 5%;">ลำดับ</th>
								<th style="width: 20%;">ชื่อยา</th>
								<th style="width: 5%;">จำนวน</th>
								<th style="width: 5%;">หน่วย</th>
								<th style="width: 20%;">วิธีใช้</th>
								<th style="width: 15%;">เพิ่มเติม</th>
							</tr>
						</thead>
						<tbody id = "drugTable">
						</tbody>
					</table>
				</div>
			</div>
			<div id="addMedCollapse" class="collapse form-group row">
				<label class="col-xs-2"></label>
				<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
					<div class="panel-heading">
						<h3 class="panel-title">เพิ่มรายการยา</h3>
					</div>
					<div class="panel-body form" style="margin-left:40px; margin-top:10px;">

						<div class="form-group row">
							<label class="col-xs-3 bold">ชื่อยา</label>
							<label class="col-xs-4">{!! Form::text('medicineName', '', ['class' => 'form-control','id'=>'medicineName','onkeyup'=>'enAddMedButton()']) !!}</label>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">จำนวน</label>
							<div class="col-xs-2">
								{!! Form::text('quantity', '', ['class' => 'form-control','id'=>'quantity']) !!}
							</div>
							<div class="col-xs-2">
								{!!Form::select('unit', array('0' => 'เม็ด', '1' => 'ขวด'),'0',["class" => "form-control", 'id'=>'unit']);!!}
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">วิธีใช้</label>
							<div class="col-xs-9">
								<input type="checkbox" value="" id='morningCh' onClick='enAddMedButton()'>&nbsp;เช้า
								<input type="checkbox" value="" id='noonCh' onClick='enAddMedButton()'>&nbsp;กลางวัน
								<input type="checkbox" value="" id='eveCh' onClick='enAddMedButton()'>&nbsp;เย็น
								<input type="checkbox" value="" id='niteCh' onClick='enAddMedButton()'>&nbsp;ก่อนนอน<br>
								<input type="checkbox" value="" id ="beforeMealCh" onClick='enAddMedButton()'>&nbsp;ก่อนอาหาร&nbsp;&nbsp;&nbsp;
								<input type="checkbox" value="" id ="afterMealCh" onClick='enAddMedButton()'>&nbsp;หลังอาหาร<br>
								<input type="checkbox" value="" id ="otherCh" onClick='enAddMedButton()'>&nbsp;อื่นๆ&nbsp;{!! Form::text('otherMedInstruction', '', ['class' => 'form-control','id'=>'medOther']) !!}
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">เพิ่มเติม</label>
							<div class="col-xs-7" >{!! Form::textarea('etc', '', ['class' => 'form-control', 'rows' => '3', 'id' => 'medNote']) !!}</div>
						</div>
						<div class="form-group row">
							<div class="col-xs-8"></div>
							<div class="col-xs-2"><button id="addMed" type="button" class="btn btn-info" onclick="addMedicine()" disabled>เพิ่ม</button></div>
							<div class="col-xs-2"><button data-toggle="collapse" data-target="#addMedCollapse" id="finAddMed" type="button" class="btn btn-success">เสร็จสิ้น</button></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">วันที่นัดเพิ่ม
					<div id="addBtn" data-toggle="collapse" data-target="#addNewApp" class="glyphicon glyphicon-plus-sign"></div>
				</label>
				<label class="col-xs-7" id="nextAppointment">ยังไม่มีการนัดหมายครั้งต่อไป</label>
				<span id="nextAppointmentForm">
					{!! Form::hidden('nextAppDate', '') !!}
					{!! Form::hidden('nextAppTime', '') !!}
					{!! Form::hidden('nextAppDetail', '') !!}
				</span>
			</div>
			<div id="addNewApp" class="collapse form-group row">
				<label class="col-xs-2"></label>
				<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
					<div class="panel-heading">
						<h3 class="panel-title">นัดหมายเพิ่มเติม</h3>
					</div>
					<div class="panel-body form" style="margin-left:40px; margin-top:10px;">
						<div class="form-group row">
							<label class="col-xs-3 bold">วันที่</label>
							<div class="col-xs-4">
								<div class="input-group date">
									{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปปปป','id'=>'date','onChange'=>'enNextApp()']) !!}
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold" >ช่วงเวลา</label>
							<label class="col-xs-9 radio form-inline" id="nextAppointmentTime">
								<label>{!!Form::radio('time', 'morning', true, ['class' => 'radio-inline', 'id' => 'doctorRadioMorning']);!!}เช้า (9.00-11.30)</label>
								<label>{!!Form::radio('time', 'afternoon', false, ['class' => 'radio-inline', 'id' => 'doctorRadioAfternoon']);!!}บ่าย (13.00-15.30)</label>
							</label>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">เพิ่มเติม</label>
							<div class="col-xs-7" >{!! Form::textarea('etc', '', ['class' => 'form-control', 'rows' => '3','id'=>'nextAppDetail']) !!}</div>
						</div>
						<div class="form-group row">
							<div class="col-xs-8"></div>
							<div>
								<button type="button" class="btn btn-success" onclick= "nextAppointment()" data-toggle="collapse" data-target="#addNewApp" id ="newAppSubmit" disabled>ตกลง</button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-8"></div>
				{!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
				{!! Form::hidden('patientId', $appointment->patient->userId) !!}
				<div class="col-xs-4">
					{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
				</div>
			</div>
		</div>
		@endif
	</div>

	<!-- Script to construct datepicker -->
	<script type="text/javascript">
	    // When the document is ready
	    $(document).ready(function () {
	    	$('#datepicker').datepicker({language:'th-th',format:'dd/mm/yy'});
	    });
	    </script>
	</div>

	{!! Form::close() !!}
	@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/patientDiagnoseRecord';
</script>
@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">

@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body">

		<form role="form">
			<div class="form-group row">
				<div class="col-xs-2" id="patientLabel">{!! Form::label('id', 'รหัสประจำตัวผู้ป่วย') !!}</div>
				<div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2" id="patientLabel">ชื่อ</label>
				<label class="col-xs-10" id="patientLabel">ชลัมพล</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">นามสกุล</label>
				<label class="col-xs-10" id="patientLabel">ไก๊ไก่ไก๊ไก่</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">แผนก</label>
				<div class="col-xs-3">{!! Form::select('department', array(
					'0' => 'ไม่ระบุ',
					'1' => 'กายวิภาคศาสตร์', 
					'2' => 'กุมารเวชศาสตร์',
					'3' => 'จิตเวชศาสตร์',
					'4' => 'จุลชีววิทยา',
					'5' => 'จักษุวิทยา',
					'6' => 'ชีวเคมี',
					'7' => 'นิติเวชศาสตร์',
					'8' => 'ปรสิตวิทยา',
					'9' => 'พยาธิวิทยา',
					'10' => 'เภสัชวิทยา',
					'11' => 'รังสีวิทยา',
					'12' => 'วิสัญญีวิทยา',
					'13' => 'เวชศาสตร์ชันสูตร',
					'14' => 'เวชศาสตร์ป้องกันและสังคม',
					'15' => 'เวชศาสตร์ฟื้นฟู',
					'16' => 'ศัลยศาสตร์',
					'17' => 'สรีรวิทยา',
					'18' => 'สุติศาสตร์-นารีเวชวิทยา',
					'19' => 'โสต คอ นาสิกวิทยา',
					'20' => 'ออโธปิดิกส์',
					'21' => 'อายุรศาสตร์'),'0',["class" => "form-control"])!!}
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">แพทย์</label>
				<div class="col-xs-3">{!! Form::select('department', array(
					'0' => 'ไม่ระบุ',
					'1' => 'กายวิภาคศาสตร์', 
					'2' => 'กุมารเวชศาสตร์',
					'3' => 'จิตเวชศาสตร์',
					'4' => 'จุลชีววิทยา',
					'5' => 'จักษุวิทยา',
					'6' => 'ชีวเคมี',
					'7' => 'นิติเวชศาสตร์',
					'8' => 'ปรสิตวิทยา',
					'9' => 'พยาธิวิทยา',
					'10' => 'เภสัชวิทยา',
					'11' => 'รังสีวิทยา',
					'12' => 'วิสัญญีวิทยา',
					'13' => 'เวชศาสตร์ชันสูตร',
					'14' => 'เวชศาสตร์ป้องกันและสังคม',
					'15' => 'เวชศาสตร์ฟื้นฟู',
					'16' => 'ศัลยศาสตร์',
					'17' => 'สรีรวิทยา',
					'18' => 'สุติศาสตร์-นารีเวชวิทยา',
					'19' => 'โสต คอ นาสิกวิทยา',
					'20' => 'ออโธปิดิกส์',
					'21' => 'อายุรศาสตร์'),'0',["class" => "form-control"])!!}
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">วันนัด</label>
				<div class="col-xs-3">
					<div class="input-group date">
						{!! Form::text('date', '', ['id' => 'datepicker', "class" => "form-control"]) !!}
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">อาการเบื้องต้น</label>
				<div class="col-xs-10">
					{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5"]) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
			</div>
			<div class="container">
            <div class="hero-unit">
            	<input  type="text" placeholder="click to show datepicker"  id="example1">
            </div>
        </div>
        <!-- Load jQuery and bootstrap datepicker scripts -->
        
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

            	$('#example1').datepicker({
            		format: "dd/mm/yyyy"
            	});  

            });
            </script>
        </form>
    </div>
</div>

{!! Form::close() !!}
@stop

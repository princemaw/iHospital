@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => '/editProfile')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
	</div>
	<div class="panel-body">		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ประวัติส่วนตัว</h3>
			</div>
			<div class="panel-body">
				<div id = "editProfileForm">
					<span class ="bold">รหัสประจำตัวผู้ป่วย : </span> {{ $patient->hospitalNo }}
					<br><br>
					<div class="row">
						<div class="col-md-4"> {!! Form::label('name', 'ชื่อจริง :'); !!} &nbsp
							{!! Form::text('name', $patient->name(), ['class'=>'textbox']);!!} 
							@if( $errors->has('name') )<br><br>
							<p class="text-danger"> {{ $errors->first('name') }} </p> 
							@endif
						</div>
						<div class="col-md-8">{!! Form::label('surname', 'นามสกุล :'); !!} &nbsp
							{!! Form::text('surname', $patient->surname(), ['class'=>'textbox']); !!}
							@if( $errors->has('surname') )<br><br>
							<p class="text-danger"> {{ $errors->first('surname') }} </p> 
							@endif
						</div>
					</div>
					<br>
					<div class ="row">
						<div class ="col-md-2">
							<span class ="bold">เพศ : </span> {{ $patient->sex }}
							{!! Form::hidden('sex', $patient->sex) !!}
						</div>
						<div class ="col-md-2">
							<span class ="bold">กรุ๊ปเลือด : </span> {{ $patient->bloodGroup }}
							{!! Form::hidden('bloodGroup', $patient->bloodGroup) !!}
						</div>	
						<div class ="col-md-4">
							<span class ="bold">วัน/เดือน/ปี เกิด : </span> {{ $patient->dateOfBirth }}
							{!! Form::hidden('dateOfBirth', $patient->dateOfBirth) !!}
						</div>
						<div class ="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ที่อยู่</h3>
			</div>
			<div class="panel-body">
				<div id = "address">
					<div class ="row">
						<div class ="col-md-2">
							{!!Form::label('addressNo', 'บ้านเลขที่ :');!!}&nbsp
							{!!Form::text('addressNo', $address['addressNo'],['class'=>'textbox textbox70px']);!!}
							@if( $errors->has('addressNo') )<br><br>
							<p class="text-danger"> {{ $errors->first('addressNo') }} </p> 
							@endif
						</div>
						<div class ="col-md-2">
							{!!Form::label('moo', 'หมู่ :');!!}&nbsp
							{!!Form::text('moo', $address['moo'],['class'=>'textbox textbox70px']);!!}<br><br>
						</div>	
						<div class ="col-md-3">
							{!!Form::label('street', 'ถนน :');!!}&nbsp
							{!!Form::text('street', $address['street'],['class'=>'textbox textbox150px']);!!}<br><br>
						</div>
						<div class ="col-md-5">
							{!!Form::label('subdistrict', 'แขวง/ตำบล :');!!}&nbsp
							{!!Form::text('subdistrict', $address['subdistrict'],['class'=>'textbox textbox150px']);!!}
							@if( $errors->has('subdistrict') )<br><br>
							<p class="text-danger"> {{ $errors->first('subdistrict') }} </p> 
							@endif
						</div>
					</div>
					<div class ="row">
						<div class ="col-md-3">
							{!!Form::label('district', 'เขต/อำเภอ :');!!}&nbsp
							{!!Form::text('district', $address['district'],['class'=>'textbox textbox150px']);!!}
							@if( $errors->has('district') )<br><br>
							<p class="text-danger"> {{ $errors->first('district') }} </p> 
							@endif
						</div>
						<div class ="col-md-3 form-inline province">
							{!!Form::label('province', 'จังหวัด :');!!}&nbsp
							{!!Form::select('province', array('0'=>'กรุงเทพมหานคร','1'=>'กระบี่','2'=>'กาญจนบุรี','3'=>'กาฬสินธุ์','4'=>'กำแพงเพชร','5'=>'ขอนแก่น','6'=>'จันทบุรี','7'=>'ฉะเชิงเทรา','8'=>'ชลบุรี','9'=>'ชัยนาท','10'=>'ชัยภูมิ','11'=>'ชุมพร','12'=>'เชียงราย','13'=>'เชียงใหม่','14'=>'ตรัง','15'=>'ตราด','16'=>'ตาก','17'=>'นครนายก','18'=>'นครปฐม','19'=>'นครพนม','20'=>'นครราชสีมา','21'=>'นครศรีธรรมราช','22'=>'นครสวรรค์','23'=>'นนทบุรี','24'=>'นราธิวาส','25'=>'น่าน','26'=>'บึงกาฬ','27'=>'บุรีรัมย์','28'=>'ปทุมธานี','29'=>'ประจวบคีรีขันธ์','30'=>'ปราจีนบุรี','31'=>'ปัตตานี','32'=>'พระนครศรีอยุธยา','33'=>'พังงา','34'=>'พัทลุง','35'=>'พิจิตร','36'=>'พิษณุโลก','37'=>'เพชรบุรี','38'=>'เพชรบูรณ์','39'=>'แพร่','40'=>'พะเยา','41'=>'ภูเก็ต','42'=>'มหาสารคาม','43'=>'มุกดาหาร','44'=>'แม่ฮ่องสอน','45'=>'ยะลา','46'=>'ยโสธร','47'=>'ร้อยเอ็ด','48'=>'ระนอง','49'=>'ระยอง','50'=>'ราชบุรี','51'=>'ลพบุรี','52'=>'ลำปาง','53'=>'ลำพูน','54'=>'เลย','55'=>'ศรีสะเกษ','56'=>'สกลนคร','57'=>'สงขลา','58'=>'สตูล','59'=>'สมุทรปราการ','60'=>'สมุทรสงคราม','61'=>'สมุทรสาคร','62'=>'สระแก้ว','63'=>'สระบุรี','64'=>'สิงห์บุรี','65'=>'สุโขทัย','66'=>'สุพรรณบุรี','67'=>'สุราษฎร์ธานี','68'=>'สุรินทร์','69'=>'หนองคาย','70'=>'หนองบัวลำภู','71'=>'อ่างทอง','72'=>'อุดรธานี','73'=>'อุทัยธานี','74'=>'อุตรดิตถ์','75'=>'อุบลราชธานี','76'=>'อำนาจเจริญ'), $address['provinceNo'],["class" => "form-control"]);!!}<br><br>
						</div>	
						<div class ="col-md-4">
							{!!Form::label('zipcode', 'รหัสไปรษณีย์ :');!!}&nbsp
							{!!Form::text('zipcode','72000',['class'=>'textbox textbox150px']);!!}
							@if( $errors->has('zipcode') )<br><br>
							<p class="text-danger"> {{ $errors->first('zipcode') }} </p> 
							@endif
						</div>
						<div class ="col-md-2">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ข้อมูลติดต่อ</h3>
			</div>
			<div class="panel-body">
				<div id = "contact">
					<div class ="row">
						<div class ="col-md-4">
							{!!Form::label('telHome','โทรศัพท์บ้าน :');!!}&nbsp;
							{!!Form::text('telHome',$patient->telHome,['class'=>'textbox']);!!}
							@if( $errors->has('telHome') )<br><br>
							<p class="text-danger"> {{ $errors->first('telHome') }} </p> 
							@endif
						</div>
						<div class ="col-md-4">
							{!!Form::label('telMobile','โทรศัพท์มือถือ :');!!}&nbsp;
							{!!Form::text('telMobile',$patient->telMobile,['class'=>'textbox']);!!}
							@if( $errors->has('telMobile') )<br><br>
							<p class="text-danger"> {{ $errors->first('telMobile') }} </p> 
							@endif
						</div>
						<div class ="col-md-2">
						</div>
					</div>
					<br>
					{!! Form::label('email', 'อีเมล :'); !!} &nbsp;
					{!! Form::text('email', $patient->user->email, ['class'=>'textbox textbox300px']);!!}
					@if( $errors->has('email') )<br><br>
					<p class="text-danger"> {{ $errors->first('email') }} </p> 
					@endif
				</div>
			</div>
		</div>
		<div class ="row">
			<div class ="col-md-10"></div>
			<div class ="col-md-2">{!! Form::submit('แก้ไข', ['class' => 'btn btn-warning','id'=>'editProfileButton']) !!}</div>
		</div>
	</div>
</div>
{!! Form::close() !!}	
@stop

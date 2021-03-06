<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|
| Routes in this file are ordered by the following roles/topics
| General -> Patient -> Doctor -> Staff -> Nurse -> Pharmacist -> Admin
| The order is same for all controllers
|
*/

// ==================================================================================================
// ============================================ GENERAL =============================================
// ==================================================================================================

// main page for all users (shows login page for non-user)
Route::get('/', 'Auth\AuthController@getMainPage');

// login
Route::post('/login', 'Auth\AuthController@authenticate');

// logout
Route::get('/logout', 'Auth\AuthController@logout');

// register for patient
Route::get('/register', function () {
    return view('general/register');
});
Route::post('/register', 'userController@checkPatientStatus');
Route::post('/registerOld', 'userController@registerOldPatient');
Route::post('/registerNew', 'userController@registerNewPatient');

// forget and change password
Route::get('/forgetPassword', function () {
    return view('general/forgetPassword');
});
Route::post('/forgetPassword', 'Auth\AuthController@forgetPassword');
Route::get('/changePassword/{verifyCode}', 'Auth\AuthController@changePasswordGet');
Route::post('/changePassword', 'Auth\AuthController@changePasswordPost');


// ==================================================================================================
// ============================================ PATIENT =============================================
// ==================================================================================================

// main page for patient
Route::get('mainPatient', function() {
    return view('patient/mainPatient');
});

// show patient's profile
Route::get('patientProfile', 'userController@viewMyProfilePatient');

// create new appointment
Route::get('createAppointment', 'appointmentController@createAppointmentShow');
Route::post('createAppointment', 'appointmentController@createAppointmentRequest');
Route::post('confirmAppointment', 'appointmentController@confirmAppointmentShow');
Route::post('storeAppointment', 'appointmentController@createAppointmentStore');

// edit patient's profile
Route::get('editProfile', 'userController@editMyProfilePatientShow');
Route::post('editProfile', 'userController@editMyProfilePatientStore');

// show patient's appointments list
Route::get('patientAppointmentSchedule', 'appointmentController@viewPatientAppointment');

// change appointment date
Route::post('rescheduleAppointment', 'appointmentController@delayAppointmentShow');
Route::post('rescheduleAppointmentRequest', 'appointmentController@delayAppointmentRequest');
Route::post('confirmReAppointment', 'appointmentController@confirmReAppointment');
Route::post('delayAppointment', 'appointmentController@delayAppointmentStore');

// cancel appointment
Route::post('cancelAppointment', 'appointmentController@cancelAppointmentShow');
Route::post('cancelAppointmentStore', 'appointmentController@cancelAppointmentStore');

// show doctors list & search doctors
Route::get('doctorList', 'userController@searchDoctorShow');
Route::post('doctorList','userController@searchDoctor');

// show patient's diagnosis history
Route::get('diagnosisRecord', 'diagnosisRecordController@showDiagnosisRecordList');
Route::get('diagnosisRecord/{appId}', 'diagnosisRecordController@showDiagnosisRecord');


// ==================================================================================================
// ============================================= DOCTOR =============================================
// ==================================================================================================

// main page for doctor
Route::get('/mainDoctor', function () {
    return view('doctor/mainDoctor');
});

// doctor's profile
Route::get('/doctorProfile', 'userController@showDoctorProfile');
Route::post('/editDoctorProfile', 'userController@editDoctorProfile');

// doctor view patient's profile
Route::get('/searchPatientProfileByDoctor', function () {
    return view('doctor/searchPatientProfileByDoctor');
});
Route::get('/patientProfileByDoctor/{patientId}', 'userController@showPatientProfileToDoctor');
Route::get('patientDiagRecordByDoctor/{appId}', 'diagnosisRecordController@showDiagnosisRecordDoctor');

// record diagnosis results
Route::get('/diagnose', function () {
    return view('doctor/diagnose');
});
Route::get('/diagnose/{patientId}', 'diagnosisRecordController@recordDiagnosisRecordShow');
Route::post('/diagnose', 'diagnosisRecordController@diagnose');

// doctor's schedule
Route::get('/doctorScheduleByDoctor', 'scheduleController@showScheduleDoctor');
Route::post('/doctorEditSchedule', 'scheduleController@editDoctorSchedule');

// diagnosis history
Route::get('/diagnosisHistory', function () {
    return view('doctor/diagnosisHistory');
});
Route::post('/showDiagnosisHistory', 'diagnosisRecordController@showDiagnosisHistory');

// ==================================================================================================
// ============================================= STAFF ==============================================
// ==================================================================================================

Route::get('mainStaff', function() {
    return view('staff/mainStaff');
});

// staff profile
Route::get('staffProfile', 'userController@showStaffProfile');
Route::post('editStaffProfile', 'userController@editStaffProfile');

// add patient
Route::get('/addPatient', function() {
    return view('staff.addPatient');
});
Route::post('/addPatient', 'userController@addPatient');

// create appointment
Route::get('createAppointmentForPatient', function() {
    return view('staff/createAppointmentForPatient');
});
Route::get('/createAppointmentForPatient/{patientId}', 'appointmentController@createAppointmentByStaffShow');
Route::post('/createAppointmentForPatient/', 'appointmentController@createAppointmentStaffRequest');
Route::post('confirmAppointmentByStaff', 'appointmentController@confirmAppointmentByStaffShow');
Route::post('createAppointmentByStaffStore', 'appointmentController@createAppointmentByStaffStore');

// manage appointment
Route::get('manageAppointmentForPatient', function() {
    return view('staff/manageAppointmentForPatient');
});
Route::get('/manageAppointmentForPatient/{patientId}', 'appointmentController@manageAppointmentShow');
Route::post('/delayAppointmentForPatient', 'appointmentController@delayAppointmentByStaffShow');
Route::post('/delayAppointmentByStaffRequest', 'appointmentController@delayAppointmentByStaffRequest');
Route::post('/confirmReappointmentByStaff', 'appointmentController@confirmReappointmentByStaffShow');
Route::post('delayAppointmentByStaff', 'appointmentController@delayAppointmentByStaffStore');
Route::post('/deleteAppointmentByStaff', 'appointmentController@deleteAppointmentByStaffStore');

// import doctor schedule
Route::get('/importDoctorSchedule/', function() {
    return view('staff.importDoctorSchedule');
});
Route::get('/importDoctorSchedule/{userId}', 'scheduleController@importScheduleShow');
Route::post('/importDoctorSchedule', 'scheduleController@importScheduleStore');

// view doctor schedule
Route::get('searchDoctorScheduleByStaff', function() {
    return view('staff/searchDoctorScheduleByStaff');
});
Route::get('doctorScheduleByStaff/{patientId}', 'scheduleController@viewDoctorScheduleByStaff');

// add staff
Route::get('/addStaffByStaff', 'userController@addHospitalStaffShow');
Route::post('/addStaffByStaff', 'userController@addHospitalStaffStore');

// manage staff
Route::get('manageStaffByStaff', function() {
    return view('staff/manageStaffByStaff');
});
Route::get('manageStaffByStaff/{staffId}', 'userController@manageStaffShow');
Route::post('manageStaffByStaff','userController@searchStaff');
Route::post('manageStaffEdit','userController@editStaff');
Route::post('manageStaffDelete','userController@deleteStaff');

Route::get('searchPatientProfileByStaff', function() {
    return view('staff/searchPatientProfileByStaff');
});


// ==================================================================================================
// ============================================= NURSE ==============================================
// ==================================================================================================


Route::get('/mainNurse', function () {
    return view('nurse/mainNurse');
});

// nurse profile
Route::get('/nurseProfile', 'userController@showNurseProfile');
Route::post('/editNurseProfile', 'userController@editNurseProfile');

// view patient profile
Route::get('/searchPatientProfileByNurse', function () {
    return view('nurse/searchPatientProfileByNurse');
});
Route::get('patientProfileByNurse/{patientId}', 'userController@patientProfileByNurse');

// record patient's general detail
Route::get('/recordPatientGeneralDetail', function () {
    return view('nurse/recordPatientGeneralDetail');
});
Route::get('/recordPatientGeneralDetail/{patientId}', 'diagnosisRecordController@recordPhysicalRecordShow');
Route::post('/recordPatientGeneralDetail', 'diagnosisRecordController@recordPhysicalRecordStore');

// doctor schedule by nurse
Route::get('doctorScheduleByNurse', function () {
    return view('nurse/searchDoctorScheduleByNurse');
});
Route::get('doctorScheduleByNurse/{doctorId}', 'scheduleController@viewScheduleByNurse');


// ==================================================================================================
// =========================================== PHARMACIST ===========================================
// ==================================================================================================

Route::get('/mainPharmacist', function () {
    return view('pharmacist/mainPharmacist');
});

Route::get('pharmacistProfile', 'userController@showPharmacistProfile');
Route::post('editPharmacistProfile', 'userController@editPharmacistProfile');

Route::get('/searchPatientProfileByPharmacist', function () {
    return view('pharmacist/searchPatientProfileByPharmacist');
});
Route::get('patientProfileByPharmacist/{patientId}', 'userController@patientProfileByPharmacist');

Route::get('/recordPrescriptionHistory', function () {
    return view('pharmacist/recordPrescriptionHistory');
});
Route::get('/recordPrescription/{patientId}', 'diagnosisRecordController@recordPrescriptionShow');
Route::post('recordPrescription', 'diagnosisRecordController@recordPrescription');



// ==================================================================================================
// ============================================= ADMIN ==============================================
// ==================================================================================================

Route::get('mainAdmin', function () {
    return view('admin/mainAdmin');
});

Route::get('/addDepartment', function () {
    return view('admin/addDepartment');
});
Route::post('/addDepartment','departmentController@addDepartment');

// addmedicine
Route::get('/addMedicine', function () {
    return view('admin/addMedicine');
});
Route::post('/addMedicine','medicineController@addmedicine');

Route::get('/addStaffByAdmin', function () {
    return view('admin/addStaffByAdmin');
});

// grant staff
Route::get('/grantStaff', function () {
    return view('admin/grantStaff');
});
Route::post('grantStaff', 'userController@grantStaffSearch');
Route::post('grantStaffStore', 'userController@grantStaffStore');

Route::get('/addStaffByAdmin', 'userController@addHospitalStaffByAdminShow');
Route::post('/addStaffByAdmin', 'userController@addHospitalStaffByAdminStore');

// ==================================================================================================
// ========================================== SEARCH ===========================================
// ==================================================================================================

// doctor
Route::get('/search/patientProfileByDoctor', 'searchController@searchPatientProfileByDoctor');

// staff
Route::get('/search/importDoctorSchedule', 'searchController@searchImportDoctorSchedule');
Route::get('/search/patientDiagnoseRecord', 'searchController@searchPatientDiagnoseRecord');
Route::get('/search/createAppointmentByStaff', 'searchController@searchPatientMakeAppointment');
Route::get('/search/manageAppointmentByStaff', 'searchController@searchPatientManageAppointment');
Route::get('/search/manageScheduleByStaff', 'searchController@searchDoctorManageAppointmentByStaff');
Route::get('/search/manageStaffByStaff', 'searchController@searchHospitalStaffManage');

// nurse
Route::get('/search/recordPhysicalRecord', 'searchController@searchRecordPhysicalRecord');
Route::get('/search/patientProfileByNurse', 'searchController@searchPatientProfileByNurse');
Route::get('/search/manageScheduleBynurse', 'searchController@searchDoctorScheduleByNurse');

// pharmacist
Route::get('/search/patientProfileByPharmacist', 'searchController@searchPatientProfileByPharmacist');
Route::get('/search/searchPrescribe', 'searchController@searchPrescribe');

// ==================================================================================================
// ==================== just for test, it should be deleted after job's done ========================
// ==================================================================================================

Route::get('/genPassword/{text}', 'Auth\AuthController@genPassword');
// Route::get('/api/search', 'searchController@searchImportDoctorSchedule');


Route::get('/testmodel', 'testController@testfunc');


// ==================================================================================================
// ========================================== PDF & EMAIL ===========================================
// ==================================================================================================

Route::post('/diagRecordPdf','pdfController@diagRecordPdf');
Route::get('/showDiagnosisHistoryPdf/{year}/{month}','pdfController@showDiagnosisHistoryPdf');
Route::get('/forgetPasswordEmail', 'emailController@forgetPasswordEmail');
Route::get('/postponedAppointmentEmail', 'emailController@postponedAppointmentEmail');
Route::get('/createStaffEmail', 'emailController@createStaffEmail');
Route::get('/confirmRegistrationEmail', 'emailController@confirmRegistrationEmail');

Route::get('/confirmAppointmentEmail', 'emailController@confirmAppointmentEmail');
Route::get('sendemail', function () {
    $data = array(
        'name' => "Noon",
        );
    

    Mail::send('emails.createStaffEmail',$data,function ($message) {

        $message->from('ihospital.se@gmail.com', 'iHospital');

        $message->to('tonkung49031@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

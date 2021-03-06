<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'department';
    protected $primaryKey = 'departmentId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departmentName',
        'departmentBuilding',
        'departmentTel'];

    // -------------------------------  relationship -------------------------------
    public function doctors()
    {
        return $this->hasManyThrough('App\doctor', 'App\hospitalStaff', 'departmentId', 'userId');
    }

    public static function getDoctorArray()
    {
        $department = department::all();
        $tmpArr = array();
        foreach($department as $dep)
        {
            $tmpArr[$dep->departmentId] = $dep->getDoctorByDepartment($dep->departmentId);
        }
        return $tmpArr;
    }

    public static function getDepartmentArray()
    {
        $department = department::all();
        foreach($department as $d)
        {
            $results[$d->departmentId] = $d->departmentName;
        }
        return $results;
    }

    public static function getDepartmentArrayWithUnknown()
    {
        $department = department::all();
        $results = array();
        $results['0'] = 'ไม่ระบุ';
        foreach($department as $d)
        {
            $results[$d->departmentId] = $d->departmentName;
        }
        return $results;
    }

    public function getDoctorByDepartment($departmentId)
    {
        $doctor = DB::table('department')
                    ->where('department.departmentId', $departmentId)
                    ->join('hospitalStaff', 'department.departmentId', '=', 'hospitalStaff.departmentId')
                    ->join('doctor', 'hospitalStaff.userId', '=', 'doctor.userId')
                    ->join('users', 'doctor.userId', '=', 'users.userId')
                    ->select('users.userId', 'users.name', 'users.surname')
                    ->get();
        return $doctor;
    }
}

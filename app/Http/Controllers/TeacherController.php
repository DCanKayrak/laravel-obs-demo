<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.index');
    }

    public function fetch(){
        $students = User::all();
        return DataTables::of($students)
            ->addColumn('nationality_id',function ($data){
                return $data->nationality_id;
            })
            ->addColumn('student_number',function ($data){
                return $data->student_number;
            })
            ->addColumn('first_name',function ($data){
                return $data->first_name;
            })
            ->editColumn('last_name',function ($data){
                return $data->last_name;
            })
            ->addColumn('visa_1',function ($data){
                return "100";
            })
            ->addColumn('visa_2',function ($data){
                return "100";
            })
            ->addColumn('final',function ($data){
                return "100";
            })
            ->addColumn('action',function ($data){
                return '<a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#ticket_details" onclick="details('.$data->id.')"><i class="fe fe-pencil"></i> Detay </a>';
            })
            ->rawColumns([
                'nationality_id',
                'student_number',
                'first_name',
                'last_name',
                'visa_1',
                'visa_2',
                'final',
                'action'
            ])
            ->make(true);
    }
}

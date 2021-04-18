<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getUsersByGrades(Request $request)
    {
        if ($request->ajax()) {
            
            $searchParam = explode('?gradeval=', $request->params['grade']);
            if(count($searchParam) <= 1){
                $data = User::latest()->get();
            } {
                $explodeParam = explode(',', $searchParam[1]);
                if(count($searchParam) <= 1){
                    $data = User::latest()->get();
                } else {
                    $strQuery = '';
                    $i = 1;

                    foreach($explodeParam as $key => $value){
                        $strQuery .= 'FIND_IN_SET("' . $value . '", grades)';
                        if($i < count($explodeParam)){
                            $strQuery .= ' AND ';
                        }
                        $i++;
                    }
                    
                    $data = DB::table("users")
                            ->whereRaw($strQuery)
                            ->orderBy("users.id","asc")
                            ->get();    
                }
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
                
        }  
        return view('users.grades');  
    }
}

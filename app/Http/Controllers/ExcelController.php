<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    public function index(){
   return view('excel');
    }
    public function import(Request $request){
            $this->validate($request,[
            'file'=>'required'
            ]);

                    $file = $request->file('file');
                  // return   Excel::import(new UsersImport, $file);
                  $array = Excel::toArray(new UsersImport, request()->file('file'));
                  return $array;
                //    return redirect('/')->with('success', 'All good!');
    }
}

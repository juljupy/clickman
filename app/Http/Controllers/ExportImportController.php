<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;

class ExportImportController extends Controller
{
    /**
     * Return View file
     *
     * @var array
     */
	public function importExport()
	{
		return view('importExport');
	}


	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$data = User::get()->toArray();
		return Excel::create('ClickManUsers', function($excel) use ($data) {
			$excel->sheet('Users', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}


	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $v) {
					if(!empty($v)){
						$insert[] = ['name' => $v['name'],'email' => $v['email'],'password' => bcrypt($v['email']),'verified' => 1];
					}
				}				

				if(!empty($insert)){
					foreach ($insert as $user) {
						$user = User::create($user);
						$user->roles()->attach(3);
					}
					return back()->with('success','Insert Record successfully.');
				}
			}
		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}

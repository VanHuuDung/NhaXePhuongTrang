<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UploadService{

    public function store ($request){
        if ($request->hasFile('file')) {
            try{
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/' . date('Y/m/d');

                $request ->file('file')->storeAs('public/uploads/' . $pathFull, $name);
                
                return 'storage/' . $pathFull . '/' . $name;
            }
            catch(\Exception $e){
                return false;
            }
        }
    }   
}
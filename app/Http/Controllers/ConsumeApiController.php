<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;

class ConsumeApiController extends Controller
{
    public function index(){

        $response = DB::table('countries')->get();

        return $response;
    }

    public function add(Request $request){

        try{

            $countrie = new Countries();

            $countrie->name = $request->name;
            $countrie->officialName = $request->officialName;
            $countrie->nativeName = $request->nativeName;
            $countrie->nativeOfficialName = $request->nativeOfficialName;

            $countrie->save();

            return ['Return'=>'Sucess'];

        }catch(\Exception $error){
            return ['Return'=>'Error', 'Details'=>$error];
        }

    }

}

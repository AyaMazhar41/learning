<?php

namespace App\Http\Controllers\country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\countryModel;
use Illuminate\Support\Facades\Validator;
class countryController extends Controller
{
    public function country()
    {
    	$getall = countryModel::paginate();
    	return response($getall,200);


    }
    public function countryById($id)
    {
    	$getById = countryModel::find($id);
        if(is_null($getById)){
            return response(["message"=>"not found"],404);

        }
    	return response($getById,200);

    }

    public function countryAdd(Request $request)
    {
        $rules=[
            'name'=>'required|min:2|string'
                
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response($validator->errors(),400);
        }
    	$countryCreate = countryModel::create($request->all());
    	return response($countryCreate,201);

    }

    public function countryEdit(Request $request, $id)
    {
         $rules=[
            'name'=>'required|min:2|string'
                
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response($validator->errors(),400);
        }
     $countries=countryModel::findOrFail($id);
     if(is_null($countries)){
            return response(["message"=>"not found"],404);

        }

      $countries->update($request->all());
        return response()->json($countries ,200);
         

    } 
    
    public function countryDelete($id)
    {
        $countries2=countryModel::findOrFail($id);
        if(is_null($countries2)){
            return response(["message"=>"not found"],404);

        }
      $countries2->delete();
        return response()->json(null ,204);
        

    } 




   

}

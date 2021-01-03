<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator as Validator;
use Illuminate\Support\Facades\Validator;
//use Validator;

class CountryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(CountryModel::all(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $rules = [
            'name' => 'required',
            'iso' => 'required',
        ];
        $validation = Validator::make($request->all(),$rules);

        if($validation->fails()){
            return response()->json($validation->errors(), 400);

        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 200);
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $country = CountryModel::find($id);
        if(is_null($country))
        {
            return response()->json(['message'=>'Cant update country'],400);
        }
        $updateCountry = $country->update($request->all());
        return response()->json($updateCountry, 200);
    }

    /**
     * @param Request      $request
     * @param CountryModel $country
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request, $id)
    {
        $country = CountryModel::find($id);
        $country->delete();
        return response()->json('null', 204);
    }


}

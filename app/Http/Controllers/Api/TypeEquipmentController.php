<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\TypeCollection;

use App\Services\SearchRequestService;
use App\Services\CheckService;

use Illuminate\Support\Facades\Auth;

use App\Models\TypeEquipment;

class TypeEquipmentController extends Controller
{
    public function index( Request $request, SearchRequestService $searchService )
    {
        $word = $searchService->sanitize($request);

        $Type = TypeEquipment::where("equipment", "LIKE","%". $word . "%")
                                    ->orWhere("mask", "LIKE", "%". $word . "%")
                                    ->paginate(6);

        if ( $Type ) {
            return new TypeCollection(TypeEquipment::paginate(6));
            // return in form select options
            // return new TypeCollection(TypeEquipment::all());
        }  

        return response()->json(['message' => "Ничего не найдено"], 200);
            
        //* collection() return this format: {"data": {..json}}, "data" can be changed
    }
    

    public function search( $word, SearchRequestService $searchService)
    {
        $word = $searchService->sanitize($word);
        if ( !$word ) {
            return response()->json(['message' => "Empty data"], 200);
        }

        $Type = TypeEquipment::where("equipment", "LIKE","%". $word . "%")
                            ->orWhere("mask", "LIKE", "%". $word . "%")
                            ->paginate(6);

        if ( $Type ) {
            return new TypeCollection($Type);
        }                            

        return response()->json(['message' => 'Nothing found'], 200);
        //* collection() return this format: {"data": {..json}}, "data" can be changed
    }
    public function manager() {
        $manager = Auth::user()->name;
        if ( $manager ) {
            return response()->json(['manager' => $manager], 200);
        }
        return response()->json(['manager' => ""], 200);
    }

}

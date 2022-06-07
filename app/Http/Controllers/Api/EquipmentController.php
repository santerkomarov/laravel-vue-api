<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Equipment;
use App\Models\TypeEquipment;

use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;
use App\Http\Requests\EquipmentStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\SearchRequestService;
use App\Services\CheckService;

use Validator;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        // sanitize requests values
        $sanitizedEquipment = htmlspecialchars(strip_tags($request->type_equipment));
        $sanitizedSerialNumber = htmlspecialchars(strip_tags($request->serial_number));

        // request with two parameters, searching in two columns
        if ( $sanitizedEquipment && $sanitizedSerialNumber) { 
            $Equipment = Equipment::where("type_equipment", "LIKE","%". $sanitizedEquipment . "%")
                                ->orWhere("serial_number", "LIKE", "%". $sanitizedSerialNumber . "%")
                                ->paginate(6);
            return new EquipmentCollection($Equipment);

        // searching with single parameter
        } else if ( $sanitizedEquipment ) { 
            $Equipment = Equipment::where("type_equipment", "LIKE","%". $sanitizedEquipment . "%")
                                ->paginate(6);
            return new EquipmentCollection($Equipment);

        // searching only one item till find the first
        } else if ( $sanitizedSerialNumber ) { 
            $Equipment = Equipment::where("serial_number", "LIKE", "%". $sanitizedSerialNumber . "%")
                                ->first();
            return $Equipment;

        // handle ordinary request, return all items
        } else if ( !$sanitizedEquipment && !$sanitizedSerialNumber ) {
            return new EquipmentCollection(Equipment::paginate(6));
        }
        //* collection() return this format: {"data": {..json}}, "data" can be changed
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param app\Http\Requests\EquipmentStoreRequest
     * @param App\Services\CheckService $checking
     * @return App\Http\Resources\EquipmentResource
     * 
     * !!! While test don't forget set: Headers->Accept:application/json
     */
    public function store( EquipmentStoreRequest $request, CheckService $checking )
    {
        // send data through Check Service before creating
        // validate serial number for identity of the mask
        $result = $checking->check($request);

        // the serial number does't match the given mask, so the result false
        if ( $result != "ok") {
            // error info
            return response()->json(['message'=>$result,"status"=>"failed"]);
        }
        $newEquipment = Equipment::create($request->validated());

        return new EquipmentResource($newEquipment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\EquipmentResource
     */
    public function show($id)
    {

        if ( Equipment::find($id)) {
            return new EquipmentResource( Equipment::find($id) );
        }
        return response()->json(['message'=>'Nothing found'], 200);
    }

    /**
     * Update the specified resource in storage.
     * Update only one column "comment"
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  App\Services\CheckService $checking
     * @return \Illuminate\Http\Response
     */

    public function update( EquipmentStoreRequest $request, $id, CheckService $checking)
    {
        $comment = $request->comment;
        $equipment = Equipment::find($id);
        if ( $equipment ) {
            $equipment->update( ['comment'=> $comment] );
            return $equipment;
        } else {
            return response()->json(['status'=>'failed','message'=>'Equipment #' .$id.' not found'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete( Equipment $request, $id)
    {
        $equipment = Equipment::find($id);
        $equipment->delete();
        return response()->json(['status'=>'success','message'=>'Equipment #' .$equipment->id . ' was deleted'], 200);
    }

    /**
     * Search request parameter in all columns of "equipment" table.
     * 
     * @param  string  $word
     * @param App\Services\SearchRequestService
     * @return App\Http\Resources\EquipmentCollection
     */

    public function search( $word, SearchRequestService $searchService)
    {
        // sanitize request
        $word = $searchService->sanitize($word);
        if ( !$word ) {
            return response()->json(['message' => "Empty data"], 200);
        }

        $Equipment = Equipment::where("type_equipment", "LIKE","%". $word . "%")
                            ->orWhere("serial_number", "LIKE", "%". $word . "%")
                            ->orWhere("comment", "LIKE", "%". $word . "%")
                            ->paginate(6);
        return new EquipmentCollection($Equipment);
       
        return response()->json(['message' => 'Nothing found'], 200);
        //* collection() return this format: {"data": {..json}}, "data" can be changed
    }







    // App\Http\Controllers\Controller.php -> Inherits -> BaseController

    // App\Http\Controllers\WebController.php -> Inherits -> Controller

    // App\Http\Controllers\ApiController.php -> Inherits -> Controller

    // routes\web.php Route::resource('vendors', 'WebController\UsersController');

    // routes\api.php Route::group(['prefix' => 'api/v1'], function () { Route::resource('vendors', 'ApiController\UsersController'); });

    // https://laracasts.com/discuss/channels/laravel/seperate-controllers-for-api-and-web
    //! if( request()->is('api/*')){
    //     //an api call
    // }else{
    //     //a web call
    // }

}

<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;

use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;

use App\Models\Equipment;
use App\Models\TypeEquipment;

class ApiAuthController extends Controller
{
    public function login( ApiLoginRequest $request ) {

        $fields = $request->validated();
        // check email
        $user = User::where( 'email', $fields['email'] )->first();

        //Hash::check(normal_password,hashed_password);
        if ( !$user || !Hash::check( $fields['password'], $user->password )) {
            return response()->json(['message'=>'Wrong credentials'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;
        return response()->json(['user'=>$user, 'token'=>$token, 'token_type'=>'Bearer'], 200);
    }
    
    public function register( ApiRegisterRequest $request ) {
        // validate
        $fields = $request->validated();

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password'])
        ]);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['user'=>$user, 'token'=>$token, 'token_type'=>'Bearer'], 201);
    }
    
    public function logout( Request $request ) {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'Logged out']);
    }

    /**
     * search for serial number in table Equipment
     * @param str $word
     * @return json, App\Http\Resources\EquipmentCollection
     */
    public function search( $word ) {
        
        $findings = Equipment::where('serial_number', 'LIKE', '%'. $word. '%')->paginate(4);

        if ( $findings->count() ){
            return new EquipmentCollection($findings);
        } 
        return response()->json(['Result' => 'Nothing found'], 200);
    }
}

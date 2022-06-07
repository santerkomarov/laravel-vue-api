<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\TypeEquipment;
use Illuminate\Database\QueryException;

class CheckService 
{
   /**
     * Check serial number for correct mask of its equipment type.
     * Comparing request's type equipment and serial number with already existing in DB.
     * First validation is comparing mask.
     * Second one is comparing mask length of input serial number length.  
     * When two checks done then return "true".
     * @param \Illuminate\Http\Request
     *
     * @return boolean
     */
   public function check( Request $request) {

      // values from request
      $inputSerialNumber = $request->serial_number;
      $inputEquipment = $request->type_equipment;

      $N = '[0-9]'; // numbers
      $A = '[A-Z]'; // capital letters
      $a = '[a-z]'; // lowercase letters
      $X = '[a-z|0-9]'; // lowercase letters or numbers
      $Z = '[-|_|@]'; // symbols "-" or "_" or "@"
   
      $checkLength = false; 
      $resultCheckMask = false;
      $error = false;
      $regex_mask = ""; // regex mask of equipment type
      
      // get "mask" of its equipment type from table "type_equipment"
      try {
         $mask = TypeEquipment::where('equipment',$inputEquipment)->first('mask');
      } catch ( QueryException $e ){
         $error = true;
      }

      if ( $mask ) {
         // split, NAZa -> [0]=>N,[1]=>A,[2]=>Z,[3]=>a
         $mask_splitted = str_split($mask->mask);

         // building REGEX string
         foreach ( $mask_splitted as $value ) {
            switch ($value) {
               case "N":
                  $char = $N; //[0-9]
                  break;
               case "A":
                  $char = $A; //[A-Z]
                  break;
               case "a":
                  $char = $a;
                  break;
               case "X":
                  $char = $X;
                  break;
               case "Z":
                  $char = $Z;
                  break;    
               default:
                  $char = '';
                  break;
            }
            // by default $char is empty
            // concatenate to the end, [0-9]<-[a-z]...
            $regex_mask .= $char; 
         }
         
         // pattern is completely formed
         $pattern = '/'. $regex_mask .'/';
         
         preg_match($pattern, $inputSerialNumber, $checkRegex);
         
         // comparing mask.lenght and input's serial number length for equality
         strlen($inputSerialNumber) == count($mask_splitted) ? $checkLength = true : $checkLength = false;

         // final checking, REGEX and LENGTH
         if ( $checkRegex && $checkLength ) {
            $resultCheckMask = true;
         } else if (!$checkRegex || !$checkLength) {
            return "Serial number mask is wrong";
         }

      } else {
         // $error = true;
         return "Equipment type is not exist in DB";
      }

      // get "serial number" from table "equipment"
      try {
         $isSerialNumberInDb = Equipment::where('type_equipment', '=', $inputEquipment )
                                       ->where('serial_number', '=', $inputSerialNumber)
                                       ->first();
      } catch ( QueryException $e ) {
         $error = true;
      }
      if ( $isSerialNumberInDb ) {
         return "Serial number is already exist";
      }

      // final all checking
      if ( $resultCheckMask && !$isSerialNumberInDb && !$error ) {
         return "ok";
      }
      return "wrong";
   }
}
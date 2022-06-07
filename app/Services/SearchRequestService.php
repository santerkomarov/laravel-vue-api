<?php
namespace App\Services;

use App\Http\Requests\EquipmentStoreRequest;

use App\Http\Resources\EquipmentCollection;

use Illuminate\Http\Request;

use App\Models\Equipment;

use Illuminate\Support\Facades\DB;

class SearchRequestService {

   /**
     * Sanitize parameter.
     * "%%" in searching word return all rows from DB
     * to prevent that incorrect behaviour change the symbols "%%" by empty spaces
     * @param string $r
     * @return string
   */

   public function sanitize($r)
   {
      $r = htmlspecialchars(strip_tags($r));
      return $r;
      if ($r == '') {
         return " " . $r;
      }
      return (preg_replace( '/%/', ' ', $r));
   }

   /**
     * Search $search in column $name in DB "equipment"
     *
     * @param string $search
     * @param string $name
     * @return boolean
     * 
   */
   public function is($search, $name)
   {
      // sanitize searching word
      $search = $this->sanitize($search);
      if ( $search ) {
         if ( Equipment::where("$name", "LIKE","%$search%")->count() ) {
            return true;
         }
         return false;
      }
      return false;
   }
}
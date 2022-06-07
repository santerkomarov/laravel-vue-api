<?php
namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SanitizeAction {
   public function handle( $request, $field )
   {
      /**
      * Sanitize request parameters before 
      *
      * @param  Illuminate\Http\Request $request
      * @param str $field
      * @return str
      */
      $field = $request->get($field);
      $res = trim($field);
      $res = strip_tags($res);
      $res = htmlspecialchars($res);
      return $res;
   }
}
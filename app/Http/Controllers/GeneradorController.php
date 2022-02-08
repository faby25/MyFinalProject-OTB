
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends GeneradorController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function imprimir(){
         $pdf = \PDF::loadView('ejemplo');
         return $pdf->download('ejemplo.pdf');
    }

    //si queremos enviar variables
//     public function imprimir(){
    //   $today = Carbon::now()->format('d/m/Y');
    //   $pdf = \PDF::loadView('ejemplo', compact('today'));
    //   return $pdf->download('ejemplo.pdf');
    // }
}

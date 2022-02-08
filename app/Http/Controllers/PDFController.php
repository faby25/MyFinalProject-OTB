<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Notice;

class PDFController extends Controller
{
  /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $request)
      {
          // $data = [
          //     'title' => 'Detalle de Resibo',
          //     'date' => date('m/d/Y')
          // ];
          $notice=Notice::first();


            $pdf = PDF::loadView('notices.recibo', $notice);
          // $pdf = PDF::loadView('post-first-card', $data);
          return $pdf->download('tutsmake.pdf');
      }

      // public function imprimir(){
      //      $pdf = \PDF::loadView('ejemplo');
      //      return $pdf->download('ejemplo.pdf');
      // }
}

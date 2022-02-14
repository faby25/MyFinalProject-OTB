<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;

use App\Models\Notice;
use App\Models\Meter;
use Illuminate\Support\Str;
class PDFController extends Controller
{
  /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Notice $notice)
      {
          $pdf = PDF::loadView('notices.form', compact('notice'));
          // $pdf = PDF::loadView('post-first-card', $notice);
          return $pdf->download('tutsmake.pdf');
      }

      public function last(Request $request)
      {
          $meters = Meter::where('user_id', auth()->id())->get();
          $notices=Notice::all();
          $last=$notices[0];
          foreach ($meters as $meter){
              foreach ($notices as $notice){
                if ($notice->lectura->meter_id == $meter->id){
                      $last=$notice;
                }
              }
            }
            $notice=$last;
            $pdf = PDF::loadView('notices.form', compact('notice'));
          // $pdf = PDF::loadView('post-first-card', $notice);
          return $pdf->download('tutsmake.pdf');
      }
      // public function imprimir(){
      //      $pdf = \PDF::loadView('ejemplo');
      //      return $pdf->download('ejemplo.pdf');
      // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfController extends Controller
{
    //
    public function index(){
        $data = [
            'text' => 'this is generating pdf with laravel',
            'date' => date('m/d/Y')
            ];
            $pdf = Pdf::loadView('showPDF', $data);
            return $pdf->download(date('m_d_Y').'.pdf');
    }
}

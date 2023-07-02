<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/sertif', function (Request $request) {
    $pdf = Pdf::loadView('dashboard.certificate');
    return $pdf->download('sertif.pdf');
    // return view('dashboard.certificate');
});

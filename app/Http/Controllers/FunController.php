<?php

namespace App\Http\Controllers;

use App\Post;
use \Mpdf\Mpdf as PDF; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FunController extends Controller
{   

    public function document(Request $request)
    {   
        $posts = Post::firstOrFail();
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        $document->WriteHTML('<h1 style="color:blue">'.$posts->title.'</h1>');
        $document->WriteHTML('<p style="color:blue">'.$posts->description.'</p>');
        $document->WriteHTML('<p style="color:blue">'.$posts->email.'</p>');
        $document->WriteHTML('<p>'.$posts->file.'</p>');
        // $document->WriteHTML(view('download-pdf'));
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
    
}

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
 
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     

        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        $document->WriteHTML('<h1 style="color:blue">'.$posts->title.'</h1>');
        $document->WriteHTML('<p style="color:blue">'.$posts->description.'</p>');
        $document->WriteHTML('<p style="color:blue">'.$posts->email.'</p>');
        $document->WriteHTML('<img src="'.public_path('storage/file/'.$posts->file).'" alt="image" height="300" width="300">');

        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }

//     public function document(Request $request,$title)
// {     
 
//     $posts = Post::firstWhere('title',$title);
//     dd($posts);
    
//     if ($posts && is_object($posts)) {
//         $documentFileName = "fun.pdf";

//         $document = new PDF([
//             'mode' => 'utf-8',
//             'format' => 'A4',
//             'margin_header' => '3',
//             'margin_top' => '20',
//             'margin_bottom' => '20',
//             'margin_footer' => '2',
//         ]);     
        
//         $header = [
//             'Content-Type' => 'application/pdf',
//             'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
//         ];
 
//         $document->WriteHTML('<h1 style="color:blue">'.$posts->title.'</h1>');
//         $document->WriteHTML('<p style="color:blue">'.$posts->description.'</p>');
//         $document->WriteHTML('<p style="color:blue">'.$posts->email.'</p>');
//         $document->WriteHTML('<img src="'.public_path('storage/file/'.$posts->file).'" alt="image" height="300" width="300">');

//         Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
//         return Storage::disk('public')->download($documentFileName, 'Request', $header);
//     }
    
//     abort(404, 'Post not found.');
// }


    
}

<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;

class WelcomeController extends Controller
{
    public function index(){
        header('Cache-Control: public, max-age=604800');
        return view('welcome');
    }

    public function onboarding()
    {
        $communities = Community::select('id', 'name')->get();
        return view('onboarding.index', compact('communities'));
    }

    public function agreement()
    {
        return view('onboarding.agreement');
    }

    

    public function signed()
    {
        // Generate the PDF content
        $pdfContent = view('onboarding.signed')->render();
    
        // Create a new instance of Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
    
        // Set the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the PDF as a downloadable response
        return $dompdf->stream('agreement.pdf');
    }
    
    public function store(Request $request)
    {
        $agreement = new Agreement();
        $agreement->user_id = $request['user_id'];

        $agreement->save();
        return redirect(route('welcome.signed'));


        
    }

}

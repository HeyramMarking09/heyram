<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalDocument;
use Illuminate\Http\Request;

class AdditionalDocumentController extends Controller
{
    public function addAdditionalDocs(Request $request)
    {
        // Define the destination path
        $destinationPath = public_path('required_docs');

        // Check if the folder exists; if not, create it
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true); // Create the directory with appropriate permissions
        }
        if ($request->hasFile('simple_file')) {
            if ($request->file('simple_file')) {
                $originalFileName  = $request->file('simple_file')->getClientOriginalName();
                $fileName1 = time() . '_1_' . $originalFileName;
                $request->file('simple_file')->move($destinationPath, $fileName1);
            }
        } else {
            $fileName1 = null;
        }
        $CREATE = [
            'employer_id' => $request->employer_id,
            'name' => $request->name,
            'dead_line_date' => $request->dead_line_date,
            'simple_file' => $fileName1,
        ];
        AdditionalDocument::create($CREATE);
        return ['status'=>true , 'message'=>"Additional Dosc Added Successfully!" ];
    }
    public function uploadAdditionalDocs(Request $request)
    {
        $destinationPath = public_path('required_docs');
        if ($request->hasFile('docs_file')) {
            if ($request->file('docs_file')) {
                $originalFileName  = $request->file('docs_file')->getClientOriginalName();
                $fileName1 = time() . '_' . $originalFileName;
                $request->file('docs_file')->move($destinationPath, $fileName1);
            }
        } else {
            $fileName1 = null;
        }
        $CREATE = [
            'docs_file' => $fileName1,
        ];
        AdditionalDocument::where('id',$request->id)->update($CREATE);
        return redirect()->back()->with('status', 'Upload File');
    }
}

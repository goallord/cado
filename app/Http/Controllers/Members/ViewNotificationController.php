<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\ManageDocument;
use App\Models\NotificationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ViewNotificationController extends Controller
{
    public function  index(){
        $notifications = NotificationModel::latest()->get();
        return view('member.notice.index', compact('notifications'));
    }
    public function show($id)
    {
        $notice = NotificationModel::findOrFail($id);
        return view('member.notice.show', compact('notice'));
    }

    public function downloadDocuments(){
        $manageDocs = ManageDocument::simplePaginate('10');
        return view('member.notice.downloadDocument', compact('manageDocs'));
    }


    public function download($id)
    {
        $document = ManageDocument::findOrFail($id);
        $filePath = public_path($document->document);

        // Check if the file exists and is readable
        if (!file_exists($filePath) || !is_readable($filePath)) {
            abort(404, 'File not found or not readable');
        }

        // Get the MIME type based on the file extension
        $mimeType = File::mimeType($filePath);

        // Set the appropriate headers for the response
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment',
        ];

        // Log the public path for debugging
        $publicPath = public_path();
        Log::info("Public path: {$publicPath}");

        try {
            // Attempt to download the file
           // dd($filePath);
            return response()->file($filePath, $headers);
        } catch (\Exception $e) {
            // If download fails, output the file contents directly
            $fileContent = file_get_contents($filePath);

            $headers['Content-Length'] = strlen($fileContent);
            //dd($headers);

            return response($fileContent, 200, $headers);
        }
    }
}

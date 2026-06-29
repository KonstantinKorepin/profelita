<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendFormRequest;
use App\Services\SendMailer;
use RuntimeException;

class SendMailController extends Controller
{
    public function sendMail(SendFormRequest $request, SendMailer $service)
    {
        try {
            $service->send($request);
        } catch (RuntimeException $e) {
            return response()->json(['response' => 'ERROR', 'message' => $e->getMessage()]);
        }

        return response()->json(['response' => 'OK']);
    }
}

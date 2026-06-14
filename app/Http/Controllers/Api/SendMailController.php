<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendFormRequest;
use App\Services\SendMailer;

class SendMailController extends Controller
{
    public function sendMail(SendFormRequest $request, SendMailer $service)
    {
        $response = $service->send($request);
        return response()->json(['response' => $response]);
    }
}

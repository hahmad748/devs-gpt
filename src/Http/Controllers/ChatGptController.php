<?php

namespace Devsfort\ChatGpt\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Devsfort\ChatGpt\Managers\ChatGptManager;
use Illuminate\Support\Str;


class ChatGptController extends Controller
{
  
    /**
     * Returning the view of the app with the required data.
     *
     * @param int $id
     * @return void
     */
    public function index($id = null)
    {
        $response = [
            'status' => true,
            'message' => 'Welcome to Devsfort ChatGpt Manager'
        ];
         // send the response
        return Response::json($response, 200);
    }

    public function getResponse(Request $request)
    {
        return ChatGptManager::getResults($request);    
    }

}

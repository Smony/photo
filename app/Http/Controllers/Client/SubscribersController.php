<?php

namespace App\Http\Controllers\Client;

use App\Models\Subscribe;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribersController extends Controller
{
    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'email' =>  'required|email'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                    ->back()
                    ->withErrors($validator->messages());
        }

        Subscribe::create($validator->getData());

        return redirect(route('client.index.index'))
                ->with('message', 'Thanks for subscribing.');
    }
}
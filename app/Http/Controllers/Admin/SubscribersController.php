<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendMessagesToSubscribers;
use App\Models\Subscribe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribersController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'subscribers'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.subscribers.index', [
            'subscribers'    =>  Subscribe::paginate()
        ]);
    }

    /**
     * @param Subscribe $subscriber
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Subscribe $subscriber)
    {
        $subscriber->delete();

        dd($subscriber);

        return redirect(route('admin.subscribers.index'))
                ->with('message', 'Subscriber was successfully removed.');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function store(Request $request)
    {
        $rules = [
            'title' =>  'required|max:255',
            'message'   =>  'required'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.subscribers.index'))
                    ->withErrors($validator->messages());
        }

        $subscribers = $request->has('subscriber') ? Subscribe::where('id', $request->get('subscriber'))->get() : Subscribe::all();

        $status = $this->dispatch(new SendMessagesToSubscribers($subscribers, $request->get('title'), $request->get('message')));

        return $status
            ?   redirect(route('admin.subscribers.index'))
                ->with('message', 'Messages was successfully sent.')

            :   redirect(route('admin.subscribers.index'))
                ->withErrors('Whoops, looks like something went wrong. Please, try again later.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;

class ContactUsRequestController extends Controller
{
    public function store(ContactUsRequest $request)
    {
        \App\Models\ContactUsRequest::create($request->validated());

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('welcome');

    }// end of store

}//end of controller

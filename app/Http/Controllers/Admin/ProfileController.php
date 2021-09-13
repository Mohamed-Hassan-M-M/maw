<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');

    }// end of getChangeData

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,id,' . auth()->user()->id,
        ]);

        $requestData = $request->all();

        if ($request->image) {

            if (auth()->user()->has_image) {
                Storage::disk('local')->delete('public/uploads/' . auth()->user()->image);
            }

            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();

        }//end of if

        auth()->user()->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.home');

    }// end of postChangeData

}//end of controller

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsRequest;
use Yajra\DataTables\DataTables;

class ContactUsRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_contact_us_requests')->only(['index']);
        $this->middleware('permission:create_contact_us_requests')->only(['create', 'store']);
        $this->middleware('permission:update_contact_us_requests')->only(['edit', 'update']);
        $this->middleware('permission:delete_contact_us_requests')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('admin.contact_us_requests.index');

    }// end of index

    public function data()
    {
        $contact_us_requests = ContactUsRequest::select();

        return DataTables::of($contact_us_requests)
            ->addColumn('record_select', 'admin.contact_us_requests.data_table.record_select')
            ->editColumn('created_at', function (ContactUsRequest $contactUsRequest) {
                return $contactUsRequest->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.contact_us_requests.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();


    }// end of data

    public function destroy(ContactUsRequest $contactUsRequest)
    {
        $this->delete($contactUsRequest);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.contact_us_requests.index');

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $contactUsRequest = ContactUsRequest::FindOrFail($recordId);
            $this->delete($contactUsRequest);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.contact_us_requests.index');

    }// end of bulkDelete

    private function delete(ContactUsRequest $contactUsRequest)
    {
        $contactUsRequest->delete();

    }// end of delete

}//end of controller

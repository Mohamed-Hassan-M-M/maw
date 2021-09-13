@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('contact_us_requests.contact_us_requests')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('contact_us_requests.contact_us_requests')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-12">

                            @if (auth()->user()->hasPermission('delete_contact_us_requests'))
                                <form method="post" action="{{ route('admin.contact_us_requests.bulk_delete') }}" style="display: inline-block;">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="record_ids" id="record-ids">
                                    <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('site.bulk_delete')</button>
                                </form><!-- end of form -->
                            @endif

                        </div>

                    </div><!-- end of row -->

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                            </div>
                        </div>

                    </div><!-- end of row -->

                    <div class="row">

                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table datatable" id="contact_us_requests-table" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="record__select-all"/>
                                            <label for="record__select-all"></label>
                                        </th>
                                        <th>@lang('contact_us_requests.name')</th>
                                        <th>@lang('contact_us_requests.email')</th>
                                        <th>@lang('contact_us_requests.message')</th>
                                        <th>@lang('site.created_at')</th>
                                        <th style="width: 20%;">@lang('site.action')</th>
                                    </tr>
                                    </thead>
                                </table>

                            </div><!-- end of table responsive -->

                        </div><!-- end of col -->

                    </div><!-- end of row -->

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

        let contact_us_requestsTable = $('#contact_us_requests-table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.contact_us_requests.data') }}',
            },
            columns: [
                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'message', name: 'message'},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false},
            ],
            order: [[4, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            contact_us_requestsTable.search(this.value).draw();
        })
    </script>

@endpush
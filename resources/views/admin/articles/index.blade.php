@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('articles.articles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('articles.articles')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-12">

                            @if (auth()->user()->hasPermission('read_articles'))
                                <a href="{{ route('admin.articles.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> @lang('site.create')</a>
                            @endif

                            @if (auth()->user()->hasPermission('delete_articles'))
                                <form method="post" action="{{ route('admin.articles.bulk_delete') }}" style="display: inline-block;">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="status" class="form-control select2">
                                    <option value="">@lang('site.all') @lang('articles.statuses')</option>
                                    <option value="published">@lang('articles.published')</option>
                                    <option value="unpublished">@lang('articles.unpublished')</option>
                                </select>
                            </div>
                        </div>

                    </div><!-- end of row -->

                    <div class="row">

                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table datatable" id="articles-table" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="record__select-all"/>
                                            <label for="record__select-all"></label>
                                        </th>
                                        <th>@lang('articles.title')</th>
                                        <th>@lang('articles.status')</th>
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

        let status;
        let category = "{{ request()->category_id }}"

        let articlesTable = $('#articles-table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.articles.data') }}',
                data: function (d) {
                    d.status = status;
                    d.category_id = category;
                }
            },
            columns: [
                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false},
            ],
            order: [[3, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#status').on('change', function () {
            status = this.value;
            articlesTable.ajax.reload();
        });

        $('#data-table-search').keyup(function () {
            articlesTable.search(this.value).draw();
        })
    </script>

@endpush
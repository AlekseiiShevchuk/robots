@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-actions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.localized-actions.fields.language')</th>
                            <td>{{ $localized_action->language->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-actions.fields.action')</th>
                            <td>{{ $localized_action->action->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-actions.fields.name')</th>
                            <td>{{ $localized_action->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-actions.fields.sound')</th>
                            <td>@if($localized_action->sound)<a href="{{ asset('uploads/' . $localized_action->sound) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.localized_actions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
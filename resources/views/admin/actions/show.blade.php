@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.actions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.actions.fields.name')</th>
                            <td>{{ $action->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#localizedactions" aria-controls="localizedactions" role="tab" data-toggle="tab">Localized actions</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="localizedactions">
<table class="table table-bordered table-striped {{ count($localized_actions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.localized-actions.fields.language')</th>
                        <th>@lang('quickadmin.localized-actions.fields.action')</th>
                        <th>@lang('quickadmin.localized-actions.fields.name')</th>
                        <th>@lang('quickadmin.localized-actions.fields.sound')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($localized_actions) > 0)
            @foreach ($localized_actions as $localized_action)
                <tr data-entry-id="{{ $localized_action->id }}">
                    <td>{{ $localized_action->language->name or '' }}</td>
                                <td>{{ $localized_action->action->name or '' }}</td>
                                <td>{{ $localized_action->name }}</td>
                                <td>@if($localized_action->sound)<a href="{{ asset('uploads/' . $localized_action->sound) }}" target="_blank">Download file</a>@endif</td>
                                <td>
                                    @can('localized_action_view')
                                    <a href="{{ route('admin.localized_actions.show',[$localized_action->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('localized_action_edit')
                                    <a href="{{ route('admin.localized_actions.edit',[$localized_action->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('localized_action_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.localized_actions.destroy', $localized_action->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.actions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
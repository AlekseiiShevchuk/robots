@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-actions.title')</h3>
    @can('localized_action_create')
    <p>
        <a href="{{ route('admin.localized_actions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($localized_actions) > 0 ? 'datatable' : '' }} @can('localized_action_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('localized_action_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('localized_action_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('localized_action_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.localized_actions.mass_destroy') }}';
        @endcan

    </script>
@endsection
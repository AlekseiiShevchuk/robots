@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.actions.title')</h3>
    @can('action_create')
    <p>
        <a href="{{ route('admin.actions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($actions) > 0 ? 'datatable' : '' }} @can('action_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('action_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.actions.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($actions) > 0)
                        @foreach ($actions as $action)
                            <tr data-entry-id="{{ $action->id }}">
                                @can('action_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $action->name }}</td>
                                <td>
                                    @can('action_view')
                                    <a href="{{ route('admin.actions.show',[$action->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('action_edit')
                                    <a href="{{ route('admin.actions.edit',[$action->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('action_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.actions.destroy', $action->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('action_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.actions.mass_destroy') }}';
        @endcan

    </script>
@endsection
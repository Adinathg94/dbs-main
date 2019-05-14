@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.principal.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.principal.fields.message') }}
                    </th>
                    <td>
                        {!! $principal->message !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.principal.fields.name') }}
                    </th>
                    <td>
                        {{ $principal->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.principal.fields.photo') }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
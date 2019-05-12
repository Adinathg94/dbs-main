@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.socialLink.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.socialLink.fields.image') }}
                    </th>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.socialLink.fields.date') }}
                    </th>
                    <td>
                        {{ $socialLink->date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.socialLink.fields.title') }}
                    </th>
                    <td>
                        {{ $socialLink->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.socialLink.fields.platform') }}
                    </th>
                    <td>
                        {{ App\SocialLink::PLATFORM_SELECT[$socialLink->platform] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.socialLink.fields.url') }}
                    </th>
                    <td>
                        {{ $socialLink->url }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
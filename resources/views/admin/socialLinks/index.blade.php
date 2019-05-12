@extends('layouts.admin')
@section('content')
@can('social_link_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.social-links.create") }}">
                {{ trans('global.add') }} {{ trans('global.socialLink.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.socialLink.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.socialLink.fields.image') }}
                        </th>
                        <th>
                            {{ trans('global.socialLink.fields.date') }}
                        </th>
                        <th>
                            {{ trans('global.socialLink.fields.title') }}
                        </th>
                        <th>
                            {{ trans('global.socialLink.fields.platform') }}
                        </th>
                        <th>
                            {{ trans('global.socialLink.fields.url') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($socialLinks as $key => $socialLink)
                        <tr data-entry-id="{{ $socialLink->id }}">
                            <td>

                            </td>
                            <td>
                                @if($socialLink->image)
                                    <a href="{{ $socialLink->image->getUrl() }}" target="_blank">
                                        <img src="{{ $socialLink->image->getUrl() }}" width="150px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $socialLink->date ?? '' }}
                            </td>
                            <td>
                                {{ $socialLink->title ?? '' }}
                            </td>
                            <td>
                                {{ App\SocialLink::PLATFORM_SELECT[$socialLink->platform] ?? '' }}
                            </td>
                            <td>
                                {{ $socialLink->url ?? '' }}
                            </td>
                            <td>
                                @can('social_link_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.social-links.show', $socialLink->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('social_link_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.social-links.edit', $socialLink->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('social_link_delete')
                                    <form action="{{ route('admin.social-links.destroy', $socialLink->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.social-links.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('social_link_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
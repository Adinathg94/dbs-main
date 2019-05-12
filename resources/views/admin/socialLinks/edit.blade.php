@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.socialLink.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.social-links.update", [$socialLink->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="image">{{ trans('global.socialLink.fields.image') }}*</label>
                <div class="needsclick dropzone" id="image-dropzone">

                </div>
                @if($errors->has('image'))
                    <p class="help-block">
                        {{ $errors->first('image') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.socialLink.fields.image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('global.socialLink.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($socialLink) ? $socialLink->date : '') }}">
                @if($errors->has('date'))
                    <p class="help-block">
                        {{ $errors->first('date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.socialLink.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('global.socialLink.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($socialLink) ? $socialLink->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.socialLink.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('platform') ? 'has-error' : '' }}">
                <label for="platform">{{ trans('global.socialLink.fields.platform') }}*</label>
                <select id="platform" name="platform" class="form-control">
                    <option value="" disabled {{ old('platform', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\SocialLink::PLATFORM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('platform', $socialLink->platform) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('platform'))
                    <p class="help-block">
                        {{ $errors->first('platform') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="url">{{ trans('global.socialLink.fields.url') }}</label>
                <input type="text" id="url" name="url" class="form-control" value="{{ old('url', isset($socialLink) ? $socialLink->url : '') }}">
                @if($errors->has('url'))
                    <p class="help-block">
                        {{ $errors->first('url') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.socialLink.fields.url_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.social-links.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="image"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($socialLink) && $socialLink->image)
      var file = {!! json_encode($socialLink->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    }
}
</script>
@stop
@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.pages.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>

                            @error('title') <span style="color:#dc3545;">{{ $message }}</span> @enderror
                        </div>                       
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="content">Content <span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" name="content">{{ old('content') }}</textarea>

                            @error('content') <span style="color:#dc3545;">{{ $message }}</span> @enderror
                        </div>                       
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="slug">Slug <span class="m-l-5 text-danger"> *</span></label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">{{ url('/') .'/' }}</span>
                              </div>
                              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3">
                              @error('slug') <span style="color:#dc3545;">{{ $message }}</span> @enderror
                            </div>
                            
                        </div>                        
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <input type="checkbox" id="foot"><b style="margin-left: 10px;">Footer Position</b>
                        </div>                       
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <select name="footer_position" class="form-control" style="padding-left:0px;" id='select_footer'>
                                <option selected="" value="">Select a position</option>
                                <option value="company">Company</option>
                                <option value="other_links">Other links</option>
                            </select>
                        </div>                       
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Publish Page</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('blog.category') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('#foot').on('change', function() {
            $('#select_footer').toggle(this.checked);
        }).change();
    </script>
@endpush
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
                <form action="{{ route('blog.store.post') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>

                            @error('title') {{ $message }} @enderror
                        </div>                        
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="content">Content <span class="m-l-5 text-danger"> *</span></label>
                            
                            <textarea name="content" id="content" cols="5" rows="6" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}"></textarea>

                            @error('content') {{ $message }} @enderror
                        </div>                        
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="featured">Featured Image <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('featured') is-invalid @enderror" type="file" name="featured" id="featured" value="{{ old('featured') }}"/>

                            @error('featured') {{ $message }} @enderror
                        </div>                        
                    </div>

                    <p>| JPEG | JPG | PNG | GIF |</p>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="category_id">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach($blog_categories as $blog_category)
                                    <option value="{{ $blog_category->id }}">{{ $blog_category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id') {{ $message }} @enderror
                        </div>                        
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="category_id">Select Tag <span class="m-l-5 text-danger"> *</span></label>
                            
                            @foreach($blog_tags as $blog_tag)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="tags[]" style="cursor: pointer;" value="{{ $blog_tag->id }}"> {{ $blog_tag->name }}</label>
                                </div>
                            @endforeach

                            @error('tags') {{ $message }} @enderror
                        </div>                        
                    </div>

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="category_id">Type <span class="m-l-5 text-danger"> *</span></label><br>
                            
                            <input type="radio" name="is_homepage" id="is_homepage" value="0"/> General
                            <br><input type="radio" name="is_homepage" id="is_homepage" value="1"/> Premium

                            @error('is_homepage') <br>{{ $message }} @enderror
                        </div>                        
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Post</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('blog.post') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .bd-t {
        border-top: 1px solid #bedaf1 !important;
    }

    .mg-t-10 {
        margin-top: 10px !important;
    }
    .row a{
        text-decoration: none !important;
    }

    #recent-article .img-holder img{
	    /*width: 100%;
	    max-width: 536px;*/
	    width: 530px;
	    height: 545px;
	}

	#recent-article .article-summary .article-text {
	    color: #cae9ff;
	    font-size: 15px;
	    line-height: 31px !important;
	    margin-bottom: 62px !important;
	}

    .form-text select {
        width: 100%;
        padding: 15px 30px;
        border-radius: 100px;
        text-align: left;
        background-color: #ffffff;
        border: 0;
        font-size: 15px;
        font-weight: 700;
        color: #0397ff;
        outline: 0;
        -webkit-box-shadow: 0 6px 12px 0 rgb(18 113 179 / 14%);
        -moz-box-shadow: 0 6px 12px 0 rgba(18, 113, 179, 0.14);
        box-shadow: 0 6px 12px 0 rgb(18 113 179 / 14%);
        -webkit-transition: all 0.3s ease 0.0s;
        -moz-transition: all 0.3s ease 0.0s;
        transition: all 0.3s ease 0.0s;
    }

    /* Customize the label (the container) */
    .check-container {
      display: inline-block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 16px;
      font-weight: normal;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .check-container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .check-container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .check-container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .check-container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .check-container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }


    .radio-container {
      display: inline-block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 16px;
      font-weight: normal;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .radio-container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .radiocheckmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .radio-container:hover input ~ .radiocheckmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .radio-container input:checked ~ .radiocheckmark {
      background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .radiocheckmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio-container input:checked ~ .radiocheckmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio-container .radiocheckmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .alert-danger {
        color: #fff !important;
        background-color: #DC3545 !important;
        border-color: #DC3545 !important;
    }

</style>

@extends('layouts.master')
@section('title', 'All Blogs')
@section('content')
	
<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title">Publish your own blog post</div>
            </div>
        </div>
    </div>
</div>

<div id="recent-article" class="container-fluid">
    
    <div class="container">
        <div class="row">

            <div class="signin-signup-form" style="margin-top:0px;">

                @if($errors->any())
                    <div class="alert alert-danger" style="text-align: initial;margin-bottom:25px;">
                        <ul>
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div>
                @endif
                
                <form id="signinform" action="{{ route('store.user.blog') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-text">
                        <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="@error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-6 form-text">
                            <label class="control-label" for="featured">Featured Image <span class="m-l-5 text-danger"> *</span></label>
                            <input class="@error('featured') is-invalid @enderror" type="file" name="featured" id="featured" value="{{ old('featured') }}"/>
                        </div>

                        <div class="col-md-6 form-text">
                            <label class="control-label" for="featured">Type <span class="m-l-5 text-danger"> *</span></label><br>

                            <label class="radio-container" style="margin-left: 20px; margin-top: 15px;">General
                              <input type="radio" name="is_homepage" id="is_homepage" value="{{ old('is_homepage', 0) }}"/>
                              <span class="radiocheckmark"></span>
                            </label>

                            <label class="radio-container" style="margin-left: 20px; margin-top: 15px;">Premium
                              <input type="radio" name="is_homepage" id="is_homepage" value="{{ old('is_homepage', 1) }}"/>
                              <span class="radiocheckmark"></span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6 form-text">
                            <label class="control-label" for="category_id">Select Category <span class="m-l-5 text-danger"> *</span></label>
                            <select name="category_id" id="category" class="@error('category_id') is-invalid @enderror">
                                @foreach($blog_categories as $blog_category)
                                    <option value="{{ old('category_id', $blog_category->id) }}">{{ $blog_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 form-text">
                            <label class="control-label" for="tag">Select Tag <span class="m-l-5 text-danger"> *</span></label><br>

                            @foreach($blog_tags as $blog_tag)
                                    
                                     
                                        <label class="check-container" style="margin-left: 20px; margin-top: 15px;">{{ $blog_tag->name }}
                                            <input type="checkbox" name="tags[]" style="cursor: pointer;" value="{{ old('tags[]', $blog_tag->id) }}">
                                            <span class="checkmark"></span>
                                        </label>


                                
                            @endforeach
                            
                        </div>

                    </div>

                    <div class="form-text">
                        <label class="control-label" for="content" style="margin-top:15px;">Content <span class="m-l-5 text-danger"> *</span></label>
                        <textarea name="content" id="content" cols="8" rows="12" class="@error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    </div>


                    <div class="form-button">
                        <button id="submit" type="submit" class="btn btn-default">Save Post <i class="hno hno-arrow-right"></i></button>
                    </div>
                    
                </form>
        
            </div>
                    
                
        </div>
    </div>
</div>

@stop

<script type="text/javascript">
    
</script>
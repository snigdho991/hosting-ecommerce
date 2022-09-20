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
</style>

@extends('layouts.master')
@section('title', 'All Blogs')
@section('content')
	
<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title">All Blog & News</div>
            </div>
        </div>
    </div>
</div>

<div id="recent-article" class="container-fluid">
    <div class="custom-bg"></div>
    <div class="container">
        <div class="row">
        	@if($featured_blog)
	        	@foreach($featured_blog as $single_featured)
		            <div class="col-md-6">
		                <div class="img-holder"><img src="{{ asset('/'.$single_featured->featured) }}" alt=""></div>
		            </div>
		        
	            	<div class="col-md-6">
	                <div class="article-summary">
	                    <div class="article-title"><a href="{{ route('blog.details', $single_featured->slug) }}">{{ $single_featured->title }}</a></div>
	                    <div class="article-date" style="margin-top: 2.5px;">{{ $single_featured->created_at->toFormatteddatestring() }} </div>
	                    <div class="article-text">{!! \Illuminate\Support\Str::limit($single_featured->content, 410, '...') !!} 
	                    </div>
	                    <div class="article-links" style="height: 230px;">
	                        <div class="col-xs-6">
	                            <div class="readmore-holder">
	                                <a href="{{ route('blog.details', $single_featured->slug) }}" class="readmore-button">Read Full Article</a>
	                            </div>
	                        </div>
	                        <div class="col-xs-6" style="display: inline-flex;margin-top: 8px;">
	                            {{-- <div class="socialshare-holder">
	                                <div class="addthis_inline_share_toolbox_6fdn" data-title="{{ $single_featured->title }}" data-description="{!! $single_featured->content !!}" data-media="THE IMAGE"></div>
	                            </div> --}}
                                <p style="color: #cae9ff; font-size: 15px;">Author : </p> 
                                <div class="article-date" style="margin-left: 5px;">
                                    
                                    @if($single_featured->admin_id == null)

                                        <?php
                                            $get_firstname = \App\Models\User::where('id', $single_featured->user_id)->first()->first_name;
                                            $get_lastname = \App\Models\User::where('id', $single_featured->user_id)->first()->last_name;
                                        ?>
                                        {{ $get_firstname . ' ' . $get_lastname }}
                                    @else 
                                        <?php
                                            $get_name = \App\Models\Admin::where('id', $single_featured->admin_id)->first()->name;
                                            
                                        ?>
                                        {{ $get_name }}
                                    @endif
                                </div>
	                        </div>
	                    </div>
	                </div>
	            	</div>
            	@endforeach
		    @endif
        </div>
    </div>
</div>
<div id="articles" class="container-fluid">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-sm-6 col-md-4">
                <div class="article-summary">
                    <div class="article-img"><img src="{{ asset('/'.$blog->featured) }}" style="width: 320px;height: 270px;" alt="" /></div>
                    <div class="article-title"><a href="{{ route('blog.details', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 36, '...') }}</a></div>
                    <div class="article-date">{{ $blog->created_at->toFormatteddatestring() }}</div>
                    <div class="article-text">{!! \Illuminate\Support\Str::limit($blog->content, 120, '...') !!}
                    </div>
                    <div class="article-links">
                        <div class="col-xs-6" style="display: inline-flex;margin-top: 8px;">
                            <p style="color: #0f9aee; font-size: 15px;">Author : </p> 
                                <div class="article-date" style="margin-left: 5px;color: #555;margin-top: 2.5px;">
                                    
                                    @if($blog->admin_id == null)

                                        <?php
                                            $get_firstname = \App\Models\User::where('id', $blog->user_id)->first()->first_name;
                                            $get_lastname = \App\Models\User::where('id', $blog->user_id)->first()->last_name;
                                        ?>
                                        {{ $get_firstname . ' ' . $get_lastname }}
                                    @else 
                                        <?php
                                            $get_name = \App\Models\Admin::where('id', $blog->admin_id)->first()->name;
                                            
                                        ?>
                                        {{ $get_name }}
                                    @endif
                                </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="readmore-holder">
                                <a href="{{ route('blog.details', $blog->slug) }}" class="readmore-button">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
            
            {{-- <div class="col-md-12">
                <div class="pagination">
                    <span class="current page-number">1</span>
                    <a class="page-number" href="#">2</a>
                    <a class="next page-number" href="#">Next</a>
                </div>
            </div> --}}
        </div>  
    </div>
</div>
<div id="greybg-info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">Want to publish blog here?<br> </div>
                <a href="{{ route('publish.blog') }}" class="white-less-shadow-button">Add Blog Post</a>
            </div>
        </div>
    </div>
</div>

@stop
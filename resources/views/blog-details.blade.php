@extends('layouts.master')
@section('title', 'Blogs Details')
@section('content')

<div id="page-head" class="container-fluid inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-title" style="margin-bottom: 5px;">{{ $single_blog->title }}   
                </div>
                <i class="fa fa-comment" style="color: #337ab7;font-weight: bold;font-size: 15px; margin-right: 3px;"></i>
                <a href="{{ route('blog.details', ['slug' => $single_blog->slug ]) }}#disqus_thread" style="color: #337ab7; display: inline-block; font-size: 15px; font-weight: 300;"></a>
            </div>
        </div>
    </div>
</div>

<div id="post-content" class="container-fluid">
    <div class="container">
        <div id="post-body" class="row">
            <div id="post-holder" class="col-md-9">
                <div id="post-1" class="post">
                    <div class="post-thumbnail">
                        <img src="{{ asset('/'.$single_blog->featured) }}" style="width: 850px;height: 575px;" class="post-image" alt="">			
                    </div>
                    <h4 class="post-title">{{ $single_blog->title }}</h4>		
                    {{-- <div class="meta">
                        <span class="view">10 Views</span><span class="like"><a href="#" class="like-btn">7 Like</a></span>		
                    </div> --}}
                    <div class="post-content">
                        <p>{!! $single_blog->content !!}</p>
                    </div>
                </div>
                <div class="post-author" style="margin-bottom: 55px; margin-top: 30px;">
                    <div class="row">
                        <div class="col-sm-2">
                            <img alt="" src="{{ url('https://via.placeholder.com/100x100?text=Avatar') }}">		
                        </div>
                        <div class="col-sm-10">
                            <h3 class="name">
                                @if($single_blog->admin_id == null)

                                    <?php
                                        $get_firstname = \App\Models\User::where('id', $single_blog->user_id)->first()->first_name;
                                        $get_lastname = \App\Models\User::where('id', $single_blog->user_id)->first()->last_name;
                                    ?>
                                    {{ $get_firstname . ' ' . $get_lastname }}
                                @else 
                                    <?php
                                        $get_name = \App\Models\Admin::where('id', $single_blog->admin_id)->first()->name;
                                        
                                    ?>
                                    {{ $get_name }}
                                @endif
                            </h3>
                            <p class="desc">Posted on : {{ $single_blog->created_at->toFormatteddatestring() }}</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="sidebar" class="col-md-3">
                <div class="widget-area">
                    <div id="categories" class="widget">
                        <h3 class="widget-title">Categories</h3>
                        @foreach($cats as $cat) 
                            <div class="item">
                                <a href="#">{{ $cat->name }}<span>{{ \App\Models\BlogPost::where('category_id', $cat->id)->count() }}</span></a>
                            </div>
                        @endforeach                       
                    </div>

                    <div id="popular-posts" class="widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        @foreach($recent_blogs as $recent_blog)				
                            <div class="item row">
                                <div class="thumb col-xs-3">
                                    <img src="{{ asset('/'.$recent_blog->featured) }}" style="width: 90px; height: 60px;" alt="">					
                                </div>
                                <div class="info col-xs-9">
                                    <span class="date">{{ $recent_blog->created_at->toFormatteddatestring() }}</span>
                                    <span class="title">
                                        <a href="{{ route('blog.details', $recent_blog->slug) }}">{{ $recent_blog->title }}</a>
                                    </span>
                                </div>
                            </div>
                        @endforeach                       
                    </div>

                    <div id="tags" class="widget">
                        <h3 class="widget-title">All Tags</h3>
                        <div class="tags">
                        @foreach($tags as $tag)
                            <a href="#" class="tag-link">{{ $tag->name }}</a>
                        @endforeach    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop
@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('blog.create.post') }}" class="btn btn-primary pull-right">Add Blog Post</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Image </th>
                                <th> Name </th>
                                <th> Slug </th>
                                
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blog_posts as $key=>$blog_post)
                                
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('/'.$blog_post->featured) }}" style="height: 40px; width: 50px;">
                                    </td>
                                    <td>{{ $blog_post->title }}</td>
                                    <td>{{ $blog_post->slug }}</td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('blog.edit.post', $blog_post->slug) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('blog.trash.post', $blog_post->slug) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to trash the post ?')"><i class="fa fa-archive"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
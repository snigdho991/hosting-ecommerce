<style type="text/css">

    .image_upload_zone {
        display: block;
        width: 100%;
        border: 2px dashed #ddd;
        position: relative;
        padding: 40px 10px;
        margin: 25px 0;
    }

    .image_upload_zone input[type=file] {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .image_upload_zone img {
        vertical-align: middle;
        border-style: none;
        width: 100px;
        margin: auto;
        display: block;
    }

    .image_upload_zone .text {
        text-align: center;
        font-size: 1.7rem;
        font-weight: normal;
    }

    .image_upload_zone .text button {
        background: #fff;
        padding: 10px 25px;
        margin: 15px 0;
        font-weight: bold;
        box-shadow: 0 1px 10px #0002;
        border: 1px solid #bcbcbc;
    }

    .remove_img_preview
    {
        position: relative;
        top: -105px;
        right: 48px;
        background: red;
        color: white;
        border-radius: 50%;
        font-size: 1.3em;
        padding: 0 0.4em 0;
        text-align: center;
        cursor: pointer;
    }

    .remove_img_preview:before
    {
        content: "×";
    }

    .name_ext
    {
        display: block;
        width: 100%;
        border: 2px dashed #ddd;
        position: relative;
        padding: 40px 10px;
        margin: 25px 0;
    }
</style>

@extends('layouts.master')
@section('title', config('settings.site_title'))
@section('content')

    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">Upload Gallery Image(s)</div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact-info" class="container-fluid bd-t">
        <div class="container">
            <div class="row">

                <div class="signin-signup-form">
                    @if($errors->any())
                        <div class="alert alert-danger" style="text-align: initial;margin-bottom:25px;">
                            <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" id="signinform" method="post" action="{{ route('store.gallery.images') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="image_upload_zone" for="">
                            <input type="file" accept="image/*" id="thumbnail" name="thumbnail[]" multiple="">
                            
                            <img src="http://review-app.test/public/backend/images/svgicon/upload.svg" alt="Upload">
                            
                            <div class="text">
                                <span>Drag And drop Image(s) Here</span>
                                <strong>Or</strong>
                                <br>
                                <button>Select Image(s)</button>
                                <br>
                                <span>
                                    File Type: JPG,PNG,GIF,JPEG
                                    <br>
                                    Best Resulation: 1200x300
                                    <br>
                                    You can select multiple images to upload.
                                </span>
                            </div>
                        </label>

                        <div class="form-button">
                            <button id="submit" type="submit" style="margin-bottom: 25px;" class="btn btn-default">Upload Image(s) <i class="hno hno-arrow-right"></i></button>
                        </div>
                    </form>
                </div>

                <div id="thumbnailPreview"></div>
            
            </div>

        </div>
    </div>

    
    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <div class="page-title">Already Uploaded Images</div>
                </div>

            </div>
        </div>
    </div>

    <div id="contact-info" class="container-fluid bd-t">
        <div class="container">
            <div class="row">

                <?php 
                    $all_images = $my_images->first()->thumbnail; 
                    $all_imgs   = $pieces = explode(", ", $all_images);
                ?>

                @foreach($all_imgs as $single_img)
                    @if($single_img != null)

                        <?php
                            preg_match('#\((.*?)\)#', $single_img, $match);                     
                        ?>

                        <div class="col-md-4" id="team" style="background-color: #ffffff;padding-top: 25px; padding-bottom: 0px !important;margin-top: 20px;margin-bottom: 25px;">
                            <div class="person-box" style="height: 275px;padding: 0px !important; cursor: pointer;">
                                <a href="{{ asset('img-gallery/'.$single_img) }}" target="_blank">
                                    <img src="{{ asset('img-gallery/'.$single_img) }}" style="width: 355px; height: 269px; border-radius: 14px; margin-top: 3px;" alt="">
                                </a>
                            </div>

                            <?php
                                $new_img = strtok($single_img, " ");
                            ?>

                            <div class="name_ext">
                                <span style="font-size:15px; font-weight:600;">
                                    <a href="{{ asset('img-gallery/'.$single_img) }}" style="color:#222;" target="_blank">
                                        {{ \Str::limit($new_img, 35, '..') }}
                                    </a>
                                </span>
                                <br>
                                    {{ $match[1] }}
                                <br>
                                <a href="{{ url('/gallery-image/delete/').'/'.$single_img }}" class="btn btn-danger btn-xs padding-btn" style="margin-top:10px;">
                                    <i class="fa fa-trash"></i> Delete Image 
                                </a>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-danger">No Gallery Image Found !</div>
                    @endif
                @endforeach
            
            </div>

        </div>
    </div>
    

@stop


@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
              $("#thumbnail").on("change", function(e) {
                var files = e.target.files,
                  filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                  var f = files[i]
                  var fileReader = new FileReader();
                  fileReader.onload = (function(e) {
                    var file = e.target;
                    var span = document.createElement('span');
                    span.innerHTML = ['<img style="height:180px; width:230px; border: 1px dashed #222; margin-right:35px; margin-top: 30px;margin-bottom: 60px; padding:10px;" src="',e.target.result,'" title="Preview Image"/><span class="remove_img_preview"></span>'].join('');
                    document.getElementById('thumbnailPreview').insertBefore(span, null);
                    $(".remove_img_preview").click(function(){
                        $(this).parent('span').remove();
                        $(this).val("");
                        $('#thumbnail').val("");
                    });
                    
                  });
                  fileReader.readAsDataURL(f);
                }
              });
            } else {
              alert("Your browser doesn't support to File API!")
            }
        });
    </script>
@endsection
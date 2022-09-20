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
        <div class="col-md-4 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Default Theme</h3>

                <div class="tile-body">
                    <h5><i class="fa fa-check-square-o"></i> {{ $theme_selected->theme }}</h5>
                </div>
  
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.theme.update') }}" method="POST" role="form">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group" style="font-weight: bold; font-size: 16px;">
                           <input <?php if ($theme_selected->theme == 'Classic') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Classic"/> Classic
                        </div>

                        <div class="form-group" style="font-weight: bold; font-size: 16px;">
                            <input <?php if ($theme_selected->theme == 'Mightnight Blue') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Midnight_Blue"/> Midnight Blue
                         </div>

                         <div class="form-group" style="font-weight: bold; font-size: 16px;">
                            <input <?php if ($theme_selected->theme == 'Cyan') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Cyan"/> Cyan
                         </div>

                         <div class="form-group" style="font-weight: bold; font-size: 16px;">
                            <input <?php if ($theme_selected->theme == 'Purple') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Purple"/> Purple
                         </div>

                         <div class="form-group" style="font-weight: bold; font-size: 16px;">
                            <input <?php if ($theme_selected->theme == 'Christmas') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Christmas"/> Christmas
                         </div>

                        <div class="form-group" style="font-weight: bold; font-size: 16px;">
                           <input <?php if ($theme_selected->theme == 'Blue') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Blue"/> Blue
                        </div>

                        <div class="form-group" style="font-weight: bold; font-size: 16px;">
                           <input <?php if ($theme_selected->theme == 'Dark') {echo "checked";} ?> type="radio" style="cursor: pointer; margin-right: 3px;" name="theme" value="Dark"/> Dark
                        </div>
                        
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Set as Default</button>
                        &nbsp;&nbsp;&nbsp;
                        {{-- <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
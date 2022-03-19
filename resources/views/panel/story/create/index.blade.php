@extends('panel.layouts.extends')
@section('title')
    @lang('words.story_create')
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var $repeater = $('.repeater').repeater({
        repeaters: [{
            selector: '.inner-repeater',
            repeaters: [{
                selector: '.deep-inner-repeater'
            }]
        }]
    });
</script>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="pt-1 pb-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($m = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <div class="alert-body">
                                        {{ $m }}
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('words.story_create')</h4>
                                </div>
                                <form method="POST" action="{{ route('panel.story.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="repeater">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">@lang('words.title')</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                            <div data-repeater-list="stories">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-10 col-12">
                                                            <div class="form-group">
                                                                <label for="name">@lang('words.image')</label>
                                                                <input type="file" name="image" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12">
                                                            <div class="form-group">
                                                                <button data-repeater-delete type="button" class="btn btn-danger waves-effect waves-float waves-light w-100">
                                                                    @lang('words.delete')
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button data-repeater-create type="button" class="btn btn-success waves-effect waves-float waves-light w-100">
                                                @lang('words.add_attribute')
                                            </button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light mt-2 mb-2 float-right">@lang('words.save')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

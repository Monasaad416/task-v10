@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper px-4 py-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

        @php
            $categories = App\Models\Category::all();
            $subCategories = [];
        @endphp


        @inject('model', 'App\Models\Category')

        @include('inc.errors')

        {!! Form::model($model,[
            'route' => 'posts.store',
            ])
        !!}


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{trans('dashboard.title')}}:</strong>
                    <input type='text' name='title_en' class= 'form-control my-2' placeholder="Enter english title">
                    <input type='text' name='title_ar' class= 'form-control' placeholder="Enter arabic tile">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{trans('dashboard.body')}}:</strong>
                    <input type="text" name='body_ar' class = 'form-control my-2' placeholder="Enter english body">
                    <input type="text" name='body_en' class = 'form-control' placeholder="Enter arabic body">
                </div>
            </div>

        </div>
        <select name="category_id" class='form-control my-3'>
            @foreach ($categories as $category)
                <option value="{{ $category->id}}" >{{ $category->name['en'] }}</option>
            @endforeach
        </select>

        <select name="sub_category_id" class='form-control my-3'>

        </select>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      {!! Form::close() !!}
</div>


@endsection




@push('scripts')
    <script>
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                console.log(category_id);
                if (category_id) {
                     console.log(category_id);
                    $.ajax({
                        url: "{{ URL::to('/sub-cats-byCat') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="sub_category_id"]').append('<option value="' + key + '">' + value['en'] + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endpush




@extends('visitor.index')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-6">
        <a type="button" href="{{ url('/article/list_published') }}" class="btn btn-light btn-lg btn-block">Published Articles</a>
        <a type="button" href="{{ url('/article/filter_articles') }}" class="btn btn-light btn-lg btn-block">Filter Articles</a>
    </div>
</div>
@endsection


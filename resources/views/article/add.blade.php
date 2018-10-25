@extends('article.index')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Article
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="title">Article Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
            <label for="image">Article Category:</label>
            <select id="category" name="category_id" class="form-control">
            <option ng-repeat="category in categories" value="@{{category.id}}">@{{category.name}}</option>
            </select>
          </div>
          <div class="form-group">
              <label for="image">Article Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="body">Article Body:</label>
              <textarea type="text" class="form-control" name="body"></textarea>
          </div>
          <div class="form-group">
            <label for="body">Published:</label>
                <select class="form-control" name="published">
                    <option value="1">Published</option>
                    <option value="0">UnPublished</option>
                </select>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection


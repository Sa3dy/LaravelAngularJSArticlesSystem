@extends('visitor.index')

@section('content')

<div class="row justify-content-md-center">
    <div class="col">
        <h3>Filter with Category:</h3>
        <button type="button" class="btn btn-success btn-lg" ng-click="filterWithAllCategories()">All</button>
        <button type="button" class="btn btn-primary btn-lg" ng-repeat="category in categories" ng-click="filterWithCategory(category)">@{{category.name}}</button>
    </div>
</div>

<br/>
<div class="card-group">
    <div class="card" ng-repeat="article in articles">
        <img class="card-img-top" style="height: 200px; width: auto;" src="{{ asset("/images/") }}/@{{article.image}}">
        <div class="card-body">
            <h5 class="card-title">@{{article.title}}</h5>
            <p class="card-text">@{{article.body}}</p>
        </div>
        <a href="#" class="badge badge-primary">@{{article.category.name}}</a>
        <br/>
        <div class="card-footer" ng-repeat="comment in article.comments">
            <small class="text-muted">@{{comment.text}}</small>
        </div>
        <div class="card-footer" style="display: flex;">
            <input type="text" ng-model="comment[article.id]" class="form-control" ng-disabled="comment_confirmed" placeholder="Insert Comment."/>
            <button id="addCommentBtn" type="button" class="btn btn-success" ng-click="addCommentBtnClicked($index, article)" ng-disabled="comment_confirmed"><i class="fa fa-check"></i> Add</button>
        </div>
    </div>
</div>

@endsection


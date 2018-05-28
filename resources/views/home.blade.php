@extends('layouts.app')

@section('content')
<div class="black02 container-fluid posts_content">
  <div class="row">
    <div class="col-12 posts_header">
      <h1>Posts</h1>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-2 m-tp"></div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 posts_comb">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 content">
          <div class="items">
            <div class='row posts_each_cont'></div>
          </div>
          <div class="row backgraund-content comments-content"></div>
          <div class="pagination-content">
            <ul id="pagination" class="pagination-sm"></ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

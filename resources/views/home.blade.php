@extends('layouts.app')
@section('content')
    <div class="black02 container-fluid posts_content">
        <div class="row">
    <div class="col-12 posts_header">
      <h1>Posts</h1>
    </div>
    <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-2 m-tp"></div> -->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 posts_comb">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 content">
            <div>
                <button type='button' class='btn posts_read_more add_posts'>Add New Post</button>
            </div>
            <div class="clearfix"></div>
          <div class="items">
            <div class='row posts_each_cont'>
                @if(!$posts->isEmpty())
                 @foreach($posts as $post)
                    <div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 posts_each_cont_inner' data-id="{{ $post->id }}">
                        <div class='row post backgraund-content'>
                            <div class='col-12'>
                                <img class='posts_image' src="/images/{{ $post->img }}" alt='img'>
                            </div>
                            <div class='col-12 description_part'>
                                <h5 data-id='' class="posts_link"><a>{{ $post->title }}</a></h5>
                                <p class='posts_description'>{{ $post->description }}</p>
                            </div>
                        </div>
                        <div class='row postinfobot backgraund-content'>
                            <div class='col-12 likeblock pull-left'>
                                <i class='pull-left fa fa-clock-o'></i> <div class='pull-left'>
                                Type : 
                                @if($post->title)
                                  Public
                                @else
                                  Private
                                @endif
                                </div>
                            </div>
                            <div class='col-12 likeblock pull-left'>
                                <i class='pull-left fa fa-clock-o'></i> <div class='pull-left'>Created at :{{ $post->created_at }}</div>
                            </div>
                            <div class='col-12 buttons_part'>
                                <div class='comment_num'>
                                    <div><button type='button' class='btn posts_read_more post_view'>View</button></div>
                                    @if($check)
                                        <div><button type='button' class='btn posts_read_more posts_edit'>Edit</button></div>
                                        <div><button type='button' class='btn posts_read_more posts_delete'>Delete</button></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
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
<div id="viewPostModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class='col-10 offset-1'>
            <img class='posts_image' src="" alt='img'>
        </div>
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <p class="modal-description"></p>
        </div>
        <div class="modal-footer">
            <p class="modal-created-at">Created at : </p>
        </div>
    </div>
  </div>
</div>

<div id="editPostModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class='modal-body col-10 offset-1'>
            Title: <input class="title" type="text" value=""> 
        </div>
        <div class='modal-body col-10 offset-1'>
            Desc: <input class="description" type="text" value=""> 
        </div>
        <div class="modal-footer">
            <button type='button' class='btn posts_read_more edit_posts_save'>Save</button>
        </div>
    </div>
  </div>
</div>

<div id="addPostModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
<!--         <div class='modal-body col-10 offset-1'>
            Image: <input class="addNewImage" name="myFile" type="file"> 
        </div> -->
        <div class='modal-body col-10 offset-1'>
            Title: <input class="title" type="text" value=""> 
        </div>
        <div class='modal-body col-10 offset-1'>
            Desc: <input class="description" type="text" value=""> 
        </div>
        <div class="modal-body col-10 offset-1">
            Public: <input class="radioButton" type="radio" name="type" data-value="Public">
            <br>
            Private: <input class="radioButton" type="radio" name="type" data-value="Private">
        </div>
        <div class="modal-footer">
            <button type='button' class='btn posts_read_more create_posts_save'>Save</button>
        </div>
    </div>
  </div>
</div>
@endsection
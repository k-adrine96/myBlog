$( document ).ready(function() {

	function viewPost(postId){
		$.ajax({
	      url: 'posts/getPost',
	      type: "get",
	      data: {postId : postId},
	      dataType: "json",
	      success: result => {
			getPost(result[0]);
	      }
	    });
		$('#viewPostModal').modal().show();
	}

	function deletePost(postId){
		$.ajax({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
	      url: 'posts/deletePost',
	      type: "post",
	      data: {postId : postId},
	      dataType: "json",
	      success: result => {
	      	$('.posts_each_cont_inner').find().attr('data-id' , postId).remove();
	      	document.location.reload();
	      }
	    });
	}

	function updatePost(postId){
		let title = $('#editPostModal .title').val();
		let description = $('#editPostModal .description').val();
		let ajax_data = {
			'title' : title,
			'description' : description,
			'id' : postId
		};
		$.ajax({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
	      url: 'posts/updatePost',
	      type: "post",
	      data: ajax_data,
	      dataType: "json",
	      success: result => {
			$('#editPostModal').modal('toggle');
			let element = '.posts_each_cont_inner[data-id='+postId+']'
			$(element).find('.posts_link a').html(title);
			$(element).find('.posts_description').html(description);
	      }
	    });
	}

	function editPost(postId){
		$.ajax({
	      url: 'posts/getPost',
	      type: "get",
	      data: {postId : postId},
	      dataType: "json",
	      success: result => {
			$('#editPostModal').modal().show();
			$('#editPostModal .title').val(result[0].title);
			$('#editPostModal .description').val(result[0].description);
			$('#editPostModal .edit_posts_save').attr('data-id', postId);
	      }
	    });
	}

	function addPost(){
		let title = $('#addPostModal .title').val();
		let description = $('#addPostModal .description').val();
		let status = $('.radioButton:checked').attr('data-value') == "Public" ? 1 : 0;
		let ajax_data = {
			'title' : title,
			'description' : description,
			'status' : status
		};
		$.ajax({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
	      url: 'posts/createPost',
	      type: "post",
	      data: ajax_data,
	      dataType: "json",
	      success: result => {
			showNewPost(result.item);
			$('#addPostModal').modal('toggle');
	      }
	    });
	}

	function getPost(post){
		var title = post.title;
		var description = post.description;
		var created_at = post.created_at;
		var img = post.img;
		$('.modal-title').html(title);
		$('.modal-description').html(description);
		$('.modal-created-at').html(created_at);
		$('.posts_image').attr('src', 'images/' +img);
	}

	function showNewPost(item){
		var status = item.status == 1 ? 'Public' : 'Private';
		var buttons = `<div><button type='button' class='btn posts_read_more posts_edit'>Edit</button></div>
                	   <div><button type='button' class='btn posts_read_more posts_delete'>Delete</button></div>`;
        var	showButtons = item.user_id ? buttons : '';
		var newPost = `
			<div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 posts_each_cont_inner' data-id="`+ item.id +`">
                <div class='row post backgraund-content'>
                    <div class='col-12'>
                        <img class='posts_image' src="/images/`+ item.img +`" alt='img'>
                    </div>
                    <div class='col-12 description_part'>
                        <h5 data-id='' class="posts_link"><a>`+ item.title +`</a></h5>
                        <p class='posts_description'>`+ item.description +`</p>
                    </div>
                </div>
                <div class='row postinfobot backgraund-content'>
                    <div class='col-12 likeblock pull-left'>
                        <i class='pull-left fa fa-clock-o'></i> <div class='pull-left'>`+ status +`</div>
                    </div>
                    <div class='col-12 likeblock pull-left'>
                        <i class='pull-left fa fa-clock-o'></i> <div class='pull-left'>Created at : `+ item.created_at +`</div>
                    </div>
                    <div class='col-12 buttons_part'>
                        <div class='comment_num'>
                            <div><button type='button' class='btn posts_read_more post_view'>View</button></div>
							`+showButtons+`
                        </div>
                    </div>
                </div>
            </div>
		`;
		$('.posts_each_cont').append(newPost);

	}

	$(document).off('click', '.add_posts').on('click', '.add_posts', function() {
		$('#addPostModal').modal().show();
	});
	$(document).off('click', '.create_posts_save').on('click', '.create_posts_save', function() {
		addPost();
	});
	$(document).off('click', '.posts_edit').on('click', '.posts_edit', function() {
		var postId = $(this).closest('.posts_each_cont_inner').attr('data-id');
		editPost(postId);
	});
	$(document).off('click', '.edit_posts_save').on('click', '.edit_posts_save', function() {
		var postId = $(this).attr('data-id');
		updatePost(postId);
	});
	$(document).off('click', '.posts_delete').on('click', '.posts_delete', function() {
		var postId = $(this).closest('.posts_each_cont_inner').attr('data-id');
		confirm('You are about to delete the post. Are you sure?');
		deletePost(postId);
	});
	$(document).off('click', '.post_view').on('click', '.post_view', function() {
		var postId = $(this).closest('.posts_each_cont_inner').attr('data-id');
		viewPost(postId);

	});
});
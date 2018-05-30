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
	      }
	    });
	}

	function updatePost(postId){
		$.ajax({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
	      url: 'posts/updatePost',
	      type: "post",
	      data: {postId : postId},
	      dataType: "json",
	      success: result => {
	      	var newTitle = $('.title').val();
			var newDescription = $('.description').val();
			var post_data = new FormData();
			$('.title').val(newTitle);
			$('.description').val(newDescription);
			post_data.append('title' , newTitle);
			post_data.append('description' , newDescription);
			$('#editPostModal').modal('toggle');
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
			$('.title').val(result[0].title);
			$('.description').val(result[0].description);
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


	// function editPost(post){
	// 	var newTitle = $('.title').val();
	// 	var newDescription = $('.description').val();
	// }

	$(document).off('click', '.add_posts').on('click', '.add_posts', function() {
		addPost();
	});
	$(document).off('click', '.posts_edit').on('click', '.posts_edit', function() {
		var postId = $(this).closest('.posts_each_cont_inner').attr('data-id');
		editPost(postId);
	});
	$(document).off('click', '.posts_save').on('click', '.posts_save', function() {
		var postId = $(this).closest('.posts_each_cont_inner').attr('data-id');
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
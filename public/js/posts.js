function posts(){
  this.__init.call(this);
}
posts.prototype = {
	__init: function(){
		this.generatePostItems();
  },
  generatePostItems: function(data, filters) {
    this.posts = data.data;
    var posts  = '';
    data.data.forEach((item, i) => {
      var mydate = new Date(item.created_at);
      var date = mydate.toDateString();
      var str = (String(mydate).split(" ")[4]);
      var index = str.lastIndexOf(":");
      var time = str.substring(0, index);
      date = date.replace(String(mydate).split(" ")[0], getMonthWeekdays(String(mydate).split(" ")[0])+',');
      date = date.replace(String(mydate).split(" ")[1], getMonthWeekdays(String(mydate).split(" ")[1]));
      posts += `
        <div class='col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 posts_each_cont_inner'>
          <div class='row post backgraund-content'>
            <div class='col-12'>
              <img class='posts_image' src='/images/1.jpg' alt='img'>
            </div>
            <div class='col-12'>
              <h5 data-id='`+item.id+`' class="posts_link"><a>`+item.title+`</a></h5>
              <p class='posts_description'>`+item.description+`</p>
            </div>
            <div class='col-12'>
              <div class='comment_num'>
                <a data-toggle='tooltip' data-placement='bottom' title='comment' class="comcount">
                  <div>`+item.comments_counts+`</div>
                  <div class='icon'></div>
                </a>
                <div><button type='button' class='btn posts_read_more' data-id='`+item.id+`'>ԱՎԵԼԻՆ</button></div>
              </div>
            </div>
          </div>
          <div class='row postinfobot backgraund-content'>
            <div class='col-12 likeblock pull-left'>
              <i class='pull-left fa fa-clock-o'></i> <div class='pull-left'>Տեղադրվել Է : `+date+` @ `+time+`</div>
            </div>
          </div>
        </div>`;
    });
    posts+= '<script type="text/javascript" src="/share42/share42.js"></script>';
    $(".content > .items > .posts_each_cont").html(posts);
  },
};
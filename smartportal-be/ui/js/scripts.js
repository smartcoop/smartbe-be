// Script to ajaxify the Newsletter form
  // -------------------------------------
  $('#newsletter').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    $input = $('#newsletter input[type=email]');
    console.log($input);
    if(!$input.val()){
      alert($form.data('empty-email-msg'));
      $input.focus();
      return false;
    }
    $.getJSON(
    this.action + "?callback=?",
    $(this).serialize(),
    function(data) {
      if (data.Status === 400) {
        alert($form.data('invalid-email-msg'));
        $input.focus();
      } else { // 200
        $input.val('').attr('placeholder', $form.data('subscribed-msg')).blur();
        $('#newsletter button').addClass("done");
      }
    });
  });

// RSS feed

$(function() {
  
  $(".feed-container").each(function(){
    var container = $(this);
    var feedUrl = $(this).data("feed-url");
    var postNumber = $(this).data("feed-entries-count") ? $(this).data("feed-entries-count") : 5;
    var url = "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + postNumber + "&output=json&q=" + encodeURIComponent(feedUrl) + "&hl=en&callback=?";
    $.ajax({
        url:url,
        dataType:'json',
        type:'GET',
        success:function(data) {
            var output = '<ul class="post-list">';
            $.each(data.responseData.feed.entries, function (index, item) {
              var title = item.title;
              var link = item.link;
              var date = new Date(item.publishedDate);
              output += '<li class="item"><a href="' + link + '">' + title + '</a><span class="date">' + date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + '</span></li>';
            })
            output += "</ul>"
            container.append(output);
        },
        error:function() {
            console.log("I am sorry, But I can't fetch that feed");
        }

    });
  })
    
    
});
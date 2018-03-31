$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {

    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}
    } else if (e.type === 'focus') {
      if ($this.val() === '') {
          label.addClass('active');
      } else {
          label.addClass('active');
      }
    }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});



$(document).ready(function () {

    var regex = /[#](\w+)$/ig; // \w means: any word after # or @ ____ i means : insensitive
    $(document).on('keyup','#tagsInput',function () {
        var tagsInput = $(this);
        var content = $.trim($(this).val());
        var text = content.match(regex);
        if (text != null){
            var tagString = content.split('#');
            if (tagString[1].length > 3){
                $('.tag-result-container').show();
                $.ajax({
                    type : "POST",
                    url  : urlTag,
                    data : {tagString:tagString[1],_token:token},
                    cache: false,
                    success : function (data) {
                        var tagResultContainer = $('.tag-result-container');
                        tagResultContainer.append(data);
                        tagResultContainer.html(data);
                        $('.tag-result-container div').click(function () {
                            var value = $.trim($(this).find('.tagValue').text());
                            var oldContent = tagsInput.val();
                            var newContent = oldContent.replace(regex, "");
                            tagsInput.val(newContent+value+'-');
                            $('.tag-result-container div').hide();
                            tagsInput.focus();
                        });
                    }
                });//end of ajax
            }
        } else {
            $('.tag-result-container').hide();
        }
    });//key_up method

    $(document).on('click','.tagged',function () {
        var tag = $(this);
        var tagId = tag.data('tagid');
        var postId = tag.data('postid');
        $.ajax({
            method: 'POST',
            url: urlDeleteTag,
            data: {tagId:tagId,postId:postId,_token:token}
        }).done(function(data){
            $('.tagged-container').html(data);
        });
    });//AJAX DELETE TAGS METHOD

});
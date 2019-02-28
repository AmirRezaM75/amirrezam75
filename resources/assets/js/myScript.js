// MyJSCodes //
$(document).ready(function () {
    $('.reply-btn').on('click',function () {
        var button = $(this);
        var container = button.parent('.comment-meta').next().next('.reply-form-container');
        var parent_comment_id = button.data('commentid');
        var user_id = button.data('userid');
        var post_id = button.data('postid');
        if (user_id > 0){
            container.toggle().html("<div class='contact-form  comment-reply-form' style='margin-bottom: 0;margin-top: 20px;'><form method='POST' action='http://127.0.0.12/post' accept-charset='UTF-8' class='cform-wrapper'><input name='_token' type='hidden' value='oB8hbQVax97p8mU5hExd1fhlqrAi06hcoIEDFjGC'><input type='hidden' name='post_id' value='"+post_id+"'><input type='hidden' name='comment_id' value='"+parent_comment_id+"'><input type='hidden' name='user_id' value='"+user_id+"'><div class='input-field textarea-input'><textarea id='comment' name='text' class='materialize-textarea RTL_direction' style='height: 22px;'></textarea><label for='comment' class='input-label'>Comment</label></div><div class='input-field submit-wrap'><button type='submit' class='waves-effect waves-light btn-large brand-bg white-text comm-submit regular-text'>SEND MESSAGE</button></div></form></div>")
        }
    });

    $('.post-like').on('click',function (event) {
        var button = $(this);
        var post_id = button.data('postid');
        event.preventDefault();
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {post_id:post_id,_token:token}
        }).done(function(data){
            data = JSON.parse(data);
        });
    });

    $('form#contact-form button').on('click',function (event) {
        form = $('form#contact-form');
        var name    = $('input[name=name]').val();
        var email   = $('input[name=email]').val();
        var subject = $('input[name=subject]').val();
        var message = $('input[name=message]').val();

        $.ajax({
            method: 'POST',
            url: urlContact,
            data: {
                name:name,
                email:email,
                subject:subject,
                message: message,
                _token:token
            }
        }).done(function(data){
            data = JSON.parse(data);
            swal("ارسال شد", name + " پیغام شما با موفقیت ارسال شد", "success" , {
                button: "بستن",
            });
        });
        event.preventDefault();
    });
});
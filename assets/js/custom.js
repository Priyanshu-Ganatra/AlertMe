// for previewing to post image
var input = document.querySelector("#select_post_img")
input.addEventListener("change", preview)

function preview() {
    var fileobject = this.files[0]
    var filereader = new FileReader()

    filereader.readAsDataURL(fileobject)

    filereader.onload = function() {
        var image_src = filereader.result
        var image = document.querySelector("#post_img")
        image.setAttribute('src', image_src)
        image.setAttribute('style', 'display')
    }
}


//for subscribing a user
$('.subbtn').click(function() {
    var user_id_v = $(this).data('userId');
    var button = this;
    $(button).attr('disabled', true)

    $.ajax({
        url: 'assets/php/ajax.php?subscribe',
        method: 'post',
        dataType: 'json',
        data: { user_id: user_id_v },
        success: function(response) {
            if (response['status']) {
                $(button).attr('disabled', false)
                $(button).data('userId', 0)
                $(button).html('<i class="bi bi-check-circle-fill"></i> Unsubscribe')
            } else {
                $(button).attr('disabled', false)
                alert('Something went wrong')
            }
        }
    });
});

//for unsubscribing a user
$('.unsubbtn').click(function() {
    var user_id_v = $(this).data('userId');
    var button = this;
    $(button).attr('disabled', true)

    $.ajax({
        url: 'assets/php/ajax.php?unsubscribe',
        method: 'post',
        dataType: 'json',
        data: { user_id: user_id_v },
        success: function(response) {
            if (response['status']) {
                $(button).attr('disabled', false)
                $(button).data('userId', 0)
                $(button).html('<i class="bi bi-person-plus-fill me-3"></i>Subscribe')
            } else {
                $(button).attr('disabled', false)
                alert('Something went wrong')
            }
        }
    });
});

// for liking the posts
$('.like_btn').click(function() {
    var post_id_v = $(this).data('postId');
    var button = this;
    $(button).attr('disabled', true)

    $.ajax({
        url: 'assets/php/ajax.php?like',
        method: 'post',
        dataType: 'json',
        data: { post_id: post_id_v },
        success: function(response) {
            console.log(response)
            if (response['status']) {
                $(button).attr('disabled', false)
                $(button).attr('class', 'bi bi-hand-thumbs-up-fill me-3 unlike_btn')
                button = null
            } else {
                $(button).attr('disabled', false)
                alert('Something went wrong')
            }
        }
    });
});

// for liking the posts
$('.unlike_btn').click(function() {
    var post_id_v = $(this).data('postId');
    var button = this;
    $(button).attr('disabled', true)

    $.ajax({
        url: 'assets/php/ajax.php?unlike',
        method: 'post',
        dataType: 'json',
        data: { post_id: post_id_v },
        success: function(response) {
            console.log(response)
            if (response['status']) {
                $(button).attr('disabled', false)
                $(button).attr('class', 'bi bi-hand-thumbs-up me-3 like_btn')
                button = null
            } else {
                $(button).attr('disabled', false)
                alert('Something went wrong')
            }
        }
    });
});
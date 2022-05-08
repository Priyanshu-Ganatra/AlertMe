<?php
    require_once 'functions.php';

    if (isset($_GET['subscribe'])) {
        $user_id = $_POST['user_id'];
        if(subscribeUser($user_id)){
            $response['status'] = true;
            global $db;
        }else {
            $response['status'] = false;
        }
        echo json_encode($response);
    }
    
    if (isset($_GET['unsubscribe'])) {
        $user_id = $_POST['user_id'];
        if(unSubscribeUser($user_id)){
            $response['status'] = true;
            global $db;
        }else {
            $response['status'] = false;
        }
        echo json_encode($response);
    }

    if (isset($_GET['like'])) {
        $post_id = $_POST['post_id'];

        if (!checkLikeStatus($post_id) and !checkDislikeStatus($post_id)) {
            if(like($post_id)){
                $response['status'] = true;
                global $db;
            }else {
                $response['status'] = false;
            }
    
            echo json_encode($response);            
        }
    }

    if (isset($_GET['unlike'])) {
        $post_id = $_POST['post_id'];

        if (checkLikeStatus($post_id)) {
            if(unlike($post_id)){
                $response['status'] = true;
                global $db;
            }else {
                $response['status'] = false;
            }
    
            echo json_encode($response);            
        }
    }

    if (isset($_GET['dislike'])) {
        $post_id = $_POST['post_id'];

        if (!checkDislikeStatus($post_id) and !checkLikeStatus($post_id)) {
            if(dislike($post_id)){
                $response['status'] = true;
                global $db;
            }else {
                $response['status'] = false;
            }
    
            echo json_encode($response);            
        }
    }

    if (isset($_GET['undislike'])) {
        $post_id = $_POST['post_id'];

        if (checkDislikeStatus($post_id)) {
            if(undislike($post_id)){
                $response['status'] = true;
                global $db;
            }else {
                $response['status'] = false;
            }
    
            echo json_encode($response);            
        }
    }

    if (isset($_GET['addcomment'])) {
        $cuser = getUser($_SESSION['userdata']['user_id']);
        $post_id = $_POST['post_id'];
        $comment = $_POST['comment'];

            if(addComment($post_id, $comment)){
                $response['status'] = true;
                $response['comment'] = '<div class="d-flex align-items-center p-2">
                <div><img src="assets/images/profiles/'.$cuser['pfp'].'" alt="pfp" height="40" width="40" class="rounded-circle border">
                </div>
                <div class="m-2 d-flex flex-column justify-content-start align-items-start">
                    <h6 style="margin: 0px;"><a href="?u='.$cuser['f_name'].'_'.$cuser['l_name'].'" class="text-decoration-none text-dark text-small text-muted">'.$cuser['f_name'].' '.$cuser['l_name'].'</a></h6>
                    <p style="margin:0px;" class="text-muted">'.$_POST['comment'].'</p>
                </div>
            </div>';
                global $db;
            }else {
                $response['status'] = false;
            }
    
            echo json_encode($response);            
    }    
?>
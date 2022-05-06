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

        if (!checkLikeStatus($post_id)) {
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
?>
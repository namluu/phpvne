<?php
function get_latest_post_one()
{
    global $connect;
    $query = "
        SELECT * FROM post
        ORDER BY id desc
        LIMIT 0,1
    ";
    return mysqli_query($connect, $query);
}

function get_latest_post_three()
{
    global $connect;
    $query = "
        SELECT * FROM post
        ORDER BY id desc
        LIMIT 1,3
    ";
    return mysqli_query($connect, $query);
}

function get_most_view_posts()
{
    global $connect;
    $query = "
        SELECT * FROM post
        ORDER BY view_count desc
        LIMIT 0,14
    ";
    return mysqli_query($connect, $query);
}

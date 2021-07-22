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

function get_sections()
{
    global $connect;
    $query = "
        SELECT * FROM section
    ";
    return mysqli_query($connect, $query);
}

function get_categories_by_section($section_id)
{
    global $connect;
    $query = "
        SELECT * FROM category
        WHERE section_id = $section_id
    ";
    return mysqli_query($connect, $query);
}

function get_latest_post_by_section($section_id)
{
    global $connect;
    $query = "
        SELECT * FROM post
        WHERE section_id = $section_id
        ORDER BY id desc
        LIMIT 0,1
    ";
    return mysqli_query($connect, $query);
}

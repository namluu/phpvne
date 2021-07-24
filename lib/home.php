<?php
function get_latest_post_one()
{
    global $connect;
    $query = "
        SELECT p.*,s.title section_title FROM post p
        LEFT JOIN section s ON p.section_id = s.id
        ORDER BY p.id desc
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
    global $postShowed;
    $postShowedIds = implode(',', $postShowed);
    $query = "
        SELECT * FROM post
        WHERE is_feature = 1
        AND id NOT IN ($postShowedIds)
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
    global $postShowed;
    $postShowedIds = implode(',', $postShowed);
    $query = "
        SELECT * FROM post
        WHERE section_id = $section_id
        AND id NOT IN ($postShowedIds)
        ORDER BY id desc
        LIMIT 0,1
    ";
    return mysqli_query($connect, $query);
}

function get_second_post_by_section($section_id)
{
    global $connect;
    global $postShowed;
    $postShowedIds = implode(',', $postShowed);
    $query = "
        SELECT * FROM post
        WHERE section_id = $section_id
        AND id NOT IN ($postShowedIds)
        ORDER BY id desc
        LIMIT 1,1
    ";
    return mysqli_query($connect, $query);
}

function get_three_post_by_section($section_id)
{
    global $connect;
    global $postShowed;
    $postShowedIds = implode(',', $postShowed);
    $query = "
        SELECT * FROM post
        WHERE section_id = $section_id
        AND id NOT IN ($postShowedIds)
        ORDER BY id desc
        LIMIT 2,3
    ";
    return mysqli_query($connect, $query);
}

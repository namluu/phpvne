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

function get_categories()
{
    global $connect;
    $query = "
        SELECT * FROM category
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

function load_post($id)
{
    global $connect;
    $query = "
        SELECT p.*, c.title category_name, s.title section_name
        FROM post p
        LEFT JOIN category c ON c.id = p.category_id
        LEFT JOIN section s ON s.id = p.section_id
        WHERE p.id = $id
    ";
    return mysqli_query($connect, $query);
}

function load_section($id)
{
    global $connect;
    $query = "
        SELECT * 
        FROM section
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}
function load_post_by_section($id)
{
    global $connect;
    $query = "
        SELECT p.*
        FROM post p
        WHERE p.section_id = $id
        ORDER BY id desc
    ";
    return mysqli_query($connect, $query);
}
function load_category($id)
{
    global $connect;
    $query = "
        SELECT * 
        FROM category
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}
function load_post_by_category($id)
{
    global $connect;
    $query = "
        SELECT p.*
        FROM post p
        WHERE p.category_id = $id
        ORDER BY id desc
    ";
    return mysqli_query($connect, $query);
}
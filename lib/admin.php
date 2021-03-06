<?php
function admin_handle()
{
    if (isset($_POST['btnLogout'])) {
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        unset($_SESSION['group']);
    }
    if (!isset($_SESSION['userId']) || $_SESSION['group'] != 1) {
        header('location:../index.php');
    }
}

function validate_section_form()
{
    $errors = [];
    if (!$_POST['title']) {
        $errors[] = 'Title is required';
    }
    return $errors;
}

function prepare_section_data()
{
    $sortOrder = (int)$_POST['sort_order'];
    if (!$sortOrder) {
        $sortOrder = 0;
    }

    $active = (int)$_POST['is_active'];
    if (!$active && $active != 0) {
        $active = 1;
    }

    $title = $_POST['title'];
    $slug = renderSlug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'sort_order' => $sortOrder,
        'is_active' => $active
    ];
}

function validate_category_form()
{
    $errors = [];
    if (!$_POST['title']) {
        $errors[] = 'Title is required';
    }
    return $errors;
}

function prepare_category_data()
{
    $sortOrder = (int)$_POST['sort_order'];
    if (!$sortOrder) {
        $sortOrder = 0;
    }

    $active = (int)$_POST['is_active'];
    if (!$active && $active != 0) {
        $active = 1;
    }

    $title = $_POST['title'];
    $slug = renderSlug($title);

    $sectionId = (int)$_POST['section_id'];

    return [
        'title' => $title,
        'slug' => $slug,
        'sort_order' => $sortOrder,
        'is_active' => $active,
        'section_id' => $sectionId
    ];
}

function validate_post_form()
{
    $errors = [];
    if (!$_POST['section_id']) {
        $errors[] = 'Section is required';
    }
    if (!$_POST['title']) {
        $errors[] = 'Title is required';
    }
    if (!$_POST['description']) {
        $errors[] = 'Description is required';
    }
    return $errors;
}

function prepare_post_data()
{
    $sectionId = (int)$_POST['section_id'];
    $catId = (int)$_POST['category_id'];
    if (!$catId) {
        $catId = NULL;
    }

    $viewCount = (int)$_POST['view_count'];
    if (!$viewCount) {
        $viewCount = 0;
    }

    $feature = (int)$_POST['is_feature'];
    if (!$feature) {
        $feature = 0;
    }

    $active = (int)$_POST['is_active'];
    if (!$active && $active != 0) {
        $active = 1;
    }

    $title = str_replace("'", "`", $_POST['title']);
    $slug = renderSlug($title);
    $desc = str_replace("'", "`", $_POST['description']);
    $content = str_replace("'", "`", $_POST['content']);
    $image = $_POST['image'];
    $userId = $_SESSION['userId'];

    return [
        'title' => $title,
        'slug' => $slug,
        'description' => $desc,
        'content' => $content,
        'image' => $image,
        'user_id' => $userId,
        'section_id' => $sectionId,
        'category_id' => $catId,
        'view_count' => $viewCount,
        'is_feature' => $feature,
        'is_active' => $active
    ];
}

function get_sections()
{
    global $connect;
    $query = "
        SELECT * 
        FROM section
        ORDER BY id desc
    ";
    return mysqli_query($connect, $query);
}

function add_section($data)
{
    global $connect;
    $query = "
        INSERT INTO section 
        VALUES (null, '{$data["title"]}', '{$data["slug"]}', '{$data["sort_order"]}', '{$data["is_active"]}')
    ";
    return mysqli_query($connect, $query);
}

function update_section($data, $id)
{
    global $connect;
    $query = "
        UPDATE section SET
            title = '{$data["title"]}', 
            slug = '{$data["slug"]}', 
            sort_order = '{$data["sort_order"]}', 
            is_active = '{$data["is_active"]}'
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}

function delete_section($id)
{
    global $connect;
    $query = "
        DELETE FROM section
        WHERE id = $id
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

function get_categories()
{
    global $connect;
    $query = "
        SELECT c.*, s.title section_name
        FROM category c
        LEFT JOIN section s ON s.id = c.section_id
        ORDER BY c.id desc
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

function add_category($data)
{
    global $connect;
    $query = "
        INSERT INTO category 
        VALUES (null, '{$data["title"]}', '{$data["slug"]}', '{$data["sort_order"]}', '{$data["is_active"]}', '{$data["section_id"]}')
    ";
    return mysqli_query($connect, $query);
}

function update_category($data, $id)
{
    global $connect;
    $query = "
        UPDATE category SET
            title = '{$data["title"]}', 
            slug = '{$data["slug"]}', 
            sort_order = '{$data["sort_order"]}', 
            is_active = '{$data["is_active"]}',
            section_id = '{$data["section_id"]}'
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}

function delete_category($id)
{
    global $connect;
    $query = "
        DELETE FROM category
        WHERE id = $id
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

function get_posts()
{
    global $connect;
    $query = "
        SELECT p.*, c.title category_name, s.title section_name
        FROM post p
        LEFT JOIN category c ON c.id = p.category_id
        LEFT JOIN section s ON s.id = p.section_id
        ORDER BY p.id desc
    ";
    return mysqli_query($connect, $query);
}

function add_post($data)
{
    global $connect;
    $columns = implode(", ",array_keys($data));
    //$escaped_values = array_map('mysqli_real_escape_string', array_values($data));
    $escaped_values = array_values($data);
    $values  = implode("', '", $escaped_values);
    $query = "INSERT INTO `post`($columns) VALUES ('$values')";
    return mysqli_query($connect, $query);
}

function load_post($id)
{
    global $connect;
    $query = "
        SELECT * 
        FROM post
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}

function update_post($data, $id)
{
    global $connect;
    $sets = [];
    foreach ($data as $key => $val) {
        $sets[] = "$key = '{$val}'";
    }
    $set = implode(',', $sets);
    $query = "
        UPDATE post SET $set
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}

function delete_post($id)
{
    global $connect;
    $query = "
        DELETE FROM post
        WHERE id = $id
    ";
    return mysqli_query($connect, $query);
}

function stripUnicode($string)
{
    if (!$string) return false;
    $unicode = [
        'a' => '??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
        'A' => '??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
        'd' => '??',
        'D' => '??',
        'e' => '??|??|???|???|???|??|???|???|???|???|???',
        'E' => '??|??|???|???|???|??|???|???|???|???|???',
        'i' => '??|??|???|??|???',
        'I' => '??|??|???|??|???',
        'o' => '??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
        'O' => '??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
        'u' => '??|??|???|??|???|??|???|???|???|???|???',
        'U' => '??|??|???|??|???|??|???|???|???|???|???',
        'y' => '??|???|???|???|???',
        'Y' => '??|???|???|???|???'
    ];
    foreach ($unicode as $unsign => $sign) {
        $array = explode('|', $sign);
        $string = str_replace($array, $unsign, $string);
    }
    return $string;
}

function renderSlug($str)
{
    $str = trim($str);
    if ($str == '') return '';
    $str = str_replace(array('(',')','-','=',',','.','/','#','?','+','!','@','$','%','^','&','*',':',"\t","\r","\n","???"), " ", $str);
    $str = str_replace(array("'", "???", "`"), '', $str);
    $str = preg_replace('/[\s]{2,}/', ' ', $str);
    $str = preg_replace('/[\s]$/', '', $str);
    $str = str_replace(' ', '-', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
    return $str;
}
// echo renderSlug('L??u ?????c Nam TP HCM ph??n b??? 44.000 li???u vaccine Sinopharm cho qu???n huy???n');
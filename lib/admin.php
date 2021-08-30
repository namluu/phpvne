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

function stripUnicode($string)
{
    if (!$string) return false;
    $unicode = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
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
    $str = str_replace(array('(',')','-','=',',','.','/','#','?','+','!','@','$','%','^','&','*',':',"\t","\r","\n","　"), " ", $str);
    $str = str_replace(array("'", "’"), '', $str);
    $str = preg_replace('/[\s]{2,}/', ' ', $str);
    $str = preg_replace('/[\s]$/', '', $str);
    $str = str_replace(' ', '-', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
    return $str;
}
// echo renderSlug('Lưu Đức Nam TP HCM phân bổ 44.000 liều vaccine Sinopharm cho quận huyện');
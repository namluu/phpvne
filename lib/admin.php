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

function changeTitle($str)
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
// echo changeTitle('Lưu Đức Nam TP HCM phân bổ 44.000 liều vaccine Sinopharm cho quận huyện');
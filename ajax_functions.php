<?
$function = isset($_POST['function']) ? $_POST['function'] : '';

$function();

function uploadFile() {
    $data = $_POST['data'];
    $document_id = md5(rand(10) . 'tapin13' . rand(100));
    $filetype = isset($_POST['filetype']) ? mysql_real_escape_string($_POST['filetype']) : '';
    $filename = isset($_POST['filename']) ? mysql_real_escape_string($_POST['filename']) : '';

    $base64_shift = strrpos($data, 'base64') + 7;
    $data = substr($data, $base64_shift, strlen($data));
    file_put_contents('uploads/' . $document_id, base64_decode($data));
    
    $return = array("document_id" => $document_id, "filename" => $filename) ;
    echo json_encode($return);
}

?>
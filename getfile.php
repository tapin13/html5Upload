<?
$document_id = isset($_GET['document_id']) ? htmlspecialchars($_GET['document_id']) : '';
$document_filename = isset($_GET['document_filename']) ? htmlspecialchars($_GET['document_filename']) : '';

if($document_id == '' || $document_filename == '') {
    return 0;
}

header('Content-type: ' . $row["document_type"]);
header('Content-Disposition: attachment; filename="' . $document_filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize('uploads/' . $document_id));
readfile('uploads/' . $document_id);

?>
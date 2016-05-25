<?php
require_once("dbconfig.php");

$book_id = $_GET['book_id'];


 $sql = 'delete from  books where book_id = "' . $book_id . '" ' ;


$result = $connection->query($sql);
	if($result) { // query가 정상실행 되었다면,
		$msg = "삭제되었습니다.";
		$replaceURL = 'bookList.php';
	} else {
		$msg = "삭제실패."; 
?>

		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
<?php
	}

?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
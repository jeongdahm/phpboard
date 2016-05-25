<?php
require_once("dbconfig.php");


if(isset($_POST['book_id'])){
	$book_id = $_POST['book_id'];
	
}

$book_name = $_POST['book_name'];
$author = $_POST['author'];
$date = $_POST['date'];
$genre = $_POST['genre'];
$publisher = $_POST['publisher'];
$img = $_FILES["img"]["name"];


if(isset($book_id)) {
 $sql = 'update books set book_name= "' . $book_name . '" , author="' . $author . '" , date="' . $date . '" , genre="' . $genre . '" , publisher="' . $publisher . '" , img="' . $img . '" where book_id = "' . $book_id . '" ' ;

}else{
	
 $sql = 'insert into books (book_name, author, date, genre, publisher, img) values ( "' . $book_name . '", "' . $author . '" , "' . $date . '" , "' . $genre . '",  "' . $publisher . '",  "' . $img . '");';
}

$result = $connection->query($sql);

//파일업로드
$save_dir = "files/";
$target_file = $save_dir . basename($_FILES["img"]["name"]);

$replaceURL = 'bookList.php';

if (is_uploaded_file($_FILES["img"]["tmp_name"]))
{
	$dest = $save_dir. basename($_FILES["img"]["name"]);
	if(!move_uploaded_file($_FILES["img"]["tmp_name"], $dest)){
		die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");
	}else{
		//파일이 정상적으로 저장되면 
		
		if($result) { // query가 정상실행 되었다면,
			$msg = "정상적으로 글이 등록되었습니다.";
		} else {
			$msg = "글을 등록하지 못했습니다.";
?>
				
<script>
	alert("<?php echo $msg?>");
	history.back();
</script>

<?php
				}
	}
}
?>


<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
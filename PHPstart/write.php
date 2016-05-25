<?php
require_once("dbconfig.php");

//$_GET['bno']이 있을 때만 $bno 선언
	if(isset($_GET['book_id'])) {
		$book_id = $_GET['book_id'];
	}
		 
	if(isset($book_id)) {
		$sql = 'select * from books where book_id = ' . $book_id;
		$result = $connection->query($sql);
		$row = $result->fetch_assoc();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>글쓰기 </title>
	<link rel="stylesheet" href="./css/common.css" />
</head>
<body>
	<article class="boardArticle2">
		<h2><?php echo isset($book_id)?'글수정':'글쓰기'?></h2>
		<div id="write_insert1" >
			<form action="write_insert.php" enctype="multipart/form-data" method="post">
			<?php
				if(isset($book_id)) {
					echo '<input type="hidden" name="book_id" value="' . $book_id . '">';
				}
				?>
				
				<table id="write_insert" class="wForm">
					<caption class="readHide"><?php echo isset($book_id)?'글수정':'글쓰기'?></caption>
					<tbody>
						<tr>
							<th scope="row"><label for="book_name">책이름</label></th>
							<td class="id"><input type="text" name="book_name" id="book_name" value="<?php echo isset($row['book_name'])?$row['book_name']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="author">작가</label></th>
							<td class="password"><input type="text" name="author" id="author"  value="<?php echo isset($row['author'])?$row['author']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="date">출판일</label></th>
							<td class="title"><input type="text" name="date" id="date"  value="<?php echo isset($row['date'])?$row['date']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="genre">장르</label></th>
							<td class="content"><textarea name="genre" id="genre"  ><?php echo isset($row['genre'])?$row['genre']:null?></textarea></td>
						</tr>
						<tr>
							<th scope="row"><label for="publisher">출판사</label></th>
							<td class="content"><textarea name="publisher" id="publisher"  ><?php echo isset($row['publisher'])?$row['publisher']:null?></textarea></td>
						</tr>
						<tr>
							<th scope="row"><label for="publisher">이미지</label></th>
							<td class="content"><input name="img" type="file" /><input type="hidden" name="MAX_FILE_SIZE" value="30000" /></td>
						</tr>
					</tbody>
				</table>
				<div class="btnSet">
					<button type="submit" class="btnSubmit btn"><?php echo isset($book_id)?'수정':'작성'?></button>
					<a href="bookList.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	</article>
</body>
</html>
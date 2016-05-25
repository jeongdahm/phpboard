<?php
require_once("dbconfig.php");

$book_id = $_GET['book_id'];

$sql = 'select * from books where book_id = ' . $book_id;
$result = $connection->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>책목록</title>
	<link rel="stylesheet" href="./css/common.css" />
	<!-- <link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" /> -->
</head>
<body>
	<article class="boardArticle">
		<h2>책목록</h2>
		<table class="bList">
			<caption class="readHide">책목록</caption>
			<thead>
				<tr>
					<th scope="col" class="no">번호</th>
					<th scope="col" class="title">제목</th>
					<th scope="col" class="author">작가</th>
					<th scope="col" class="date">출판일</th>
					<th scope="col" class="genre">장르</th>
					<th scope="col" class="hit">출판사</th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td class="no"><?php echo $row['book_id']?></td>
					<td class="title"><?php echo $row['book_name']?></td>
					<td class="author"><?php echo $row['author']?></td>
					<td class="date"><?php echo $row['date']?></td>
					<td class="genre"><?php echo $row['genre']?></td>
					<td class="hit"><?php echo $row['publisher']?></td>
				</tr>

			</tbody>
		</table>
		<img src="./files/<?php echo isset($row['img'])? $row['img']:'noimage.png'?>" class="img_size">
	<div class="btnSet">
		<a href="write.php?book_id=<?php echo $book_id?>" class="btnList btn">수정</a>
		<a href="delete.php?book_id=<?php echo $book_id?>">삭제</a>
		<a href="bookList.php">목록</a>
	</div>
	</article>
</body>
</html>
<!DOCTYPE html>
	<html lang="ja">
		<head>
			<title>4eachblog 掲示板</title>
			<link rel="stylesheet" type="text/css" href="style.css">
		</head>
		<body>
		
			<header>
				<h1 class="logo"><img src="4eachblog_logo.jpg" alt="4eachblog"></h1>
				<div class="nav">
					<ul>
						<li>トップ</li>
						<li>プロフィール</li>
						<li>4eachについて</li>
						<li>登録フォーム</li>
						<li>問い合わせ</li>
						<li>その他</li>
					</ul>
				</div>
			</header>
			
			<main>
				<div class="main-container">
					<div class="left">
						<div class="board-container">
							<h2>プログラミングに役立つ掲示板</h2>
							<form method="post" action="insert.php">

								<h3 class="form-title">入力フォーム</h3>

								<div>
									<label>ハンドルネーム</label>
									<br>
									<input type="text" class="text" size="40" name="handlename">
								</div>

								<div>
									<label>タイトル</label>
									<br>
									<input type="text" class="text" size="40" name="title">
								</div>

								<div>
									<label>コメント</label>
									<br>
									<textarea cols="70" rows="5" name="comments"></textarea>
								</div>

								<div>
									<input type="submit" class="submit" value="投稿する">
								</div>

							</form>
						</div>
						
						<?php

						mb_internal_encoding("utf8");
						
						require "DB.php";
						$dbconnect = new DB();
						$pdo = $dbconnect->connect();
						$stmt=$pdo->prepare($dbconnect->select());
						$stmt->execute();
						

						while ($row = $stmt->fetch()){
							echo "<div class='article-box'>";
							echo "<h4>".$row['title']."</h4>";
							echo $row['comments'];
							echo "<p class='handlename'>posted by".$row['handlename']."</p>";
							echo "</div>";
						}

						?>
						
					</div>
					<div class="right">
						<h3 class="sub-title">人気の記事</h3>
						<ul>
							<li>PHPオススメ本</li>
							<li>PHP MyAdminの使い方</li>
							<li>今人気のエディタ TOP5</li>
							<li>HTMLの基礎</li>
						</ul>
						<h3 class="sub-title">オススメリンク</h3>
						<ul>
							<li>インターノウス株式会社</li>
							<li>XAMPPのダウンロード</li>
							<li>Eclipseのダウンロード</li>
							<li>Bracketsのダウンロード</li>
						</ul>
						<h3 class="sub-title">カテゴリ</h3>
						<ul>
							<li>HTML</li>
							<li>PHP</li>
							<li>MySQL</li>
							<li>JavaScript</li>
						</ul>
					</div>
				</div>
			</main>

			<footer>
				copyright ©︎ internous | 4each blog the which provides A to Z about programming.
			</footer>

		</body>
	</html>
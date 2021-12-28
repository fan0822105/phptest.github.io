<?php
require_once "dbtools.inc.php";
$goods_title   = $_POST['goods_title'];
$goods_content = $_POST['goods_content'];
$goods_price   = $_POST['goods_price'];
$goods_date    = date("Y-m-d H:i:s");

//建立資料連接
$link = create_connection();

//執行SQ命令，新增此書籍
$sql    = "INSERT INTO goods (goods_title, goods_content, goods_price, goods_date) VALUES('$goods_title', '$goods_content', '$goods_price', '$goods_date')";
$result = execute_sql($link, "book_shop", $sql);

//關閉資料連接
mysqli_close($link);

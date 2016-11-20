<?
$conn = @mysql_connect("db.dotmedia.kr", "dotent", "dotent0785")
or die("연결에 실패하였습니다");


$status = mysql_select_db("dbdotent",$conn);
mysql_query("set names utf8");
if(!$status)
{
print " 데이터베이스 선택 실패 ";
exit;
}
?>
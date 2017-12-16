
<?
include $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

switch ($q) {
  case 'userm':
  include $_SERVER['DOCUMENT_ROOT']."/admin/member/member.php";
  break;
  case 'boardm':
  include $_SERVER['DOCUMENT_ROOT']."/admin/board/board.php";
  break;
  case 'itemm':
  include $_SERVER['DOCUMENT_ROOT']."/admin/item/item.php";
  break;
  case 'bookm':
  include $_SERVER['DOCUMENT_ROOT']."/admin/booking/book.php";
  break;
  case 'setm':
  include $_SERVER['DOCUMENT_ROOT']."/admin/setting/default.php";
  break;

  default:
  # code...
  break;
}

?>

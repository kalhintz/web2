<?
session_start();
require("../lib/util.php");
require("../lib/dbconn.php");


$sql_sec_no = "select user_id from member where security_id1='".$m_ps_num_1."' and user_name='".$m_name."' and mem_yn='Y'";
$rs = mysqli_query($conn, $sql_sec_no);
$total = mysqli_num_rows($rs);

if($total>0) {
	err_msg("이미 등록된 회원입니다.");
    //echo("<meta http-equiv='Refresh' content='0; URL=javascript:history.back();'>");
	exit;

}   else {
$sql_in = "insert into member";
$sql_in .= "(com_name,ceo_name,jikwi,user_name,security_id1, ";
$sql_in .= " user_id, passwd, ";
$sql_in .= " czip1,caddress, ";
$sql_in .= " ctel1,";
$sql_in .= " fax1,";
$sql_in .= " hand_tel1,";
$sql_in .= " e_mail01,job_type,joining_time,open_yn,mem_yn,mem_type)";;
$sql_in .= " values('".$com_name;
$sql_in .= "','".$ceo_name;
$sql_in .= "','".$jikwi;
$sql_in .= "','".$m_name;
$sql_in .= "','".$m_ps_num_1;
$sql_in .= "','".$m_id;
$sql_in .= "','".$m_pwd_1;
$sql_in .= "','".$czip1;
$sql_in .= "','".$caddress;
$sql_in .= "','".$m_home;
$sql_in .= "','".$m_fax;
$sql_in .= "','".$m_mobile;
$sql_in .= "','".$email;
$sql_in .= "','".$job_type;
$sql_in .= "', now(),'N','Y','E');";
//echo $sql_in; exit;
$rst = mysqli_query($conn, $sql_in);
if($rst) {
	msg("성공적으로 등록하였습니다.\n\n로그인하여 주시기 바랍니다.");
	echo("<script>
		parent.location.href='../index.php';
		</script>");
} else {
	err_msg("회원정보 저장을 실패하였습니다.\n\n정보를 다시 입력 바랍니다."); }
    //echo("<meta http-equiv='Refresh' content='0; URL=javascript:history.back();'>");
}
?>

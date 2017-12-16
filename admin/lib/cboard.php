<?
$wdate=date('Y-m-d');

$sqn= " SELECT SUM(Cnt) from
        (
        SELECT Count(num)  As Cnt FROM notice
         UNION
        SELECT  Count(num)  as Cnt FROM free
         UNION
        SELECT  Count(num)  as Cnt FROM photo
        ) c;";
$rsnt = mysqli_query($conn,$sqn);
$ccno = mysqli_fetch_array($rsnt);


$sqb= "select * from reserve where register_date = '$wdate'";
$rsfr = mysqli_query($conn,$sqb);
$ccre = mysqli_num_rows($rsfr);

$sqb2= "select * from reserve";
$rsfr2 = mysqli_query($conn,$sqb2);
$ccre2 = mysqli_num_rows($rsfr2);

/*
$sqp= "select * from photo";
$rsph = mysqli_query($conn,$sqp);
$ccno = mysqli_num_rows($rsph);
*/



?>

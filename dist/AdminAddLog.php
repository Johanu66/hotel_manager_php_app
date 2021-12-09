<?php 
include('dbconnex.php');

if(isset($_REQUEST['Action'])){
$VarAction = $_REQUEST['Action'];
//AJOUTER EVENTUELLEMENT LA VERIFICATION DE L ADMIN POUR SECURISER LA VIDANGE DU JOURNAL
if($VarAction=='0'){
$query_Clients = "DELETE FROM addlog_table" ;
$statement = $connect->prepare($query_Clients);
$statement->execute();
header("Location: AdminAddLog.php");
}
}


if(isset($_REQUEST['Tri'])){
$VarTri = $_REQUEST['Tri'];
}

if (isset($VarTri)==false or $VarTri==""){
$query_Clients = "SELECT * FROM addlog_table ORDER by DateEvenement DESC, HeureEvenement DESC" ;
}

if (isset($VarTri) and $VarTri==1){
$query_Clients = "SELECT * FROM addlog_table ORDER by DateEvenement ASC, HeureEvenement ASC" ;
}

if (isset($VarTri) and $VarTri==2){
$query_Clients = "SELECT * FROM addlog_table ORDER by DateEvenement ASC, HeureEvenement DESC" ;
}

if (isset($VarTri) and $VarTri==3){
$query_Clients = "SELECT * FROM addlog_table ORDER by MessageEvenement ASC" ;
}

if (isset($VarTri) and $VarTri==4){
$query_Clients = "SELECT * FROM addlog_table ORDER by MessageEvenement DESC" ;
}

if (isset($VarTri) and $VarTri==5){
$query_Clients = "SELECT * FROM addlog_table ORDER by CodeEvenement ASC" ;
}

if (isset($VarTri) and $VarTri==6){
$query_Clients = "SELECT * FROM addlog_table ORDER by CodeEvenement DESC" ;
}

if (isset($VarTri) and $VarTri==7){
$query_Clients = "SELECT * FROM addlog_table ORDER by PseudoUtilisateur ASC" ;
}

if (isset($VarTri) and $VarTri==8){
$query_Clients = "SELECT * FROM addlog_table ORDER by PseudoUtilisateur DESC" ;
}

if (isset($VarTri) and $VarTri==9){
$query_Clients = "SELECT * FROM addlog_table ORDER by AdresseIP Asc" ;
}

if (isset($VarTri) and $VarTri==10){
$query_Clients = "SELECT * FROM addlog_table ORDER by AdresseIP DESC" ;
}

$statement = $connect->prepare($query_Clients);
$statement->execute();
$result = $statement->fetchAll();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Document sans titre</title>
<style type="text/css">
<!--
.Style3 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.Style5 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.Style7 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--

function Fconfirm(RedirectLink){
var is_confirmed = confirm("ATTENTION : Si vous videz le journal, vous ne pourrez plus le restaurer.\nCette action va effacer les données de ce journal\n\nCliquez sur OK pour continuer ou ANNULER pour Annuler")
if(is_confirmed==false)

	{
		return;
	}
	else
	{
		document.location.replace(RedirectLink)
	}
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_jumpMenuGo(selName,targ,restore){ //v3.0
  var selObj = MM_findObj(selName); if (selObj) MM_jumpMenu(targ,selObj,restore);
}
//-->
</script>
</head>

<body>
<form name="form1">
  <span class="Style5">Options d'affichage :</span> <br>
  <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
    <option value="AdminAddLog.php" selected>Affichage par Defaut</option>
    <option value="AdminAddLog.php?Tri=1">Trier par Date et Heure (ordre croissant)</option>
    <option value="AdminAddLog.php?Tri=2">Trier par Date et Heure (ordre décroissant)</option>
    <option value="AdminAddLog.php?Tri=3">Trier par Message (A>Z)</option>
    <option value="AdminAddLog.php?Tri=4">Trier par Message (Z>A)</option>
    <option value="AdminAddLog.php?Tri=5">Trier par Code (ordre croissant)</option>
    <option value="AdminAddLog.php?Tri=6">Trier par Code (ordre décroissant)</option>
    <option value="AdminAddLog.php?Tri=7">Trier par Utilisateur (A>Z)</option>
    <option value="AdminAddLog.php?Tri=8">Trier par Utilisateur (Z>A)</option>
    <option value="AdminAddLog.php?Tri=9">Trier par IP (ordre croissant)</option>
    <option value="AdminAddLog.php?Tri=10">Trier par IP (ordre décroissant)</option>
  </select>
  <input type="button" name="Button1" value="Aller" onClick="MM_jumpMenuGo('menu1','parent',0)">
</form>
<p class="Style3">[<a href="#" onclick="javascript:Fconfirm('AdminAddLog.php?Action=0')"><span class="Style7">Vider le journal</span></a>]</p>
<table width="92%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#FFFFCC">
    <td width="4%" height="15"><div align="left"><span class="Style3">ID </span></div></td>
    <td width="12%" height="15"><div align="left"><span class="Style3">Date</span></div></td>
    <td width="9%" height="15"><div align="left"><span class="Style3">Heure</span></div></td>
    <td width="43%" height="20"><div align="left"><span class="Style3">Message</span></div></td>
    <td width="7%" height="15"><div align="left"><span class="Style3">Code</span></div></td>
    <td width="10%" height="15"><div align="left"><span class="Style3">Utilisateur</span></div></td>
    <td width="15%" height="15"><div align="left"><span class="Style3">IP</span></div></td>
  </tr>
  <?php foreach($result as $row_Clients){ ?>
  <tr>
    <td height="15"><div align="left"><span class="Style3"><?php echo $row_Clients['IDEvenement']?></span></div></td>
    <td height="15"><div align="left"><span class="Style3"><?php echo date('d-m-Y',strtotime($row_Clients['DateEvenement'])) ?></span></div></td>
    <td height="15"><div align="left"><span class="Style3"><?php echo $row_Clients['HeureEvenement']?></span></div></td>
    <td height="20"><div align="left"><span class="Style3"><?php echo $row_Clients['MessageEvenement']?></span></div></td>
    <td height="15"><div align="left"><span class="Style3"><?php echo $row_Clients['CodeEvenement']?></span></div></td>
    <td height="15"><div align="left"><span class="Style3"><?php echo $row_Clients['PseudoUtilisateur']?></span></div></td>
    <td height="15"><div align="left"><span class="Style3"><?php echo $row_Clients['AdresseIP']?></span></div></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>

<?php
/*
   Simple Online Notepad
   Version 1.0
   November 28, 2011

   Will Bontrager Software, LLC
   https://www.willmaster.com/
   Copyright 2011 Will Bontrager Software, LLC

   This software is provided "AS IS," without
   any warranty of any kind, without even any
   implied warranty such as merchantability
   or fitness for a particular purpose.
   Will Bontrager Software, LLC grants
   you a royalty free license to use or
   modify this software provided this
   notice appears on all copies.
*/

######################
## Begin customization

# A password for the notepad page.

$Password = "password";

# A login cookie name.

$CookieName = "notepad";

# How many days the cookie shall last (decimal number is OK).
# Specify 0 to delete cookie when browser closes.

$DaysCookieLasts = 1.5;

# The subdirectory name for the notepad content. (May need 777 permissions.)

$NotepadDirectory = "notepad";

## End customization
####################

$needLogin = true;
$file = './' . trim($NotepadDirectory) . '/notepadcontent.php';
if( isset($_COOKIE[$CookieName]) ) { $needLogin = false; }
if( count($_POST) ) { Fix_POST(); }
if( isset($_POST['pw']) and $_POST['pw'] == trim($Password) )
{
   $DaysCookieLasts = floatval($DaysCookieLasts);
   $expire = $DaysCookieLasts > 0 ? ( time() + intval($DaysCookieLasts * 24 * 60 * 60) ) : 0;
   if( $expire ) { setcookie($CookieName,'1',$expire); }
   else { setcookie($CookieName,'1'); }
   $needLogin = false;
}
if( ! $needLogin and isset($_POST['notepad']) )
{
   $firstline = '<'.'?php exit; ?'.">\r\n";
   $f = fopen($file,'w');
   fwrite($f,$firstline.$_POST['notepad']);
   fclose($f);
}
function Fix_POST()
{
   if( isset($_POST['submitter']) ) { unset($_POST['submitter']); }
   foreach( $_POST as $k => $v )
   {
      if( is_array($_POST[$k]) )
      {
         foreach( $_POST[$k] as $kk => $vv )
         {
            $_POST[$k][$kk] = trim(stripslashes($vv));
         }
      }
      else { $_POST[$k] = trim(stripslashes($v)); }
   }
} # function Fix_POST()
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Notes | Trikyas</title>
</head>
<body>
<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">


<?php if($needLogin): ?>

<h3>Log In</h3>
<input type="password" name="pw" style="width:300px;"><br>
<input style="width:300px; text-align:left; padding-left:15px;" value="Log In" name="submit" type="submit">


<?php else: ?>

<h3 style="margin-bottom: 3px;">My Notes</h3>
<!-- On the next line, specify width and height you prefer for the textarea box. -->
<textarea name="notepad" style="width:600px; height:300px; padding:6px; border:1px solid black;"><?php
$f = @fopen($file,'r');
if( $f )
{
   $line = '';
   fgets($f,20);
   while( ($line = fgets($f,16384)) !== false ) { echo $line; }
   fclose($f);
}
?></textarea><br>
<input style="width:300px; text-align:left; padding-left:15px;" value="Update Notepad" name="submit" type="submit">

<?php endif; ?>


</form>
</body>
</html>

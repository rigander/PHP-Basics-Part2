<?
header("Content-type: application/rtf");
header("Content-disposition: attachment; filename=\"mydoc.rtf\"");

$file_content = <<<EOF
{\\rtf1\\ansi\\ansicpg1251\\uc1\\deff0\\stshfdbch0\\stshfloch0\\stshfhich0\\stshfbi0\\deflang1049\\deflangfe1049{\\fonttbl{\\f0\\froman\\fcharset204\\fprq2{\\*\\panose 02020603050405020304}Times New Roman;}{\\f38\\froman\\fcharset0\\fprq2 Times New Roman;}
{\\f36\\froman\\fcharset238\\fprq2 Times New Roman CE;}{\\f39\\froman\\fcharset161\\fprq2 Times New Roman Greek;}{\\f40\\froman\\fcharset162\\fprq2 Times New Roman Tur;}{\\f41\\froman\\fcharset177\\fprq2 Times New Roman (Hebrew);}
{\\f42\\froman\\fcharset178\\fprq2 Times New Roman (Arabic);}{\\f43\\froman\\fcharset186\\fprq2 Times New Roman Baltic;}{\\f44\\froman\\fcharset163\\fprq2 Times New Roman (Vietnamese);}}{\\colortbl;\\red0\\green0\\blue0;\\red0\\green0\\blue255;\\red0\\green255\\blue255;
\\red0\\green255\\blue0;\\red255\\green0\\blue255;\\red255\\green0\\blue0;\\red255\\green255\\blue0;\\red255\\green255\\blue255;\\red0\\green0\\blue128;\\red0\\green128\\blue128;\\red0\\green128\\blue0;\\red128\\green0\\blue128;\\red128\\green0\\blue0;\\red128\\green128\\blue0;
\\red128\\green128\\blue128;\\red192\\green192\\blue192;}{\\stylesheet{\\ql \\li0\\ri0\\widctlpar\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\itap0 \\fs24\\lang1049\\langfe1049\\cgrid\\langnp1049\\langfenp1049 \\snext0 Normal;}{\\*\\cs10 \\additive \\ssemihidden 
Default Paragraph Font;}{\\*\\ts11\\tsrowd\\trftsWidthB3\\trpaddl108\\trpaddr108\\trpaddfl3\\trpaddft3\\trpaddfb3\\trpaddfr3\\trcbpat1\\trcfpat1\\tscellwidthfts0\\tsvertalt\\tsbrdrt\\tsbrdrl\\tsbrdrb\\tsbrdrr\\tsbrdrdgl\\tsbrdrdgr\\tsbrdrh\\tsbrdrv 
\\ql \\li0\\ri0\\widctlpar\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\itap0 \\fs20\\lang1024\\langfe1024\\cgrid\\langnp1024\\langfenp1024 \\snext11 \\ssemihidden Normal Table;}}{\\*\\latentstyles\\lsdstimax156\\lsdlockeddef0}{\\*\\rsidtbl \\rsid15812906}{\\*\\generator Micr
osoft Word 11.0.5604;}{\\info{\\title \\'cf\\'f0\\'e8\\'e2\\'e5\\'f2 USER}{\\author CKO}{\\operator CKO}{\\creatim\\yr2004\\mo12\\dy25\\hr12\\min15}{\\revtim\\yr2004\\mo12\\dy25\\hr12\\min15}{\\version2}{\\edmins0}{\\nofpages1}{\\nofwords1}{\\nofchars11}
{\\*\\company Computer Training Center}{\\nofcharsws11}{\\vern24689}}\\paperw11906\\paperh16838\\margl1701\\margr850\\margt1134\\margb1134 \\deftab708\\widowctrl\\ftnbj\\aenddoc\\noxlattoyen\\expshrtn\\noultrlspc\\dntblnsbdb\\nospaceforul\\formshade\\horzdoc\\dgmargin
\\dghspace180\\dgvspace180\\dghorigin1701\\dgvorigin1984\\dghshow1\\dgvshow1
\\jexpand\\viewkind4\\viewscale310\\pgbrdrhead\\pgbrdrfoot\\splytwnine\\ftnlytwnine\\htmautsp\\nolnhtadjtbl\\useltbaln\\alntblind\\lytcalctblwd\\lyttblrtgr\\lnbrkrule\\nobrkwrptbl\\snaptogridincell\\allowfieldendsel\\wrppunct
\\asianbrkrule\\rsidroot15812906\\newtblstyruls\\nogrowautofit \\fet0\\sectd \\linex0\\headery708\\footery708\\colsx708\\endnhere\\sectlinegrid360\\sectdefaultcl\\sftnbj {\\*\\pnseclvl1\\pnucrm\\pnstart1\\pnindent720\\pnhang {\\pntxta .}}{\\*\\pnseclvl2
\\pnucltr\\pnstart1\\pnindent720\\pnhang {\\pntxta .}}{\\*\\pnseclvl3\\pndec\\pnstart1\\pnindent720\\pnhang {\\pntxta .}}{\\*\\pnseclvl4\\pnlcltr\\pnstart1\\pnindent720\\pnhang {\\pntxta )}}{\\*\\pnseclvl5\\pndec\\pnstart1\\pnindent720\\pnhang {\\pntxtb (}{\\pntxta )}}{\\*\\pnseclvl6
\\pnlcltr\\pnstart1\\pnindent720\\pnhang {\\pntxtb (}{\\pntxta )}}{\\*\\pnseclvl7\\pnlcrm\\pnstart1\\pnindent720\\pnhang {\\pntxtb (}{\\pntxta )}}{\\*\\pnseclvl8\\pnlcltr\\pnstart1\\pnindent720\\pnhang {\\pntxtb (}{\\pntxta )}}{\\*\\pnseclvl9\\pnlcrm\\pnstart1\\pnindent720\\pnhang 
{\\pntxtb (}{\\pntxta )}}\\pard\\plain \\ql \\li0\\ri0\\widctlpar\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\itap0 \\fs24\\lang1049\\langfe1049\\cgrid\\langnp1049\\langfenp1049 {\\insrsid15812906 \\'cf\\'f0\\'e8\\'e2\\'e5\\'f2 }{
\\lang1033\\langfe1049\\langnp1033\\insrsid15812906 USER}{\\lang1033\\langfe1049\\langnp1033\\insrsid15812906\\charrsid15812906 
\\par }}
EOF;


$user_name = strip_tags($_COOKIE["userName"]);
if (!$user_name) $user_name = "Незнакомец";
$user_name .= " Ты работаешь с IP " . $_SERVER["REMOTE_ADDR"];
$file_content = str_replace("USER", $user_name, $file_content);

echo $file_content;
?>

<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="sg:pagetag" content="" /><meta name="sg:flowtag" content="" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Insider Suite | Payment Page</title>
<!-- CSS START -->
<style>

.myButton2 {
  background-color:#ffffff;
  -moz-border-radius:10px;
  -webkit-border-radius:10px;
  border-radius:10px;
  border:1px solid #141414;
  display:inline-block;

  color:#0d0d0d;
  font-family:Verdana;
  font-size:17px;
  padding:11px 30px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffffff;
}

.myButton {
  -moz-border-radius:10px;
  -webkit-border-radius:10px;
  border-radius:10px;
  display:inline-block;
  cursor:pointer;
  color:#0d0d0d;
  font-family:Verdana;
  font-size:17px;
  padding:11px 30px;
  text-decoration:none;
  background-color: black;
  color: white;
  background: rgb(255, 51, 102);
  outline: none;
}

html, body {margin: 0 !important; padding: 0 !important; height: 100% !important;  width: 100% !important; }
* { -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }
[office365] button,div {display: block !important; }
.ExternalClass * { line-height: 100%; }
.ExternalClass {width:100%;} .ReadMsgBody{width:100%;}
table, td { mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; }
table { border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important; }
table table table { table-layout: auto !important; }
img { -ms-interpolation-mode: bicubic; }
  
a[x-apple-data-detectors] { color: inherit !important; }

@media screen and (max-width: 600px) {
  * {-webkit-text-size-adjust:none; }
  .single_sel {
    width: 100%!important;
  }  
  .center { text-align:center !important; }
  .nonmobile { display: none !important; }
  .mobile { display: block !important; }
  .mobile-inline { display: inline-block !important; }
 
  .hauto { height:auto !important; }
  .wimg { width: 100% !important;max-width: 100% !important;height: auto !important;margin: auto !important;}
  .footer { border:none !important; border-top:1px solid #cccccc !important; border-bottom:1px solid #cccccc !important; padding-bottom:10px!important;}
  
  .p0 { padding:0px!important; }
  .p10 { padding:10px!important; }
  .p10-0 { padding:10px 0!important; }
  .p5 { padding:5px!important; }
  .p5-0 { padding:5px 0px!important; }
  .p10-0-5 { padding:10px 0 5px!important; }
  .p0-20 { padding:0 20px!important; }
  .p20-10 { padding:20px 10px!important; }
  .p40-10-20 { padding:40px 10px 20px!important; }
  .p20 { padding:20px!important; }
  .p30 { padding:30px!important; }
  
  .f12 { font-size: 12px !important; }
  .f14 { font-size: 14px !important; }
  .f15 { font-size: 15px !important; }
  .f16 { font-size: 16px !important; }
  .f18 { font-size: 18px !important; }
  .f20 { font-size: 20px !important; }
  
  .t12 { line-height: 14px !important; }
  .t15 { line-height: 17px !important; }
  .t16 { line-height: 18px !important; }
  
  .stack-column,
    .stack-column-center,
  .stack-column-default {
      display: block !important;
      width: 100% !important;
      max-width: 100% !important;
      direction: ltr !important;
    }
    .stack-column-center {
      text-align: center !important;
    }

  .stack-column-default table {
      margin:0 !important;
    }
  
  .header_mobile { width:100% !important; display:block !important; padding-top:10px!important; max-height:300px!important;}
  
  a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
  }
}
/*ipad si mail > 768px*/
@media screen and (device-width: 768px) and (device-height: 1024px) {
  body {min-width: 701px !important;}
}

.single_sel {
  margin-bottom: 15px;
  width: 600px;
}
.part_sel img {    
  width: 175px;
  height: 135px;
}

.single_sel .card_type {
  margin: -2px 0 4px;
  font: 15px!important 'Times New Roman', Times, serif;
  letter-spacing: .025em;
  color: #a7a4a4;
}

.single_sel .date_range {
    margin: 22px 0 20px;
    font-family: 'Times New Roman', Times, serif;
    color: black;
}
.h3, h3{
  font-size: 24px;
}

.single_sel .card_type h3{
    margin: -2px 0 4px;
    font: 15px 'Times New Roman', Times, serif;
    letter-spacing: .025em;
    color: #a7a4a4;
}

.part_sel {
  margin-bottom: 7px;
  display: flex!important;
  color: black;
  justify-content: space-between;
}  
.part_sel ul, .review_form ul {
  display: inline-block;
}

.part_act_sel h3 {
    color: #a7a4a4;
    margin: -2px 0 4px;
    font: 15px 'Times New Roman', Times, serif;
    letter-spacing: .025em;
    color: #a7a4a4;
}
.gallery-info {
  margin-left: 20px;
  width: 50%;
}
.gallery-info label {
  color: #888888;
  display: inline-block;
    max-width: 100%;
    margin-bottom: 10px;
    font-weight: 400;
}

.gallery-info-capacity::before {
    width: 18px;
    height: 18px;
    top: 1px;
    left: 1px;
    background-image: url(https://dddwzx8rabh1g.cloudfront.net/Email/pamela.png);
}

.custom_a {
    display: block;
    font: 12px/28px 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    color: #f36 !important;
    font-size: 12px;
    text-align: center;
    margin: 0px;
}
.custom_a b {
    font: 12px/28px 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    color: #f36;
    font-size: 24px;
    text-align: center;
}

.custom_b {
    color: #a0a0a0;
    font-size: 14px;
    font-family: 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    text-align: center;
    cursor: default;
    margin-top: 10px;
    margin-bottom: 10px;
}

.custom_b del {
    color: black;
    font-size: 16px;
    font-family: 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    font-weight: bold;
    text-align: center;
    cursor: default;
}
.total_p img {
  vertical-align: middle;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    margin-top: -5px;
}
.total_p {
    color: #a0a0a0;
    font-size: 12px;
    font-family: 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    text-align: center;
    cursor: default;
    margin-top: 10px;
}
.total_p b {
    color: #a0a0a0;
    font-size: 14px;
    font-family: 'GT Walsheim Pro', Helvetica, Arial, sans-serif;
    text-align: center;
    cursor: default;
}

.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 10px;
    margin-bottom: 10px;
}
.h4, h4 {
    font-size: 18px;
}
.gallery-info p {
    font-size: 16px;
    color: #a7a4a4;
}


</style>
<!-- CSS : END -->

</head>
<body bgcolor="#ffffff" >
<!-- PREHEAD -->
<div style="display:none; font-size:1px; color:#333333; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow: hidden;"></div>
<!-- /PREHEAD -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:;">
  <tr><td align="center" valign="top">

  <!-- TABLEAU PRINCIPAL -->
  <table width="620" border="0" cellspacing="0" cellpadding="0" class="w600" >

  <tr><td style="padding:0 10px;" class="p0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
 
 
  <!-- IMG TOP -->
  <tr>
        <td><a href="https://sionoo.com/redirect?url=https://www.insidersuite.coi/"><img src="https://d15k2d11r6t6rl.cloudfront.net/public/users/BeeFree/beefree-4kn379c6jew/email_banner.png" width="600" height="280" alt="Insider Suite" border="0" style="display: block; width:100%; max-width:600px; height:auto;"/></a></td></tr>

  <!-- /IMG TOP -->
  
  <tr>
  <td bgcolor="#ffffff" style="padding:25px 40px 40px;" class="p20"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <!-- titre -->
  <tr>
  <td align="center"><i style="font-size:32px; font-family: Georgia, serif; color:#1d1d1d;  font-style: italic;">Hi, {{$sender_name}},</i></td>
  </tr>
  <!-- /titre -->
  
  <!-- separateur -->
  <tr>
  <td align="left" style="padding:20px 20px 40px;" class="p20"><img src="http://dddwzx8rabh1g.cloudfront.net/Email/seperatior.png" width="30" height="4" alt="Insider Suite" border="0" style="display: block; margin: auto;"/></td>
  </tr>

  <!-- /separateur -->
  <!-- texte -->  
  <tr>
    <td align="center"><i style="font-size:16px; font-family: Georgia, serif; color:#1d1d1d;  ">Insider Suite is delighted to confirm your upcoming trip details as below:</i></td>
  </tr>
  </table></td>
  </tr>
  <!-- /cta -->
  </tbody>
  </table></td>
  </tr>

  <!-- pictos -->  
  <tr>
  <td class="p0-20"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <tr>
 
  <td align="center" class="stack-column-center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <tr>
  <td style="padding:0 3px;" class="p10-0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
      {!!$content!!}
  </tbody> <br><br>
  <i style="font-size:16px; font-family: Georgia, serif; color:#1d1d1d;  ">
  Thank you for choosing us.  
<br><br>
We wish you memorable experience!
<br><br>
Insider Suite Team
</i>
  </table></td>
  </tr>
  </tbody>
  </table></td>
  <td width="33%" align="center" class="stack-column-center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody> 

  <tr>
  </tr> 
  </tbody>
  </table></td>
  </tr>
  </tbody>
  </table>
  </td></tr>  
  <!-- /pictos -->
       <!-- titre -->
   
  <!-- /titre -->
  <!-- social -->
  <tr>
  <td align="center" style="padding:40px 0 15px;"><table width="184" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <tr>
  <td></td>
  <td></td>
</tr>

  </tbody>
  </table>
  </td>
  </tr>
    <!-- TEXTE LEGAL -->
  <tr>
     <td align="center" style="padding:10px;font-size: 11px; font-family: Arial, Verdana; color:#666666;"> <span> This email has been sent to you because you are a member of Insider Suite.<br /> Please add us to your address book to ensure you receive future emails from us.<br />  </td>

  </tr>
  <!-- /TEXTE LEGAL -->
  <!-- /social -->
  </tbody>
  </table></td></tr>
  </table>
  <!-- /TABLEAU PRINCIPAL -->
  </td></tr>
</table>
<img height='0' width='0' alt='' />
</body>
<script type="text/javascript" src="http://wowslider.com/images/demo/jquery.js"></script>
<script type="text/javascript" src="http://wowslider.com/styles/a.js"></script>
</html>

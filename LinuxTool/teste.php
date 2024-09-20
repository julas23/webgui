<?php
    include 'config.php';
    $username = $_GET['username'];
    //if (!$username) { header("Location:login.php"); }
?>
<html>
<head>
<title>UnixTool WebGUI - Admin Tool</title>
	<link href="img/style.css" rel="stylesheet" />
	<link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="js/liteaccordion.css">
	<script src="js/ga.js" async="" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery_002.js"></script>
	<script src="js/liteaccordion.js"></script>
</head>
<body class="contorno">
<table align="center" width="1300" border="0" cellpadding="0" cellspacing="0" bgcolor=#eeeeee>
  <tr>
    <td colspan="3" align="left" valign="middle" bgcolor="#ffffff"><table width=1300 border="0" align=center bgcolor=#eeeeee>
      <tr>
        <td align="center" valign="middle" width=25>
        	<img src="img/maintainance.png" width="25">
        </td>
		<td align="left" valign="middle" width=200>
        	<img src="img/title.png" width="200">
        </td>
        <td align="center" valign="middle" width=500>
        	<div align=center style = 'display:inline;'>
				<font size=4 color=black><strong>Interface de Intera&ccedil;&atilde;o Automatizada Linux</strong></font><br>
				<font size=1 color=red>(Shell + Expect + PHP)</font>
			</div>
        </td>
		<td align="right" valign="middle" width=60><font size=2>Usuário:</font></td>
        <td align=center valign="middle" width=140><font size=2 color=red><?php echo $username; ?></font></td>
        <td align="center" valign="middle" width=10><font size=2>em</font></td>
        <td align="center" valign="middle" width=120><font size=2 color=red><?php echo $ipaddress; ?></font></td>
        <td align="right" valign="middle" width=30><a href = "logout.php">Sair</a></td>
      </tr>
    </table></td>
  </tr>
  <tr align="left" valign="top">
    <td width="134" bgcolor="#eeeeee" align="center" valign="top">
        <table border=0 bordercolor=#eeeeee width=132>
            <tr><td align=center><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='shframe.html'">Início</a></tr></td>
            <tr><td>
            <ul id="accordion">
                <li><font color=red>JBoss</font></li>
                <ul>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='jboss.htm'">&nbsp;Status</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='statusjboss.htm'">&nbsp;Consumo</a></li>
	            </ul>
&nbsp;<br>
                <li><font color=red>PostGres</font></li>
                <ul>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='postgres.htm'">&nbsp;Status</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='conspgs.htm'">&nbsp;Consumo</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='sincronia.htm'">&nbsp;Sincronia</a></li>
	            </ul>
&nbsp;<br>
                <li><font color=red>Oracle</font></li>
                <ul>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='oracle.htm'">&nbsp;Consumo</a></li>
	            </ul>
&nbsp;<br>
                <li><font color=red>Rotinas</font></li>
                <ul>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='relqui.htm'">&nbsp;Relatório 15/30</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='consprec.htm'">&nbsp;Preço do ERP</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='consconv.htm'">&nbsp;Cartão Covabra</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='procnfe.htm'">&nbsp;Processos NFe</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='confpreco.htm'">&nbsp;Preço nos PDVs</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='buscapreco.htm'">&nbsp;Busca Preços</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='fsusage.htm'">&nbsp;Disco Servidores</a></li>
	            </ul>
&nbsp;<br>
                <li><font color=red>Xen Server</font></li>
                <ul>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='xencheck.htm'">&nbsp;XenServer + VMs</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='VM_Check.htm'">&nbsp;vMotion VMs</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='fileserver.htm'">&nbsp;File Servers</a></li>
                    <li><a href="javascript:void(0)" onclick="top.frames['shellframe'].location.href ='RUBs.htm'">&nbsp;Servidores RUB</a></li>
	            </ul>
            </ul>
        	<script type="text/javascript">
            	$("#accordion > li").click(function() {
            	if(false == $(this).next().is(':visible')) {
            		$('#accordion > ul').slideUp(300);
            	}
            	$(this).next().slideToggle(300);
	            });
	        </script>
	    </table>
    <td width="1150">
            <div class="iframe"><iframe name="shellframe" src="shframe.html" frameborder="0" scrolling="auto" height=625 width=1150></iframe></div>
    </td>
    <td width="12" bgcolor="#eeeeee"></td>
  </tr>
  <tr>
    <td colspan="3" align="right" valign="center" bgcolor="#eeeeee"><font size="1" color="#888888" face="sans-serif">Designed by: <strong>Juliano Alves dos Santos &nbsp;&nbsp;&nbsp;</strong></font></td>
  </tr>
</table>
</body>
</html>

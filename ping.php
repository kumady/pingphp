<?php
$iplist = ["8.8.8.8","10.1.18.1","10.1.86.204","10.1.0.2","10.1.0.3","10.1.0.4","10.1.0.5","10.1.0.44","10.1.0.45","10.1.0.46","10.1.0.50","10.1.0.51","10.1.0.52","10.1.95.88"];
$i = count($iplist);

for($j=0;$j<$i;$j++){
	$ip = $iplist[$j];	
	$ping = exec("ping -n 1 $ip",$output,$status);
}
$i = count($iplist);

for($j=0;$j<$i;$j++){
	$ip = $iplist[$j][0];	
	$ping = exec("ping -n 1 $ip",$output,$status);
}
$iplist = array
(
	array("8.8.8.8","DNS google","N/A","vlan 64"),
	array("10.1.18.1","PC","e4:54:e8:b4:95:56","vlan 64"),
	array("10.1.86.204","Laptop","18:47:3d:44:9c:49","vlan 64"),
	array("10.1.0.2","SW02 cisco-2960","70:c9:c6:ce:63:c0","vlan 64"),
	array("10.1.0.3","SW03 cisco-2960","00:29:c2:4a:93:c0","vlan 64"),
	array("10.1.0.4","SW04 cisco-2960","cc:70:ed:1a:95:c0","vlan 64"),
	array("10.1.0.5","SW05 cisco-SG220","ac:4a:56:76:01:22","vlan 64"),
	array("10.1.0.44","SW44 unifi","f4:92:bf:73:14:9e","vlan 64"),
	array("10.1.0.45","SW45 unifi","f4:92:bf:73:10:5d","vlan 64"),
	array("10.1.0.46","SW46 unifi","74:ac:b9:e1:0c:4f","vlan 64"),
	array("10.1.0.50","SW50 unifi","78:45:58:b3:e4:79","vlan 64"),
	array("10.1.0.51","SW51 unifi","74:ac:b9:e1:0d:7b","vlan 64"),
	array("10.1.0.52","Cambium_E410 wifi","58:c1:7a:dd:df:dd","vlan 64"),
	array("10.1.95.88","PC Cổng 2","40:8d:5c:66:1a:01","vlan 64")
);
$i = count($iplist);
$results = [];
for($j=0;$j<$i;$j++){
	$ip = $iplist[$j][0];	
	$ping = exec("ping -n 1 $ip",$output,$status);
	$results[] = $status;
}
echo '<font face=Garamond>';
echo "<table border=1 style='border-collapse:collapse;margin: 0 auto; background-color: #f2f2f2;'>";
echo "<th colspan=6 style='background-color: #0074D9; color: white;'> Ping Monitoring </th>";
echo "<tr>";
echo "<td align=center width=30; style='background-color: #18ed1b'>#</td>";
echo "<td width=100; style='background-color: #18ed1b';td align=center>IP</td>";
echo "<td width=100; style='background-color: #18ed1b';td align=center >Status</td>";
echo "<td width=250; style='background-color: #18ed1b';td align=center>Description</td>";
echo "<td width=250; style='background-color: #18ed1b';td align=center>MAC</td>";
echo "<td width=250; style='background-color: #18ed1b';td align=center>VLAN</td>";
echo "</tr>";
foreach($results as $item =>$k){
	echo '<tr>';
	echo '<td align=center>'.$item.'</td>';
	echo '<td>'.$iplist[$item][0].'</td>';
	if($results[$item]==0){
		echo '<td style=color:green; td align=center>Online</td>';
	}
	else{
		echo '<td style=color:red ;td align=center>Offline</td>';
	}
	echo '<td align=center>'.$iplist[$item][1].'</td>';
	echo '<td align=center>'.$iplist[$item][2].'</td>';
	echo '</tr>';
}
echo "</table>";
echo '</font>';
echo header("refresh: 30");
?>

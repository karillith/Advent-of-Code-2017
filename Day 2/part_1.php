<?php 

/*//////////////////////////////////////////////
	PROCESS NOTES

	- yo this was tuff and annoying because i couldn't just parse the lines. it was like there was some nbsp or new line or *something* that just made everything wack. had to regex \d out, which annoyed me some. not sure if this was a "I copied this from the browser wah" thing (think: /r) or if this was a TRICK
	- i ended up trying both for loops and foreach loops thinking that i goofed something
	- the $min number only works because I could scan each line to see what was a "safe" max
	- nontless, ty for explode()
	- ah also try number one failed because i only checked for sums moving forward instead of in the whole array. as in, taking the first example case/line 1, i compared 5 to everything else, but only compared 1 to 9 & 5, instead of 5, 9, 5

/*//////////////////////////////////////////////

// $spreadsheet = "5	1	9	5
// 7	5	3
// 2	4	6	8";
// $spreadsheet = "790	99	345	1080	32	143	1085	984	553	98	123	97	197	886	125	947
// 302	463	59	58	55	87	508	54	472	63	469	419	424	331	337	72";
$spreadsheet = "790	99	345	1080	32	143	1085	984	553	98	123	97	197	886	125	947
302	463	59	58	55	87	508	54	472	63	469	419	424	331	337	72
899	962	77	1127	62	530	78	880	129	1014	93	148	239	288	357	424
2417	2755	254	3886	5336	3655	5798	3273	5016	178	270	6511	223	5391	1342	2377
68	3002	3307	166	275	1989	1611	364	157	144	3771	1267	3188	3149	156	3454
1088	1261	21	1063	1173	278	1164	207	237	1230	1185	431	232	660	195	1246
49	1100	136	1491	647	1486	112	1278	53	1564	1147	1068	809	1638	138	117
158	3216	1972	2646	3181	785	2937	365	611	1977	1199	2972	201	2432	186	160
244	86	61	38	58	71	243	52	245	264	209	265	308	80	126	129
1317	792	74	111	1721	252	1082	1881	1349	94	891	1458	331	1691	89	1724
3798	202	3140	3468	1486	2073	3872	3190	3481	3760	2876	182	2772	226	3753	188
2272	6876	6759	218	272	4095	4712	6244	4889	2037	234	223	6858	3499	2358	439
792	230	886	824	762	895	99	799	94	110	747	635	91	406	89	157
2074	237	1668	1961	170	2292	2079	1371	1909	221	2039	1022	193	2195	1395	2123
8447	203	1806	6777	278	2850	1232	6369	398	235	212	992	7520	7304	7852	520
3928	107	3406	123	2111	2749	223	125	134	146	3875	1357	508	1534	4002	4417";

$spreadsheet_lines = explode("\n", $spreadsheet);
$checksum = 0;

foreach ($spreadsheet_lines as $spreadsheet_line) {
	$values = explode("\t", $spreadsheet_line);
	// print_r($values);
	// echo "uhh {$values[15]}\n";
	$max = 0;
	$min = 10000;

	// for ($i=0; $i < count($values); $i++) { 
	// 	echo "value $i\n";
	// 	if ($values[$i] < $min) {
	// 		echo "{$values[$i]} is smaller than $min\n";
	// 		$min = $values[$i];
	// 	}
	// 	if ($values[$i] > $max) {
	// 		echo "{$values[$i]} is greater than $max\n";
	// 		$max = $values[$i];
	// 	}
	// }

	foreach ($values as $value) {
		// var_dump($value);
		if (trim($value) < $min) {
			echo "$value is smaller than $min\n";
			$min = $value;
		}
		if (trim($value) > $max) {
			echo "$value is greater than $max\n";
			$max = $value;
		}
		// var_dump($value);
	}

	// echo "$max is max\n";
	// echo "$min is min\n";
	$difference = $max - $min;
	// echo "$difference is difference\n";
	$checksum += $difference;
}

echo $checksum;

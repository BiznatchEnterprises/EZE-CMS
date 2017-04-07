<?php 
//+++++++++++++++++++++++++++++++++++++++++++
//	EZE-CORES STRUCTURE 2002 - Biznatch Enterprises
//	https://github.com/BiznatchEnterprises/EZE-CORES
//+++++++++++++++++++++++++++++++++++++++++++
//	EZE-CMS 2.0 - Biznatch Enterprises
//	https://github.com/BiznatchEnterprises/EZE-CMS
//+++++++++++++++++++++++++++++++++++++++++++


//EZE-CMS-2.0 ADMIN PANEL

//-----EZE-CORES ACTION Sector PRE-SCRIPT File START-----
if ($PARENT_LETT == "A"){
if ($CHILD_NUM == "2"){

function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
	//$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), "", $tmpString);
	$tmpString = str_replace(chr(13), "", $tmpString);
	
	return $tmpString;
}
//=================================================================

$BUTTONSTAT1 = 'first';
$BUTTONSTAT2 = 'first';
$BUTTONSTAT3 = 'first';
$BUTTONSTAT4 = 'first';
$BUTTONSTAT5 = 'first';
$BUTTONSTAT6 = 'first';
$BUTTONSTAT7 = 'first';
$BUTTONSTAT8 = 'first';
$BUTTONHGT1 = '21px';
$BUTTONHGT2 = '21px';
$BUTTONHGT3 = '21px';
$BUTTONHGT4 = '21px';
$BUTTONHGT5 = '21px';
$BUTTONHGT6 = '21px';
$BUTTONHGT7 = '21px';
$BUTTONHGT8 = '21px';
$SS2_WIDTH = '66%';

$CDCX = 0;
$CDC = 0;

//------------------LOGIN----------------------------------------------
if ($CD == ''){ $CDC = '2'; $CDCX = 0; $BUTTONSTAT8 = 'alt'; $BUTTONHGT8 = '30px';}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'GENERAL'){
$BUTTONSTAT1 = 'alt';
$BUTTONHGT1 = '30px';
$CDC = 3;
$CDCX = 4;
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'EZE-CORES'){
$BUTTONSTAT2 = 'alt';
$BUTTONHGT2 = '30px';
$CDC = 7;
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'EZE-CMS'){
$BUTTONSTAT2 = 'alt';
$BUTTONHGT2 = '30px';
$CDC = 5;
$CDCX = 6;

//----------------------------
if ($FORMEV[19] < 25) { $FORMEV[19] = 25; }
if ($FORMEV[9] == ''){ $FORMEV[9] = $ADMIN_PASSHASH; } else { $FORMEV[9] = md5($FORMEV[9]);  }

$FCC = file($CURRENTPATH . '/Databases/EZE-CMS-Settings.php');
$NFORMEV = $FORMEV;
$FORMEV = $FCC;

//------------------------
if ($CDD == 'UPDATE'){
	for ($tmp2 = 1; $tmp2 <= count($NFORMEV); $tmp2++) {
	$TMP = $TMP . $NFORMEV[$tmp2] . chr(13) . chr(10);
	}
WRITE_FILECONTENTS($CURRENTPATH . '/Databases/EZE-CMS-Settings.php', "<?php exit; ?><?php exit; ?><? exit; ?>//DONOTEDIT" . chr(13) . chr(10) . $TMP);
$FORMEV = $NFORMEV;
}
//-------------------------
	
	if ($CDX == 'New Template'){
		$NEWSECTORS = array();
		$NEWSECTORS[1] = md5('new/template.htm' . time());
		$NEWSECTORS[2] = 'new/template.htm';
		EZE_DBS_HELPER('AddDBP', 'LASTHELPER', $EZECMS_TEMPLATEPATH, $NEWSECTORS, '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
		
	}
	
	if ($CDX == 'Remove Template'){

	$x = count($TEMPL) / 2 ;
	//$x = $x / 3;
	//open raw templates file
	
	$t_templaterawdata = LOAD_FILECONTENTS($EZECMS_TEMPLATEPATH);

	$tmp3 = 1;
		for ($tmp1 = 1; $tmp1 <= $x; $tmp1++) {
		
		$t_templatename = '';
		$t_templatepath = '';
		$t_templateradio = '';
		
		$t_templatename = $TEMPL[$tmp3];
		$tmp3 = $tmp3 + 1;
		$t_templatepath = $TEMPL[$tmp3];
		$tmp3 = $tmp3 + 1;
		$t_templateradio = $TEMPL[$tmp3];
		$tmp3 = $tmp3 + 1;
					
			//find in raw data file and remove
			//echo $t_templatename . '-<br>';
			if ($t_templateradio == 'CHKT'){
			//echo $t_templatename . '-R-<br>';
			$t_templatedata = '<��[' . $t_templatename . ']��[' . $t_templatepath . ']��>' . chr(13) . chr(10);
			$t_templaterawdata = str_replace($t_templatedata, '', $t_templaterawdata);
			}
		}
		//resave raw data file
		//echo $t_templaterawdata;
		if ($t_templaterawdata <> '') { WRITE_FILECONTENTS($EZECMS_TEMPLATEPATH, $t_templaterawdata); }
	}

	if ($CDX == 'Save Changes'){
	$xx = 1;
	for ($tmp2 = 2; $tmp2 <= count($TEMPLATES) - 1; $tmp2++) {
	
	if ($TEMPL[$xx] <> ''){
	$xxx = $xx + 1;

		$FINDSECTORS = array();
		$REPLACESECTORS = array();
	
			$FIRSTSECTOR = $TEMPLATES[$tmp2][1];
			$FINDSECTORS[1] = $TEMPLATES[$tmp2][1];
			$FINDSECTORS[2] = $TEMPLATES[$tmp2][2];

			
			$REPLACESECTORS[1] = $TEMPL[$xx];
			$REPLACESECTORS[2] = $TEMPL[$xxx];
	

			EZE_DBS_HELPER('UpdateDBPS', 'LASTHELPER', $EZECMS_TEMPLATEPATH, $FIRSTSECTOR, $FINDSECTORS, $REPLACESECTORS, '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
			$ACTIT = 'Update Completed!';
			}
			$xx = $xx + 3;
	}
		
	
	}
	
	
	//generate output
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_TEMPLATEPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $TEMPLATES = $EZE_DBS_OUTPUT; } else { $TEMPLATES = $EZE_DBS_OUTPUT[0][0]; }

	$TEMPLATEOUTPUT = '';
	$tmp2 = 1;
		for ($tmp1 = 2; $tmp1 <= count($TEMPLATES) - 1; $tmp1++) {
		$tmp4 = $tmp2 + 1;
		$tmp5 = $tmp2 + 2;
		$TEMPLATEOUTPUT = $TEMPLATEOUTPUT . '<input type="text" name="TEMPL[' . $tmp2 . ']" size="16" style="text-align: center; border: 1px solid #000000" value="' . $TEMPLATES[$tmp1][1] .'">&nbsp;<input type="text" name="TEMPL[' . $tmp4. ']" size="23" style="text-align: center; border: 1px solid #000000" value="' . $TEMPLATES[$tmp1][2] . '"><input type="radio" value="CHKT" name="TEMPL[' . $tmp5 . ']"><br>';
		$tmp2 = $tmp5 + 1;
		
		}
		
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'LYT-MSD'){
$BUTTONSTAT3 = 'alt';
$BUTTONHGT3 = '30px';
$CDC = 24;
$CDCX = 25;
$CD = 'PAGES';

//modify LYT-Module selections

}
//----------------------------------------------------------------

if ($CD == 'LYT-MS'){if ($CDX == 'Back to Page Sections'){ $CD = 'PAGES'; $CDX = 'Open'; $PID = $FORMEV[1];}}

//----------------------------------------------------------------
if ($CD == 'PAGES'){
$BUTTONSTAT3 = 'alt';
$BUTTONHGT3 = '30px';
	
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == ''){ //MAIN EDITOR
	$CDX = 'Open';
	if ($PID == ''){ $PID = $PAGES[2][1];	}
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Remove'){
	
		if ($CDXX == ''){
		$CDC = 12;
		$CDCX = 13;
		}
		if ($CDXX == 'Yes'){
		$CDX = 'Open';
		$CDXX = '';
		
		//remove from database
		$t_rawdata = LOAD_FILECONTENTS($EZECMS_PAGESPATH);
		
		$FORMEV[1] = stripslashez($FORMEV[1]);
		
		$t_1 = strpos($t_rawdata, '<��[' . $FORMEV[1]);
			if ($t_1 > 0){
			$t_2 = strpos($t_rawdata, ']��>', $t_1);
				if ($t_2 > 0){
				$t_datachunk = substr($t_rawdata, $t_1, $t_2 - $t_1 + 6);
				}
			}

		$t_rawdata = str_replace($t_datachunk, '', $t_rawdata);

		if ($t_rawdata <> '') { WRITE_FILECONTENTS($EZECMS_PAGESPATH, $t_rawdata); }
	
		EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
		if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $PAGES = $EZE_DBS_OUTPUT; } else { $PAGES = $EZE_DBS_OUTPUT[0][0]; }

		$FORMEV[1] = '';
		$PID = '';
		$CDX = 'Open';
		}
		if ($CDXX == 'No'){
		$CDX = 'Open';
		$CDXX = '';
		}
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Rename'){

		//________________
		if ($CDXX == ''){
		$CDC = 14;
		$CDCX = 15;
		}
		//________________
		if ($CDXX == 'Rename Page ID'){
		$CDX = 'Open';
		$CDXX = '';
		
		$FORMEV[1] = stripslashez($FORMEV[1]);
		$FORMEV[2] = stripslashez($FORMEV[2]);
		
		
		$FINDSECTORS = array();
		$REPLACESECTORS = array();
	
		$FIRSTSECTOR = $FORMEV[1];
		$FINDSECTORS[1] = $FORMEV[1];
		$REPLACESECTORS[1] = $FORMEV[2];
	
		EZE_DBS_HELPER('UpdateDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, $FIRSTSECTOR, $FINDSECTORS, $REPLACESECTORS, '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);

		EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
		if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $PAGES = $EZE_DBS_OUTPUT; } else { $PAGES = $EZE_DBS_OUTPUT[0][0]; }
		
		$FORMEV[1] = $FORMEV[2];
		}
		//________________
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Save Changes'){
	$CDC = 10;
	$CDCX = 11;
	
	$FORMEV[1] = stripslashez($FORMEV[1]);

		for ($tmp1 = 1; $tmp1 <= count($PAGES) - 1; $tmp1++) {
			if ($PAGES[$tmp1][1] == $FORMEV[1]){
			$CURTEMPLL = $PAGES[$tmp1][2];
			$DBPLCT_01 = $PAGES[$tmp1][3];
			$DBPLCT_02 = $PAGES[$tmp1][4];
			$DBPLCT_03 = $PAGES[$tmp1][5];
			$DBPLCT_04 = $PAGES[$tmp1][6];
			$DBPLCT_05 = $PAGES[$tmp1][7];
			$DBPLCT_06 = $PAGES[$tmp1][8];
			$DBPLCT_07 = $PAGES[$tmp1][9];
			$DBPLCT_08 = $PAGES[$tmp1][10];
			$DBPLCT_09 = $PAGES[$tmp1][11];
			$DBPLCT_10 = $PAGES[$tmp1][12];
			}
		}
	
		$FINDSECTORS = array();
		$REPLACESECTORS = array();
	
		$FIRSTSECTOR = $FORMEV[1];
		$FINDSECTORS[1] = $CURTEMPLL;
		$FINDSECTORS[2] = $DBPLCT_01;
		$FINDSECTORS[3] = $DBPLCT_02;
		$FINDSECTORS[4] = $DBPLCT_03;
		$FINDSECTORS[5] = $DBPLCT_04;
		$FINDSECTORS[6] = $DBPLCT_05;
		$FINDSECTORS[7] = $DBPLCT_06;
		$FINDSECTORS[8] = $DBPLCT_07;
		$FINDSECTORS[9] = $DBPLCT_08;
		$FINDSECTORS[10] = $DBPLCT_09;
		$FINDSECTORS[11] = $DBPLCT_10;

		$REPLACESECTORS[1] = $FORMEV[2];
		$REPLACESECTORS[2] = '%01%' . $FORMEV[4];
		$REPLACESECTORS[3] = '%02%' . $FORMEV[5];
		$REPLACESECTORS[4] = '%03%' . $FORMEV[6];
		$REPLACESECTORS[5] = '%04%' . $FORMEV[7];
		$REPLACESECTORS[6] = '%05%' . $FORMEV[8];
		$REPLACESECTORS[7] = '%06%' . $FORMEV[9];
		$REPLACESECTORS[8] = '%07%' . $FORMEV[10];
		$REPLACESECTORS[9] = '%08%' . $FORMEV[11];
		$REPLACESECTORS[10] = '%09%' . $FORMEV[12];
		$REPLACESECTORS[11] = '%10%' . $FORMEV[13];
	
		EZE_DBS_HELPER('UpdateDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, $FIRSTSECTOR, $FINDSECTORS, $REPLACESECTORS, '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);

		EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
		if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $PAGES = $EZE_DBS_OUTPUT; } else { $PAGES = $EZE_DBS_OUTPUT[0][0]; }
	
	$CDX = 'Open';
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	
		//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^	
	if ($CDX == 'New'){
	$CDC = 8;
	$CDCX = 9;	
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Create New ID'){
	$CDC = 10;
	$CDCX = 11;
	
	$FORMEV[1] = stripslashez($FORMEV[1]);
	
	$NEWSECTORS = array();
	$NEWSECTORS[1] = $FORMEV[1];
	$NEWSECTORS[2] = $TEMPLATES[2][1];
	$NEWSECTORS[3] = '%01%';
	$NEWSECTORS[4] = '%02%';
	$NEWSECTORS[5] = '%03%';
	$NEWSECTORS[6] = '%04%';
	$NEWSECTORS[7] = '%05%';
	$NEWSECTORS[8] = '%06%';
	$NEWSECTORS[9] = '%07%';
	$NEWSECTORS[10] = '%08%';
	$NEWSECTORS[11] = '%09%';
	$NEWSECTORS[12] = '%10%';
	EZE_DBS_HELPER('AddDBP', 'LASTHELPER', $EZECMS_PAGESPATH, $NEWSECTORS, '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	
	$PID = $FORMEV[1];	
	$CDX = 'Open';
	
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $PAGES = $EZE_DBS_OUTPUT; } else { $PAGES = $EZE_DBS_OUTPUT[0][0]; }
		
	
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	
	
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Open'){
	$CDC = 10;
	$CDCX = 11;
	
	
	
	if ($PID == ''){ $PID = $FORMEV[1];	}
	if ($PID == ''){ $PID = $PAGES[2][1];	}
	
	$FORMEV[1] = stripslashez($FORMEV[1]);
	

		for ($tmp1 = 1; $tmp1 <= count($PAGES) - 1; $tmp1++) {
			if ($PAGES[$tmp1][1] == $PID){
			$CURTEMPLL = $PAGES[$tmp1][2];
			
			
			
			$DBPLC_01 = str_replace('%01%', '', $PAGES[$tmp1][3]);
			$DBPLC_02 = str_replace('%02%', '', $PAGES[$tmp1][4]);
			$DBPLC_03 = str_replace('%03%', '', $PAGES[$tmp1][5]);
			$DBPLC_04 = str_replace('%04%', '', $PAGES[$tmp1][6]);
			$DBPLC_05 = str_replace('%05%', '', $PAGES[$tmp1][7]);
			$DBPLC_06 = str_replace('%06%', '', $PAGES[$tmp1][8]);
			$DBPLC_07 = str_replace('%07%', '', $PAGES[$tmp1][9]);
			$DBPLC_08 = str_replace('%08%', '', $PAGES[$tmp1][10]);
			$DBPLC_09 = str_replace('%09%', '', $PAGES[$tmp1][11]);
			$DBPLC_10 = str_replace('%10%', '', $PAGES[$tmp1][12]);
			

			}
		}

	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	
	
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	if ($CDX == 'Edit LYT-Modules'){
	$BUTTONSTAT3 = 'first';
	$BUTTONHGT3 = '21px';
	$CD = 'LYT-MS';
	// page section database and update DPLCs
	
	}
	//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'LYT-MD'){
$BUTTONSTAT4 = 'alt';
$BUTTONHGT4 = '30px';

$CDCXS = 'MERGE';
$SS2_WIDTH = '100%';
	
	//**************************************
	If ($CDX == ''){
	$CDX = 'Open';
	}
	//**************************************

	//**************************************
	if ($CDX == 'New'){
	$CDC = 16;
	$CDCX = 17;
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Delete'){
	$CDC = 18;
	$CDCX = 19;
		
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Delete Now'){

		if ($CDXX == 'YES'){ 
		
		//remove from database
		$rawdata = LOAD_FILECONTENTS($EZECMS_LYTMDPATH);

		$t_1 = strpos($rawdata, '<��[' . $FORMEV[1]);
			if ($t_1 > 0){
			$t_2 = strpos($rawdata, ']��>', $t_1);
				if ($t_2 > 0){
				$datachunk = substr($rawdata, $t_1, $t_2 - $t_1 + 6);
				}
			}

		$rawdata = str_replace($datachunk, '', $rawdata);

		if ($rawdata <> '') { WRITE_FILECONTENTS($EZECMS_LYTMDPATH, $rawdata); }
		
		unlink('ExternalSectors/LYT-MODULES/' . $FORMEV[1] . '.php');
		
		$rawdata = LOAD_FILECONTENTS($EZECMS_PAGESPATH);
		$rawdata = str_replace('#{' . $FORMEV[1] . '}#', '', $rawdata);
		if ($rawdata <> '') { WRITE_FILECONTENTS($EZECMS_PAGESPATH, $rawdata); }
	
		$FORMEV[1] = '';
		$LID = '';
	
		$CDX = 'Open';
		}
		else
		{
		$CDX = 'Open';
		}
	
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Rename'){
	$CDC = 20;
	$CDCX = 21;	
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Rename Now'){
	
		if ($FORMEV[2] <> ''){
		$rawdata = LOAD_FILECONTENTS($EZECMS_LYTMDPATH);
		$rawdata = str_replace('<��[' . $FORMEV[1], '<��[' . $FORMEV[2], $rawdata);

		if ($rawdata <> '') { WRITE_FILECONTENTS($EZECMS_LYTMDPATH, $rawdata); }
		
		rename('ExternalSectors/LYT-MODULES/' . $FORMEV[1] . '.php', 'ExternalSectors/LYT-MODULES/' . $FORMEV[2] . '.php');
		
		$rawdata = LOAD_FILECONTENTS($EZECMS_PAGESPATH);
		$rawdata = str_replace('#{' . $FORMEV[1] . '}#', '#{' . $FORMEV[2] . '}#', $rawdata);
		if ($rawdata <> '') { WRITE_FILECONTENTS($EZECMS_PAGESPATH, $rawdata); }
		
		$FORMEV[1] = $FORMEV[2];
		$LID = $FORMEV[2];
		}
		
		$CDX = 'Open';	
	
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Create New'){
	
		if ($FORMEV[1] <> ''){
		$rte = rteSafe($_POST["f"]);
		//echo $rte;
		if ($FORMEV[2] <> 'HTML'){ $rte =  strip_tags($rte); } else { htmlspecialchars($rte); }
		
		$NEWSECTORS = array();
		$NEWSECTORS[1] = $FORMEV[1];
		$NEWSECTORS[2] = $FORMEV[2];
		$NEWSECTORS[3] = $FORMEV[3];
		
		EZE_DBS_HELPER('AddDBP', 'LASTHELPER', $EZECMS_LYTMDPATH, $NEWSECTORS, '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	
		WRITE_FILECONTENTS('ExternalSectors/LYT-MODULES/' . $FORMEV[1] . '.php', $rte);
		}
	
	$CDX = 'Open';
	}
	//**************************************
	
	//**************************************
	if ($CDX == 'Save Settings'){
	
		if ($FORMEV[1] <> ''){
		
			for ($tmp1 = 1; $tmp1 <= count($LYTMD); $tmp1++) {
				if ($LYTMD[$tmp1][1] == $FORMEV[1]){ 
				$FOUND = 'TRUE';
				$FORMAT = $LYTMD[$tmp1][2]; 
				$STATUS = $LYTMD[$tmp1][3]; 
				}
			}
			
			
			if ($FOUND == 'TRUE'){
			
				if ($FORMAT <> $FORMEV[2]){
					if ($STATUS <> $FORMEV[3]){
					$rawdata = LOAD_FILECONTENTS($EZECMS_LYTMDPATH);
					$rawdata = str_replace('��[' . $FORMAT . ']��[' . $STATUS . ']��', '��[' . $FORMEV[2] . ']��[' . $FORMEV[3] . ']��', $rawdata);
					if ($rawdata <> '') { WRITE_FILECONTENTS($EZECMS_LYTMDPATH, $rawdata); }	
					}
				}
				
				$rte1 = rteSafe($rte1);
	
					if ($FORMEV[2] <> 'HTML'){ 
					$rte1 =  rteSafe(strip_tags($rte1)); 
					} else { 
					htmlspecialchars($rte1); 
					$rte1 = str_replace('\"', '"',  $rte1);

					$rte1 = str_replace(' />', '>',  $rte1);
					$rte1 = str_replace('/>', '>',  $rte1);
					$rte1 = str_replace('<br/>', '<br>',  $rte1);
					$rte1 = str_replace('</br>', '<br>',  $rte1);
					$rte1 = str_replace(chr(9), '',  $rte1);
					$rte1 = str_replace('	', '',  $rte1);
					//$rte1 = str_replace(chr(13), '--NLB--',  $rte1);
					$rte1 = str_replace($IMAGEPATHz, '##IMAGEPATH##',  $rte1);
					}
	
				WRITE_FILECONTENTS('ExternalSectors/LYT-MODULES/' . $FORMEV[1] . '.php', $rte1);				
			
			}
		
		}		
	
	$CDX = 'Open';
	}
	//**************************************

	//**************************************
	if ($CDX == 'Open'){
	$CDC = 22;
	$CDCX = 23;
	
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_LYTMDPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $LYTMD = $EZE_DBS_OUTPUT; } else { $LYTMD = $EZE_DBS_OUTPUT[0][0]; }
	
	
	if ($LID == ''){ $LID = $FORMEV[1]; }
	if ($LID == ''){ $LID = $LYTMD[2][1]; }

	//open selected one
	if ($LID <> ''){
		for ($tmp1 = 1; $tmp1 <= count($LYTMD); $tmp1++) {
			if ($LYTMD[$tmp1][1] == $LID){ 
			$FOUND = 'TRUE';
			$FORMAT = $LYTMD[$tmp1][2]; 
			$STATUS = $LYTMD[$tmp1][3]; 
			}
		}

		if ($FOUND == 'TRUE'){
			if ($FORMAT == 'HTML'){ $FORMEV[8] = '<option value="HTML" selected>HTML</option><option value="Plain-Text">Plain-Text</option>'; } else { $FORMEV[8] = '<option value="Plain-Text" selected>Plain-Text</option><option value="HTML">HTML</option>'; }
			if ($STATUS == 'E'){ $FORMEV[9] = '<option value="E" selected>Enabled</option><option value="D">Disabled</option>'; } else { $FORMEV[9] = '<option value="D" selected>Disabled</option><option value="E">Enabled</option>'; }
	
			$FORMEV[10] = LOAD_FILECONTENTS('ExternalSectors/LYT-MODULES/' . $LID . '.php');
		
			if ($FORMAT <> 'HTML'){ 
			$FORMEV[10] =  rteSafe(strip_tags($FORMEV[10])); 
			} else { 
		
	
			htmlspecialchars($FORMEV[10]); 
			
			$FORMEV[10] = str_replace('%22' . '"', '"', $FORMEV[10]);
			$FORMEV[10] = str_replace('"Images/', '"' . $IMAGEPATHz, $FORMEV[10]);
			$FORMEV[10] = str_replace('##IMAGEPATH##', $IMAGEPATHz, $FORMEV[10]);
			$FORMEV[10] = str_replace(chr(9), '',  $FORMEV[10]);
			$FORMEV[10] = str_replace(' />', '>',  $FORMEV[10]);
			$FORMEV[10] = str_replace('/>', '>',  $FORMEV[10]);
			$FORMEV[10] =  rteSafe($FORMEV[10]); 

			
		
			
			
			
				
			}
		}	
	}

	}
	//**************************************

}
//----------------------------------------------------------------


//----------------------------------------------------------------
if ($CD == 'LYT-MS'){
$BUTTONSTAT4 = 'alt';
$BUTTONHGT4 = '30px';
$CDC = 24;
$CDCX = 25;


	If ($FORMEV[3] == 'CHKT01'){ $DPLN = '01'; $DPLC = '3'; }
	If ($FORMEV[3] == 'CHKT02'){ $DPLN = '02'; $DPLC = '4'; }
	If ($FORMEV[3] == 'CHKT03'){ $DPLN = '03'; $DPLC = '5'; }
	If ($FORMEV[3] == 'CHKT04'){ $DPLN = '04'; $DPLC = '6'; }
	If ($FORMEV[3] == 'CHKT05'){ $DPLN = '05'; $DPLC = '7'; }
	If ($FORMEV[3] == 'CHKT06'){ $DPLN = '06'; $DPLC = '8'; }
	If ($FORMEV[3] == 'CHKT07'){ $DPLN = '07'; $DPLC = '9'; }
	If ($FORMEV[3] == 'CHKT08'){ $DPLN = '08'; $DPLC = '10'; }
	If ($FORMEV[3] == 'CHKT09'){ $DPLN = '09'; $DPLC = '11'; }
	If ($FORMEV[3] == 'CHKT10'){ $DPLN = '10'; $DPLC = '12'; }

	
		//-----------------------------
		//open PAGE ID
		for ($tmp1 = 1; $tmp1 <= count($PAGES); $tmp1++) {
			if ($PAGES[$tmp1][1] == $FORMEV[1]){ 
			$DPLCC = $PAGES[$tmp1][$DPLC];
			}
		}
		//-------------------------------		
		
		//------------------------------------
		if ($CDX == 'Add'){	
		
		$DPLCCT = $DPLCC . '#{' . $FORMEV[5] . '}#';		
		$tmpdata = LOAD_FILECONTENTS('Databases/EZE-CMS-PAGES.php');	
		
		$tmp1 = strpos($tmpdata, '��[' . $FORMEV[1]);
		$tmp2 = strpos($tmpdata, '��>', $tmp1);
		
		$tmp3 = substr($tmpdata, $tmp1, $tmp2 - $tmp1);

		$tmpdata1 = str_replace($DPLCC, $DPLCCT, $tmp3);
		$tmpdata = str_replace($tmp3, $tmpdata1, $tmpdata);

		WRITE_FILECONTENTS('Databases/EZE-CMS-PAGES.php', $tmpdata);	
		
		$DPLCC = $DPLCCT;
		}
		//----------------------------------
		
		//------------------------------------
		if ($CDX == 'Remove'){
			//$DPLCT = '%' . $DPLN . '%' . str_replace('#{' . $FORMEV[4] . '}#', '', $DPLCC);		
		$DPLCT = str_replace('#{' . $FORMEV[4] . '}#', '', $DPLCC);	
		$tmpdata = LOAD_FILECONTENTS('Databases/EZE-CMS-PAGES.php');	
		
		$tmp1 = strpos($tmpdata, $DPLCC);
		$tmp2 = strpos($tmpdata, '��>', $tmp1);
		
		$tmp3 = substr($tmpdata, $tmp1, $tmp2 - $tmp1 + 5);
		
		$tmpdata1 = str_replace($DPLCC, $DPLCT, $tmp3);
		$tmpdata = str_replace($tmp3, $tmpdata1, $tmpdata);		
		
		WRITE_FILECONTENTS('Databases/EZE-CMS-PAGES.php', $tmpdata);	
		$DPLCC = $DPLCT;
		}
		//---------------------------------		
		
		//------------------------------
		//List LYT-Modules for Selcted Page ID		
		$DPLI = explode('}#', $DPLCC);			
		$CNT = 0;
		if ($DPLI > 0){
		for ($tmp1 = 0; $tmp1 <= count($DPLI) - 1; $tmp1++) {
		$tmp2 = $DPLI[$tmp1];
		$tmp2 = str_replace('#{', '', $tmp2);
		$tmp2 = str_replace('%' . $DPLN . '%', '', $tmp2);
		//echo  $tmp2 . '<br>';
			if ($CNT == 0){ $CNTT = 'checked'; $CNT = 1; }
			if ($tmp2 <> ''){ $DPLHL = $DPLHL . '<option value="' . $tmp2 . '" ' . $CNTT . '>' . $tmp2 . '</option>'; }
			$used = $used . $tmp2;
		}
		}
		//-------------------------------
		
		//-------------------------------
		//List all enabled modules
		$CNT = 0;
		sort($LYTMD);
		for ($tmp1 = 1; $tmp1 <= count($LYTMD); $tmp1++) {
		//if ( strpos(' ' . $used, $LYTMD[$tmp1][1]) > 0) {  $LYTMD[$tmp1][3] = 'D'; }
			if ($LYTMD[$tmp1][3] == 'E'){ 
			if ($CNT == 0){ $CNTT = 'checked'; $CNT = 1; }
			$ENTMPL = $ENTMPL . '<option value="' . $LYTMD[$tmp1][1] . '" ' . $CNTT . '>' . $LYTMD[$tmp1][1] . '</option>';
			}
		}
		//--------------------------------

}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'DATABASES'){
$BUTTONSTAT5 = 'alt';
$BUTTONHGT5 = '30px';
$CDC = 32;
$CDCX = 33;
$CDCXS = 'MERGE';
$SS2_WIDTH = '100%';
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'HELP'){
$BUTTONSTAT7 = 'alt';
$BUTTONHGT7 = '30px';
$CDC = 26;
$CDCX = 0;

}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'HELP-REFERENCE'){
$BUTTONSTAT7 = 'alt';
$BUTTONHGT7 = '30px';
$CDC = 27;
$CDCX = 0;

}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'HELP-TUTORIALS'){
$BUTTONSTAT7 = 'alt';
$BUTTONHGT7 = '30px';
$CDC = 28;
$CDCX = 0;

}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($CD == 'HELP-VIDEOS'){
$BUTTONSTAT7 = 'alt';
$BUTTONHGT7 = '30px';
$CDC = 29;
$CDCX = 0;
$SS2_WIDTH = '100%';
}
//----------------------------------------------------------------
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//----------------------------------------------------------------
if ($CD == 'TOOLBOX'){
$BUTTONSTAT6 = 'alt';
$BUTTONHGT6 = '30px';
$CDC = 30;
$CDCX = 31;

	
	
}
//----------------------------------------------------------------


//----------------------------------------------------------------
if ($CD == 'IMAGESLIDESHOWS'){
$CDC = 35;
$CDCX = 36;

//echo $NSL[1];
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', 'Databases/SLIDESHOWS.php', '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $SLIDESHOWS = $EZE_DBS_OUTPUT; } else { $SLIDESHOWS = $EZE_DBS_OUTPUT[0][0]; }




	//**********
	//ADD NEW
	//*********
	if ($CDD == 'ADDNEW'){
		if ($NSL[1] <> ''){
		echo 'f';
		$NEWSECTORS = array();
		$NEWSECTORS = $NSL;
		EZE_DBS_HELPER('AddDBP', 'LASTHELPER', 'Databases/SLIDESHOWS.php', $NEWSECTORS, '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
		}
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', 'Databases/SLIDESHOWS.php', '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $SLIDESHOWS = $EZE_DBS_OUTPUT; } else { $SLIDESHOWS = $EZE_DBS_OUTPUT[0][0]; }

}

	//*********
	//UPDATE
	//*********
	if ($CDD == 'UPDATE'){
	
	
		
		for ($tmp2 = 1; $tmp2 <= count($IDNSL); $tmp2++) {
			$FINDSECTORS = array();
			$REPLACESECTORS = array();
			if ($IDNSL[$tmp2] <> ''){
			
			if ($DLNSL[$tmp2] == '') {$DLNSL[$tmp2] = '1800'; }
			if ($WDNSL[$tmp2] == '') {$WDNSL[$tmp2] = '0'; }
			if ($HENSL[$tmp2] == '') {$HENSL[$tmp2] = '00'; }

		
			$FIRSTSECTOR = $IDNSL[$tmp2];
			$FINDSECTORS[1] = $SLIDESHOWS[$tmp2][1];
			$FINDSECTORS[2] = $SLIDESHOWS[$tmp2][2];
			$FINDSECTORS[3] = $SLIDESHOWS[$tmp2][3];
			$FINDSECTORS[4] = $SLIDESHOWS[$tmp2][4];
			$FINDSECTORS[5] = $SLIDESHOWS[$tmp2][5];
			$FINDSECTORS[6] = $SLIDESHOWS[$tmp2][6];
			
			$REPLACESECTORS[1] = $IDNSL[$tmp2];
			$REPLACESECTORS[2] = $DLNSL[$tmp2];
			$REPLACESECTORS[3] = $SZNSL[$tmp2];
			$REPLACESECTORS[4] = $WDNSL[$tmp2];
			$REPLACESECTORS[5] = $HENSL[$tmp2];
			$REPLACESECTORS[6] = $IMNSL[$tmp2];			

			EZE_DBS_HELPER('UpdateDBPS', 'LASTHELPER', 'Databases/SLIDESHOWS.php', $FIRSTSECTOR, $FINDSECTORS, $REPLACESECTORS, '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
			$ACTIT = 'Update Completed!';
			}
		}
		
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', 'Databases/SLIDESHOWS.php', '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $SLIDESHOWS = $EZE_DBS_OUTPUT; } else { $SLIDESHOWS = $EZE_DBS_OUTPUT[0][0]; }

	}


	//*********
	//DISPLAY
	//*********


$baktrack = array();
for ($tmp1 = 1; $tmp1 <= count($SLIDESHOWS) - 1; $tmp1++) {
if ($SLIDESHOWS[$tmp1][1] <> ''){
$baktrack[$tmp1] = 'value="' . $SLIDESHOWS[$tmp1][1] . '"';

$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<b>PAGE ID:&nbsp;</b><select size="1" name="IDNSL[' . $tmp1 . ']">'  . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<option value="' . $SLIDESHOWS[$tmp1][1] . '">' . $SLIDESHOWS[$tmp1][1] . '</option>' . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '</select> <b>Delay: </b><input type="text" name="DLNSL[' . $tmp1 . ']" size="6" style="border: 1px solid #000000; text-align:center" value="' . $SLIDESHOWS[$tmp1][2] . '">(ms)<br>'  . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<b>Size:</b><select size="1" name="SZNSL[' . $tmp1 . ']">&nbsp;'  . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<option value="' . $SLIDESHOWS[$tmp1][3] . '" selected>' . $SLIDESHOWS[$tmp1][3] . '</option>' . chr(13) . chr(10);
if ($SLIDESHOWS[$tmp1][3] == 'Auto'){ $SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<option value="Manual">Manual</option>' . chr(13) . chr(10); } else { $SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<option value="Auto">Auto</option>' . chr(13) . chr(10); }
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '</select>&nbsp; <b>Width:</b><input type="text" name="WDNSL[' . $tmp1 . ']" size="6" style="border: 1px solid #000000; text-align:center" value="' . $SLIDESHOWS[$tmp1][4] . '">px&nbsp; <b>Height:</b><input type="text" name="HENSL[' . $tmp1 . ']" size="6" style="border: 1px solid #000000; text-align:center" value="' . $SLIDESHOWS[$tmp1][5] . '">px<br>'  . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '<b>Used Images: </b><input type="text" name="IMNSL[' . $tmp1 . ']" size="44" style="border: 1px solid #000000; text-align:center" value="' . $SLIDESHOWS[$tmp1][6] . '"><br>'  . chr(13) . chr(10);
$SLIDEEDITOUTPUT = $SLIDEEDITOUTPUT . '------------------------------------------------------------<br><br>'  . chr(13) . chr(10);
}
}

sort($PAGES);

		for ($tmp2 = 1; $tmp2 <= count($PAGES) - 1; $tmp2++) {
			$tmp = 'value="' . $PAGES[$tmp2][1] . '"';
			if (in_array($tmp, $baktrack) == FALSE){
			if (strpos($ACONTDITOUTPUT, $tmp) == 0) {$ACONTDITOUTPUT = $ACONTDITOUTPUT . '<option value="' . $PAGES[$tmp2][1] . '">' . $PAGES[$tmp2][1] . '</option>' . chr(13) . chr(10); }
			}
		}
	
}
//----------------------------------------------------------------



//========================LOGIN AUTH=============================================================================
if ($CDC <> '8'){
$ERROR = '';
	
	if ($USERNAME <> ''){
	$ERRORMSG[1] = '<br><center><b><font color="#FF0000">Error:</font></b> Invalid Login Details!</center>';
	$ERRORMSG[2] = '<br><center><b><font color="#FF0000">Error:</font></b> Username Not Found!</center>';
	$ERRORMSG[3] = '<br><center><b><font color="#FF0000">Error:</font></b> Password Incorrect!</center>';
	}
	
if ($USERNAME == 'Admin'){
		if (md5($PASSWORD) <> $ADMIN_PASSHASH) { 
		$ERROR = $ERRORMSG[3]; 
		$CDC = 2;
		$CDCX = 0;
		}
	} else {
		$ERROR = $ERRORMSG[2];
		$CDC = 21;
		$CDCX = 0;
	}


	if ($USERNAME == ''){ $ERROR = $ERRORMSG[1]; }
	if ($PASSWORD == ''){ $ERROR = $ERRORMSG[1]; }

}

if ($CD == ''){ $ERROR = ''; }

if ($ERROR <> '') {  cookie ("logout", $SID); }

if ($ERROR <> '') { $ADMINNAVVIS = 'visibility:hidden'; }
if ($USERNAME == '') { $ADMINNAVVIS = 'visibility:hidden'; }
//==========================================================================================================

//==================PLUGIN-OUTPUT================================================================================
LoadXPlugin($CDC);
LoadXPlugin($CDCX);
LoadXPlugin(1);

$DIV_MAINCONTENT1 = &New EZE_MODULE;
$DIV_MAINCONTENT1->DBG = $EZECORES_Run_Debug_Mode;
$DIV_MAINCONTENT1->ESL_OBJ[1] = '##MAINCONTENT##';
$DIV_MAINCONTENT1->NESL_OBJ[1] = $ERROR;
$DIV_MAINCONTENT1->ESL_OBJ[2] = 'nA';
$DIV_MAINCONTENT1->NESL_OBJ[2] = $na;
$DIV_MAINCONTENT1->CLONER('MAINCONTENT1', $EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_' . $CDC], $EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_' . $CDC]);

if ($CDCX <> 0){
$DIV_MAINCONTENT2 = &New EZE_MODULE;
$DIV_MAINCONTENT2->DBG = $EZECORES_Run_Debug_Mode;
$DIV_MAINCONTENT2->ESL_OBJ[1] = '##ERROR##';
$DIV_MAINCONTENT2->NESL_OBJ[1] = $ERROR;
$DIV_MAINCONTENT2->ESL_OBJ[2] = 'nA';
$DIV_MAINCONTENT2->NESL_OBJ[2] = $na;
$DIV_MAINCONTENT2->CLONER('MAINCONTENT2', $EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_' . $CDCX], $EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_' . $CDCX]);
}

if ($CDCXS == 'MERGE'){
if ($CDCX <> 0){
$DIV_MAINCONTENT2 = &New EZE_MODULE;
$DIV_MAINCONTENT2->DBG = $EZECORES_Run_Debug_Mode;
$DIV_MAINCONTENT2->ESL_OBJ[1] = '##ERROR##';
$DIV_MAINCONTENT2->NESL_OBJ[1] = $ERROR;
$DIV_MAINCONTENT2->ESL_OBJ[2] = 'nA';
$DIV_MAINCONTENT2->NESL_OBJ[2] = $na;
$DIV_MAINCONTENT2->CLONER('MAINCONTENT2', $EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_' . $CDCX], $EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_' . $CDCX]);
$DIV_MAINCONTENT1->DATA = $DIV_MAINCONTENT1->DATA . $DIV_MAINCONTENT2->DATA;
$DIV_MAINCONTENT2->DATA = '';
}
}

$DIV_MAIN1 = &New EZE_MODULE;
$DIV_MAIN1->ESL_OBJ[1] = '##MAINCONTENT##';
$DIV_MAIN1->NESL_OBJ[1] = $DIV_MAINCONTENT1->DATA;
$DIV_MAIN1->ESL_OBJ[2] = '##MAINCONTENTX##';
$DIV_MAIN1->NESL_OBJ[2] = $DIV_MAINCONTENT2->DATA;
$DIV_MAIN1->ESL_OBJ[3] = '##PAGEPATH##';
$DIV_MAIN1->NESL_OBJ[3] = $PAGEPATH;
$DIV_MAIN1->ESL_OBJ[4] = '##IMAGEPATH##';
$DIV_MAIN1->NESL_OBJ[4] = $IMAGEPATHz;
$DIV_MAIN1->ESL_OBJ[5] = '##BUTTONSTAT1##';
$DIV_MAIN1->NESL_OBJ[5] = $BUTTONSTAT1;
$DIV_MAIN1->ESL_OBJ[6] = '##BUTTONSTAT2##';
$DIV_MAIN1->NESL_OBJ[6] = $BUTTONSTAT2;
$DIV_MAIN1->ESL_OBJ[7] = '##BUTTONSTAT3##';
$DIV_MAIN1->NESL_OBJ[7] = $BUTTONSTAT3;
$DIV_MAIN1->ESL_OBJ[8] = '##BUTTONSTAT4##';
$DIV_MAIN1->NESL_OBJ[8] = $BUTTONSTAT4;
$DIV_MAIN1->ESL_OBJ[9] = '##BUTTONSTAT5##';
$DIV_MAIN1->NESL_OBJ[9] = $BUTTONSTAT5;
$DIV_MAIN1->ESL_OBJ[10] = '##BUTTONSTAT4##';
$DIV_MAIN1->NESL_OBJ[10] = $BUTTONSTAT4;
$DIV_MAIN1->ESL_OBJ[11] = '##BUTTONSTAT5##';
$DIV_MAIN1->NESL_OBJ[11] = $BUTTONSTAT5;
$DIV_MAIN1->ESL_OBJ[12] = '##BUTTONSTAT6##';
$DIV_MAIN1->NESL_OBJ[12] = $BUTTONSTAT6;
$DIV_MAIN1->ESL_OBJ[13] = '##BUTTONSTAT7##';
$DIV_MAIN1->NESL_OBJ[14] = $BUTTONSTAT7;
$DIV_MAIN1->ESL_OBJ[15] = '##BUTTONSTAT8##';
$DIV_MAIN1->NESL_OBJ[15] = $BUTTONSTAT8;
$DIV_MAIN1->ESL_OBJ[16] = '##BUTTONHGT1##';
$DIV_MAIN1->NESL_OBJ[16] = $BUTTONHGT1;
$DIV_MAIN1->ESL_OBJ[17] = '##BUTTONHGT2##';
$DIV_MAIN1->NESL_OBJ[17] = $BUTTONHGT2;
$DIV_MAIN1->ESL_OBJ[18] = '##BUTTONHGT3##';
$DIV_MAIN1->NESL_OBJ[18] = $BUTTONHGT3;
$DIV_MAIN1->ESL_OBJ[19] = '##BUTTONHGT4##';
$DIV_MAIN1->NESL_OBJ[19] = $BUTTONHGT4;
$DIV_MAIN1->ESL_OBJ[20] = '##BUTTONHGT5##';
$DIV_MAIN1->NESL_OBJ[20] = $BUTTONHGT5;
$DIV_MAIN1->ESL_OBJ[21] = '##BUTTONHGT6##';
$DIV_MAIN1->NESL_OBJ[21] = $BUTTONHGT6;
$DIV_MAIN1->ESL_OBJ[22] = '##BUTTONHGT7##';
$DIV_MAIN1->NESL_OBJ[22] = $BUTTONHGT7;
$DIV_MAIN1->ESL_OBJ[23] = '##BUTTONHGT8##';
$DIV_MAIN1->NESL_OBJ[23] = $BUTTONHGT8;
$DIV_MAIN1->ESL_OBJ[24] = '##SS2_WIDTH##';
$DIV_MAIN1->NESL_OBJ[24] = $SS2_WIDTH;


$DIV_MAIN1->ESL_OBJ[25] = '##DOEEND WORK##';
$DIV_MAIN1->NESL_OBJ[26] = $NOWORKING;
$DIV_MAIN1->ESL_OBJ[26] = '##LASTONEDOESNTWORK-ADD ALL ABOVE THIS##';
$DIV_MAIN1->NESL_OBJ[26] = $LASTONEDOESNTWORK;
$DIV_MAIN1->DBG = $EZECORES_Run_Debug_Mode;
$DIV_MAIN1->CLONER('MAIN1', $EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_1'], $EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_1']);
$ACTION_CONTENT = $DIV_MAIN1->DATA; //MAIN
//=============================================================================================
}
}
//-----EZE-CORES ACTION Sector PRE-SCRIPT File END-----


?>

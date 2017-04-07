<?php //EZE-CMS-2.0
//+++++++++++++++++++++++++++++++++++++++++++
//	EZE-CORES STRUCTURE 2002 - Biznatch Enterprises
//	https://github.com/BiznatchEnterprises/EZE-CORES
//+++++++++++++++++++++++++++++++++++++++++++
//	EZE-CMS 2.0 - Biznatch Enterprises
//	https://github.com/BiznatchEnterprises/EZE-CMS
//+++++++++++++++++++++++++++++++++++++++++++

//$rawdata = LOAD_FILECONTENTS($EZECMS_LYTMDPATH);
//echo $CD . ' [' . $CDX . ']';
//echo $CDX;

//----- EZE-CORES ACTION PRE-SCRIPT File START -----
if ($PARENT_LETT == "A"){
	if ($CHILD_NUM == "1"){
	
		//======== USE DEFAULT PAGE-ID WHEN SUB-COMMAND (PAGE) START ========
		if (isset($CD) == FALSE){
			$CD = $DEFAULT_PAGEID;
		}
		//======== USE DEFAULT PAGE-ID WHEN SUB-COMMAND (PAGE) END ========

		//-------------------
		// LOAD ALL USED Dynamic Plugin Container Modules & TEMPLATE USED FOR THIS PAGE
		for ($tmp1 = 1; $tmp1 <= count($PAGES); $tmp1++) {
		
			if ($CD == $PAGES[$tmp1][1]){ 
			$PTEMPLATE = $PAGES[$tmp1][2];
			$DPLC[1] = str_replace('%01%', '', $PAGES[$tmp1][3]);
			$DPLC[2] = str_replace('%02%', '', $PAGES[$tmp1][4]);
			$DPLC[3] = str_replace('%03%', '', $PAGES[$tmp1][5]);
			$DPLC[4] = str_replace('%04%', '', $PAGES[$tmp1][6]);
			$DPLC[5] = str_replace('%05%', '', $PAGES[$tmp1][7]);
			$DPLC[6] = str_replace('%06%', '', $PAGES[$tmp1][8]);
			$DPLC[7] = str_replace('%07%', '', $PAGES[$tmp1][9]);
			$DPLC[8] = str_replace('%08%', '', $PAGES[$tmp1][10]);
			$DPLC[9] = str_replace('%09%', '', $PAGES[$tmp1][11]);
			$DPLC[10] = str_replace('%10%', '', $PAGES[$tmp1][12]);
			}

		}
		//--------------------------------------------------

		//--------------------------------------------------
		// Translate all Dynamic Plugin Containers (DPLCs) into LYT-Modules

		//----- DPLC EXRACT (Parse all Used Modules) START ----
		$dplcn = 1;
		$dplcu = 0;

		for ($dplcn = 1; $dplcn <= 10; $dplcn++) {
			if (isset($DPLC[$dplcn]) == TRUE) {
				if (strpos($DPLC[$dplcn], '}#') > 0) {
				$dplcu = $dplcu + 1;
				$DPLCS_USED[$dplcu] = explode('}#', $DPLC[$dplcn]);
				}
			}
		}
		//----- DPLC EXTRACT (Parse all Used Modules) END ----


		//----------- DPLC ENGINE START --------------
		// FOR ALL DPLCs in TEMPLATE (Sequencially build output from all used modules)

		$tmp1 = 0;
		$tmp2 = 0;
		for ($dplcn = 1; $dplcn <= $dplcu; $dplcn++) {
			if (isset($DPLCS_USED[$dplcu]) == TRUE){

				$tmpc = count($DPLCS_USED[$dplcu]);

					if ($tmpc > 0){

						for ($tmp1 = 0; $tmp1 <= $tmpc - 1; $tmp1++) {
							$TMPDPLC - '';
							$TMPDPLC = str_replace('#{', '', $DPLCS_USED[$dplcu]);
							$TMPDPLC = str_replace('}#', '', $TMPDPLC);
	
							if ($TMPDPLC <> ''){
	
								for ($tmp2 = 1; $tmp2 <= count($LYTMD); $tmp2++) {
									if ($LYTMD[$tmp2][1] == $TMPDPLC) { 
										$FORMAT = $LYTMD[$tmp2][2];
										$STATUS = $LYTMD[$tmp2][3];
										$tmp2 = count($LYTMD);
									}	
								}
		
								//---------- Restrict a page to private logins START ------
								//if ($dplcu == 1) {
								//	if ($CD == 'Private Sub-Command (page)'){
								//	echo $_COOKIE["LOGGEDIN"];
	 							//		if ($_COOKIE["LOGGEDIN"] <> 'TRUE'){
			 					//		$STATUS = 'D'; 
		 						//		$DPLCOPT01 = '<br><br><center><font size="3">This information is available only to our MEMBERS</font><a href="?CD=MemServices"><font size="2">members</font></a>.<br><br>Please login to our <a href="?CD=MemS';
								//		}
								//	}
								//}
								//---------- Restrict a page to private logins END ------
	
								if ($STATUS == 'E'){	
									// GET LAYOUT FORMAT AND DETAILS
									// GET CONTENTS
									$DPLCOPT01 = $DPLCOPT01 . LOAD_LYTMODULE($TMPDPLC, 1,  $FORMAT);
		
								}	
	
							}

						}
					}
			}
		}
		// ----------- DPLC ENGINE START --------------


		//---------- LOAD TEMPLATE HTML START -------
		if (isset($TEMPLATES) == TRUE) {
			if (isset($PTEMPLATE) == TRUE){
			
				// Open Template File send to OUTPUT BUFFER
				for ($tmp1 = 1; $tmp1 <= count($TEMPLATES); $tmp1++) {
			
					if ($TEMPLATES[$tmp1][1] == $PTEMPLATE){ 
						$FTEMPLATE = $TEMPLATES[$tmp1][2]; $tmp1 = count($TEMPLATES);
					}
			
				}	
	
			if ($FTEMPLATE <> ''){ $ACTION_CONTENT = LOAD_FILECONTENTS('ExternalSectors/CMS Templates/' . $FTEMPLATE); } 
			}
		}
		//---------- LOAD TEMPLATE HTML END -------
 
 
	}
}
//----- EZE-CORES ACTION  Sector PRE-SCRIPT File END -----
?>

<?php
//+++++++++++++++++++++++++++++++++++++++++++
//EZE-CORES STRUCTURE - Biznatch Enterprises
//https://github.com/BiznatchEnterprises/EZE-CORES
//+++++++++++++++++++++++++++++++++++++++++++
//EZE-CMS 2.0  - Biznatch Enterprises
//https://github.com/BiznatchEnterprises/EZE-CMS
//+++++++++++++++++++++++++++++++++++++++++++


//-
//======================= EZE-Cores Settings File START =======================
$PRODUCT = '[EZE-CMS 2.00]';
$VERSION = 'EZE-CMS 2.0';

//############ GENERAL CORES SETTINGS START ############
//$^^ EZE-Cores Filename Path ^^   = ;
$EZECORES_FILENAME   = 'index.php';
//$^^ EZE-Cores Default Selected CORE ^^   = ;
$EZECORES_DEFAULT_CORE   = '0';
//$^^ EZE-Cores Default Selected CHILD ^^   = ;
$EZECORES_DEFAULT_CHILD   = 'HOME';
//$^^ EZE-Cores Default Selected PARENT ^^   = ;
$EZECORES_DEFAULT_PARENT   = 'A';
//$^^ EZE-Cores Sector Output (Pre-Script, Layout, Engine) ^^   = ;
$EZECORES_OUTPUT_DATA   = '';
//############ GENERAL CORES SETTINGS END ############

//############ CORES VARIABLE SETTINGS START #############

//----- IMPORT REQUEST VARIABLES START --------
//import_request_variables("gP", "r"); 

//if ($rP <> '') { $P = $rP; }
//if ($rC <> '') { $C = $rC; } 
//if ($rCD <> '') { $CD = $rCD; } 
//if ($rCDX <> '') { $CDX = $rCDX; } 
//if ($rCDXX <> '') { $CDXX = $rCDXX; } 
//if ($rCDXXX <> '') { $CDXXX = $rCDXXX; } 
//if ($rCDD <> '') { $CDD = $rCDD; } 
//if ($rSC <> '') { $SC = $rSC; } 
//if ($rSID <> '') { $SID = $rSID; }
//if ($rUID <> '') { $UID = $rUID; }
//if ($rUSERNAME <> '') { $USERNAME = $rUSERNAME; } 
//if ($rPASSWORD <> '') { $PASSWORD = $rPASSWORD; } 
//if ($rP11 <> '') { $P11 = $rP11; } 
//if ($rP12 <> '') { $P12 = $rP12; } 
//if ($rP21 <> '') { $P21 = $rP21; } 
//if ($rP22 <> '') { $P22 = $rP22; } 
//if ($rP31 <> '') { $P31 = $rP31; } 
//if ($rP32 <> '') { $P32 = $rP32; }
//if ($rCDD <> '') { $CDD = $rCDD; }
//$REF = '';
//if ($rREF <> '') { $REF = $rREF; }
//if ($REF == '') { $REF = $rref; }
//if ($REF == '') { $REF = $rR; }
//if ($REF == '') { $REF = $rr; }
//if ($REF == '') { $REF = $rA; }
//if ($REF == '') { $REF = $ra; }
//if ($REF == '') { $REF = $rAFF; }
//if ($REF == '') { $REF = $raff; }
//if ($rIDNSL <> '') { $IDNSL = $rIDNSL; }
//if ($rDLNSL <> '') { $DLNSL = $rDLNSL; }
//if ($rSZNSL <> '') { $SZNSL = $rSZNSL; }
//if ($rWDNSL <> '') { $WDNSL = $rWDNSL; }
//if ($rHENSL <> '') { $HENSL = $rHENSL; }
//if ($rIMNSL <> '') { $IMNSL = $rIMNSL; }
//if ($rrte1<> '') { $rte1 = $rrte1; }
//$NSL = $rNSL; 
//$FORMEV = $rFORMEV; 
//$FORMEVA = $rFORMEVA; 
//$FORMEVB = $rFORMEVB;
//----- IMPORT REQUEST VARIABLES END --------


//---------------COOKIE FUNCTIONS START---------------------------
if (isset($_COOKIE["SWCookieValue"]) == TRUE) {
	 $SWCookieValue = $_COOKIE["SWCookieValue"];     //READ COOKIE IF IT EXISTS
}

	function cookie($function, $value) {

		if ($function == "set") {
			setcookie ("SWCookieValue", "$value", time() + 14400);// Cookie is Valid for 4 hours. 3 value in function is the time expiration in seconds. ... 3600 seconds = 1 hour
			return true;// cookie set, return true
			} else if ($function = "logout") {
			setcookie ("SWCookieValue", "$value", time() - 14400);// Cookie is now expired as we set the expiration value to 4 hours ago
			return true; // logout complete
			} else if ($function = "check") {
				if (isset($SWCookieValue)) {
					if ($SWCookieValue == $value) {
					//print("ALL GOOD.. cookie verified");
					return true;
					} else {
					//print("Value does not much cookie");
					return false; // Failed, so return false
					}
				}
			} else {
				return false;// Failed, since no operations match
		}

	}
//---------------COOKIE FUNCTIONS END   --------------------------------

//----- Referral VARIABLES START --------
if (isset($REF) == TRUE) {
	$REF = str_replace('%20', ' ', $REF);
}
//----- Referral VARIABLES END --------

//----- Command VARIABLES START --------
if (isset($C) == TRUE) {
	if ($C <> '') { $CHILD_NUM = $C; }
}
//----- Command VARIABLES END --------

//----- Command-Do VARIABLES START --------
if (isset($CD) == TRUE) {
	$CD = str_replace('%20', ' ', $CD);
} 
//----- Command-Do VARIABLES END --------

//----- GENERAL VARIABLES START --------
if (isset($P) == TRUE) {
	$PARENT_LETT = $P;
}
//----- GENERAL VARIABLES END --------

//----- GENERAL VARIABLES START --------
	if (isset($CORE) == TRUE) { 
		$CORE_NUM = $CORE;
	} else {
		$CORE_NUM = $EZECORES_DEFAULT_CORE;
	}

//----- GENERAL VARIABLES END --------

//----- CHILD SECTOR NUMBER (CURRENT) START --------
	if (isset($CHILD) == TRUE) {
		$CHILD_NUM = $CHILD;
	} else { 
		$CHILD_NUM = $EZECORES_DEFAULT_CHILD;
	}

//----- CHILD SECTOR NUMBER (CURRENT) END --------

//----- PARENT SECTOR LETTER START --------
if (isset($PARENT) == TRUE) {
	$PARENT_LETT = $PARENT;
} else { 
	$PARENT_LETT = $EZECORES_DEFAULT_PARENT;
}
//----- PARENT SECTOR LETTER END --------

//----- CLEAR TEMP VARIABLES START --------
$CORE = '';
$CHILD = '';
$PARENT = '';
//----- CLEAR TEMP VARIABLES END --------


//if ($TEMPL == '') { $TEMPL = $rTEMPL; }
$IP = getenv("REMOTE_ADDR") . ' ' . getenv("HTTP_CLIENT_IP") . ' ' .  getenv("HTTP_X_FORWARDED_FOR");
$IP = str_replace('  ', '', $IP);
//if ($IPP == '') { $IPP = $rIPP; }

//---- IF NO SESSION ID FROM GET/POST, ATTEMPT TO READ FROM COOKIE START -----
if (isset($SID) == TRUE){
	if ($SID == ''){
		if (isset($SWCookieValue)) {
		$SID = $SWCookieValue;
		}
	}
}
//---- IF NO SESSION ID FROM GET/POST, ATTEMPT TO READ FROM COOKIE END -----

//---- SESSION ID (LOGOUT) START -----
if (isset($CDX) == TRUE) {
	if ($CDX == 'Logout') { 
		$CDX = '';
		$CD = 'MemServices'; 
		$SID = '';
		setcookie("SWCookieValue", 'Empty');
		setcookie("LOGGEDIN", 'FALSE');
	}
}
//---- SESSION ID (LOGOUT) END -----
	
//---- SESSION ID (AUTHENTICATION) START ---------
//echo $SID;
if (isset($SID) == TRUE){
	if ($SID == 'Empty') { $SID = ''; }

		if ($SID <> ''){
			$tmp = decrypt($SID, $IP);
			$USERNAME = '';
			$PASSWORD = '';
			$SESSKEY = '';
			$t2 = explode('<-->', $tmp);
			$USERNAME = $t2[0];
			$PASSWORD = $t2[1];
			$SESSKEY = $t2[2];
			$SID = '';
		}

		if ($USERNAME <> '') {
			if ($PASSWORD <> ''){
				$SID = encrypt($USERNAME . '<-->' . $PASSWORD . '<-->' . $SESSKEY, $IP);
			}
	}
}
//if ($SID <> ''){ if ($CD == 'MemServices'){ $CDX = 'Members Login'; } }
//---- SESSION ID (AUTHENTICATION) END ---------

//@@@@@@@@@@
//---------------------------------------------
//############ CORES VARIABLE SETTINGS END #############

//############ MISC SETTINGS START ##############
//-
$EZECMSSET = file($CURRENTPATH . '/Databases/EZE-CMS-Settings.php');
//-
	for ($tmp1 = 1; $tmp1 <= 25; $tmp1++) { 
	$EZECMSSET[$tmp1] = str_replace(chr(13), '', $EZECMSSET[$tmp1]);
	$EZECMSSET[$tmp1] = str_replace(chr(10), '', $EZECMSSET[$tmp1]);
	$EZECMSSET[$tmp1] = str_replace('\n', '', $EZECMSSET[$tmp1]);
	}
//-
$EZECORES_Run_Debug_Mode = str_replace(chr(13) . chr(10), '', $EZECMSSET[1]); //RUN DEBUG MODE
$EZECORES_Run_Debug_MTP = str_replace(chr(13) . chr(10), '', $EZECMSSET[2]);  //1 = FULL   2 = Page Load Time Only
//-
if ($EZECMSSET[3] < 25){ $EZECMSSET[3] = 25; }
$FORMMAX_VARS = str_replace(chr(13) . chr(10), '', $EZECMSSET[3]);
//-
$PAGEPATH = $EZECMSSET[4];
//-
$DEFAULTPATHPREFIX = $EZECMSSET[5];
$SECUREPATHPREFIX = $EZECMSSET[6];
//-
$PF = $DEFAULTPATHPREFIX;
if (getenv('SERVER_PORT') == '80'){ 
	$PF = $DEFAULTPATHPREFIX;
	 } else { 
		 if (getenv('SERVER_PORT') <> '81'){
			  $PF = $SECUREPATHPREFIX;
		} 
	}
//-
$IMAGEPATHz = $PF . $PAGEPATH . "Images/";
$EXTRAPATH = $PF . $PAGEPATH;
$PAGEPATH = $PF . $PAGEPATH;
//-
$SLIDESHOWS_FOLDER = str_replace(chr(13) . chr(10), '', $EZECMSSET[7]);  //HOME DIR FOR SLIDE-SHOW IMAGES
//-
$DEFAULT_PAGEID = str_replace(chr(13) . chr(10), '', $EZECMSSET[8]);   //DEFAULT ID IN CONTENTS DATABASE (First Page loaded when CD = '')

//------- IF NO SUB-COMMAND IS SPECIFIED USE DEFAULT FROM CONFIG START -------
if (isset($CD) == FALSE){
	$CD = $DEFAULT_PAGEID;
}
//------- IF NO SUB-COMMAND IS SPECIFIED USE DEFAULT FROM CONFIG END -------

$ADMIN_PASSHASH = str_replace(chr(13) . chr(10), '', $EZECMSSET[9]);
//-
$PAGETITLE = str_replace(chr(13) . chr(10), '', $EZECMSSET[10]);
$PAGEDOMAIN = str_replace(chr(13) . chr(10), '', $EZECMSSET[11]);
$COPYRIGHT = str_replace(chr(13) . chr(10), '', $EZECMSSET[12]);
//-
$META_ABSTRACT = str_replace(chr(13) . chr(10), '', $EZECMSSET[13]);
$META_DESCRIPTION = str_replace(chr(13) . chr(10), '', $EZECMSSET[14]);
$META_KEYWORDS = str_replace(chr(13) . chr(10), '', $EZECMSSET[15]);
$META_AUTHOR = str_replace(chr(13) . chr(10), '', $EZECMSSET[16]);
$META_RATING = str_replace(chr(13) . chr(10), '', $EZECMSSET[17]);
$META_LANGUAGE = str_replace(chr(13) . chr(10), '', $EZECMSSET[18]);
$META_DISTRIB = str_replace(chr(13) . chr(10), '', $EZECMSSET[19]);
$META_PRAGMA = str_replace(chr(13) . chr(10), '', $EZECMSSET[20]);
$META_ROBOTS = str_replace(chr(13) . chr(10), '', $EZECMSSET[21]);
$META_REVISIT = str_replace(chr(13) . chr(10), '', $EZECMSSET[22]);
$META_RESOURCE = str_replace(chr(13) . chr(10), '', $EZECMSSET[23]);
$META_CONTENT = str_replace(chr(13) . chr(10), '', $EZECMSSET[24]);
$META_EXPIRES = str_replace(chr(13) . chr(10), '', $EZECMSSET[25]);

$ADMIN_EMAIL = str_replace(chr(13) . chr(10), '', $EZECMSSET[26]);
//-
//-
//---Browser Specific Settings---
//if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') > 0){  //INTERNET EXPLORER 6
//
//}
//-------------------------------
//-
//############ MISC SETTINGS END ##############

//############ THE CORES START ############
//@@@@@@@@@@@
//$^^^^^ CORE #0 START ^^^^^   = ;
$EZECORES_TITLE['CORE_0']   = 'CORE #0';
$EZECORES_ENABLED['CORE_0']   = 'TRUE';
$EZECORES_PRESCRIPT_FILENAME['CORE_0']   = 'CoreSectors/core0_PRS.php';
$EZECORES_PRESCRIPT_ENCRYPTED['CORE_0']   = 'FALSE';
$EZECORES_PRESCRIPT_CRYPTKEY['CORE_0']   = '';
$EZECORES_LAYOUT_FILENAME['CORE_0']   = 'CoreSectors/core0_ESL.php';
$EZECORES_PRESCRIPT_ENCRYPTED['CORE_0']   = 'FALSE';
$EZECORES_PRESCRIPT_CRYPTKEY['CORE_0']   = '';
$EZECORES_ENGINE_FILENAME['CORE_0']   = 'CoreSectors/core0_ENG.php';
$EZECORES_ENGINE_ENCRYPTED['CORE_0']   = 'FALSE';
$EZECORES_ENGINE_CRYPTKEY['CORE_0']   = '';
//$^^^^^ CORE #0 END ^^^^^   = ;
//@@@@@@@@@@@
//############ THE CORES END ############

//############ EXTERNAL SectorS (Plug-ins) START ############
//$^^^^^ PLUGIN #1 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_1'] = 'ADMIN_INDEX';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_1'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_1'] = 'ExternalSectors/AdminPanel-Template/admin_index.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_1'] = '';
//$^^^^^ PLUGIN #1 END ^^^^^ = ;
//$^^^^^ PLUGIN #2 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_2'] = 'ADMIN_LOGIN';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_2'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_2'] = 'ExternalSectors/AdminPanel-Template/admin_login.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_2'] = '';
//$^^^^^ PLUGIN #2 END ^^^^^ = ;
//$^^^^^ PLUGIN #3 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_3'] = 'ADMIN_GENERAL';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_3'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_3'] = 'ExternalSectors/AdminPanel-Template/admin_general.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_3'] = '';
//$^^^^^ PLUGIN #3 END ^^^^^ = ;
//$^^^^^ PLUGIN #4 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_4'] = 'ADMIN_GENERAL_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_4'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_4'] = 'ExternalSectors/AdminPanel-Template/admin_general_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_4'] = '';
//$^^^^^ PLUGIN #4 END ^^^^^ = ;
//$^^^^^ PLUGIN #5 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_5'] = 'ADMIN_EZECMS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_5'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_5'] = 'ExternalSectors/AdminPanel-Template/admin_ezecms.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_5'] = '';
//$^^^^^ PLUGIN #5 END ^^^^^ = ;
//$^^^^^ PLUGIN #6 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_6'] = 'ADMIN_EZECMS_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_6'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_6'] = 'ExternalSectors/AdminPanel-Template/admin_ezecms_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_6'] = '';
//$^^^^^ PLUGIN #6 END ^^^^^ = ;
//$^^^^^ PLUGIN #7 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_7'] = 'ADMIN_EZECOREEDITOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_7'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_7'] = 'ExternalSectors/AdminPanel-Template/admin_ezecoreeditor.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_7'] = '';
//$^^^^^ PLUGIN #7 END ^^^^^ = ;
//$^^^^^ PLUGIN #8 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_8'] = 'ADMIN_PAGESECTIONCREATOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_8'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_8'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectioncreator.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_8'] = '';
//$^^^^^ PLUGIN #8 END ^^^^^ = ;
//$^^^^^ PLUGIN #9 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_9'] = 'ADMIN_PAGESECTIONCREATOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_9'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_9'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectioncreator_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_9'] = '';
//$^^^^^ PLUGIN #9 END ^^^^^ = ;
//$^^^^^ PLUGIN #10 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_10'] = 'ADMIN_PAGESECTIONEDITOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_10'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_10'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectioneditor.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_10'] = '';
//$^^^^^ PLUGIN #10 END ^^^^^ = ;
//$^^^^^ PLUGIN #11 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_11'] = 'ADMIN_PAGESECTIONEDITOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_11'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_11'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectioneditor_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_11'] = '';
//$^^^^^ PLUGIN #11 END ^^^^^ = ;
//$^^^^^ PLUGIN #12 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_12'] = 'ADMIN_PAGESECTIONREMOVER';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_12'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_12'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectionremover.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_12'] = '';
//$^^^^^ PLUGIN #12 END ^^^^^ = ;
//$^^^^^ PLUGIN #13 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_13'] = 'ADMIN_PAGESECTIONREMOVER_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_13'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_13'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectionremover_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_13'] = '';
//$^^^^^ PLUGIN #13 END ^^^^^ = ;
//$^^^^^ PLUGIN #14 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_14'] = 'ADMIN_PAGESECTIONRENAME';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_14'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_14'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectionrename.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_14'] = '';
//$^^^^^ PLUGIN #14 END ^^^^^ = ;
//$^^^^^ PLUGIN #15 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_15'] = 'ADMIN_PAGESECTIONRENAME_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_15'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_15'] = 'ExternalSectors/AdminPanel-Template/admin_pagesectionrename_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_15'] = '';
//$^^^^^ PLUGIN #15 END ^^^^^ = ;
//$^^^^^ PLUGIN #16 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_16'] = 'ADMIN_LYTMODULECREATOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_16'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_16'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulecreator.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_16'] = '';
//$^^^^^ PLUGIN #16 END ^^^^^ = ;
//$^^^^^ PLUGIN #17 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_17'] = 'ADMIN_LYTMODULECREATOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_17'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_17'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulecreator_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_17'] = '';
//$^^^^^ PLUGIN #17 END ^^^^^ = ;
//$^^^^^ PLUGIN #18 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_18'] = 'ADMIN_LYTMODULEREMOVER';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_18'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_18'] = 'ExternalSectors/AdminPanel-Template/admin_lytmoduleremover.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_18'] = '';
//$^^^^^ PLUGIN #18 END ^^^^^ = ;
//$^^^^^ PLUGIN #19 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_19'] = 'ADMIN_LYTMODULEREMOVER_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_19'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_19'] = 'ExternalSectors/AdminPanel-Template/admin_lytmoduleremover_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_19'] = '';
//$^^^^^ PLUGIN #19 END ^^^^^ = ;
//$^^^^^ PLUGIN #20 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_20'] = 'ADMIN_LYTMODULERENAME';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_20'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_20'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulerename.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_20'] = '';
//$^^^^^ PLUGIN #20 END ^^^^^ = ;
//$^^^^^ PLUGIN #21 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_21'] = 'ADMIN_LYTMODULERENAME_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_21'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_21'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulerename_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_21'] = '';
//$^^^^^ PLUGIN #21 END ^^^^^ = ;
//$^^^^^ PLUGIN #22 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_22'] = 'ADMIN_LYTMODULESEDITOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_22'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_22'] = 'ExternalSectors/AdminPanel-Template/admin_lytmoduleseditor.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_22'] = '';
//$^^^^^ PLUGIN #22 END ^^^^^ = ;
//$^^^^^ PLUGIN #23 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_23'] = 'ADMIN_LYTMODULESEDITOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_23'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_23'] = 'ExternalSectors/AdminPanel-Template/admin_lytmoduleseditor_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_23'] = '';
//$^^^^^ PLUGIN #23 END ^^^^^ = ;
//$^^^^^ PLUGIN #24 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_24'] = 'ADMIN_LYTMODULESSELECTOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_24'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_24'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulesselector.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_24'] = '';
//$^^^^^ PLUGIN #24 END ^^^^^ = ;
//$^^^^^ PLUGIN #25 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_25'] = 'ADMIN_LYTMODULESSELECTOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_25'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_25'] = 'ExternalSectors/AdminPanel-Template/admin_lytmodulesselector_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_25'] = '';
//$^^^^^ PLUGIN #25 END ^^^^^ = ;
//$^^^^^ PLUGIN #26 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_26'] = 'ADMIN_HELPCENTER';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_26'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_26'] = 'ExternalSectors/AdminPanel-Template/admin_helpcenter.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_26'] = '';
//$^^^^^ PLUGIN #26 END ^^^^^ = ;
//$^^^^^ PLUGIN #27 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_27'] = 'ADMIN_HELPCENTER_REFALL';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_27'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_27'] = 'ExternalSectors/AdminPanel-Template/admin_helpcenter_refall.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_27'] = '';
//$^^^^^ PLUGIN #27 END ^^^^^ = ;
//$^^^^^ PLUGIN #28 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_28'] = 'ADMIN_HELPCENTER_TUTS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_28'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_28'] = 'ExternalSectors/AdminPanel-Template/admin_helpcenter_tuts.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_28'] = '';
//$^^^^^ PLUGIN #28 END ^^^^^ = ;
//$^^^^^ PLUGIN #29 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_29'] = 'ADMIN_HELPCENTER_VIDS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_29'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_29'] = 'ExternalSectors/AdminPanel-Template/admin_helpcenter_vids.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_29'] = '';
//$^^^^^ PLUGIN #29 END ^^^^^ = ;
//$^^^^^ PLUGIN #30 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_30'] = 'ADMIN_TOOLBOX';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_30'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_30'] = 'ExternalSectors/AdminPanel-Template/admin_toolbox.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_30'] = '';
//$^^^^^ PLUGIN #30 END ^^^^^ = ;
//$^^^^^ PLUGIN #31 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_31'] = 'ADMIN_TOOLBOX_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_31'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_31'] = 'ExternalSectors/AdminPanel-Template/admin_toolbox_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_31'] = '';
//$^^^^^ PLUGIN #31 END ^^^^^ = ;
//$^^^^^ PLUGIN #32 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_32'] = 'ADMIN_DATABASEEDITOR';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_32'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_32'] = 'ExternalSectors/AdminPanel-Template/admin_databaseeditor.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_32'] = '';
//$^^^^^ PLUGIN #32 END ^^^^^ = ;
//$^^^^^ PLUGIN #33 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_33'] = 'ADMIN_DATABASEEDITOR_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_33'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_33'] = 'ExternalSectors/AdminPanel-Template/admin_databaseeditor_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_33'] = '';
//$^^^^^ PLUGIN #33 END ^^^^^ = ;
//$^^^^^ PLUGIN #34 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_34'] = 'ADMIN_DATABASEEDITORRS_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_34'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_34'] = 'ExternalSectors/AdminPanel-Template/admin_databaseeditorrs_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_34'] = '';
//$^^^^^ PLUGIN #34 END ^^^^^ = ;
//$^^^^^ PLUGIN #35 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_35'] = 'ADMIN_SLIDESHOWS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_35'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_35'] = 'ExternalSectors/AdminPanel-Template/admin_slideshows.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_35'] = '';
//$^^^^^ PLUGIN #35 END ^^^^^ = ;
//$^^^^^ PLUGIN #36 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['EXTERNAL']['CHILD_36'] = 'ADMIN_SLIDESHOWS_TIPS';
$EZECORES_SECTOR_ENABLED['EXTERNAL']['CHILD_36'] = 'TRUE';
$EZECORES_SECTOR_LAYOUT_FILENAME['EXTERNAL']['CHILD_36'] = 'ExternalSectors/AdminPanel-Template/admin_slideshows_tips.htm';
$EZECORES_SECTOR_ENGINE_OUTPUT['EXTERNAL']['CHILD_36'] = '';
//$^^^^^ PLUGIN #36 END ^^^^^ = ;
//@@@@@@@@@@@
//-----
$EZECORES_SECTORS_CHILD_MAX['EXTERNAL'] = count($EZECORES_SECTOR_TITLE['EXTERNAL'], 1);
//############ EXTERNAL SectorS (Plug-ins) END ############


//############ ACTION SectorS START ############
//@@@@@@@@@@@

//------------------------------------------------------------------------------------------------------------
//$^^^^^ PARENT_A  CHILD_1 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['PARENT_A']['CHILD_1'] = 'HOME';
$EZECORES_SECTOR_ENABLED['PARENT_A']['CHILD_1'] = 'TRUE';
$EZECORES_SECTOR_SHOWINCORESECTOR['PARENT_A']['CHILD_1'] = 'TRUE';
$EZECORES_SECTOR_PRESCRIPT_FILENAME['PARENT_A']['CHILD_1'] = 'ActionSectors/Prescripts/Sector_A_1_PRS.php';
$EZECORES_SECTOR_PRESCRIPT_ENCRYPTED['PARENT_A']['CHILD_1'] = 'FALSE';
$EZECORES_SECTOR_PRESCRIPT_CRYPTKEY['PARENT_A']['CHILD_1'] = '';
$EZECORES_SECTOR_LAYOUT_FILENAME['PARENT_A']['CHILD_1'] = 'ActionSectors/Layouts/Sector_A_1_ESL.php';
$EZECORES_SECTOR_LAYOUT_ENCRYPTED['PARENT_A']['CHILD_1'] = 'FALSE';
$EZECORES_SECTOR_LAYOUT_CRYPTKEY['PARENT_A']['CHILD_1'] = '';
$EZECORES_SECTOR_ENGINE_FILENAME['PARENT_A']['CHILD_1'] = 'ActionSectors/Engines/Sector_A_1_ENG.php';
$EZECORES_SECTOR_ENGINE_ENCRYPTED['PARENT_A']['CHILD_1'] = 'FALSE';
$EZECORES_SECTOR_ENGINE_CRYPTKEY['PARENT_A']['CHILD_1'] = '';
$EZECORES_SECTOR_ENGINE_OUTPUT['PARENT_A']['CHILD_1'] = '';
//$^^^^^ PARENT_A  CHILD_1 END ^^^^^ = ;
//------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------
//$^^^^^ PARENT_A  CHILD_2 START ^^^^^ = ;
$EZECORES_SECTOR_TITLE['PARENT_A']['CHILD_2'] = 'ADMIN';
$EZECORES_SECTOR_ENABLED['PARENT_A']['CHILD_2'] = 'TRUE';
$EZECORES_SECTOR_SHOWINCORESECTOR['PARENT_A']['CHILD_2'] = 'TRUE';
$EZECORES_SECTOR_PRESCRIPT_FILENAME['PARENT_A']['CHILD_2'] = 'ActionSectors/Prescripts/Sector_A_2_PRS.php';
$EZECORES_SECTOR_PRESCRIPT_ENCRYPTED['PARENT_A']['CHILD_2'] = 'FALSE';
$EZECORES_SECTOR_PRESCRIPT_CRYPTKEY['PARENT_A']['CHILD_2'] = '';
$EZECORES_SECTOR_LAYOUT_FILENAME['PARENT_A']['CHILD_2'] = 'ActionSectors/Layouts/Sector_A_2_ESL.php';
$EZECORES_SECTOR_LAYOUT_ENCRYPTED['PARENT_A']['CHILD_2'] = 'FALSE';
$EZECORES_SECTOR_LAYOUT_CRYPTKEY['PARENT_A']['CHILD_2'] = '';
$EZECORES_SECTOR_ENGINE_FILENAME['PARENT_A']['CHILD_2'] = 'ActionSectors/Engines/Sector_A_2_ENG.php';
$EZECORES_SECTOR_ENGINE_ENCRYPTED['PARENT_A']['CHILD_2'] = 'FALSE';
$EZECORES_SECTOR_ENGINE_CRYPTKEY['PARENT_A']['CHILD_2'] = '';
$EZECORES_SECTOR_ENGINE_OUTPUT['PARENT_A']['CHILD_2'] = '';
//$^^^^^ PARENT_A  CHILD_2 END ^^^^^ = ;
//------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------
//@@@@@@@@@@@
//############ ACTION SectorS END ############

//############ ACTION SectorS MAX CHILDREN START ############
//NUMBER OF CHILDREN IN PARENT Sector A
if (isset($EZECORES_SECTOR_TITLE['PARENT_A']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_A'] = count($EZECORES_SECTOR_TITLE['PARENT_A'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector B
if (isset($EZECORES_SECTOR_TITLE['PARENT_B']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_B'] = count($EZECORES_SECTOR_TITLE['PARENT_B'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector C
if (isset($EZECORES_SECTOR_TITLE['PARENT_C']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_C'] = count($EZECORES_SECTOR_TITLE['PARENT_C'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector D
if (isset($EZECORES_SECTOR_TITLE['PARENT_D']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_D'] = count($EZECORES_SECTOR_TITLE['PARENT_D'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector E
if (isset($EZECORES_SECTOR_TITLE['PARENT_E']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_E'] = count($EZECORES_SECTOR_TITLE['PARENT_E'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector F
if (isset($EZECORES_SECTOR_TITLE['PARENT_F']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_F'] = count($EZECORES_SECTOR_TITLE['PARENT_F'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector G
if (isset($EZECORES_SECTOR_TITLE['PARENT_G']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_G'] = count($EZECORES_SECTOR_TITLE['PARENT_G'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector H
if (isset($EZECORES_SECTOR_TITLE['PARENT_H']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_H'] = count($EZECORES_SECTOR_TITLE['PARENT_H'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector I
if (isset($EZECORES_SECTOR_TITLE['PARENT_I']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_I'] = count($EZECORES_SECTOR_TITLE['PARENT_I'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector J
if (isset($EZECORES_SECTOR_TITLE['PARENT_J']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_J'] = count($EZECORES_SECTOR_TITLE['PARENT_J'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector K
if (isset($EZECORES_SECTOR_TITLE['PARENT_K']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_K'] = count($EZECORES_SECTOR_TITLE['PARENT_K'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector L
if (isset($EZECORES_SECTOR_TITLE['PARENT_L']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_L'] = count($EZECORES_SECTOR_TITLE['PARENT_L'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector M
if (isset($EZECORES_SECTOR_TITLE['PARENT_M']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_M'] = count($EZECORES_SECTOR_TITLE['PARENT_M'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector N
if (isset($EZECORES_SECTOR_TITLE['PARENT_N']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_N'] = count($EZECORES_SECTOR_TITLE['PARENT_N'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector O
if (isset($EZECORES_SECTOR_TITLE['PARENT_O']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_O'] = count($EZECORES_SECTOR_TITLE['PARENT_O'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector P
if (isset($EZECORES_SECTOR_TITLE['PARENT_P']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_P'] = count($EZECORES_SECTOR_TITLE['PARENT_P'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector Q
if (isset($EZECORES_SECTOR_TITLE['PARENT_Q']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_Q'] = count($EZECORES_SECTOR_TITLE['PARENT_Q'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector R
if (isset($EZECORES_SECTOR_TITLE['PARENT_R']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_R'] = count($EZECORES_SECTOR_TITLE['PARENT_R'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector S
if (isset($EZECORES_SECTOR_TITLE['PARENT_S']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_S'] = count($EZECORES_SECTOR_TITLE['PARENT_S'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector T
if (isset($EZECORES_SECTOR_TITLE['PARENT_T']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_T'] = count($EZECORES_SECTOR_TITLE['PARENT_T'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector U
if (isset($EZECORES_SECTOR_TITLE['PARENT_U']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_U'] = count($EZECORES_SECTOR_TITLE['PARENT_U'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector V
if (isset($EZECORES_SECTOR_TITLE['PARENT_V']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_V'] = count($EZECORES_SECTOR_TITLE['PARENT_V'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector W
if (isset($EZECORES_SECTOR_TITLE['PARENT_W']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_W'] = count($EZECORES_SECTOR_TITLE['PARENT_W'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector X
if (isset($EZECORES_SECTOR_TITLE['PARENT_X']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_X'] = count($EZECORES_SECTOR_TITLE['PARENT_X'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector Y
if (isset($EZECORES_SECTOR_TITLE['PARENT_Y']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_Y'] = count($EZECORES_SECTOR_TITLE['PARENT_Y'], 1) + 1;
}
//NUMBER OF CHILDREN IN PARENT Sector Z
if (isset($EZECORES_SECTOR_TITLE['PARENT_Z']) == TRUE){
$EZECORES_SECTORS_CHILD_MAX['PARENT_Z'] = count($EZECORES_SECTOR_TITLE['PARENT_Z'], 1) + 1;
}
//############ ACTION SectorS MAX CHILDREN END ############

//############ INTERNAL SETTINGS START ##############
//----------- Allow Calling Of Action Sectors By Title START--------
if (isset($CHILD_NUM) == TRUE) {	

	if (isset($PARENT_LETT) == TRUE) {

		$CHILD_TITLE = $PARENT_LETT . '-' . $CHILD_NUM;
		$PT = 'PARENT_' . $PARENT_LETT;

			for ($CHILD_NUMs = 1; $CHILD_NUMs <= $EZECORES_SECTORS_CHILD_MAX[$PT] - 1; $CHILD_NUMs++) {
				$PTT = 'CHILD_' . $CHILD_NUMs;

				if ($EZECORES_SECTOR_TITLE[$PT][$PTT] == $CHILD_NUM) { 
					$CHILD_NUM = $CHILD_NUMs; 
				}
				
			}
	}
}
//----------- Allow Calling Of Action Sectors By Title END--------
//############ INTERNAL SETTINGS END ##############

//############ EZE-DATABASE-HELPER GLOBAL DATABASE CALLS START ##############
$EZECMS_TEMPLATEPATH = 'Databases/EZE-CMS-TEMPLATES.php';
$EZECMS_PAGESPATH = 'Databases/EZE-CMS-PAGES.php';
$EZECMS_LYTMDPATH = 'Databases/EZE-CMS-LYT-MDs.php';
$EZECMS_SLDSHWDPATH = 'Databases/SLIDESHOWS.php';

//EZE_DBS_HELPER('ReadDBPS', 'ExternalSectors/PHP-MODULES/EZE-DATABASE-HELPER-BETA.php', $CURRENTPATH . '/Databases/NAVIGATION.php', '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
//if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $CATEGORIES = $EZE_DBS_OUTPUT; } else { $CATEGORIES = $EZE_DBS_OUTPUT[0][0]; }
	EZE_DBS_HELPER('ReadDBPS', 'ExternalSectors/PHP-MODULES/EZE-DATABASE-HELPER-BETA.php', $EZECMS_TEMPLATEPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $TEMPLATES = $EZE_DBS_OUTPUT; } else { $TEMPLATES = $EZE_DBS_OUTPUT[0][0]; }

	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_PAGESPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $PAGES = $EZE_DBS_OUTPUT; } else { $PAGES = $EZE_DBS_OUTPUT[0][0]; }
	
	EZE_DBS_HELPER('ReadDBPS', 'LASTHELPER', $EZECMS_LYTMDPATH, '', '', '', '', '', $EZECORES_Run_Debug_Mode . $EZECORES_Run_Debug_MTP);
	if ($EZE_DBS_OUTPUT[0][0] == 'Parse Database Completed'){ $LYTMD = $EZE_DBS_OUTPUT; } else { $LYTMD = $EZE_DBS_OUTPUT[0][0]; }
//############ EZE-DATABASE-HELPER GLOBAL DATABASE CALLS END ##############


//======================= EZE-Cores Settings File END =======================


?>
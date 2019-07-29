<?php
/*
changken-phpforum v9.2
Author:changken(admin@changken.biz)
*/


/*=========================================================
	early_access function
	early_access(string username,string password);
===========================================================*/
function early_access($ty_username,$ty_email,$ty_ETH_Address)
{	
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$email = mysqli_real_escape_string($conn,$ty_email);
	$ETH_Address = mysqli_real_escape_string($conn,$ty_ETH_Address);

	
	//搜尋資料庫資料
	$row = CB_getUserInfo($username,1);
	$CheckEmail = CheckUseremailnwallet($email,1);
	$Checketh_address = CheckUseremailnwallet($ETH_Address,2);


	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	if($username==null)//檢查使用者名稱是否為空
	{
			$returnCode = 0;
	}
	elseif($email==null)//檢查EMAIL是否為空
	{
			$returnCode = 1;
	}
	elseif($ETH_Address==null)//檢查ETH地址是否為空
	{
			$returnCode = 2;
	}
	elseif($username==$row['username'])//檢查使用者名稱是否已經被使用了
	{
			$returnCode = 3;
	}
	elseif($email==$CheckEmail['email'])//檢查EMAIL是否已經被使用了
	{
			$returnCode = 4;
	}
	elseif($ETH_Address==$Checketh_address['eth_address'])//檢查ETH地址是否已經被使用了
	{
			$returnCode = 7;
	}
	elseif(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))//檢查email格式否正確
	{
			$returnCode = 8;
	}
	else
	{
        //新增資料進資料庫語法
        $sql = "INSERT INTO `arina_universe_user` (`username`, `email`, `eth_address`) VALUES ('$username', '$email', '$ETH_Address');";

        if(mysqli_query($conn,$sql))
        {
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	}
	return $returnCode;
}

/*=========================================================
	CheckPassword function
	CB_CheckPassword(string username,string password);
===========================================================*/
function CB_CheckPassword($ty_username,$ty_password)
{	
	global $conn,$config,$prefix;
	
	//過濾資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$password = mysqli_real_escape_string($conn,$ty_password);
	$password_md5 = md5($password);//密碼加密

	//搜尋資料庫資料
	$row = cpf_getUserInfo($username,1);

	//判斷帳號與密碼是否為空白
	//以及MySQL資料庫裡是否有這個會員
	if($username==null)//檢查使用者名稱是否為空
	{
		$returnCode = 0;
	}
	elseif($password==null)//檢查密碼是否為空
	{
		$returnCode = 1;
	}
	elseif($row[1] != $username)//檢查使用者名稱是否錯誤
	{
		$returnCode = 2;
	}
	elseif($row[3] != $password_md5)//檢查密碼是否錯誤
	{
		$returnCode = 3;
	}
	else //如不符合以上條件，即進入此區
	{
		if($row[4] == 10){ //檢查會員權限是否是10
			//將帳號寫入session，方便驗證使用者身份
			$_SESSION[$config["cookie_prefix"].'username'] = $username;
			$returnCode = 4;
		}
		else if($row[4] == 100){ //檢查會員權限是否是100
			//將帳號寫入session，方便驗證使用者身份
			$_SESSION[$config["cookie_prefix"].'username'] = $username;
			$_SESSION[$config["cookie_prefix"].'admin'] = $username;
			$returnCode = 5;
		}
		else if($row[4] == 50){ //檢查會員權限是否是50
			//將帳號寫入session，方便驗證使用者身份
			$_SESSION[$config["cookie_prefix"].'username'] = $username;
			$_SESSION[$config["cookie_prefix"].'mod'] = $username;
			$returnCode = 6;
		}
		else //極有可能為level欄為空or值不對！
		{
			$returnCode = 7;
		}
	}
	return $returnCode;
}



/*=========================================================
	register function
	CB_reg(string username,string email,string password,string password_again,int level);
===========================================================*/
function CB_reg($ty_username,$ty_email,$ty_password,$ty_password2,$ty_level)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$email = mysqli_real_escape_string($conn,$ty_email);
	$password = mysqli_real_escape_string($conn,$ty_password);
	$password2 = mysqli_real_escape_string($conn,$ty_password2);
	$level = $ty_level;//用戶等級開發者自行輸入
	
	$password_md5 = md5($password);//密碼加密
	
	//搜尋資料庫資料
	$row = CB_getUserInfo($username,1);
	$CheckEmail = CheckUseremailnwallet($email,1);

	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	if($username==null)//檢查使用者名稱是否為空
	{
			$returnCode = 0;
	}
	elseif($password==null)//檢查密碼是否為空
	{
			$returnCode = 1;
	}
	elseif($password2==null)//檢查密碼(再輸入一次)是否為空
	{
			$returnCode = 2;
	}
	elseif($password!=$password2)//檢查密碼是否輸入一致
	{
			$returnCode = 3;
	}
	elseif($username==$row['username'])//檢查使用者名稱是否已經被使用了
	{
			$returnCode = 4;
	}
	elseif($email==$CheckEmail['email'])//檢查使用者名稱是否已經被使用了
	{
			$returnCode = 7;
	}
	elseif(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))//檢查email格式否正確
	{
			$returnCode = 8;
	}
	else
	{
        //新增資料進資料庫語法
        $sql = "INSERT INTO `".$prefix."user` (`username`, `email`, `password`, `level`) VALUES ('$username', '$email', '$password_md5', '$level');";

        if(mysqli_query($conn,$sql))
        {
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	}
	return $returnCode;
}


/*=========================================================
	insert_Breeding Records Owner function
	insert_BreedingRecordsOwner(string username,string email,string password,string password_again,int level);
===========================================================*/
function insert_BreedingRecordsOwner($ty_StudBlockID, $ty_MotherHorseID, $ty_FatherHorseID, $ty_StudFee, $ty_MotherOwner, $ty_FatherOwner, $ty_StudFeeReceive, $ty_HorseName, $ty_HorseSpeed, $ty_HorseStamina, $ty_HorsePower, $ty_HorseWeight, $ty_HorseBody, $ty_HorseColor, $ty_HorseAge, $ty_HorseGender, $ty_HorseHealth, $ty_HorseMaturity, $ty_Owner, $ty_TrainerID, $ty_StudWay)
{
	global $conn,$prefix;
	
	$StudBlockID = mysqli_real_escape_string($conn,$ty_StudBlockID);
	$MotherHorseID = mysqli_real_escape_string($conn,$ty_MotherHorseID);
	$FatherHorseID = mysqli_real_escape_string($conn,$ty_FatherHorseID);
	$StudFee = mysqli_real_escape_string($conn,$ty_StudFee);
	$MotherOwner = mysqli_real_escape_string($conn,$ty_MotherOwner);
	$FatherOwner = mysqli_real_escape_string($conn,$ty_FatherOwner);
	$StudFeeReceive = mysqli_real_escape_string($conn,$ty_StudFeeReceive);
	$HorseName = mysqli_real_escape_string($conn,$ty_HorseName);
	$HorseSpeed = mysqli_real_escape_string($conn,$ty_HorseSpeed);
	$GetSP_DNA = $HorseSpeed;
	$HorseStamina = mysqli_real_escape_string($conn,$ty_HorseStamina);
	$GetST_DNA = $HorseStamina;
	$HorsePower = mysqli_real_escape_string($conn,$ty_HorsePower);
	$GetPW_DNA = $HorsePower;
	$HorseWeight = mysqli_real_escape_string($conn,$ty_HorseWeight);
	$HorseBody = mysqli_real_escape_string($conn,$ty_HorseBody);
	$HorseColor = mysqli_real_escape_string($conn,$ty_HorseColor);
	$HorseAge = mysqli_real_escape_string($conn,$ty_HorseAge);
	$HorseGender = mysqli_real_escape_string($conn,$ty_HorseGender);
	$HorseHealth = mysqli_real_escape_string($conn,$ty_HorseHealth);
	$HorseMaturity = mysqli_real_escape_string($conn,$ty_HorseMaturity);
	$Owner = mysqli_real_escape_string($conn,$ty_Owner);
	$TrainerID = mysqli_real_escape_string($conn,$ty_TrainerID);
	$S_StudWay = mysqli_real_escape_string($conn,$$ty_StudWay);
	$Mid01 = "'s No.";
	$Mid02 = " Horse pay ";
	$Mid03 = " GASH StudFee to ";
	$Mid04 = "'s No. ";
	$Mid05 = " Horse.";
	$TradeMEMO = $MotherOwner.$Mid01.$MotherHorseID.$Mid02.$StudFee.$Mid03.$FatherOwner.$Mid04.$FatherHorseID.$Mid05;
	$StallionHorse = getStudFeeInfo($FatherHorseID);
	$S_PublicShare = $StallionHorse['PublicShare'];
	$S_OwnerShare = $StallionHorse['OwnerShare'];



	if($HorseName==null)
	{
			$returnCode = 0;
	}
	elseif($HorseSpeed==null)
	{
			$returnCode = 1;
	}
	elseif($HorseStamina==null)
	{
			$returnCode = 2;
	}
	elseif($HorsePower==null)
	{
			$returnCode = 3;
	}
	elseif($S_OwnerShare <= 0)
	{
			$returnCode = 4;
	}
	else
	{

		$sql = "INSERT INTO `".$prefix."BreedingRecords` (`StudBlockID`, `MotherHorseID`, `FatherHorseID`, `StudFee`, `MotherOwner`, `FatherOwner`, `StudFeeReceive`, `HorseName`, `HorseSpeed`, `HorseStamina`, `HorsePower`, `HorseWeight`, `HorseBody`, `HorseColor`, `HorseAge`, `HorseGender`, `HorseHealth`, `HorseMaturity`, `Owner`, `TrainerID`) VALUES ('$StudBlockID', '$MotherHorseID', '$FatherHorseID', '$StudFee', '$MotherOwner', '$FatherOwner', '$StudFeeReceive', '$HorseName', '$GetSP_DNA', '$GetST_DNA', '$GetPW_DNA', '$HorseWeight', '$HorseBody', '$HorseColor', '$HorseAge', '$HorseGender', '$HorseHealth', '$HorseMaturity', '$Owner', '$TrainerID');";
        if(mysqli_query($conn,$sql))
        {
			insert_TradeRecords($StudBlockID, $MotherOwner, $FatherOwner, $StudFee, 7, $TradeMEMO);
			updateOwnerShare($FatherHorseID,$S_OwnerShare);
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	}
	return $returnCode;
}


/*=========================================================
	insert_Breeding Records Public function
	insert_BreedingRecordsPublic(string username,string email,string password,string password_again,int level);
===========================================================*/
function insert_BreedingRecordsPublic($ty_StudBlockID, $ty_MotherHorseID, $ty_FatherHorseID, $ty_StudFee, $ty_MotherOwner, $ty_FatherOwner, $ty_StudFeeReceive, $ty_HorseName, $ty_HorseSpeed, $ty_HorseStamina, $ty_HorsePower, $ty_HorseWeight, $ty_HorseBody, $ty_HorseColor, $ty_HorseAge, $ty_HorseGender, $ty_HorseHealth, $ty_HorseMaturity, $ty_Owner, $ty_TrainerID, $ty_StudWay)
{
	global $conn,$prefix;
	
	$StudBlockID = mysqli_real_escape_string($conn,$ty_StudBlockID);
	$MotherHorseID = mysqli_real_escape_string($conn,$ty_MotherHorseID);
	$FatherHorseID = mysqli_real_escape_string($conn,$ty_FatherHorseID);
	$StudFee = mysqli_real_escape_string($conn,$ty_StudFee);
	$MotherOwner = mysqli_real_escape_string($conn,$ty_MotherOwner);
	$FatherOwner = mysqli_real_escape_string($conn,$ty_FatherOwner);
	$StudFeeReceive = mysqli_real_escape_string($conn,$ty_StudFeeReceive);
	$HorseName = mysqli_real_escape_string($conn,$ty_HorseName);
	$HorseSpeed = mysqli_real_escape_string($conn,$ty_HorseSpeed);
	$GetSP_DNA = $HorseSpeed;
	$HorseStamina = mysqli_real_escape_string($conn,$ty_HorseStamina);
	$GetST_DNA = $HorseStamina;
	$HorsePower = mysqli_real_escape_string($conn,$ty_HorsePower);
	$GetPW_DNA = $HorsePower;
	$HorseWeight = mysqli_real_escape_string($conn,$ty_HorseWeight);
	$HorseBody = mysqli_real_escape_string($conn,$ty_HorseBody);
	$HorseColor = mysqli_real_escape_string($conn,$ty_HorseColor);
	$HorseAge = mysqli_real_escape_string($conn,$ty_HorseAge);
	$HorseGender = mysqli_real_escape_string($conn,$ty_HorseGender);
	$HorseHealth = mysqli_real_escape_string($conn,$ty_HorseHealth);
	$HorseMaturity = mysqli_real_escape_string($conn,$ty_HorseMaturity);
	$Owner = mysqli_real_escape_string($conn,$ty_Owner);
	$TrainerID = mysqli_real_escape_string($conn,$ty_TrainerID);
	$S_StudWay = mysqli_real_escape_string($conn,$$ty_StudWay);
	$Mid01 = "'s No.";
	$Mid02 = " Horse pay ";
	$Mid03 = " GASH StudFee to ";
	$Mid04 = "'s No. ";
	$Mid05 = " Horse.";
	$TradeMEMO = $MotherOwner.$Mid01.$MotherHorseID.$Mid02.$StudFee.$Mid03.$FatherOwner.$Mid04.$FatherHorseID.$Mid05;
	$StallionHorse = getStudFeeInfo($FatherHorseID);
	$S_PublicShare = $StallionHorse['PublicShare'];
	$S_OwnerShare = $StallionHorse['OwnerShare'];


	if($HorseName==null)
	{
			$returnCode = 0;
	}
	elseif($HorseSpeed==null)
	{
			$returnCode = 1;
	}
	elseif($HorseStamina==null)
	{
			$returnCode = 2;
	}
	elseif($HorsePower==null)
	{
			$returnCode = 3;
	}
	elseif($S_PublicShare <= 0)
	{
			$returnCode = 4;
	}
	else
	{

		$sql = "INSERT INTO `".$prefix."BreedingRecords` (`StudBlockID`, `MotherHorseID`, `FatherHorseID`, `StudFee`, `MotherOwner`, `FatherOwner`, `StudFeeReceive`, `HorseName`, `HorseSpeed`, `HorseStamina`, `HorsePower`, `HorseWeight`, `HorseBody`, `HorseColor`, `HorseAge`, `HorseGender`, `HorseHealth`, `HorseMaturity`, `Owner`, `TrainerID`) VALUES ('$StudBlockID', '$MotherHorseID', '$FatherHorseID', '$StudFee', '$MotherOwner', '$FatherOwner', '$StudFeeReceive', '$HorseName', '$GetSP_DNA', '$GetST_DNA', '$GetPW_DNA', '$HorseWeight', '$HorseBody', '$HorseColor', '$HorseAge', '$HorseGender', '$HorseHealth', '$HorseMaturity', '$Owner', '$TrainerID');";
        if(mysqli_query($conn,$sql))
        {
			insert_TradeRecords($StudBlockID, $MotherOwner, $FatherOwner, $StudFee, 7, $TradeMEMO);
			updatePublicShare($FatherHorseID,$S_PublicShare);
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	}
	return $returnCode;
}
/*=========================================================
	insert StudFee function
	insert_StudFee(string username,string email,string password,string password_again,int level);
===========================================================*/
function insert_StudFee($ty_BlockID,$ty_HorseID)
{
	global $conn,$prefix;
	$ValidBlockID = mysqli_real_escape_string($conn,$ty_BlockID);
	$HorseID = mysqli_real_escape_string($conn,$ty_HorseID);
	
	$GetStudHorseInfo = getHorseInfo($HorseID);
	$PublicShare = getStudAmount($HorseID) - 5;
	$OwnerShare = 5;
	$StudAmount = getStudAmount($HorseID);
	$StudFee = getStudFee($HorseID);
	$StallionHorseID = $HorseID;
	$Owner = $GetStudHorseInfo['Owner'];
	$OffspringTotalPrize = getOffspringTotalPrize($HorseID);
	$OffspringG1Wins = getOffspringG1Wins($HorseID);
	$sql = "INSERT INTO `".$prefix."StudFee` (`ValidBlockID`, `StallionHorseID`, `Owner`, `OffspringTotalPrize`, `OffspringG1Wins`, `PublicShare`, `OwnerShare`, `StudAmount`, `StudFee`) VALUES ('$ValidBlockID', '$StallionHorseID', '$Owner', '$OffspringTotalPrize', '$OffspringG1Wins', '$PublicShare', '$OwnerShare', '$StudAmount', '$StudFee');";
        if(mysqli_query($conn,$sql))
        {
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	return $returnCode;
}

/*=========================================================
	insert HorseLineage function
	insert_HorseLineage(string username,string email,string password,string password_again,int level);
===========================================================*/
function insert_HorseLineage($ty_Child_HorseID,$ty_Father_HorseID,$ty_Mother_HorseID)
{
	global $conn,$prefix;
	$Child_HorseID = mysqli_real_escape_string($conn,$ty_Child_HorseID);
	$Father_HorseID = mysqli_real_escape_string($conn,$ty_Father_HorseID);
	$Mother_HorseID = mysqli_real_escape_string($conn,$ty_Mother_HorseID);

	$sql = "INSERT INTO `".$prefix."HorseLineage` (`Child_HorseID`, `Father_HorseID`, `Mother_HorseID`) VALUES ('$Child_HorseID', '$Father_HorseID', '$Mother_HorseID');";
        if(mysqli_query($conn,$sql))
        {
			$returnCode = 5;
        }
        else
        {
			$returnCode = 6;
        }
	return $returnCode;
}




/*=========================================================
	insert StudFeeAll function
	insert_StudFeeAll(string username,string email,string password,string password_again,int level);
===========================================================*/
function insert_StudFeeAll($ty_BlockID)
{
	global $conn,$prefix;
	$ValidBlockID = mysqli_real_escape_string($conn,$ty_BlockID) + 432;
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Alive` = '1' and `Studhorse` >= '1' ORDER BY `HorseID` DESC;";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	//$GetStudHorseInfo = getStudHorseInfo();
	//$num = mysqli_num_rows($GetStudHorseInfo);
		if($num>0)
		{
			for($i=0;$i<$num;$i++)
			{
			$row = mysqli_fetch_array($result);
			$PublicShare = getStudAmount($row['HorseID']) - 5;
			$OwnerShare = 5;
			$StudAmount = getStudAmount($row['HorseID']);
			$StudFee = getStudFee($row['HorseID']);
			$StallionHorseID = $row['HorseID'];
			$Owner = $row['Owner'];
			$OffspringTotalPrize = getOffspringTotalPrize($row['HorseID']);
			$OffspringG1Wins = getOffspringG1Wins($row['HorseID']);
			$OwnerSetStudFee = getStudFee($row['HorseID']);
			$sql = "INSERT INTO `".$prefix."StudFee` (`ValidBlockID`, `StallionHorseID`, `Owner`, `OffspringTotalPrize`, `OffspringG1Wins`, `PublicShare`, `OwnerShare`, `StudAmount`, `StudFee`, `OwnerSetStudFee`) VALUES ('$ValidBlockID', '$StallionHorseID', '$Owner', '$OffspringTotalPrize', '$OffspringG1Wins', '$PublicShare', '$OwnerShare', '$StudAmount', '$StudFee', '$OwnerSetStudFee');";
			if(mysqli_query($conn,$sql))
			{
				$returnCode = 7;
			}
			else
			{
				$returnCode = 6;
			}

			}
		}
	return $returnCode;
	
}


/*=========================================================
	Get RandomLandID function
	RandomLandID();
===========================================================*/
function getRandomLandID()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."land_tycoon_lands` WHERE `NO` >= '0' order by rand() limit 1,8100;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$RandomLandID = $row['NO'];
	return $RandomLandID;
}


/*=========================================================
	get Y_Xaxis function
	getY_Xaxis();
===========================================================*/
function getY_Xaxis($value)
{
	global $conn,$prefix;
	$sql = "SELECT * FROM `".$prefix."land_tycoon_lands` WHERE `NO` = '$value';";	
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}

/*=========================================================
	get land_info function
	getland_info();
===========================================================*/
function getland_info($value)
{
	global $conn,$prefix;
	$sql = "SELECT * FROM `".$prefix."land_tycoon_lands` WHERE `NO` = '$value';";	
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}

/*=========================================================
	Get RandomFatherHorseID function
	RandomFatherHorseID(string value,int type);
===========================================================*/
function getRandomFatherHorseID()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Studhorse` >= '1' order by rand() limit 0,30;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$RandomFatherHorseID = $row['HorseID'];
	return $RandomFatherHorseID;
}



/*=========================================================
	Get RandomMotherHorseID function
	RandomMotherHorseID(string value,int type);
===========================================================*/
function getRandomMotherHorseID()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Mare` >= '1' order by rand() limit 0,30;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$RandomMotherHorseID = $row['HorseID'];
	return $RandomMotherHorseID;
}

/*=========================================================
	Get User information function
	cpf_getUserInfo(string value,int type);
===========================================================*/
function getStudHorseInfo()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Alive` = '1' and `Studhorse` >= '1' ORDER BY `HorseID` ASC;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}



/*=========================================================
	Check User email & wallet function
	CheckUseremailnwallet(string value,int type);
===========================================================*/
function CheckUseremailnwallet($value,$type = 1)
{
	global $conn,$prefix;
	
	if($type == 1)
	{
		$sql = "SELECT * FROM `arina_universe_user` WHERE `email` = '$value';";
	}
	else
	{
		$sql = "SELECT * FROM `arina_universe_user` WHERE `eth_address` = '$value';";
	}
	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}
/*=========================================================
	Get New HorseID function
	getNewHorseID(string value,int type);
===========================================================*/
function getNewHorseID()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Alive` = '1' ORDER BY `HorseID` DESC;";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$NewHorseID = $row['HorseID'];
	return $NewHorseID;
}
/*=========================================================
	Get User information function
	cpf_getUserInfo(string value,int type);
===========================================================*/
function getBreedingRecords($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."BreedingRecords` WHERE `MotherHorseID` = '$value' ORDER BY `ID` DESC;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}

/*=========================================================
	Get StudFeeInfo information function
	getStudFeeInfo(string value);
===========================================================*/
function getStudFeeInfo($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."StudFee` WHERE `StallionHorseID` = '$value' ORDER BY `ID` DESC;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}

/*=========================================================
	Get LastHorseID information function
	getLastHorseID(string value);
===========================================================*/
function getLastHorseID()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` ORDER BY `HorseID` DESC;";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetLastHorseID = $row['HorseID'];
	return $GetLastHorseID;
}
/*=========================================================
	Check ChildBirthday information function
	CheckChildBirthday();
===========================================================*/
function CheckChildBirthday($BlockID)
{
	global $conn,$prefix;
	$BlockNow = $BlockID;
	$Wins = 0;
	$One = 1;
	$T0_Win = $Wins;
	$T1_Win = $Wins;
	$T2_Win = $Wins;
	$T3_Win = $Wins;
	$Total_prize = $Wins;
	$Retired = $Wins;
	$Studhorse = $Wins;
	$Mare = $Wins;
	$Alive = $One;
	
	
	$sql = "SELECT * FROM `".$prefix."BreedingRecords` WHERE `HorseAge` = '$BlockNow' ORDER BY `ID` DESC;";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
		if($num>0)
		{
			for($i=0;$i<$num;$i++)
			{
			$row = mysqli_fetch_array($result);
			
			$HorseName = $row['HorseName'];
			$HorseSpeed = $row['HorseSpeed'];
			$HorseStamina = $row['HorseStamina'];
			$HorsePower = $row['HorsePower'];
			$HorseWeight = $row['HorseWeight'];
			$HorseBody = $row['HorseBody'];
			$HorseColor = $row['HorseColor'];
			$HorseAge = $row['HorseAge'];
			$HorseGender = $row['HorseGender'];
			$HorseHealth = $row['HorseHealth'];
			$HorseMaturity = $row['HorseMaturity'];
			$Owner = $row['Owner'];
			$TrainerID = $row['TrainerID'];


			$sql = "INSERT INTO `".$prefix."Horse_Data` (`HorseName`, `HorseSpeed`, `HorseStamina`, `HorsePower`, `HorseWeight`, `HorseBody`, `HorseColor`, `HorseAge`, `HorseGender`, `HorseHealth`, `HorseMaturity`, `T0_Win`, `T1_Win`, `T2_Win`, `T3_Win`, `Total_prize`, `Owner`, `TrainerID`, `Retired`, `Studhorse`, `Mare`, `Alive`) VALUES ('$HorseName', '$HorseSpeed', '$HorseStamina', '$HorsePower', '$HorseWeight', '$HorseBody', '$HorseColor', '$HorseAge', '$HorseGender', '$HorseHealth', '$HorseMaturity', '$T0_Win', '$T1_Win', '$T2_Win', '$T3_Win', '$Total_prize', '$Owner', '$TrainerID', '$Retired', '$Studhorse', '$Mare', '$Alive');";
			if(mysqli_query($conn,$sql))
			{
				$returnCode = 5;
			}
			else
			{
				$returnCode = 6;
			}
			
			}
			
		}
	return $returnCode;
}




/*=========================================================
	insert Bet 50 GASH 01 function
	Bet_50_GASH01(string username,string email,string password,string password_again,int level);
===========================================================*/
function Bet_50_GASH01($ty_RaceID, $ty_username, $ty_HorseID_NO, $ty_Bet_GASH)
{
	global $conn,$prefix;
	
	$RaceID = mysqli_real_escape_string($conn,$ty_RaceID);
	$username = mysqli_real_escape_string($conn,$ty_username);
	$HorseID_NO = mysqli_real_escape_string($conn,$ty_HorseID_NO);
	$Bet_GASH = mysqli_real_escape_string($conn,$ty_Bet_GASH);
	$GetBlockhighID = getBlockhighID();
	$GetuserGASH = getuserGASH($username);

	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	if($RaceID==null)//檢查使用者名稱是否為空
	{
			$returnCode = 0;
	}
	elseif($username==null)//檢查密碼是否為空
	{
			$returnCode = 1;
	}
	elseif($HorseID_NO==null)//檢查密碼(再輸入一次)是否為空
	{
			$returnCode = 2;
	}
	elseif($Bet_GASH==0)//檢查密碼(再輸入一次)是否為空
	{
			$returnCode = 3;
	}
	elseif($Bet_GASH==null)//檢查密碼(再輸入一次)是否為空
	{
			$returnCode = 4;
	}
	else
	{
		
		if($GetuserGASH >= $Bet_GASH)
        {
		
			if($RaceID > $GetBlockhighID)
			{
				$sql = "INSERT INTO `".$prefix."BetDate` (`RaceID`, `username`, `HorseID_NO`, `Bet_GASH`) VALUES ('$RaceID', '$username', '$HorseID_NO', '$Bet_GASH');";
        		if(mysqli_query($conn,$sql))
        		{
					updateGASH($username,$GetuserGASH,$Bet_GASH);
					$returnCode = 5;
				}
       	 	else
				{
					$returnCode = 6;
				}
			}
			else
			{
				$returnCode = 7;
			}
		}		
		else
		{
			$returnCode = 8;
		}
	}
	return $returnCode;
}







/*=========================================================
	Update information function
	cpf_update(string username,string email,string password,string password2,int level);
===========================================================*/
function cpf_update($ty_username,$ty_email,$ty_ETH_Address,$ty_password,$ty_password2,$ty_level)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$email = mysqli_real_escape_string($conn,$ty_email);
	$ETH_Address = mysqli_real_escape_string($conn,$ty_ETH_Address);
	$level = $ty_level;//開發者自行輸入
	
	//如果使用者沒有輸入密碼及密碼(再輸入一次)的話，就用維持原樣
	if($ty_password == null and $ty_password2 == null)
	{
		$row = cpf_getUserInfo($username,1);
		$password = $row['password'];
		$password2 = $row['password'];
	}
	else //如果有輸入，就用原本
	{
		$password = mysqli_real_escape_string($conn,$ty_password);
		$password2 = mysqli_real_escape_string($conn,$ty_password2);
	}
	
	$password_md5 = md5($password);//密碼加密

	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	if($password==null)//檢查密碼是否為空
	{
		$returnCode = 0;
	}
	elseif($password2==null)//檢查密碼(再輸入一次)是否為空
	{
		$returnCode = 1;
	}
	elseif($password!=$password2)//檢查密碼是否輸入一致
	{
		$returnCode = 2;
	}
	else
	{
		//更新資料庫資料語法
		$sql = "UPDATE `".$prefix."user` SET `password`='$password_md5', `email`='$email', `ETH_Address`='$ETH_Address', `level`='$level' WHERE `username`='$username';";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 3;
		}
		else
		{
			$returnCode = 4;
		}
	}
	return $returnCode;
}


/*=========================================================
	Update GASH function
	updateGASH(string username,string GASH);
===========================================================*/
function updateGASH($ty_username,$ty_originalGASH,$ty_minusGASH)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$OriginalGASH = mysqli_real_escape_string($conn,$ty_originalGASH);
	$MinusGASH = mysqli_real_escape_string($conn,$ty_minusGASH);
	$FinalGASH = $OriginalGASH - $MinusGASH;
		$sql = "UPDATE `".$prefix."user` SET `GASH`='$FinalGASH' WHERE `username`='$username';";
		if(mysqli_query($conn,$sql))
		{
			updateCryptoJockeyClubGASH($MinusGASH);
			$returnCode = 5;
		}
	return $returnCode;

}


/*=========================================================
	Setup StudShare function
	Setup_StudShare(string username,string GASH);
===========================================================*/
function Setup_StudShare($ty_StudHorseID,$ty_AF_PublicShare,$ty_OwnerShareSet,$ty_OwnerSetStudFee,$ty_S_Type)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$StudHorseID = mysqli_real_escape_string($conn,$ty_StudHorseID);
	$AF_PublicShare = mysqli_real_escape_string($conn,$ty_AF_PublicShare);
	$OwnerShareSet = mysqli_real_escape_string($conn,$ty_OwnerShareSet);
	$OwnerSetStudFee = mysqli_real_escape_string($conn,$ty_OwnerSetStudFee);
	$S_Type = mysqli_real_escape_string($conn,$ty_S_Type);

		$sql = "UPDATE `".$prefix."StudFee` SET `PublicShare`='$AF_PublicShare' , `OwnerShare`='$OwnerShareSet' , `OwnerSetStudFee`='$OwnerSetStudFee' WHERE `StallionHorseID`='$StudHorseID' ORDER BY `ID` DESC limit 1;";
		if(mysqli_query($conn,$sql))
		{
			if($S_Type == 1){
			$returnCode = 5;
			}else{
			$returnCode = 4;
			}
		}
	return $returnCode;

}
/*=========================================================
	Token Transfer function
	TokenTransfer(string username,string GASH);
===========================================================*/
function TokenTransfer($ty_Sender_username,$ty_Receiver_username,$ty_Tokens,$ty_TokenType)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$Sender_username = mysqli_real_escape_string($conn,$ty_Sender_username);
	$Receiver_username = mysqli_real_escape_string($conn,$ty_Receiver_username);
	$MinusTokens = mysqli_real_escape_string($conn,$ty_Tokens);
	$TokenType = mysqli_real_escape_string($conn,$ty_TokenType);
	
	$Sender = getUserTokens($Sender_username,1);
	$Receiver = getUserTokens($Receiver_username,1);
	
	
	if($TokenType == 1)
	{
	$OriginalSenderTokens = $Sender['ETH'];
	$OriginalReceiverTokens = $Receiver['ETH'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
	
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `ETH`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `ETH`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}
	
	if($TokenType == 2)
	{
	$OriginalSenderTokens = $Sender['GICT'];
	$OriginalReceiverTokens = $Receiver['GICT'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
		
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `GICT`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `GICT`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}




	
	if($TokenType == 3)
	{
	$OriginalSenderTokens = $Sender['BCTS'];
	$OriginalReceiverTokens = $Receiver['BCTS'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
	
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `BCTS`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `BCTS`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}

	
	if($TokenType == 4)
	{
	$OriginalSenderTokens = $Sender['BSPT'];
	$OriginalReceiverTokens = $Receiver['BSPT'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
	
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `BSPT`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `BSPT`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}

	
	if($TokenType == 5)
	{
	$OriginalSenderTokens = $Sender['GASH'];
	$OriginalReceiverTokens = $Receiver['GASH'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
	
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `GASH`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `GASH`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}

	
	if($TokenType == 6)
	{
	$OriginalSenderTokens = $Sender['CS_TWD'];
	$OriginalReceiverTokens = $Receiver['CS_TWD'];
	$SenderFinalTokens = $OriginalSenderTokens - $MinusTokens;
	$ReceiverFinalTokens = $OriginalReceiverTokens + $MinusTokens;
	
	if($Receiver_username==null)//檢查收款會員是否為空
	{
			$returnCode = 0;
	}
	elseif($MinusTokens==null)//檢查轉出金額是否為空
	{
			$returnCode = 1;
	}
	elseif($Receiver==null)//檢查收款會員是否存在
	{
			$returnCode = 2;
	}
	elseif($OriginalSenderTokens < $MinusTokens)//檢查轉出金額是否大於會員餘額
	{
			$returnCode = 3;
	}
	elseif($Sender_username == $Receiver_username)//檢查收款會員是否為轉出會員
	{
			$returnCode = 4;
	}
	elseif(is_numeric($MinusTokens))//檢查轉出金額是否為數字字串
	{
		$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `CS_TWD`='$SenderFinalTokens' WHERE `username`='$Sender_username';";
		if(mysqli_query($conn,$sql))
		{
			$sql = "UPDATE `".$prefix."ETH_Address_Data` SET `CS_TWD`='$ReceiverFinalTokens' WHERE `username`='$Receiver_username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
			else
			{
			$returnCode = 6;
			}
		}
	}
	else
	{
			$returnCode = 7;
	}	
	}

	return $returnCode;

}






/*=========================================================
	BSPT_deduct function
	BSPT_deduct(string username,string BTCS);
===========================================================*/
function BSPT_deduct($ty_username,$ty_BSPT)
{
	global $conn,$prefix;
	
	$username = mysqli_real_escape_string($conn,$ty_username);
	$BSPT = mysqli_real_escape_string($conn,$ty_BSPT);

	$GETusername = cpf_getUserInfo($username,1);
	$OriginalBSPT = $GETusername['BSPT'];
	
	if($OriginalBSPT >= $BSPT)
	{
	$FinalBSPT = $OriginalBSPT - $BSPT;
	}
	else
	{
	$FinalBSPT = $OriginalBSPT;
	}
	$sql = "UPDATE `".$prefix."user` SET `BSPT`='$FinalBSPT' WHERE `username`='$username';";
		if(mysqli_query($conn,$sql))
		{
			//$sql = "UPDATE `".$prefix."user` SET `BSPT`='$FinalBSPT' WHERE `username`='$username';";
			if(mysqli_query($conn,$sql))
			{
			$returnCode = 5;
			}
		}
	return $returnCode;

}

/*=========================================================
	updateOwnerShare function
	updateOwnerShare(string username,string GASH);
===========================================================*/
//function updateStudShare($ty_ValidBlockID,$ty_StallionHorseID,$ty_PublicShare,$ty_OwnerShare,$ty_StudWay)
function updateMinorHorseID($ty_MareID,$ty_StallionID,$ty_ChildID)
{
	global $conn,$prefix;
	$MareID = mysqli_real_escape_string($conn,$ty_MareID);
	$StallionID = mysqli_real_escape_string($conn,$ty_StallionID);
	$ChildID = mysqli_real_escape_string($conn,$ty_ChildID);
		$sql = "UPDATE `".$prefix."BreedingRecords` SET `StudFeeReceive`='$ChildID' WHERE `MotherHorseID`='$MareID' AND `FatherHorseID`='$StallionID' ORDER BY `ID` DESC limit 1;";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 5;
		}
	return $returnCode;

}

/*=========================================================
	updatePublicShare function
	updatePublicShare(string username,string GASH);
===========================================================*/
function updatePublicShare($ty_StallionHorseID,$ty_PublicShare)
{
	global $conn,$prefix;
	$StallionHorseID = mysqli_real_escape_string($conn,$ty_StallionHorseID);
	$PublicShare = mysqli_real_escape_string($conn,$ty_PublicShare);
	$UpdatePublicShare = $PublicShare - 1;
		$sql = "UPDATE `".$prefix."StudFee` SET `PublicShare`='$UpdatePublicShare' WHERE `StallionHorseID`='$StallionHorseID';";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 5;
		}
	return $returnCode;

}



/*=========================================================
	updateOwnerShare function
	updateOwnerShare(string username,string GASH);
===========================================================*/
//function updateStudShare($ty_ValidBlockID,$ty_StallionHorseID,$ty_PublicShare,$ty_OwnerShare,$ty_StudWay)
function updateOwnerShare($ty_StallionHorseID,$ty_OwnerShare)
{
	global $conn,$prefix;
	$StallionHorseID = mysqli_real_escape_string($conn,$ty_StallionHorseID);
	$OwnerShare = mysqli_real_escape_string($conn,$ty_OwnerShare);
	$UpdateOwnerShare = $OwnerShare - 1;
		$sql = "UPDATE `".$prefix."StudFee` SET `OwnerShare`='$UpdateOwnerShare' WHERE `StallionHorseID`='$StallionHorseID';";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 5;
		}
	return $returnCode;

}

/*=========================================================
	Update GASH function
	updateGASH(string username,string GASH);
===========================================================*/
function updateCryptoJockeyClubGASH($ty_plusGASH)
{
	global $conn,$prefix;
	
	$OriginalCryptoJockeyClubGASH = getCryptoJockeyClubGASH();
	$PlusGASH = mysqli_real_escape_string($conn,$ty_plusGASH);
	$FinalGASH = $OriginalCryptoJockeyClubGASH + $PlusGASH;
		$sql = "UPDATE `".$prefix."user` SET `GASH`='$FinalGASH' WHERE `username`='CryptoJockeyClub';";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 5;
			
		}
	return $returnCode;

}

/*=========================================================
	Update personal_Miner function
	personal_Miner(string username,string email,string password,string password2,int level);
===========================================================*/
function personal_Miner($ty_username,$ty_Total_T0_Block_Hashrates,$ty_Total_T1_Block_Hashrates,$ty_Total_T2_Block_Hashrates,$ty_Total_T3_Block_Hashrates,$ty_Total_T4_Block_Hashrates,$ty_Total_T5_Block_Hashrates)
{
	global $conn,$prefix;
	
	//過濾使用者輸入的資料
	$username = mysqli_real_escape_string($conn,$ty_username);
	$T0_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T0_Block_Hashrates);
	$T1_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T1_Block_Hashrates);
	$T2_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T2_Block_Hashrates);
	$T3_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T3_Block_Hashrates);
	$T4_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T4_Block_Hashrates);
	$T5_Mining_Hashrates = mysqli_real_escape_string($conn,$ty_Total_T5_Block_Hashrates);

	$row = getPersonalMinerInfo($username,1);	
	$T0_Mining_Hashrates += $row[1];
	$T1_Mining_Hashrates += $row[2];
	$T2_Mining_Hashrates += $row[3];
	$T3_Mining_Hashrates += $row[4];
	$T4_Mining_Hashrates += $row[5];
	$T5_Mining_Hashrates += $row[6];

	if($username==null)//檢查密碼是否為空
	{
		$returnCode = 0;
	}
	else
	{
		//更新資料庫資料語法
		$sql = "UPDATE `".$prefix."GASH_Mining_record` SET `username`='$username', `T0_Mining_Hashrates`='$T0_Mining_Hashrates', `T1_Mining_Hashrates`='$T1_Mining_Hashrates', `T2_Mining_Hashrates`='$T2_Mining_Hashrates', `T3_Mining_Hashrates`='$T3_Mining_Hashrates', `T4_Mining_Hashrates`='$T4_Mining_Hashrates', `T5_Mining_Hashrates`='$T5_Mining_Hashrates' WHERE `username`='$username';";
		if(mysqli_query($conn,$sql))
		{
			$returnCode = 3;
		}
		else
		{
			$returnCode = 4;
		}
	}
	return $returnCode;
}



/*=========================================================
	Get User Tokens function
	getUserTokens(string value,int type);
	type = 1 => username
	type = other(2) => ETH_Address
===========================================================*/
function getUserTokens($value,$type = 1)
{
	global $conn,$prefix;
	
	if($type == 1)
	{
		$sql = "SELECT * FROM `".$prefix."ETH_Address_Data` WHERE `username` = '$value';";
	}
	else
	{
		$sql = "SELECT * FROM `".$prefix."ETH_Address_Data` WHERE `ETH_Address` = '$value';";
	}
	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}


/*=========================================================
	Get User information function
	cpf_getUserInfo(string value,int type);
	type = 1 => username
	type = other(2) => NO
===========================================================*/
function cpf_getUserInfo($value,$type = 1)
{
	global $conn,$prefix;
	
	if($type == 1)
	{
		$sql = "SELECT * FROM `".$prefix."user` WHERE `username` = '$value';";
	}
	else
	{
		$sql = "SELECT * FROM `".$prefix."user` WHERE `NO` = '$value';";
	}
	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}



/*=========================================================
	Get User information function
	CB_getUserInfo(string value,int type);
	type = 1 => username
	type = other(2) => NO
===========================================================*/
function CB_getUserInfo($value,$type = 1)
{
	global $conn,$prefix;
	
	if($type == 1)
	{
		$sql = "SELECT * FROM `arina_universe_user` WHERE `username` = '$value';";
	}
	else
	{
		$sql = "SELECT * FROM `arina_universe_user` WHERE `NO` = '$value';";
	}
	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}



/*=========================================================
	Get User information function
	cpf_getUserInfo(string value,int type);
	type = 1 => username
	type = other(2) => NO
===========================================================*/
function getPersonalMinerInfo($value,$type = 1)
{
	global $conn,$prefix;
	
	if($type == 1)
	{
		$sql = "SELECT * FROM `".$prefix."GASH_Mining_record` WHERE `username` = '$value';";
	}
	else
	{
		$sql = "SELECT * FROM `".$prefix."GASH_Mining_record` WHERE `username` = '$value';";
	}
	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}


/*=========================================================
	Get Blockhigh information function
	getBlockhigh(string value,int type);
===========================================================*/
function getBlockhigh()
{
	global $conn,$prefix;
	

	$sql = "SELECT max(Block_ID) FROM `".$prefix."GASH_Mining_Blockchain`;"; 
	//$sql = "SELECT * FROM `".$prefix."user` WHERE `username` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}

/*=========================================================
	Get Blockhigh information function
	getBlockhigh(string value,int type);
===========================================================*/
function getBlockhighID()
{
	global $conn,$prefix;
	

	$sql = "SELECT max(Block_ID) FROM `".$prefix."GASH_Mining_Blockchain`;"; 
	//$sql = "SELECT * FROM `".$prefix."user` WHERE `username` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetBlockhighID = $row[0];
	return $GetBlockhighID;
}
/*=========================================================
	Get Blockhigh information function
	getBlockhigh(string value,int type);
===========================================================*/
function getHorseName($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseName = $row['HorseName'];
	return $GetHorseName;
}

/*=========================================================
	check Horse Name information function
	checkHorseName(string value,int type);
===========================================================*/
function checkHorseName($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseName` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	return $row;
}
/*=========================================================
	Get Blockhigh information function
	getBlockhigh(string value,int type);
===========================================================*/
function getRaceInfo($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."T0_Race_Selected` WHERE `RaceID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetRaceInfo = $row;
	return $GetRaceInfo;
}

/*=========================================================
	Get Blockhigh information function
	getBlockhigh(string value,int type);
===========================================================*/
function DownloadJSON($value,$ORDERID)
{
	global $conn,$prefix;

	$sql = "SELECT * FROM `".$prefix."$value` WHERE 1 ORDER BY `$ORDERID` ASC;";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	//while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){ 
	//} 
	file_put_contents("output.json", json_encode($row));
	$returnCode = 5;
	return $returnCode;
}

/*=========================================================
	Get TotalBet information function
	getTotalBet(string value);
===========================================================*/
function getTotalBet($value)
{
	global $conn,$prefix;
	$sql = "SELECT * FROM `".$prefix."BetDate` WHERE `RaceID` = '$value';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $sum += $row['Bet_GASH'];
    }
	$S_TotalBet = $sum;
	return $S_TotalBet;
}


/*=========================================================
	Get OffspringTotalPrize information function
	getOffspringTotalPrize(string value);
===========================================================*/
function getOffspringTotalPrize($value)
{
	global $conn,$prefix;
	$OffspringTotalPrize = 0;
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Father_HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $OffspringTotalPrize += getHorseTotalPrize($row['HorseID']);
    }
	$GetOffspringTotalPrize = $OffspringTotalPrize;
	return $GetOffspringTotalPrize;
}



/*=========================================================
	Get OffspringTotalPrizeMother information function
	getOffspringTotalPrizeMother(string value);
===========================================================*/
function getOffspringTotalPrizeMother($value)
{
	global $conn,$prefix;
	$OffspringTotalPrizeMother = 0;
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Mother_HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $OffspringTotalPrizeMother += getHorseTotalPrize($row['HorseID']);
    }
	$GetOffspringTotalPrizeMother = $OffspringTotalPrizeMother;
	return $GetOffspringTotalPrizeMother;
}
/*=========================================================
	Get HorseTotalPrize information function
	getHorseTotalPrize(string value);
===========================================================*/
function getHorseTotalPrize($value)
{
	global $conn,$prefix;

	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseTotalPrize = $row['Total_prize'];
	return $GetHorseTotalPrize;
}


/*=========================================================
	Get OffspringG1Wins information function
	getOffspringG1Wins(string value);
===========================================================*/
function getOffspringG1Wins($value)
{
	global $conn,$prefix;
	$OffspringG1Wins = 0;
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Father_HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $OffspringG1Wins += getHorseG1Wins($row['HorseID']);
    }
	$GetOffspringG1Wins = $OffspringG1Wins;
	return $GetOffspringG1Wins;
}



/*=========================================================
	Get OffspringG1WinsMother information function
	getOffspringG1WinsMother(string value);
===========================================================*/
function getOffspringG1WinsMother($value)
{
	global $conn,$prefix;
	$OffspringG1WinsMother = 0;
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `Mother_HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $OffspringG1WinsMother += getHorseG1Wins($row['HorseID']);
    }
	$GetOffspringG1WinsMother = $OffspringG1WinsMother;
	return $GetOffspringG1WinsMother;
}
/*=========================================================
	Get HorseG1Wins information function
	getHorseG1Wins(string value);
===========================================================*/
function getHorseG1Wins($value)
{
	global $conn,$prefix;

	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseG1Wins = $row['T3_Win'];
	return $GetHorseG1Wins;
}


/*=========================================================
	Get HorseG1Wins information function
	getHorseG1Wins(string value);
===========================================================*/
function getStudAmount($value)
{
	global $conn,$prefix;


	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetDNA_Ability5 = getDNA_Ability($row['HorseColor']);
	$GetDNA05 = $GetDNA_Ability5['DNA05'];
	$GetStudAmount = $GetDNA05 * 5 + 5;
	return $GetStudAmount;
}

/*=========================================================
	Get HorseG1Wins information function
	getHorseG1Wins(string value);
===========================================================*/
function get3AStudFee($value)
{
	global $conn,$prefix;
	$S_StudFee = 0;

		if($value < 10)
		{
			$S_StudFee = 1;
		}
		if($value < 30 && $value >= 20 )
		{
			$S_StudFee = 3;
		}
		if($value < 40 && $value >= 30 )
		{
			$S_StudFee = 5;
		}
		if($value < 50 && $value >= 40 )
		{
			$S_StudFee = 10;
		}
		if($value < 60 && $value >= 50 )
		{
			$S_StudFee = 20;
		}
		if($value < 70 && $value >= 60 )
		{
			$S_StudFee = 30;
		}
		if($value < 80 && $value >= 70 )
		{
			$S_StudFee = 50;
		}
		if($value < 90 && $value >= 80 )
		{
			$S_StudFee = 100;
		}
		if($value < 100 && $value >= 90 )
		{
			$S_StudFee = 200;
		}
		if($value < 110 && $value >= 100 )
		{
			$S_StudFee = 500;
		}
		if($value < 120 && $value >= 110 )
		{
			$S_StudFee = 1000;
		}
		if($value < 130 && $value >= 120 )
		{
			$S_StudFee = 2000;
		}
		if($value < 140 && $value >= 130 )
		{
			$S_StudFee = 3000;
		}
		if($value < 150 && $value >= 140 )
		{
			$S_StudFee = 5000;
		}
		if($value < 160 && $value >= 150 )
		{
			$S_StudFee = 10000;
		}
		if($value >= 160 )
		{
			$S_StudFee = 50000;
		}
	return $S_StudFee;
}

/*=========================================================
	Get Stud Fee information function
	getStudFee(string value);
===========================================================*/
function getStudFee($value)
{
	global $conn,$prefix;
	$S_OP_Wins = 0;
	$S_G3_Wins = 0;
	$S_G2_Wins = 0;
	$S_G1_Wins = 0;
	$S_TotalPrize = 0;
	$S_SP = 0;
	$S_ST = 0;
	$S_PW = 0;
	$S_SPStudFee = 0;
	$S_STStudFee = 0;
	$S_PWStudFee = 0;

	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$S_OP_Wins = $row['T0_Win'] * 5;
	$S_G3_Wins = $row['T1_Win'] * 10;
	$S_G2_Wins = $row['T2_Win'] * 20;
	$S_G1_Wins = $row['T3_Win'] * 100;
	$S_TotalPrize = round($row['Total_prize'] / 50, 0);
	$S_SP = getDNA_3ABack($row['HorseSpeed'],1);
	$S_ST = getDNA_3ABack($row['HorseStamina'],2);
	$S_PW = getDNA_3ABack($row['HorsePower'],3);
	$S_SPStudFee = get3AStudFee($S_SP);
	$S_STStudFee = get3AStudFee($S_ST);
	$S_PWStudFee = get3AStudFee($S_PW);
	$GetStudFee = $S_OP_Wins + $S_G3_Wins + $S_G2_Wins + $S_G1_Wins + $S_TotalPrize + $S_SPStudFee + $S_STStudFee + $S_PWStudFee;
	return $GetStudFee;
}

/*=========================================================
	Get userGASH information function
	getuserGASH($value);
===========================================================*/
function getuserGASH($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."user` WHERE `username` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetuserGASH = $row['GASH'];
	return $GetuserGASH;
}


/*=========================================================
	Get TotalGASH information function
	getTotalGASH();
===========================================================*/
function getTotalGASH()
{
	global $conn,$prefix;
	$sql = "SELECT * FROM `".$prefix."user` WHERE `Level` >= '0';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $sum += $row['GASH'];
    }
	$GetTotalGASH = $sum;
	return $GetTotalGASH;
}


/*=========================================================
	Get CryptoJockeyClubGASH information function
	getCryptoJockeyClubGASH($value);
===========================================================*/
function getCryptoJockeyClubGASH()
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."user` WHERE `username` = 'CryptoJockeyClub';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetCryptoJockeyClubGASH = $row['GASH'];
	return $GetCryptoJockeyClubGASH;
}

/*=========================================================
	Get RaceIDHorseIDBet information function
	getRaceIDHorseIDBet(string value,HorseID_NO);
===========================================================*/
function getRaceIDHorseIDBet($value,$HorseID_NO)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."BetDate` WHERE `RaceID` = '$value' and `HorseID_NO` = '$HorseID_NO';";
	$result = mysqli_query($conn,$sql);
	while ($row = @mysqli_fetch_array($result)){
    $sum += $row['Bet_GASH'];
    }
	$GetRaceIDHorseIDBet = $sum;
	return $GetRaceIDHorseIDBet;
}

/*=========================================================
	Get DNA Ability information function
	getDNA_Ability($value);
===========================================================*/
function getHorseInfo($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseInfo = $row;
	return $GetHorseInfo;
}



/*=========================================================
	Get Horse Lineage information function
	getHorseLineage($value);
===========================================================*/
function getHorseLineage($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseLineage = $row;
	return $GetHorseLineage;
}


/*=========================================================
	Get Horse Lineage information function
	getHorseLineage($value);
===========================================================*/
function getHorseLineageFather($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseLineageFather = getHorseInfo($row['Father_HorseID']);
	return $GetHorseLineageFather;
}
/*=========================================================
	Get Horse Popular information function
	getHorsePopular($value);
===========================================================*/
function getHorsePopular($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetT0_Win = $row['T0_Win'];
	$GetT1_Win = $row['T1_Win'];
	$GetT2_Win = $row['T2_Win'];
	$GetT3_Win = $row['T3_Win'];
	$GetTotal_prize = $row['Total_prize'];
	$GetHorsePopular = $GetTotal_prize * 10 + $GetT0_Win * 50 + $GetT1_Win * 100 + $GetT2_Win * 1000 + $GetT3_Win * 5000;
	return $GetHorsePopular;
}

/*=========================================================
	Get DNA ID information function
	getDNA_ID($value);
===========================================================*/
function getDNA_ID($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."SSSSS_DNA` WHERE `DNA00` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetDNA_ID = $row['DNA_ID'];
	return $GetDNA_ID;
}

/*=========================================================
	Get getDNA 3A information function
	getDNA_3A($value,XX_DNA);
===========================================================*/
function getDNA_3A($value,$DNA)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."DNA_3A` WHERE `Value_DNA` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
		if($DNA == 1)
		{
		$GetDNA_3A = $row['SP_DNA'];
		}
		if($DNA == 2)
		{
		$GetDNA_3A = $row['ST_DNA'];
		}
		if($DNA == 3)
		{
		$GetDNA_3A = $row['PW_DNA'];
		}
	return $GetDNA_3A;
}

/*=========================================================
	Get DNA 3A Back Ability information function
	getDNA_3ABack($value);
===========================================================*/
function getDNA_3ABack($value,$DNA)
{
	global $conn,$prefix;
	
		if($DNA == 1)
		{
		//$GetBackDNA_3A = 'SP_DNA';
		$sql = "SELECT * FROM `".$prefix."DNA_3A` WHERE `SP_DNA` = '$value';";
		}
		if($DNA == 2)
		{
		//$GetBackDNA_3A = 'ST_DNA';
		$sql = "SELECT * FROM `".$prefix."DNA_3A` WHERE `ST_DNA` = '$value';";
		}
		if($DNA == 3)
		{
		//$GetBackDNA_3A = 'PW_DNA';
		$sql = "SELECT * FROM `".$prefix."DNA_3A` WHERE `PW_DNA` = '$value';";
		}

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetDNA_3ABack = $row['Value_DNA'];
	return $GetDNA_3ABack;
}


/*=========================================================
	Get DNA Ability information function
	getDNA_Ability($value);
===========================================================*/
function getDNA_Ability($value)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."SSSSS_DNA` WHERE `DNA_ID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetDNA_Ability = $row;
	return $GetDNA_Ability;
}
/*=========================================================
	Get Horse Ability information function
	getHorseAbility(string value,int type);
===========================================================*/
function getHorseAbility($value,$Distance)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetHorseSpeed = $row['HorseSpeed'];
	$GetHorseStamina = $row['HorseStamina'];
	$GetHorsePower = $row['HorsePower'];
	$GetHorseHealth = $row['HorseHealth'];
	$GetHorseMaturity = $row['HorseMaturity'];
	$HorseDRange = 1;
	$HorseDPower = 1;
	
	
	
	if($Distance >= 1000 && $Distance < 1500)
	{
		if($GetHorseStamina < 30)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 30), 0);
		}

		
		if($GetHorseStamina >= 30 && $GetHorseStamina < 40)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 40)
		{
		$HorseDRange = 105;
		}
		$HorseDPower = round(($GetHorsePower * 150 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 120 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}
	
	
	if($Distance >= 1500 && $Distance < 2000)
	{
		if($GetHorseStamina < 40)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 40), 0);
		}

		
		if($GetHorseStamina >= 40 && $GetHorseStamina < 50)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 50)
		{
		$HorseDRange = 105;
		}
		$HorseDPower = round(($GetHorsePower * 140 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 110 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}
	
	if($Distance >= 2000 && $Distance < 2500)
	{
		if($GetHorseStamina < 50)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 50), 0);
		}

		
		if($GetHorseStamina >= 50 && $GetHorseStamina < 60)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 60)
		{
		$HorseDRange = 105;
		}
		$HorseDPower = round(($GetHorsePower * 130 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 100 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}	
	
	if($Distance >= 2500 && $Distance < 3000)
	{
		if($GetHorseStamina < 60)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 60), 0);
		}

		
		if($GetHorseStamina >= 60 && $GetHorseStamina < 70)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 70)
		{
		$HorseDRange = 105;
		}
		$HorseDPower = round(($GetHorsePower * 120 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 95 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}
	
	if($Distance >= 3000 && $Distance < 3500)
	{
		if($GetHorseStamina < 70)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 70), 0);
		}

		
		if($GetHorseStamina >= 70 && $GetHorseStamina < 80)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 80)
		{
		$HorseDRange = 105;
		}
		$HorseDPower = round(($GetHorsePower * 110 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 90 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}
	
	if($Distance >= 3500)
	{
		if($GetHorseStamina < 80)
		{
		$HorseDRange = 50 + round(50 * ($GetHorseStamina / 80), 0);
		}

		
		if($GetHorseStamina >= 80 && $GetHorseStamina < 90)
		{
		$HorseDRange = 100;
		}
		
		
		if($GetHorseStamina >= 90)
		{
		$HorseDRange = round(50 * ($GetHorseStamina / 90), 0);
		}
		$HorseDPower = round(($GetHorsePower * 100 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
		$HorseDSpeed = round(($GetHorseSpeed * 85 - ((100 - $GetHorseHealth) * 10)) / 100, 0);
	}

	$GetHorseAbility = round((($HorseDSpeed * 5 + $HorseDPower * 2) * $HorseDRange / 100 * (100 - ((100 - $GetHorseMaturity) / 2)) / 100), 0);
	return $GetHorseAbility;
}


/*=========================================================
	Get Horse Suitability information function
	getHorseSuitability(string value,int type);
===========================================================*/
function getHorseSuitability($value,$rank,$runwayType)
{
	global $conn,$prefix;
	
	$sql = "SELECT * FROM `".$prefix."Horse_Data` WHERE `HorseID` = '$value';";

	//搜尋資料庫資料
	$result = mysqli_query($conn,$sql);
	$row = @mysqli_fetch_array($result);
	$GetDNA_Ability = getDNA_Ability($row['HorseColor']);
	$GetDNA01 = $GetDNA_Ability['DNA01'];
	$GetDNA02 = $GetDNA_Ability['DNA02'];
	$GetDNA03 = $GetDNA_Ability['DNA03'];
	$GetDNA04 = $GetDNA_Ability['DNA04'];
	$GetDNA05 = $GetDNA_Ability['DNA05'];
	$HorseRunwayType = 1;
	$HorseRankType = 1;
	
	
	
	if($runwayType == 1)
	{
		if($GetDNA01 == 1)
		{
		$HorseRunwayType = 115;
		}
		if($GetDNA01 == 2)
		{
		$HorseRunwayType = 105;
		}
		if($GetDNA01 == 3)
		{
		$HorseRunwayType = 100;
		}
		if($GetDNA01 == 4)
		{
		$HorseRunwayType = 90;
		}
		if($GetDNA01 == 5)
		{
		$HorseRunwayType = 85;
		}
	}
	
	if($runwayType == 2)
	{
		if($GetDNA01 == 1)
		{
		$HorseRunwayType = 50;
		}
		if($GetDNA01 == 2)
		{
		$HorseRunwayType = 70;
		}
		if($GetDNA01 == 3)
		{
		$HorseRunwayType = 100;
		}
		if($GetDNA01 == 4)
		{
		$HorseRunwayType = 105;
		}
		if($GetDNA01 == 5)
		{
		$HorseRunwayType = 115;
		}
	}
	
	if($rank == T0)
	{
		if($GetDNA02 == 1)
		{
		$HorseRankType = 120;
		}
		if($GetDNA02 == 2)
		{
		$HorseRankType = 110;
		}
		if($GetDNA02 == 3)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 4)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 5)
		{
		$HorseRankType = 100;
		}
	}
	if($rank == T1)
	{
		if($GetDNA02 == 1)
		{
		$HorseRankType = 90;
		}
		if($GetDNA02 == 2)
		{
		$HorseRankType = 95;
		}
		if($GetDNA02 == 3)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 4)
		{
		$HorseRankType = 110;
		}
		if($GetDNA02 == 5)
		{
		$HorseRankType = 100;
		}
	}
	if($rank == T2)
	{
		if($GetDNA02 == 1)
		{
		$HorseRankType = 90;
		}
		if($GetDNA02 == 2)
		{
		$HorseRankType = 95;
		}
		if($GetDNA02 == 3)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 4)
		{
		$HorseRankType = 110;
		}
		if($GetDNA02 == 5)
		{
		$HorseRankType = 110;
		}
	}	
	if($rank == T3)
	{
		if($GetDNA02 == 1)
		{
		$HorseRankType = 90;
		}
		if($GetDNA02 == 2)
		{
		$HorseRankType = 95;
		}
		if($GetDNA02 == 3)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 4)
		{
		$HorseRankType = 100;
		}
		if($GetDNA02 == 5)
		{
		$HorseRankType = 110;
		}
	}
	
	$GetHorseSuitability = round(($HorseRunwayType * $HorseRankType / 100), 0);
	return $GetHorseSuitability;
}


/*=========================================================
	Check User information function
	cpf_check(string username);
===========================================================*/
function cpf_check($ty_username)
{
	global $conn,$prefix;
	//搜尋資料庫資料
	$row = cpf_getUserInfo($ty_username,1);

	if($ty_username==null)//檢查使用者名稱是否為空
	{
		$returnCode = 0;
	}
	elseif($row[1]==null)//檢查使用者名稱是否已經被使用了
	{
		$returnCode = 1;
	}
	elseif($row[1]!=null)//檢查使用者名稱是否已經被使用了
	{
		$returnCode = 2;
	}
	else //系統有問題
	{
		$returnCode = 3;
	}
	return $returnCode;
}
?>
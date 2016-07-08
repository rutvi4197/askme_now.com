<?php
class Database
{
	private static $host='rutvi.db.9462939.hostedresource.com';
	private static $uname='rutvi';
	private static $pwd='Demo9@1212';
	private static $con=NULL;
	
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$uname,self::$pwd);
		mysql_select_db('rutvi',self::$con);
		return self::$con;
	}
	
	public function getsub()
	{		$con=database::connect();
			$res=mysql_query("select * from sub_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function getquedis()
	{		$con=database::connect();
			$res=mysql_query("select * from que_tbl where que_flag='0'",$con);
			return $res;
			database::disconnect();
	}
		public function getallquedis()
	{		$con=database::connect();
			$res=mysql_query("select * from que_tbl where que_flag='1'",$con);
			return $res;
			database::disconnect();
	}

	public function getuser($email_id)
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl where pk_email_id='$email_id' ",$con);
			return $res;
			database::disconnect();
	}
	public function addque($que_title,$que_des,$que_img,$que_date,$email_id,$sub_id,$que_cnt,$que_flag,$que_like)
	{		$con=database::connect();
			$res=mysql_query("insert into que_tbl values(Null,'$que_title','$que_des','$que_img','$que_date','$email_id','$sub_id','$que_cnt','$que_flag','$que_like')",$con);
			return $res;
			database::disconnect();
	}
	public function disans($que_id)
	{		$con=database::connect();
			$res=mysql_query("select a.*,q.* from ans_tbl as a,que_tbl as q where a.fk_que_id=q.pk_que_id and fk_que_id='$que_id'",$con);
			return $res;
			database::disconnect();
	}
	
	
	public function getlike($que_id)
	{		$con=database::connect();
			$res=mysql_query("select * from que_tbl where pk_que_id='$que_id' ",$con);
			return $res;
			database::disconnect();
	}
	public function getlikeupdate($que_id,$cnt)
	{		$con=database::connect();
			$res=mysql_query("update que_tbl set que_like='$cnt' where pk_que_id='$que_id' ",$con);
			return $res;
			database::disconnect();
	}
	public function getcntupdate($que_id,$cnt)
	{		$con=database::connect();
			$res=mysql_query("update que_tbl set que_cnt='$cnt' where pk_que_id='$que_id' ",$con);
			return $res;
			database::disconnect();
	}
	public function aprove($que_id)
	{		$con=database::connect();
			$res=mysql_query("update que_tbl set que_flag='1' where pk_que_id='$que_id' ",$con);
			return $res;
			database::disconnect();
	}

	public function reject($que_id)
	{		$con=database::connect();
			$res=mysql_query("update que_tbl set que_flag='2' where pk_que_id='$que_id' ",$con);
			return $res;
			database::disconnect();
	}

	public function getanswerinsert($que_id,$desc,$email,$date)
	{		$con=database::connect();
			$res=mysql_query("insert into ans_tbl values(NULL,'$desc','$email','$que_id','$date',NULL)",$con);
			return $res;
			database::disconnect();
	}
	public function disquebyid($id)
	{
		$con=database::connect();
			$res=mysql_query("select * from que_tbl where pk_que_id='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function disque1()
	{
		$con=database::connect();
			$res=mysql_query("select * from que_tbl as q,user_tbl as u where q.fk_email_id=u.pk_email_id and que_flag='1'",$con);
			return $res;
			database::disconnect();
		
	}
	public function cntans($id)
	{
		$con=database::connect();
			$res=mysql_query("select * from ans_tbl where fk_que_id='$id'",$con);
			return $res;
			database::disconnect();
		
	}
	public function getquedel($id)
	{
		$con=database::connect();
			$res=mysql_query("delete from que_tbl where pk_que_id='$id'",$con);
			$res=mysql_query("delete from ans_tbl where fk_que_id='$id'",$con);
			return $res;
			database::disconnect();
		
	}
	
	public function disviewbysub($id)
	{		$con=database::connect();
			$res=mysql_query("select * from que_tbl as q,user_tbl as u where q.fk_email_id=u.pk_email_id and q.fk_sub_id='$id' and que_flag='1'",$con);
			return $res;
			database::disconnect();
	}
	
	public function subadd()
	{
		$con=database::connect();
		$res=mysql_query('select count(q.pk_que_id)"cnt",s.sub_name,q.fk_sub_id,s.pk_sub_id from sub_tbl as s,que_tbl as q  where s.pk_sub_id=q.fk_sub_id and q.que_flag="1" group by(s.sub_name)',$con);
		return $res;
	database::disconnect();
	}
	public function checkpwd($email_id,$pass)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email_id' and user_password='$pass'",$con);
		return $res;
	database::disconnect();
	}
	public function changepwd($email_id,$pass)
	{
		$con=database::connect();
		$res=mysql_query("update user_tbl set user_password='$pass' where pk_email_id='$email_id'",$con);
		return $res;
	database::disconnect();
	}
	public function queupdate($id,$title,$desc,$cat,$photo)
	{
		$con=database::connect();
		$res=mysql_query("update que_tbl set que_title='$title',que_desc='$desc',fk_sub_id='$cat',que_img='$photo' where pk_que_id='$id' ",$con);
		return $res;
	database::disconnect();
	}
	public function signup($email,$name,$mobile,$gender,$pwd,$type,$photo)
	{
		$con=database::connect();
		$res=mysql_query("insert into user_tbl values('$email','$name','$mobile','$gender','$pwd','$photo','$type')",$con);
		return $res;
	database::disconnect();
	}
	public function login($email,$password)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email' and user_password='$password'",$con);
		return $res;
	database::disconnect();
	}
		public function changeprof($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	}
	public function changeprofedit($photo,$name,$mobile,$email_id)
	{
		$con=database::connect();
	$res=mysql_query("update user_tbl set user_photo='$photo',user_name='$name',user_mobile='$mobile' where pk_email_id='$email_id' ",$con);
	return $res;
	database::disconnect();
	}
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=NULL;
	}
}
?>
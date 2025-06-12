<?php
abstract class customers {
    public $id;
    public $name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    protected $password;
    public $created_at;



    function __construct($id,$name,$first_name,$last_name,$email,$phone,$password,$created_at){
        $this->id = $id;
        $this->name = $name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    public function register($name,$email,$password){
       $qry = "INSERT INTO customers(name,email,password,phone)
       VALUE('name','email','password','phone')";
       require_once('confg.php');
       $cn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
       $rslt = mysql_query($cn,$qry);
       mysqli_close($cn);
       return $rslt;
    }


    public static function login($email,$password){
        $user = null;
        $qry = "SELECT * FROM CUSTOMERS WHERE email=`$email` AND password=`$password`";
        require_once('confg.php');
        $cn= mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt= mysql_query($cn,$qry);
        if ($arr = mysqli_fetch_assoc($rslt)) {
            $user = new customer($arr["id"],$arr["name"],$arr["first_name"],$arr["last_name"],$arr["email"],$arr["password"],$arr["phone"],$arr["created_at"]);
        }
        mysqli_close(); 
        return user;
    }
}
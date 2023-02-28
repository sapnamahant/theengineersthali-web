<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\User;
use App\Models\Userauth;
use App\Models\Support;
use App\Models\PrivacyPolicy;
use App\Models\Transation;
use App\Models\UserAddress;
use App\Models\PaytmChecksum;
use App\Models\Notification;
use App\Models\Appointment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use paytm\checksum\PaytmChecksumLibrary;

define('authKey','314037AjibpKUvmwd5e27089dP1');
define('senderId','SRVCWL');
define('route','4');

class AppApiController extends Controller
{

    public function __construct()
    {
    	header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Api-Key, Auth-Key");
        header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
        header("Content-Type: application/json; charset=utf-8");

    }

    public function getallheaders(\Illuminate\Http\Request $request)
    {
        $headers = $request->header('Authorization');
        return $headers;
    }

    public function get_user_id()
    {

        $headers = getallheaders();
        // print_r($headers); die;

        if (isset($headers['auth-key']) && $headers['auth-key'] != '')
        {

            $auth_key = $headers['auth-key'];

            $userData = Userauth::where('auth_key', '=', $auth_key)->first();

            if ($userData)
            {
                return $userData->user_id;
            }
            else
            {
                print_r(json_encode(array(
                    "status" => false,
                    "result" => "Invalid authentication. Please login again",
                    'login' => false
                )));
                exit;
            }

        }
        else
        {
            print_r(json_encode(array(
                "status" => false,
                "msg" => 'Auth key not found'
            )));
            exit;
        }
    }

    public function userRegister(Request $req){
		$post = json_decode(file_get_contents('php://input', 'r'));

		if (isset($post->mobile) && $post->mobile != '' && isset($post->email) && $post->email != ''  && isset($post->password) && $post->password != '' && isset($post->name) && $post->name != '' ){
		    $mobile = htmlentities($post->mobile, ENT_QUOTES);
		    $otpCode = rand(1000, 9999);
		    $password = $post->password;
		    $name = $post->name;
            $email = $post->email;
		    $nameArr = explode(" ",strtolower($name));
		    $username =$nameArr[0].$mobile;

            $email_exists = User::where('email','=',$email)->first();
		    $mobile_exists = User::where('mobile','=',$mobile)->first();

		    if($mobile_exists){
		        print_r(json_encode(array(
		            "status" => false,
		            "msg" => "This mobile number is already registered, Please try another one.",
		        )));
		        exit;
		    }
            elseif($email_exists){
		        print_r(json_encode(array(
		            "status" => false,
		            "msg" => "This email is already registered, Please try another one."
		        )));
		        exit;
		    }else{

		        $user = new User();

		        $user->mobile = $mobile;
		        $user->email = $email;
		        $user->password = md5($password) ;
		        $user->name = $name;
		        $user->role = '2';
		        $user->status = '0';
		        $user->otp = $otpCode;
		        $user->username = $username;
		        $user->fcm_token = $post->token;

		        if($user->save()){
		            $this->verifyPhoneNumber($mobile, $otpCode, 'signup');
		            print_r(json_encode(array(
		                "status" => true,
		                'msg' => 'You have registered successfully! Please verify your account with otp sent on your mobile.',
		                'mobile' => $mobile,
		                'otp' => $otpCode,
		                'username' => $username
		            )));
		            exit;

		        }else{
		            print_r(json_encode(array(
		                "status" => false,
		                "msg" => 'Error in registration'
		            )));
		            exit;
		        }
		    }
		}else{
		    print_r(json_encode(array(
		        "status" => false,
		        "msg" => "All fields are required."
		    )));
		    exit;
		}
	}

    public function resendOtp(){
        $post = json_decode(file_get_contents('php://input', 'r'));
        if(isset($post->mobile) && $post->mobile != ""){
            $user = User::where('mobile',$post->mobile)->first();
            if($user){
                $otp = rand(1000, 9999);
                $user->otp = $otp;
                if($user->save()){
                    $this->verifyPhoneNumber($post->mobile, $otp, '');
		            print_r(json_encode(array(
		                "status" => true,
		                'msg' => 'OTP send successfully.',
		                'mobile' => $post->mobile,
		                'otp' => $otp
		            )));
		            exit;
                }else{
                    print_r(json_encode(array(
		                "status" => false,
		                'msg' => 'Something Went Wrong.'
		            )));
		            exit;
                }
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    "msg" => 'Mobile number is not registrated.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                "msg" => 'Enter Mobile Number'
            )));
            exit;
        }
    }

    public function verifyPhoneNumber($mobileNumber = '', $random_number = '', $for = ''){
        if ($mobileNumber != '' && $random_number != ''){
            $data_user = User::where('mobile','=',$mobileNumber)->first();
            // print_r($userDetail); exit();
            if ($for == 'signup'){
                if ($data_user){
                    if ($data_user->status == '2'){
                        print_r(json_encode(array(
                            "status" => false,
                            "msg" => "This phone is blocked by admin. Please try another one or contact with admin."
                        )));
                        exit;
                    }elseif ($data_user->status == '1'){
                        print_r(json_encode(array(
                            "status" => false,
                            "msg" => "This phone is already registered. Please login."
                        )));
                        exit;
                    }
                }
            }elseif ($for == 'forgot'){
                if ($data_user){
                    if ($data_user->status == '2'){
                        print_r(json_encode(array(
                            "status" => false,
                            "msg" => "This phone is blocked by admin. Please try another one or contact with admin."
                        )));
                        exit;
                    }
                }
            }

            $fields = array(
                "variables_values" => $random_number,
                "route" => "otp",
                "numbers" => $mobileNumber,
            );

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: byC3lSFawTYPpqJvmhrA7VIKWsknDUXcEgQo189iHZf0exR6OB9TVFR4ZDIyjcHBWao0Uh5E6LevOfQ3",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }


            // $curl = curl_init();
            // $message = $random_number . " is your verification code for SMS.";
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?authkey=" . authKey . "&mobile=+91" . $mobileNumber . "&message=" . urlencode($message) . "&sender=" . senderId . "&otp=" . $random_number,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'GET',
            //     CURLOPT_HTTPHEADER => array(
            //         'Cookie: PHPSESSID=svkhb9g8cjpnt5ckpldc48klv3'
            //     ) ,
            // ));

            // $response = curl_exec($curl);

            // if (curl_errno($curl))
            // {
            //     // echo 'error:' . curl_error($ch);
            //     echo json_encode(array(
            //         'status' => false,
            //         'message' => "Something went wrong try again."
            //     ));
            //     exit();
            // }
            // curl_close($curl);

        }
        else{
            echo json_encode(array(
                'status' => false,
                'message' => "Please enter phone."
            ));
            exit();
        }

    }

    function verifyOtp(){
        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($post->mobile) && $post->mobile!='' && isset($post->otp) && $post->otp!=''){
            $mobile = $post->mobile;
            $otp = $post->otp;

            $data_user = User::select('id','name','email','mobile','otp','status')->where('mobile','=',$mobile)->Where('otp','=',$otp)->first();
            // print_r($data_user);die;

            if($data_user){
            	if($data_user->status=='1'){

            		User::where('mobile', $mobile)->where('otp', $otp)
                    ->update(['otp' => '','is_verified' => '1']);

                     print_r(json_encode(array(
			            "status" => true,
			            "msg" => "Verified Successfully",
			            // 'data' => $data_user
			        )));
			        exit;

            	}elseif($data_user->status=='0'){

                    $status= '1';

                    User::where('mobile', $mobile)->where('otp', $otp)
                    ->update(['otp' => '','is_verified' => '1','status' => $status]);

                    $this->loginAccessUser($data_user);

                }elseif($data_user->status=='2'){
                    print_r(json_encode(array(
                        "status" => false,
                        "msg" => "Your account is deactivated.",
                        'otp' => false
                    )));
                    exit;
                }elseif($data_user->status=='3'){
                    print_r(json_encode(array(
                        "status" => false,
                        "msg" => "Your account blocked by admin.",
                        'otp' => false
                    )));
                    exit;
                }else{
                    /*------------------- Save ip and browser --------------*/
                    // $this->loginAccessUser($data_user);
                }

            }else{
                    print_r(json_encode(array(
                        "status"=>false,
                        "msg"=>"Invalid OTP. Please try agian."
                    )));
                            exit;
            }
        }else{
            print_r(json_encode(array(
                "status"=>false,
                "msg"=>"Please enter OTP"
            )));
            exit;
        }
    }

    function getBrowser(){
        $browser = array("Navigator"            => "/Navigator(.*)/i",
                         "Firefox"              => "/Firefox(.*)/i",
                         "Internet Explorer"    => "/MSIE(.*)/i",
                         "Google Chrome"        => "/chrome(.*)/i",
                         "MAXTHON"              => "/MAXTHON(.*)/i",
                         "Opera"                => "/Opera(.*)/i",
                         );

        // print_r($browser);exit;
        $this->info= array();
        foreach($browser as $key => $value){
            if(preg_match($value,  request()->userAgent())){
                $this->info = array_merge($this->info,array("Browser" => $key));
                $this->info = array_merge($this->info,array(
                  // "Version" => $this->getVersion($key, $value, $this->agent)
                  ));
                break;
            }else{
                $this->info = array_merge($this->info,array("Browser" => "UnKnown"));
                $this->info = array_merge($this->info,array("Version" => "UnKnown"));
            }
        }
        return $this->info['Browser'];
      }

    public function loginAccessUser($userData)
    {
        $browser = $this->getBrowser();

        $ipaddress = '';
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        // if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP');
        // else if (getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        // else if (getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED');
        // else if (getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR');
        // else if (getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED');
        // else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
        // else $ipaddress = 'UNKNOWN';

        $json = file_get_contents("http://ipinfo.io/{$ipaddress}");
        $details = json_decode($json);

        // return $details;
        // print_r($details); exit;
        $auth_key = md5(uniqid() . $userData->id);
        $userauth = new Userauth();

        $userauth->auth_key = $auth_key;
        $userauth->user_id = $userData->id;
        $userauth->ip_address = $details->ip;
        $userauth->browser = $browser;
        $userauth->city = @$details->city;
        $userauth->country = @$details->country;
        $userauth->postal = @$details->postal;

        $userauth->save();


        print_r(json_encode(array(
            "status" => true,
            "msg" => "Login Successfully",
            "result_auth_key" => $auth_key,
            'data' => $userData
        )));
        exit;

    }

    function login(Request $req) {

	    $post = json_decode(file_get_contents('php://input', 'r'));

	    if (isset($post->mobile) && $post->mobile != '' && isset($post->password) && $post->password != '')
	    {

	        $mobile = strtolower($post->mobile);
	        $password = md5($post->password);

	        $data_user = User::where('mobile','=',$mobile)->where('password','=',$password)->first();

	        if ($data_user)
	        {

	        	$data_user->fcm_token = $post->token;
	        	$data_user->save();
	            if($data_user->status=='0'){
	                // if($data_user->email_verified_at){
	                  $otpCode = rand(1000, 9999);
	                  $data_user->otp = $otpCode;
	                  $data_user->save();

	                   $this->verifyPhoneNumber($data_user->mobile, $otpCode, 'signup');
	                  print_r(json_encode(array(
	                      "status" => false,
	                      "msg" => "Please verify your account with otp sent on your mobile.",
	                      'otp' => true
	                  )));
	                  exit;

	            }elseif($data_user->status=='2'){
	                print_r(json_encode(array(
	                    "status" => false,
	                    "msg" => "Your account is deactivated.",
	                    'otp' => false
	                )));
	                exit;
	            }elseif($data_user->status=='3'){
	                print_r(json_encode(array(
	                    "status" => false,
	                    "msg" => "Your account blocked by admin.",
	                    'otp' => false
	                )));
	                exit;
	            }else{
	                /*------------------- Save ip and browser --------------*/
	                $this->loginAccessUser($data_user);
	            }

	        }
	        else
	        {
	            print_r(json_encode(array(
	                "status" => false,
	                "msg" => "The mobile or password you entered is not valid",
	                'otp' => false
	            )));
	            exit;
	        }

	    }
	    else
	    {
	        print_r(json_encode(array(
	            "status" => false,
	            "msg" => "Please enter mobile and password fields."
	        )));
	        exit;
	    }
	}

    public function  forgotPassword(){

        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($post->mobile) && $post->mobile!='')
        {
            // $email = htmlentities(strtolower($post->email),ENT_QUOTES);
            $mobile = $post->mobile;
            $user_exists = User::select('id','name','email','mobile','status')->where('mobile','=',$mobile)->first();

            if($user_exists){
                $otpCode = rand(1000, 9999);

                $result = User::where('mobile', $mobile)->update(['otp' => $otpCode,'is_verified' => '0']);
                if($result){
                    $this->verifyPhoneNumber($mobile,$otpCode,'forgot');
                    print_r(json_encode(array(
                        "status"=>true,
                        'msg'=>'Please check your phone for otp to reset password.',
                        'mobile'=>$mobile,
                        'otpCode'=>$otpCode
                    )));
                    exit;
                }else{
                    print_r(json_encode(array(
                        "status"=>false,
                        "msg"=>'Error in reset password'
                    )));
                    exit;
                }

            }else{
                print_r(json_encode(array(
                    "status"=>false,
                    "msg"=>"Yor are not registered user, Please provide valid email and phone number."
                )));
                exit;
            }

        }else{
             print_r(json_encode(array("status"=>false,"msg"=>"Please fill mobile field.")));
             exit;
        }
    }

    public function changePassword()
    {
        $post = json_decode(file_get_contents('php://input', 'r'));

        $user_id = $this->get_user_id();

        if(isset($post->opassword) && $post->opassword!='' && isset($post->password) && $post->password!='' && isset($post->cpassword) && $post->cpassword!=''){

            $oldpassword = $post->opassword;
            $newpassword = $post->password;
            $confirmpassword = $post->cpassword;
            if ($newpassword != $confirmpassword) {
                    print_r(json_encode(array(
                        "status" => false,
                        "msg" => "Password and Confirm password are not match."
                    )));
                    exit;
            }

            $user_data= User::where('id', $user_id)->where('password', md5($oldpassword))->first();

            if($user_data){

                $result = User::where('id', $user_id)->update(['password' => md5($newpassword)]);
                if($result){
                    print_r(json_encode(array(
                        "status"=>true,
                        "msg"=>'Password changed successfully.'
                    )));
                    exit;
                }

            }else{
                print_r(json_encode(array(
                    "status"=>false,
                    "msg"=>'Incorrect old password.'
                )));
                exit;
             }
         }else{
            print_r(json_encode(array(
                "status"=>false,
                "msg"=>'Required fields are mandatory.'
            )));
            exit;
         }
    }

    public function resetPassword()
    {
        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($post->password) && $post->password!='' && isset($post->cpassword) && $post->cpassword!='' && (isset($post->mobile) && $post->mobile!='')){

            $newpassword = $post->password;
            $confirmpassword = $post->cpassword;

            $mobile = $post->mobile;

            if ($newpassword != $confirmpassword) {
                    print_r(json_encode(array(
                        "status" => false,
                        "msg" => "Password and Confirm password are not match."
                    )));
                    exit;
            }


            $data_user = User::where('mobile','=',$mobile)->first();

            if($data_user){
                $user_id = $data_user->id;

                $user = User::find($user_id);
		        $user->password = md5($newpassword);
		        // $user->real_password = $newpassword;

                if($user->save()){
                    // $this->loginAccessUser($user);
                    print_r(json_encode(array(
                        "status"=>true,
                        "msg"=>'Password changed successfully.'
                    )));
                    exit;
                }
            }else{
                print_r(json_encode(array(
                    "status"=>false,
                    "msg"=>'Invalid user.'
                )));
                exit;
             }
         }else{
            print_r(json_encode(array(
                "status"=>false,
                "msg"=>'Required fields are mandatory.'
            )));
            exit;
         }
    }

    public function logout(){
        $user_id = $this->get_user_id();
        $user = Userauth::where('user_id',$user_id)->delete();
        if($user){
            print_r(json_encode(array(
                'status' => true,
                'msg' => 'logout successfully.'
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Something went wrong.'
            )));
            exit;
        }
    }



    public function listAllProduct(){

        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($post->category)){
            $product = Product::where('category',$post->category)->where('status',1)->get();

            if(count($product)>0){
                print_r(json_encode(array(
                    'status' => true,
                    'products' => $product
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Can not found any products in this category'
                )));
                exit;
            }
        }else{
            $product = Product::where('status',1)->get();

            if(count($product)>0){
                print_r(json_encode(array(
                    'status' => true,
                    'products' => $product
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Can not found any products.'
                )));
                exit;
            }
        }

    }

    public function addCart(Request $request){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if(isset($post->product_id) && $post->product_id != ''){
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->product_id = $post->product_id;
            $cart->product_qty = 1;

            if($cart->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'product added to cart successfully.'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'failed to add product into cart.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function updateCart(Request $req){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if(isset($post->product_id) && $post->product_id != '' && isset($post->product_qty) && $post->product_qty != ''){
            $cart =  Cart::where('user_id',$user_id)->where('product_id',$post->product_id)->first();
            $cart->product_qty = $post->product_qty;

            if($cart->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'Cart updated successfully.'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'failed to update cart.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function removeCart(Request $req){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if(isset($post->product_id) && $post->product_id != ''){
            $cart =  Cart::where('user_id',$user_id)->where('product_id',$post->product_id)->delete();

            if($cart){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'Product removed from cart successfully.'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'failed to remove product from cart.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function singleProduct(){
        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($post->product_id) && $post->product_id != ''){
            $product = Product::where('id',$post->product_id)->first();
            $product_media = ProductImages::select('image','file_type')->where('productId',$post->product_id)->get();

            if(!empty($product)){
                print_r(json_encode(array(
                    'status' => true,
                    'product' => $product,
                    'media' => $product_media
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'product not found.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function getCartProduct(){
        $user_id = $this->get_user_id();

        $cart = Cart::select('carts.id as carts_id', 'carts.product_id as product_id', 'carts.user_id as user_id', 'products.*')
        ->join('products', function ($join) use($user_id) {
                $join->on('products.id', '=', 'carts.product_id')
                     ->where('carts.user_id', '=', $user_id);
            })->get();

        if(!empty($cart)){
            print_r(json_encode(array(
                'status' => true,
                'products' => $cart
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Cart is empty!!.'
            )));
            exit;
        }

    }

    public function listMenu(){

        $post = json_decode(file_get_contents('php://input', 'r'));
        $menus = Menu::where('status',1)->get();

        if(count($menus)>0){
            print_r(json_encode(array(
                'status' => true,
                'menus' => $menus
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Can not found any menu.'
            )));
            exit;
        }

    }

    public function support(){
        $support = Support::where('id',1)->first();
        if($support){
            print_r(json_encode(array(
                'status' => true,
                'support' => $support
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' =>  'something went wrong.'
            )));
            exit;
        }
    }

    public function privacyPolicy(){
        $policy = PrivacyPolicy::where('id',1)->first();
        if($policy){
            print_r(json_encode(array(
                'status' => true,
                'policy' => $policy
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' =>  'something went wrong.'
            )));
            exit;
        }
    }

    public function addAddress(Request $request){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if(isset($post->address) && $post->address != ''  && isset($post->type) && $post->type != ''){
            $existingAddr = UserAddress::where('user_id',$user_id)->count();
            if($existingAddr>0){
                $isDefault = 0;
            }else{
                $isDefault = 1;
            }

            $address = new UserAddress();
            $address->user_id = $user_id;
            // $address->country = $post->country;
            $address->landmark = $post->landmark;
            $address->address = $post->address;
            $address->hf_number = $post->hf_number;
            $address->type = $post->type;
            $address->isDefault = $isDefault;
            if($address->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'Address added successfully'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Something went wrong'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required'
            )));
            exit;
        }
    }

    public function getAddress(){
        $user_id = $this->get_user_id();

        $addresses = UserAddress::where('user_id',$user_id)->get();
        if(count($addresses)>0){
            print_r(json_encode(array(
                'status' => true,
                'addresses' => $addresses
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'No address found'
            )));
            exit;
        }
    }

    public function editAddress(){

        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if( isset($post->address) && $post->address != '' && isset($post->type) && $post->type != '' && isset($post->address_id) && $post->address_id != ''){

            // if(isset($post->isDefault) && $post->isDefault != ''){
            //     $isDefault = 1;
            // }else{
            //     $isDefault = 0;
            // }

            // if($isDefault==1){
            //     UserAddress::where('user_id',$user_id)->update(['isDefault'=>0]);
            // }

            $address = UserAddress::where('user_id',$user_id)->where('id',$post->address_id)->first();
            $address->user_id = $user_id;
            // $address->country = $post->country;
            // $address->name = $post->name;
            $address->landmark = $post->landmark;
            $address->address = $post->address;
            $address->hf_number = $post->hf_number;
            // $address->mobile = $post->mobile;
            // $address->state = $post->state;
            // $address->pincode = $post->pincode;
            $address->type = $post-> type;
            // $address->isDefault = $isDefault;
            if($address->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'Address updated successfully.'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Something went wrong.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function updateAddressStatus($id){
        $user_id = $this->get_user_id();
        UserAddress::where('user_id',$user_id)->update(['isDefault'=>0]);
        $update = UserAddress::where(['id'=>$id,'user_id'=>$user_id])->update(['isDefault'=>1]);
        if($update){
            print_r(json_encode(array(
                'status' => true,
                'msg' => 'status updated successfully.'
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'something went wrong.'
            )));
            exit;
        }
    }

    public function updateProfile(Request $request){
        $user_id = $this->get_user_id();
        $user = User::find($user_id);
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user->name = $post->name;
        $user->email = $post->email;
        $user->mobile = $post->mobile;
        $user->dob = $post->dob;

        if($user->save()){
            print_r(json_encode(array(
                'status' => true,
                'msg' => 'Profile updated successfully.'
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'something went wrong.'
            )));
            exit;
        }
    }

    public function uploadProfilePic(){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();
        if(isset($post->image) && $post->image!=''){
            $user = User::where('id',$user_id)->first();
            $folderName = '/images/';
            $image_parts = explode(";base64,", $post->image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . time().'.'.$image_type;
            $destinationPath = $folderName.$imageName;
            $success = file_put_contents(public_path().$destinationPath, $image_base64);

            $user->profile_pic = $imageName;
            if($user->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'path' => $imageName,
                    'msg' => 'profile pic uploaded successfully.'
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Something went wrong.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'All field are required.'
            )));
            exit;
        }
    }

    function getSignleAddress($id){
        $user_id = $this->get_user_id();
        $address = UserAddress::where('user_id',$user_id)->where('id',$id)->first();
        if($address){
            print_r(json_encode(array(
                'status' => true,
                'address' => $address
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Something went wrong'
            )));
            exit;
        }
    }

    function deleteAddress($id){
        $user_id = $this->get_user_id();
        $address = UserAddress::where('user_id',$user_id)->where('id',$id)->delete();
        if($address){
            print_r(json_encode(array(
                'status' => true,
                'msg' => 'Address delete successfully.'
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Something went wrong'
            )));
            exit;
        }
    }

    function getProfile(){
        $user_id = $this->get_user_id();
        $profile = User::where('id',$user_id)->first();
        if($profile){
            print_r(json_encode(array(
                'status' => true,
                'profile' => $profile
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'User Not Found'
            )));
            exit;
        }
    }

    function createOrder(Request $request){
        $post = json_decode(file_get_contents('php://input', 'r'));
        // $user_id = $this->get_user_id();
        if(isset($post->amount) && $post->amount!=''){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "amount": '.$post->amount * 100 .',
                "currency": "INR"
            }',
            CURLOPT_HTTPHEADER => array(
                'content-type: application/json',
                'Authorization: Basic cnpwX3Rlc3RfRDdkTmZPWTFLT2N5OUk6dlllYUJuSjZvSk9mQngyRFo0d3hIZ1Vu'
            ),
            ));

            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
            $result = json_decode($response);
            if($httpcode == 200){
                print_r(json_encode(array(
                    'status' => true,
                    'orderId' => $result->id
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'Something went wrong'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required'
            )));
            exit;
        }

    }

    function transaction(Request $request){
        $post = json_decode(file_get_contents('php://input', 'r'));
        $user_id = $this->get_user_id();

        if(isset($post->transaction_id) && $post->transaction_id != '' && isset($post->menu_id) && $post->menu_id != '' && isset($post->amount) && $post->amount != '' && isset($post->subscription_days) && $post->subscription_days != ''){
            $date = date('d-m-Y');
            $trans = new Transation();
            $trans->user_id = $user_id;
            $trans->transaction_id = $post->transaction_id;
            $trans->menu_id = $post->menu_id;
            $trans->amount = $post->amount;
            $trans->subscription_days = $post->subscription_days;
            $trans->plan_expired = date('d-m-Y', strtotime($date. '+30 day'));
            if($trans->save()){
                print_r(json_encode(array(
                    'status' => true,
                    'msg' => 'Payment successfully done.',
                   )));
                   exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'something went wrong',
                )));
                exit;
            }
        }else{
           print_r(json_encode(array(
            'status' => false,
            'msg' => 'all fields are required',
           )));
           exit;
        }
    }

    function getSubscription(){
        $user_id = $this->get_user_id();
        $trans = Transation::select('transations.*','transations.amount as trans_amount','transations.created_at as created_at','menus.*')->where('transations.user_id',$user_id)->leftJoin('menus','menus.id','=','transations.menu_id')->orderBy('transations.id','desc')->get();
        if($trans){
            print_r(json_encode(array(
                'status' => true,
                'transaction' => $trans
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Subscription not found'
            )));
            exit;
        }
    }
    public function singleMenu($menu_id){
        $post = json_decode(file_get_contents('php://input', 'r'));

        if(isset($menu_id) && $menu_id != ''){
            $menu = Menu::where('id',$menu_id)->first();

            if(!empty($menu)){
                print_r(json_encode(array(
                    'status' => true,
                    'menu' => $menu
                )));
                exit;
            }else{
                print_r(json_encode(array(
                    'status' => false,
                    'msg' => 'menu not found.'
                )));
                exit;
            }
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'all fields are required.'
            )));
            exit;
        }
    }

    public function notification(){
        $notification = Notification::orderBy('id','desc') ->get();
        if($notification){
            print_r(json_encode(array(
                'status' => true,
                'notification' => $notification
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' =>  'something went wrong.'
            )));
            exit;
        }
    }

    function getDeliveryDetails(){
        $user_id = $this->get_user_id();
        $delivery = Delivery::where('user_id',$user_id)->orderBy('id','desc')->get();
        if($delivery){
            print_r(json_encode(array(
                'status' => true,
                'deliveries' => $delivery
            )));
            exit;
        }else{
            print_r(json_encode(array(
                'status' => false,
                'msg' => 'Delivery history not found.'
            )));
            exit;
        }
    }

}


<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
	    //Load Login page View 
        echo view('/admin/signin');
    } 
    public function loginAuth()
    {   // Create Session Variable
        $session = session();
		// create model object
        $userModel = new UserModel();
		// Get value from textfields
        $email = $this->request->getVar('email');		
		// Get value from Password textfields
		$password = $this->request->getVar('password');
		// get the first array recored data
		$data = $userModel->where('email', $email)->first();

		if($data){
		$pass = $data['password'];
		//match the password   if input field password and database password is same then ok 
		$authenticatePassword = password_verify($password, $pass);
		if($authenticatePassword){
		// prepair session  array data with associative array       
		$ses_data = [
		'id' => $data['id'],
		'firstname' => $data['firstname'],
		'lastname' => $data['lastname'],
		'email' => $data['email'],
		'isLoggedIn' => TRUE
		];

		// Add The Data into Session
		$session->set($ses_data);

		// Redirect to Admin Dashboard or Profile Page
		return redirect()->to('/admin/profile');

		}else{
		// if login is invalid then redirect to login page
		$session->setFlashdata('msg', 'Password is incorrect.');
		return redirect()->to('/admin/');
		}
		}else{
		// if login data is not found then redirect to login page
		$session->setFlashdata('msg', 'Email does not exist.');
		return redirect()->to('/admin/');
		}
		}

////////////////////////// Rest Api Login//////////

 public function loginAuth_Api()
    {   // Create Session Variable
        $session = session();
		// create model object
        $userModel = new UserModel();
		// Get value from textfields
        $email = $this->request->getVar('email');		
		// Get value from Password textfields
		$password = $this->request->getVar('password');
		// get the first array recored data
		$data = $userModel->where('email', $email)->first();

		if($data){
		$pass = $data['password'];
		//match the password   if input field password and database password is same then ok 
		$authenticatePassword = password_verify($password, $pass);
		if($authenticatePassword){
		// prepair session  array data with associative array       
		$ses_data = [
		'id' => $data['id'],
		'firstname' => $data['firstname'],
		'lastname' => $data['lastname'],
		'email' => $data['email'],
		'isLoggedIn' => TRUE
		];

		// Add The Data into Session
		$session->set($ses_data);
		// Redirect to Admin Dashboard or Profile Page
		//return redirect()->to('/admin/profile');

         echo json_encode($ses_data);

		}else{
		// if login is invalid then redirect to login page
		$session->setFlashdata('msg', 'Password is incorrect.');
		return redirect()->to('/admin/');
		}
		}else{
		// if login data is not found then redirect to login page
		$session->setFlashdata('msg', 'Email does not exist.');
		return redirect()->to('/admin/');
		}
		}



//////phone login via OTP 
/*
1) check number indatabase 
2) if number found then update the Login Token and send otp to user 
3) if not found then send the message kindly rgister the account you are not a registered user
*/

public function phone_login(){
			$session = session();
			$userModel = new UserModel();
			$phone = $this->request->getVar('phone');
			$otp = $this->request->getVar('otp');
			$userdata = $userModel->where('token',$otp)->where('phone',$phone)->first();
			
			if(isset($userdata)&& $otp > 0){
					
					$ses_data = [
					'id' => $userdata['id'],
					'firstname' => $userdata['firstname'],
					'lastname' => $userdata['lastname'],
					'email' => $userdata['email'],
					'isLoggedIn' => TRUE
					];
					
					$session->set($ses_data);
					$data = [ 'token' => ' ' ];
					$userModel->update($userdata['id'], $data);	
					return redirect()->to('/admin/profile');
				
				}
			else{
						$session->setFlashdata('msg', 'Password is incorrect.');
						return redirect()->to('/admin/');
				}
			
}
}
////////////////////// OTP Login Close here 


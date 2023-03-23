<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Signup extends Controller
{
    public function index()
    {
		helper(['form']);
		$data = [];
		return view('admin/register',$data);
    }
	
	 public function store()
	{
		// Helper Load
		helper(['form']);
		
		/// Rules For validation
		$rules = [
            'firstname'     => 'required|min_length[2]|max_length[50]',
			'lastname'      => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
		
		 /// Check Condition
		  if($this->validate($rules)){
			//  if all validation are validate then prepair the data in array to insert into database 
			
            $userModel = new UserModel();
            $data = [
                'firstname'     => $this->request->getVar('firstname'),
				'lastname'     => $this->request->getVar('lastname'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
			
            // insert data in to database 
			
			$userModel->save($data);
			// header redirect  for login page
            return redirect()->to('/admin');
        }
		else{
          // if validation is not validate then give messages error
		         $data['validation'] = $this->validator;
            echo view('/admin/register', $data);
        }
		
		
	}		
	
}

<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class ProfileController extends Controller
{
    public function index()
		{   
			$session = session();
			helper(['form']);
			$data['firstname']= $session->get('firstname');
			echo view('/admin/profile',$data);
			
		 }
	 
	 /////// View Profile Page 
	public function setting_profile()
		{  
		$userModel	= new UserModel();
		$session = session();
		helper(['form']);
		$user['id']= $session->get('id');
		$user_data = $userModel->where('id', $user['id'])->first();
		
		$data =   [	'id'=> $user_data['id'],
					'firstname'=> $user_data['firstname'],
					'lastname'=> $user_data['lastname'],
					'email'=> $user_data['email'],
					'phone'=> $user_data['phone']
					];
		echo view('/admin/setting',$data);
		}
		
		
    ///// Udpate profile Page		
		public function setting_update()
		{  
		$userModel	= new UserModel();
		$session = session();
		helper(['form']);
		$user['id']= $session->get('id');
		
		$data =   [	'firstname'=> $this->request->getVar('firstname'),
					'lastname'=> $this->request->getVar('lastname'),
					'email'=> $this->request->getVar('email'),
					'phone'=> $this->request->getVar('phone')
					];
		
		
		
		//echo '<pre>';print_r($data);exit;
		
		$userModel->update($user['id'], $data);
		return redirect()->to(site_url('/admin/setting/'));
		}
	 
	 
	 
}
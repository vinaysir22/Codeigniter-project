<?php
namespace App\Controllers;
use Config\Services;
use App\Models\UserModel;
use App\Models\BannerModel;
use App\Models\AboutModel;
use App\Models\InfoboxModel;
use App\Models\GalleryModel;
use App\Models\TestimonialsModel;
use App\Models\ChefteamModel;

//// Office Excel Library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/////// -----

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }
	
	
	 public function phone_login()
    {
        helper(['form']);
	    //Load Login page View 
        echo view('/admin/phone-login');
    } 


/// update otp Login Token
 public function update_otp()
    {
		$userModel = new UserModel();
		$getlink = service('uri');
		$otp = $getlink->getSegment(4);
		$phone = $getlink->getSegment(3);
		$userdata = $userModel->where('phone',$phone)->first();
		
		if(isset($userdata))
		{
		$data = [ 'token' => $otp ];
		$userModel->update($userdata['id'], $data);	
		echo 'valid';
		return true;
		}
		else
		{
			echo 'invalid';
		}
		
    } 
	
	//////////// LogOut page
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/admin/');
	}

	////////////////////////////forget password////////////////////////////////

	 public function forgot_password(){
     $data = [];
     return view("/admin/forgot_password_view",$data);
	}
	// Reset page
	 public function change_password(){
     $data = [];
     return view("/admin/reset_password_view",$data);
	}

	//////////////////////// RESET PASSWORD///////////////////////////////
	public function password_reset(){

		 helper(['string']);
		 $rules = [
		 'email' => 'required|min_length[4]|max_length[100]|valid_email'
		 ];

		 if($this->validate($rules)){

			$token = mt_rand(100000,999999);

			$userModel = new UserModel();

			$userdata = $userModel->where('email', $this->request->getVar('email'))->first();

			$data = ['email' => $this->request->getVar('email'),
		             'token' => $token,
					 ];
		$userModel->update($userdata['id'], $data);

						$to = $data['email'];
                        $subject = 'Reset Password Link';
                        $token_no = $token ;
                        $message = 'Hi '.$userdata['username'].'<br><br>'
                                . 'Your reset password request has been received. Please click'
                                . 'the below link to reset your password.<br><br>'
                                . '<a href="'. base_url().'/admin/reset_password/'.$token_no.'">Click here to Reset Password</a><br><br>'
                                . 'Thanks<br>DC INTERNATIONAL';
                        $email = \Config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('info@digitalcreativeinternational.com','DC INTERNATIONAL');
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        if($email->send())
                        {
                            session()->setTempdata('success','Reset password link sent to your registred email. Please verify with in 15mins',3);
                            return redirect()->to(site_url('/admin/forgot_password'));
                        }
                        else
                        {
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }

        return $this->response->redirect(site_url('/admin/reset_password'));

			}

	}
 /////////////////////// UPDATE PASSWORD///////////////////////////////

			 public function udpate_password(){

					 $rules = [
						 'email' => 'required|min_length[4]|max_length[100]|valid_email',
						 'token' => 'required|min_length[6]',
						 'password' => 'required|min_length[4]|max_length[50]',
						 'confirmpassword'  => 'matches[password]'
							];

					 if($this->validate($rules)){

						    $userModel = new UserModel();

							$email = $this->request->getVar('email');

							$token = $this->request->getVar('token');

							$password = $this->request->getVar('password');

							$userdata = $userModel->where('token',$token)->where('email',$email)->first();

						if(!empty($userdata)){
								$data = [
								'email' => $this->request->getVar('email'),
								'password' => password_hash($password, PASSWORD_DEFAULT),
								'token' => 'Null',
								];
								$userModel->update($userdata['id'], $data);
								return $this->response->redirect(site_url('/admin/'));
							}
							else{
								echo "NO Data Found";
							}

						return $this->response->redirect(site_url('/admin/'));
					 }
			 }


/////////////////////// ADMIN BANNER SECTION UPDATE ///////////////////////

			public function banner_load(){
					$bannerModel = new BannerModel();
					$banner = $bannerModel->where('id', 1)->first();
					$data=[
					'title'=> $banner['title'],
					'descrition'=> $banner['descrition'],
					'link'=> $banner['link'],
					'banner_photo'=> $banner['banner_photo']
					];
					return view("/admin/banner_section_view",$data);
			}

////////// UPDATE BANNER SECTION ////////////

			Public function banner_update()
			{
				$bannerModel = new BannerModel();
				$file = $this->request->getFile('file');
				if($file->isValid()){
				$img_name=$file->getRandomName();

				$data=[
					'title'	=> $this->request->getVar('title'),
					'descrition'=>  $this->request->getVar('description'),
					'link'	=> $this->request->getVar('link'),
					'banner_photo'=> $img_name,
					];
				
				$file->move('./public/uploaded_img',$img_name);

				$bannerModel->update(1, $data);
				return redirect()->to(site_url('/admin/banner_section'));
				}

			}

	//////////////ADMIN ABOUT US SECTION UPDATE START  ///////////////

	public function about_load(){
					$aboutModel = new AboutModel();
					$about = $aboutModel->where('id', 1)->first();
					$data=[
					'about_title'=> $about['about_title'],
					'phone'=> $about['phone'],
					'about_description'=> $about['about_description'],
					'youtube_link'=> $about['youtube_link'],
					'section_img'=> $about['section_img'],
					'video_thumb'=> $about['video_thumb'],
					];
					return view("/admin/about_section_view",$data);
	}

///////// UPDATE ABOUT SECTION//////////

	public function about_update(){
		 
		 $aboutModel = new AboutModel();

		 $file = $this->request->getFile('file');
		 $thumb = $this->request->getFile('thumb');

		 if($file->isValid()&& $thumb->isValid()){

			 $img_file = $file->getRandomName(); //665 x 766
		     $img_thumb = $thumb->getRandomName(); //403 x 302

			 $data=[
					'about_title'	=> $this->request->getVar('title'),
					'about_description'=>  $this->request->getVar('description'),
					'youtube_link'	=> $this->request->getVar('link'),
					'phone'=> $this->request->getVar('mobile'),
					'section_img'=> $img_file,
					'video_thumb'=> $img_thumb ,
					];

			 $file->move('./public/uploaded_img',$img_file);
			 $thumb->move('./public/uploaded_img',$img_thumb);
			 $aboutModel->update(1, $data);
			 return redirect()->to(site_url('/admin/about_section'));
		 }


	}
	//////////////ADMIN ABOUT US SECTION UPDATE CLOSE  ///////////////

		public function infobox_load(){

			$InfoboxModel = new InfoboxModel();
			
		//	$info['infodata'] = $InfoboxModel->findAll();
		
			$info['infodata'] = $InfoboxModel->paginate(3);
			
			$info['pager']=$InfoboxModel->pager;
			
			return view("/admin/infobox_section_view",$info);
			}
			
///// ADD INFOBOX DATA/////////




	public function infoBox_Add(){

			$InfoboxModel = new InfoboxModel();
			$data=[
					'infobox_title'	=> $this->request->getVar('title'),
					'infobox_description'=>  $this->request->getVar('description')
					];
			$InfoboxModel->save($data);
		 return redirect()->to(site_url('/admin/infobox_section'));
		}

/////// EDIT INFOBOX DATA/////////
		public function editInfobox(){
			$InfoboxModel = new InfoboxModel();
			$getlink = service('uri');
			$id = $getlink->getSegment(4);

			$records = $InfoboxModel->where('id',$id)->first();

			$data=[
			'id'=>  $records['id'],
			'title'=> $records['infobox_title'],
			'description'=> $records['infobox_description']
			];

		return view("/admin/infobox_section_edit",$data);
			}

 ////////// UPDATE INFOBOX DATA/////////

		public function updateinfoBox(){

			$getlink = service('uri');
			$id = $getlink->getSegment(3);

			$data=[
					'infobox_title'	=> $this->request->getVar('title'),
					'infobox_description'=>  $this->request->getVar('description')
					];

			$InfoboxModel = new InfoboxModel();

			$InfoboxModel->update($id,$data);

		 return redirect()->to(site_url('/admin/infobox_section'));
		}
//////// delete infobox

		public function deleteInfobox(){
			$getlink = service('uri');
			$id = $getlink->getSegment(4);
			$InfoboxModel = new InfoboxModel();
			$InfoboxModel->delete($id);
			return redirect()->to(site_url('/admin/infobox_section'));
		}


///////// Gallery Load

		public function gallery_load(){


			$GalleryModel = new GalleryModel();
			$gallery['images'] = $GalleryModel->findAll();

			return view("/admin/gallery_section_view",$gallery);
		}


///////// Upload multiple Files In Gallery

		public function gallery_upload(){

			$GalleryModel = new GalleryModel();

			if ($imagefile = $this->request->getFileMultiple('images')) {

			foreach ($this->request->getFileMultiple('images') as $img) {

			if ($img->isValid() && ! $img->hasMoved()) {

					$newName = $img->getRandomName();
					$img->move('./public/uploaded_gallery/', $newName);
					$data = [
					'gallery_img' =>  $newName,
					];
				 $save = $GalleryModel->insert($data);


			}
			}
			}

			return redirect()->to(site_url('/admin/gallery_section'));
		}

////////////////////////

		public function deleteimage(){
			$getlink = service('uri');
			$id = $getlink->getSegment(4);
			$GalleryModel = new GalleryModel();
			$gallery = $GalleryModel->where('id',$id)->first();

////// Delete images form file path
		if(file_exists('public/uploaded_gallery/'.$gallery['gallery_img'])){
				unlink('public/uploaded_gallery/'.$gallery['gallery_img']);
				}

			$GalleryModel->delete($id);
			return redirect()->to(site_url('/admin/gallery_section'));

		}

////////////////////////

		public function testimonials_load(){

			$TestimonialsModel = new TestimonialsModel();
			$testimonial['story'] = $TestimonialsModel->findAll();
			return view("/admin/testimonials_view",$testimonial);
		}

	public function testimonials_update(){
		
		
		 $TestimonialsModel = new TestimonialsModel();
		 
		 $file = $this->request->getFile('file');
		 
		 if($file->isValid()){

			 $img_file = $file->getRandomName(); //665 x 766
		    
			$data=[
					'testimonials_name'	=> $this->request->getVar('name'),
					'testimonials_designation'=>  $this->request->getVar('designation'),
					'testimonials_description'	=> $this->request->getVar('description'),
					'testimonials_rating'=> $this->request->getVar('rating'),
					'testimonials_photo'=> $img_file,
					];

			 $file->move('./public/testimonial_img',$img_file);
			 
			 $TestimonialsModel->save($data);
			 
			 return redirect()->to(site_url('/admin/testimonials'));
		 }else{
		 
		 echo ' File is not Valid';
		 }
	}

////////////////////////

public function chefteam_load(){
	$ChefteamModel = new ChefteamModel();
	$chefmember['members'] = $ChefteamModel->findAll();
	return view("/admin/chefteam_view",$chefmember);
}

public function Chef_Add(){

	 $ChefteamModel = new ChefteamModel();
	//$chefmember['member'] = $ChefteamModel->findAll();
	
	
		$file = $this->request->getFile('file');

		if($file->isValid()){

		$img_file = $file->getRandomName(); //665 x 766
	
	
	$data=[
		'chefteam_name'	=> $this->request->getVar('name'),
		'chefteam_designation'=>  $this->request->getVar('designation'),
		'chefteam_description'	=> $this->request->getVar('description'),
		'chefteam_photo'=> $img_file
	];

 $file->move('./public/uploaded_chef',$img_file);

 $ChefteamModel->save($data);
 return redirect()->to(site_url('/admin/team_section'));
}

}

/////////////// Excel Export Funtions ////////
public function infobox_export(){
	
	    $InfoboxModel = new InfoboxModel();
        $fileName = 'infoboxdata.xlsx';
        
        $spreadsheet = new Spreadsheet();
        
        $records = $InfoboxModel->findAll();
        
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Info Box Title');
        $sheet->setCellValue('C1', 'Infor Box Description');
        
        $rows = 2;
        foreach ($records as $val) {
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['infobox_title']);
            $sheet->setCellValue('C' . $rows, $val['infobox_description']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($fileName));
        
        flush();
        readfile($fileName);
        exit;
}

////////////// Excel Export Close -----------///////







}

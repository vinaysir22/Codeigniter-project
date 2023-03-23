<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class AboutModel extends Model{
	
    protected $table = 'about_sec';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
 
    protected $allowedFields = [
		'id', 
		'about_title',
		'about_description', 
		'youtube_link', 
		'phone', 
		'section_img', 
		'video_thumb'
    ];
}
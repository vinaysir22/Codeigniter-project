<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class BannerModel extends Model{
	
    protected $table = 'banner_sec';
    protected $allowedFields = [
		'id',
        'title',
		'description',
        'link',
        'banner_photo'
    ];
}
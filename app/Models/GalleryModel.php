<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class GalleryModel extends Model{
	
    protected $table = 'gallery_sec';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
 
    protected $allowedFields = [
		'id', 
		'gallery_img',
		'updload_date',
    ];
}
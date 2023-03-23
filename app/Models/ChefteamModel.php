<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ChefteamModel extends Model{
	
    protected $table = 'chefteam_sec';
    protected $allowedFields = [
		'id',
        'chefteam_name',
		'chefteam_designation',
        'chefteam_description',
        'chefteam_photo'
		];
		
}
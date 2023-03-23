<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class InfoboxModel extends Model{
	
    protected $table = 'infobox_sec';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
 
    protected $allowedFields = [
								'id', 
								'infobox_title',
								'infobox_description', 
								];
								
								
}
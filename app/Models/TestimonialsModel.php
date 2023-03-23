<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class TestimonialsModel extends Model{
	
    protected $table = 'testimonials';
    protected $allowedFields = [
		'id',
        'testimonials_name',
		'testimonials_designation',
        'testimonials_description',
        'testimonials_rating',
		'testimonials_photo'
		];
		
}
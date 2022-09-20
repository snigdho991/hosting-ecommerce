<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

	protected $fillable = [
		'title', 'featured', 'category_id', 'content', 'slug', 'user_id', 'admin_id', 'is_homepage',
	];

	/*public function getFeaturedAttribute($featured){
		return asset($featured);
	}*/

	protected $dates = ['deleted_at'];
    
	public function category(){
    	return $this->belongsTo('App\Models\BlogCategory');
    }

    //tags,posts === tag,post === post_tag (table)

    public function tags(){
    	return $this->belongsToMany('App\Models\BlogTag');
    }

    public function admin(){
    	return $this->belongsTo('App\Models\Admin');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
 
}

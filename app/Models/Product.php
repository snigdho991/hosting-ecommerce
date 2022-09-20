<?php
 
namespace App\Models;
 
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';
 
    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'slug', 'image', 'description', 'period', 'website', 'storage', 'bandwidth', 'ram', 'cpu', 'database', 'subdomains', 'addondomains', 'email', 'ftp', 'cronjobs', 'freedomain', 'freessl', 'freecdn',
        'price', 'special_price', 'status', 'featured',
    ];
 
    /**
     * @var array
     */
    protected $casts = [
        'period'  =>  'integer',
        'website'  =>  'integer',
        'storage'  =>  'integer',
        'bandwidth'  =>  'integer',
        'ram'  =>  'integer',
        'cpu'  =>  'integer',
        'database'  =>  'integer',
        'subdomains'  =>  'integer',
        'addondomains'  =>  'integer',
        'email'  =>  'integer',
        'ftp'  =>  'integer',
        'cronjobs'  =>  'integer',
        'freedomain'    =>  'boolean',
        'freessl'    =>  'boolean',
        'freecdn'    =>  'boolean',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];
 
     /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
 
 
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
}
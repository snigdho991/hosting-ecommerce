<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class StoreProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>  'required|max:255',
            'code'       =>  'required',
            'price'     =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'special_price'     =>  'regex:/^\d+(\.\d{1,2})?$/',
            'period'  =>  'required|numeric',
            'website'  =>  'required|numeric',
            'storage'  =>  'required|numeric',
            'bandwidth'  =>  'required|numeric',
            // 'ram'  =>  'required|numeric',
            // 'cpu'  =>  'required|numeric',
            // 'database'  =>  'required|numeric',
            // 'subdomains'  =>  'required|numeric',
            // 'addondomains'  =>  'required|numeric',
            // 'email'  =>  'required|numeric',
            // 'ftp'  =>  'required|numeric',
            // 'cronjobs'  =>  'required|numeric',
        ];
    }
}
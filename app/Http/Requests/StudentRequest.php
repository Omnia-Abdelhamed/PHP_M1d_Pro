<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function onUpdate(){
        return [
            'std_name'=>['required'],
            'email'=>['required','email'],
            'phone'=>['nullable','regex:/^(010|011|012|015)[0-9]{8}$/'],
            'dept_id'=>['integer'],
            'photo'=>'nullable|mimes:png,jpg'
        ];
    }
    protected function onCreate(){
        return [
            'code'=>['required','integer','unique:students,code'],
            'std_name'=>['required'],
            'email'=>['required','email'],
            'phone'=>['nullable','regex:/^(010|011|012|015)[0-9]{8}$/'],
            'dept_id'=>['integer'],
            'photo'=>'nullable|mimes:png,jpg'
        ];
    }
    public function rules()
    {
        if(request()->isMethod('put')){
            return $this->onUpdate();
        }else{
            return $this->onCreate();
        }
    }

    public function messages()
    {
        return [
            'code.required'=>'please enter student code',
            'code.integer'=>'please enter valid code',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'student name'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules(): array
    {
        if(request()->isMethod('post')) {
            return [
                'title' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'audio_file' => 'required|mimes:mp3,wav|max:20480',
            ];
        } else {
            return [
                'title' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'audio_file' => 'required|mimes:mp3,wav|max:20480',
            ];
        }
    }
    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'title.required' => 'Title is required!',
                'artist.required' => 'Artist is required!',
                'image.required' => 'Image is required!',
                'audio_file.required' => 'Audio file is required!',
            ];
        } else {
            return [
                'title.required' => 'Title is required!',
                'artist.required' => 'Artist is required!',
                'audio_file.required' => 'Audio file is required!',
            ];  
        }
    }
}

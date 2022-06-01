<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $results = Blog::orderBy('id')->paginate(10);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {
                $artilces .= '<div class="card mb-2"> <div class="card-body">' . $result->id . ' <h5 class="card-title">' . $result->post_name . '</h5> ' . $result->post_description . '</div></div>';
            }
            return $artilces;
        }
        return view('welcome');
    }
}

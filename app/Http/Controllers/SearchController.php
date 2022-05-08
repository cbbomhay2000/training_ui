<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('searchajax');
    }

    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Post::table('posts')
            ->where('name_post', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="data/'. $row->id .'">'.$row->name_product.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
}
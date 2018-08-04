<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Article;
use App\Group;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class apiController extends Controller
{
    



	public function apiIndex(){
		try{
		$result = Article::select('articles.id', 'articles.title', 'articles.group_id', 'groups.title as grouptitle','articles.text','articles.image_url','articles.ff')
			->where('articles.status',1)
		    ->join("groups",'groups.id','=','articles.group_id')
		    ->where('groups.status',1)
		    ->get();
		    $array = [];
		    if (count($result) < 1) {
		    	$array = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
		    }else{
				foreach($result as $data){
				  	$array[] = [
				     'id'=> $data->id,
				     'group'=> [
				     	'id' => $data->group_id,
				     	'title' => $data->grouptitle
				     ],
				     'title' => $data->title,
				     'text' => $data->text,
				     'image_url' => $data->image_url,
				     'cl' => 'white',
				     'status' => $data->ff
				     ];
				}

				
		    }
		    return response()->json($array);
		    }catch(ModelNotFoundException $err){
			$array = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
			return response()->json($array,400);
		}
	}

	public function apiStore($id){
		try{
			$result = Article::select('articles.id', 'articles.title', 'articles.group_id', 'groups.title as grouptitle','articles.text','articles.image_url','articles.ff')
			->where('articles.status',1)
			->where('articles.id',$id)
		    ->join("groups",'groups.id','=','articles.group_id')
		    ->where('groups.status',1)
		    ->firstOrFail();
		    $array = [];
		    if ($result == null) {
		    	$array[] = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
		    }else{
		    	$array[] = [
		     'id'=> $result->id,
		     'group'=> [
		     	'id' => $result->group_id,
		     	'title' => $result->grouptitle
		     ],
		     'title' => $result->title,
		     'text' => $result->text,
		     'image_url' => $result->image_url,
		     'cl' => 'white',
			 'status' => $data->ff
		     ];
			}

			return response()->json($array);
		}catch(ModelNotFoundException $err){
			$array = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
			return response()->json($array,400);
		}
	}

	public function apiStorebyGroup($id){
		try{
		$result = Article::select('articles.id', 'articles.title', 'articles.group_id', 'groups.title as grouptitle','articles.text','articles.image_url','articles.ff')
			->where('articles.status',1)
			->where('articles.group_id',$id)
		    ->join("groups",'groups.id','=','articles.group_id')
		    ->where('groups.status',1)
		    ->get();
		    $array = [];
		    if (count($result) < 1) {
		    	$array = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
		    }else{

				foreach($result as $data){
				  	$array[] = [
				     'id'=> $data->id,
				     'group'=> [
				     	'id' => $data->group_id,
				     	'title' => $data->grouptitle
				     ],
				     'title' => $data->title,
				     'text' => $data->text,
				     'image_url' => $data->image_url,
				     'cl' => 'white',
				     'status' => $data->ff
				     ];
				}

				
		    }
		    return response()->json($array);
		    }catch(ModelNotFoundException $err){
			$array = [
				'status' => 400,
                'message' => 'Makale Bulunamadı'
			];
			return response()->json($array,400);
		}
	}


	public function apiGroupIndex(){
		try{
			$categories = Group::select('id','title','description')->get();

			 $array = [];
		    if (count($categories) < 1) {
		    	$array[] = [
				'status' => 400,
                'message' => 'Kategori Bulunamadı'
			];
		    }else{
		    
				foreach($categories as $data){
				  	$array[] = [
				     'id'=> $data->id,
				     'title' => $data->title,
				     'text' => $data->description
				     ];
				}

				
			}

			return response()->json($array);
		}catch(ModelNotFoundException $err){
			$array = [
				'status' => 400,
                'message' => 'Kategori Bulunamadı'
			];
			return response()->json($array,400);
		}
	}

	public function apiGroupStore($id){
		try{
		$result = Group::select('id','title','description')->where('id',$id)->firstOrFail();
		    $array = [];
		    if ($result == null) {
		    	$array = [
				'status' => 400,
                'message' => 'Kategori Bulunamadı'
			];
		    }else{

				  	$array[] = [
				     'id'=> $result->id,
				     'title' => $result->title,
				     'text' => $result->description
				     ];
		    }
		    return response()->json($array);
		    }catch(ModelNotFoundException $err){
			$array = [
				'status' => 400,
                'message' => 'Kategori Bulunamadı'
			];
			return response()->json($array,400);
		}
	}
}

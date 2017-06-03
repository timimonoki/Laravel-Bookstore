<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
   
   public function goToBrowseTheBookshelf(){
   		return view('templates.bookshelf');
   }

   public function allBooks(){

   		$books = Book::all();

   		$json = array('iTotalRecords' => sizeof($books),
   					'iTotalDisplayRecords' => sizeof($books),
   					'sEcho' => 10,
   					'aaData' => array('title')

   					);

   		return $json;

    }



    public function allDeProbaBooks(){

    	$data = array('iTotalRecords' => 2 ,
   					'iTotalDisplayRecords' => 2,
   					'sEcho' => 10,
   					'aaData' => array(array('name' => 'Sitepoint', 'url' => 'https//sitepoint.com', 'editor' => array('name' =>'John','phone' =>'123456')),
   					array('name' => 'Sitepoint', 'url' => 'https//sitepoint.com', 'editor' => array('name' =>'John','phone' =>'123456'))));

   		return $data;


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Etudiant;
use App\Models\Copy;
use App\Models\Suggestion;
use App\Models\Reservation;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function uploadcat(Request $request){

        $data=new category;
        $data->id=$request->id;
        $data->description=$request->description;
        $data->label=$request->label;
        $data->save();
        return redirect()->back();

    }
    public function uploadbook(Request $request){
        $data=new book;

        $data->title=$request->title;
        $data->author=$request->author;
        $data->edition=$request->edition;
        $data->date_edition=$request->dateEdition;
        $data->ISBN=$request->ISBN;
        $data->id_categorie=$request->category;
        $data->description=$request->description;

        $data->book_image=file_get_contents($request->image);

        $data->save();
        for($i =0; $i < $request->copies; $i++){
            $copy = new copy;
            $copy->book_id = $data->id;
            $copy->save();
        }
        return redirect()->back();
    }
    public function uploadcopy(Request $request){
       $data=new copy;

        $data->id=$request->id;

        $data->book_id=$request->book;

        $data->save();
        return redirect()->back();
            }
    public function user(){
        $data=Etudiant::all();
        return view("admin.user",compact("data"));
    }

    public function addcat(){
        return view("admin.addcat");
    }
    public function addbook(){
        $data=Category::all();
        return view("admin.addbook",compact("data"));
    }
    public function addcopy(){
        $data=Book::all();
        return view("admin.addcopy",compact("data"));
    }

    public function showDetails($id){
        $data=Etudiant::find($id);
        return view("admin.userDetails", compact('data'));
    }

    public function deleteuser($id){
        $data=Etudiant::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function deletesuggestion($id){
        $data=Suggestion::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function category(){
        $data=Category::all();
        return  view("admin.category",compact("data"));
    }
    public function deletecategory($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function  book(){
        $data=Book::all()->load('category');
        return view("admin.book",compact("data"));
    }

    public function  reservation(){

        $data=Reservation::all();
        $data->load('copy');
        $data->load('etudiant');

        return view("admin.reservation",compact("data"));
    }

    public function validateresa($id){
        $data = Reservation::find($id)->load('copy');
        $data->update(['state'=>'validee']);
        return redirect()->back();
    }

    public function terminateresa($id){
        $data=Reservation::find($id);
        $data->update(['state'=>'retenue']);
        $data1=Copy::find($data['copy_id']);
        $data1->update(['state'=>'disponible']);
        return redirect()->back();
    }

    public function suggestion(){
        $data=Suggestion::all()->load('user');
        return view("admin.suggestion",compact("data"));
    }
    public function  copy(){
        $data=Copy::all()->load('book');
        return view("admin.copy",compact("data"));
    }

    public function  deletebook($id){
        $data=Book::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function dashboard(){
        $categories = Category::all();
        $etudiants = Etudiant::all();
        $books = Book::all();
        $copies = Copy::all();
        $suggestions = Suggestion::all();
        $reservations = Reservation::all();

        return view('admin.adminhome', compact('categories', 'etudiants', 'books', 'copies', 'suggestions', 'reservations'));
    }

}

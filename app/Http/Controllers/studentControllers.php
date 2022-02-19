<?php

namespace App\Http\Controllers;

use App\Models\Copie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Favorit;

class studentControllers extends Controller
{
    //


    function home() {
        $pageTitle = 'home';
        return view('student.welcome', compact('pageTitle'));
    }

    function books(){
        $pageTitle = 'Vitrine des livres';
        $etudiant=1;
        $i=0;
        $j=0;
        $nblikes = DB::table('favorits')
                    ->select('book_id',DB::raw("COUNT(*) as nb"))
                    ->groupBy('book_id');
        $data = DB::table('books')
                    ->leftJoinSub($nblikes, 'n', function ($join)
                    {
                        $join->on('n.book_id', '=', 'books.id');
                    })
                    ->get();
        $fav=DB::table('favorits')
                    ->select('book_id')
                    ->where('etudiant_id','=',$etudiant)
                    ->get();
        $copy = DB::table('copies')
                    ->where('state','=','disponible')
                    ->get();
        

        return view('student.books', compact('pageTitle','data','fav','i','j','copy'));
    }

    function about(){
        $pageTitle = 'A propos';
        return view('student.about', compact('pageTitle'));
    }

    function signin(){
        $pageTitle = "S'identifier";
        return view('student.signin', compact('pageTitle'));
    }

    function signup(){
        $pageTitle = 'Creer votre compte';
        return view('student.signup', compact('pageTitle'));
    }
    function team(){
        $pageTitle = 'Webmasters';
        return view('student.team', compact('pageTitle'));
    }
    function addBook(Request $request){
        //return Image::make($request->book_name);
        /* $upload=$request->book_image->store('public/uploads/');
        return ["result"=>$upload]; */
        $title = $request->title;
        $author = $request->author;
        $edition= $request->edition;
        $isbn=$request->ISBN;
        $id_categorie=$request->id_categorie;
        $date_edition=$request->date_edition;

        $file = $request->file('book_image');

        $content = $file->openFile()->fread($file->getSize());

        $image = $request->file( 'book_image' );
            $imageType = $image->getClientOriginalExtension();
            $imageStr = (string) Image::make( $image )->
                                     resize( 300, null, function ( $constraint ) {
                                         $constraint->aspectRatio();
                                     })->encode( $imageType );


        //return $content;
        DB::insert('insert into books (title, author, edition, date_edition, ISBN, book_image, id_categorie) values (?, ?, ?, ?, ?, ?, ?)', [$title, $author, $edition, $date_edition, $isbn, $file, $id_categorie]);

        return 'true';
    }
    /* Add this in postman with the key value _token */
    public function showToken() {
        echo csrf_token(); 
      }

    public function getProduct($id){
        $file = $this->fileRepo->find($id);

        $randomDir = md5(time() . $file->id . $file->user->id . str_random());

        mkdir(public_path() . '/files/' . $randomDir);

        $path = public_path() . '/files/' . $randomDir . '/' . $file->name;

        file_put_contents($path, base64_decode($file->data));

        header('Content-Description: File Transfer');

        return response()->download($path);
    }
    public function like($id){
        $etudiant=1;
        $data=NULL;
        $data=DB::table('favorits')
            ->where('etudiant_id','=',$etudiant)
            ->where('book_id','=',$id)
            ->get();
        if($data->isEmpty())
        {
            DB::insert('insert into favorits (etudiant_id,book_id) values (?, ?)', [$etudiant, $id]);
        }
        else
        {
            foreach($data as $b)
            {
                $fav=Favorit::find($b->id);
                $fav->delete();
            }
        }
        return redirect()->back();
    }
}

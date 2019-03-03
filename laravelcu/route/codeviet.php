// chỗ thầy sơn
Route::get('/', function () {
    return view('Hello World');
});
// chỉ định vào view
Route::get("/gioi-thieu.html",function (){
    //return "<b>Xin chào các bạn</b>";
    return view("gioi-thieu");
});

// route chỉ định vào action của controller
Route::get('/gioi-thieu-2', 'frontendwebphpson\IndexController@Gioithieu');


//
/*Route::get('/','Homecontrolleb17@showfunction');*/ // tên class @ tên phương thức,cái này ở b17 và nó
// muốn thay thế cho trang view wellcome đó

Route::get('/', function () {
    return view('welcome');
});

Route::get('home','Homecontrolleb17@viewfunction'); // cái này ở bài 21 nhé, tên class @ tên phương thức

Route::get('zed/{tham_so}', 'Homecontrolleb17@checkfunction'); // bài 19

Route::get('zed', function(){
    return "trang đầu tiên của best Zed"; // định tuyến tạo ra trang zed mới. http://localhost/sms/query/join bài 11
});

Route::get('zed/derection',array( 'as' => 'derection', function(){
    $url = URL::route('derection');
    return "bài 16 nó chuyển trang là : $url"; //$url là link của nó lúc đầu thôi b16
}));


/*Route::get('zed/{tham_so_dong}' ,function($tham_so_dong){
    return $tham_so_dong." truyền tham số vào nào anh em ";  // đặt tên giống như trong ngoặc nhọn,truyền tham số để thay đổi trang web bài 13
});*/

Route::get('zed/{Price}/{Art}' ,function($Price,$Art){  // bài 14
    return "biến 1 là : ".$Price. " Biến 2 là: ".$Art;
});

Route::get('where', function(){
    return Redirect::to('zed/derection'); // chuyển sang cái trang ở trên là chỗ b16
});

// bai 22 on tap lai, cai nay con truyen ca tham so
Route::get('profile/{name}','ProfileController@showprofile'); //tên class @ tên phương thức


/*// bai 29 insert
Route::get('/insert', function (){
     DB::insert("insert into posts (title,body,is_admin) values(?,?,?)",['PHP with laravel2','laravel is the best framework',9]);
     return "Xong";
});


Route::get('/select', function (){
     $result = DB::select("select * from posts where id > ?", [1]);

     // return $result;
    foreach ($result as $value){
         echo $value->title."<br>".$value->body;
     }
});

Route::get("update123", function (){
      $hihi = DB::update('update posts set title = "best Zed mortage" where id = ?', [3]);
      return $hihi;
});

// bai 33
Route::get("readall", function (){
     $post = posts::all();
     foreach ($post as $value){
         echo $value->title."--".$value->body."<br>";
     }
});*/

// đọc lần 2
Route::get('check/{name}','CheckController@hamcheck');

Route::get('/insert',function(){
   DB::insert("insert into posts(title,body,is_admin) values(?,?,?)",["day la title","day la body ma toi insert","123"]);
   return 'done';
});

Route::get('/read',function(){
   $select1 = DB::select("select * from posts where id = ?",[1]);
/*   return $select1."<br>";*/
   // hoặc như này
   foreach ($select1 as $value){
      echo $value->id;
      echo $value->title;
      echo $value->body;
   }
});

Route::get('/update',function(){
   $update1 = DB::update("update posts set title = 'lehung96', body = 'never give up' where id = ?",[2]);
   return $update1;
});

// bai 33
Route::get("readall", function (){
     $post = posts::all(); // gọi tới model post và lấy toàn bộ dữ liệu ra

     foreach ($post as $value){
         echo $value->title."--".$value->body."<br>";
     }
});

// bai 34
Route::get("findId", function(){
     $postid = posts::where("id",2) // lấy dữ liệu where id = 2
     ->orderBy('id','desc')
     ->take(1) // lấy ra 1 bản ghi
     ->get();
     // in dữ liệu ra
     foreach ($postid as $value){
         echo $value->title."--".$value->body."<br>";
     }
});

// bai 35 tìm kiếm nâng cao
Route::get("findNangcao", function(){
    $postnc = posts::where("id",">",0)
    ->where("body","never give up") // body = "never give up"
    ->where("title","like","%lehung%")
    ->orderBy('id','desc')
    ->get();
    foreach($postnc as $val){
        echo  $val->id."---".$val->title."---".$val->body."<br>";
    }
});

// bai 36 insert bang model
Route::get("insertmodel", function(){
    $insertmodel = new posts();
    $insertmodel->title = "teamnoi";
    $insertmodel->body = "Hung,Dao,Tuan,Long,Hoan,Hoang,Binh,Chuc";
    $insertmodel->is_admin = "999";
    $insertmodel->save();
});

Route::get("insertusers", function(){
   $insertmodelusers = new users();
   $insertmodelusers->name = "hung0310prook";
   $insertmodelusers->email = "hung031011spro@gmail.com";
   $insertmodelusers->password = "hung0310pro";
   $insertmodelusers->remember_token = "hunsalook";
   $insertmodelusers->save();
});

Route::get("updatemodel", function (){
   $updatemd = posts::where('id',1)->first();
   $updatemd->title = '12A6';
   $updatemd->body = '12A6 with love';
   $updatemd->save();

});
// xóa cách 1 theo model
Route::get("delete2", function (){
   posts::where('id','=',2)
   ->delete();
});

// xóa cách 2
Route::get('delete3', function (){
   posts::destroy(3); //or(2,3) bất kì cái id nào muốn xóa
});


// Toidicode
// sẽ chọn lôi ra dùng các cái hàm này
Route::resource('urlroute', 'tencontroller',['only' => ['index', 'create', 'show', 'edit']]);

// dùng tất cả các hàm trừ cái hàm except => create
/*Route::resource('tencontrollerindexhihi','tencontroller',['except' => ['index']]);

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', function (){
       return "Đây là nhóm 1";
    });

    Route::get('user/profile', function (){
       return "đây là nhóm 2";
    });
});*/

Route::get('thongtin/{tuoi}/{ten}', function ($tuoi,$ten){
    return "hello $ten, $tuoi tuổi";
})->where(['tuoi' => '[0-9]+', 'ten' => '[a-z]+']);

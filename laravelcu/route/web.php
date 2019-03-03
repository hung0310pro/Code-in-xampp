<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Task;
use Illuminate\Http\Request;

Route::get('/ok',function(){
	return ("Lê Mạnh Hùng");
});

Route::get('call_view_b22',function(){  // truyền biến sang trang view b22 phải dùng cái  compact(''); gọi nhiều biến cx đc
  $hoten = "Hùng đẹp zai";
  $ten_nv_lol = "Zed lôi kiếm";
  return view('b22',compact('hoten','ten_nv_lol'));
});

View::share('title_allview','Học lập trình laravel'); // chỉ cần echo cái biến $title_allview thì
// ở trang view nào thì sẽ lấy đc giá trị của nó.
// 
// nếu chỉ muốn share biến cho 1 vài trang cần truyền thì làm như sau
View::composer('b22',function($view){
  return $view->with('bien1',"Đây là biến 1");
});

// nếu truyền sang nhiều view thì làm như sau, cho mấy cái view vào trong 1 mảng
/*View::composer(['b22','b23'],function($view){
  return $view->with('bien1',"Đây là biến 1");
});*/

Route::get('viewskethua',function(){
  return view('views_kethua.viewcha');
});

Route::get('viewskethua_con',function(){
  return view('views_kethua.viewcon2');
});

Route::get('schema/create/bangcha1', function(){
	Schema::create('bangcha1',function($table){
		$table->increments('id');
		$table->string('name');
		$table->string('diachi');
		$table->timestamps();
	});
});

Route::get('schema/create/bangcon1', function(){
	Schema::create('bangcon1',function($table){
		$table->increments('id');
		$table->string('name');
		$table->integer('price');
		$table->string('diachi');
		$table->integer('bangcha1_id')->unsigned();
		$table->timestamps();
	});
});

Route::get('schema/create/bangtaothu', function(){
	Schema::create('bangtaothu1', function($table){
		$table->increments('id');
		$table->string('ten_nv');
		$table->string('tieusunv');
		$table->morphs('email');
		$table->timestamps();
	});
});

Route::get('query/select-all', function(){
	$data = DB::table('bangcha1')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_colum_name', function(){
	$data = DB::table('bangcha1')->select('name')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_where', function(){
	$data = DB::table('bangcha1')->where('id',1)->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_orwhere', function(){
	$data = DB::table('bangcha1')->where('id',1)->orwhere('id',3)->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_tanggiam', function(){
	$data = DB::table('bangcha1')->orderby('id','desc')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_wherelon', function(){
	$data = DB::table('bangcha1')->where('id','>','1')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_limit', function(){
	$data = DB::table('bangcha1')->skip(1)->take(1)->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_between', function(){  // ngoài ra có notbetween
	$data = DB::table('bangcha1')->wherebetween('id',[1,2])->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/select_in', function(){ 
	$data = DB::table('bangcha1')->wherein('id',[1,2,3])->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/count', function(){
	$data = DB::table('bangcha1')->count();
	echo "số dòng là : ".$data;
});

Route::get('query/max', function(){
	$data = DB::table('bangcha1')->max('id');
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/sum', function(){
	$data = DB::table('bangcha1')->sum('id');
	echo "Tổng là : ".$data;
});

Route::get('query/trungbinh', function(){
	$data = DB::table('bangcha1')->avg('id');
	echo "Tổng trung bình là : ".(int)$data;
});

Route::get('query/join', function(){
	$data = DB::table('bangcha1')->leftjoin('bangcon1','bangcon1.bangcha1_id','=','bangcha1.id')->get();
	//$data = DB::table('bangcha1')->select('name','price','diachi')->join('bangcon1','bangcon1.bangcha1_id','=','bangcha1.id')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/insert_1_record', function(){
	$data = DB::table('bangcha1')->insert([
		"name" => "Lê Mạnh Hùng",
		"diachi" => "Hà Nội",
	]);
});

Route::get('query/insert_nhieu_record', function(){
	$data = DB::table('bangcha1')->insert([
		["name" => "Lê Hùng","diachi" => "Cầu Diễn"],
		["name" => "Văn Tuấn", "diachi" => "Hà Đông"],
	]);
});

// lấy id insert mới nhất lastinsert id ấy
Route::get('query/getid_new', function(){
	$id_new = DB::table('bangcha1')->insertGetId([
		"name" => "Lê Mạnh Hùng123",
		"diachi" => "Hà Nội",
	]);

	echo $id_new;
});

Route::get("query/update_bangcha", function(){
	 DB::table('bangcha1')->where('id',3)->update(['name' => 'Lê Hùng 96','diachi' => 'Việt Nam']);
});


// đoạn model
Route::get('query/model', function(){
	$data = App\newmodel::all()->toArray(); // cái anyf là file newmodel trong app (trong file này
//có gọi tới bảng bangmodeltest)
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/model_record_tim', function(){
	$data = App\newmodel::find(2)->toArray();   // lấy ra dòng có id bằng 2(chỉ tìm đc id)
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

// lấy 2 phần tử
Route::get('query/modelselect_take', function(){
	$data = App\newmodel::select('diachi')->where('password','123')->take(2)->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/model_count', function(){
	$data = App\newmodel::all()->count();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/model_whereRaw', function(){
	$data = App\newmodel::whereRaw('name = ? and password = ?',['hung','123'])->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/allmodelcar',function(){
	$data = App\car::all()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/allmodelcolor',function(){
	$data = App\color::all()->tojSon();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/allmodelcarwhere',function(){
	$data = App\car::where("loaixe","mui tran")->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/allmodelcar_insert',function(){
	$data = new App\car;
	$data->loaixe = "xe dep";	
	$data->hangxe = "Yamaha";
	$data->save();
});

Route::get('query/allmodelcar_insertmany',function(){
	$data = array(
		'loaixe' => 'xemoi1','hangxe' => 'hangmoi1'
	);
	App\car::create($data);
});

Route::get('query/allmodelcar_update',function(){
	$data = App\car::find(1);
	$data->loaixe = "xe moi update";
	$data->save();
});

Route::get('eloquent/one_many', function(){
	//$data = App\car::find(1)->bang_color()->get()->toJson();
	$data = App\car::find(1)->bang_color()->get()->toJson();
	print_r($data);  // bang_color hàm này từ bảng car.php
	// lấy màu của car có id là 1 trong bảng colorr thì điền 1 trong cái find()
});

Route::get('eloquent/many_one', function(){
	$data = App\colorr::find(4)->bang_car()->get()->toArray();
	echo "<pre>";
	print_r($data); // bang_car hàm này từ bảng colorr.php
	echo "</pre>";
});

Route::get('eloquent/many_manyfromcar', function(){
	$data = App\car::find(1)->car_colormany()/*->select('car_id','color_id')*/->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";  // car_colormany hàm này từ model car.php
});

Route::get('eloquent/many_manyfromcolor', function(){
	$data = App\color::find(1)->color_carmany()->get()->toArray();
	echo "<pre>";
	print_r($data);  // color_carmany hàm này model color.php
	echo "</pre>";
});


// form
Route::get('form/xemform', function(){
	return view('form.viewform');
});

Route::post('form/dang_ky_gv',['as' => 'post_dang_ky','uses' => 'GiaovienController@themgiaovien']);


/*Route::get('zed/derection',array( 'as' => 'derection', function(){
    $url = URL::route('derection');
    return "bài 16 nó chuyển trang là : $url"; //$url là link của nó lúc đầu thôi b16
}));
*/














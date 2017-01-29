<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
// use Validator;
// use App\Http\Requests;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use URL;
use Input;
use Auth;
use App\Categories;
use Validator;
use Redirect;
use App\Posts;
class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";

        $yql_query = 'select * from weather.forecast where woeid =   1915035';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json&u=c";

    // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);
    // Convert JSON to PHP object
        $phpObj =  json_decode($json);
        // dd($phpObj->query->results->channel);
        return view('website_views.index',['weather_data'=>$phpObj]);
    }
    public function about()
    { 
        return view('website_views.about');
    }
    public function contact()
    { 
        return view('website_views.contact');
    }
















    public function chooseDashboard()
    { 
        $user_type = Auth::user()->user_type; 
        $user_id = Auth::user()->id; 
        $user_location = Auth::user()->thana_id; 
        if ($user_type==1) { 
            return view('layouts.farmers_homepage',['user_id'=>$user_id]);
        }else{
            return view('layouts.dealers_homepage',['user_location'=>$user_location]);
        }
        // return view('layouts.agri_homepage');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllVisitorForThisDateRange(Request $request){ 
     $from=date('Y-m-d',strtotime($request->input('from')));
     $to=date('Y-m-d',strtotime($request->input('to'))); 
     $tempdata=DB::select("
        SELECT a.name,a.phone,DATE(a.arrival_time) as arrival_time,DATE(a.exit_time) exit_time,a.photo,
        CONCAT('Name :',b.resident_name,' Flat: ',b.flat,'Floor: ',b.floor) as resident_name
        from visitor a 
        JOIN residence_record b ON a.residence_record_id=b.id AND 
        ( DATE(a.arrival_time) BETWEEN '$from' AND '$to' )
        ");  
     return response()->json($tempdata);
 }

 public function showLogForThisResident(){
    return view('layouts.guestagainstresident');
}
public function getAllHostNames(Request $request){
        // dd($request->term);
    $searchTerm=$request->term;
    $tempdata=DB::select("SELECT CONCAT(resident_name,',Flat No:',flat,',Floor:',floor,',Building:',building,',pin:',id) as name FROM residence_record 
       WHERE resident_name LIKE '%$searchTerm%' ORDER BY resident_name ASC");
    $data=[];
    if (!empty($tempdata)) {
        foreach ($tempdata as $row) {
            array_push($data,$row->name);
        }
    }
    // dd($data);
    return response()->json($data);
}
public function getRecordsAgainstThisUser(Request $request){
    $arr = explode(',', $request->userinput);
    $data=[];
    if (count($arr)>3) { 
        $whatIWant = substr($arr[4],strpos($arr[4], ":",0)+1,strlen($arr[4]));
        // dd((int)$whatIWant);
        $data=DB::select("
            SELECT a.resident_name,a.contact as residents_contact,a.floor,a.flat,a.building,
            b.name,b.phone,b.arrival_time,b.exit_time,b.photo
            FROM residence_record a JOIN visitor b ON a.id=b.residence_record_id
            WHERE a.id=$whatIWant
            ");
    }
    return response()->json($data);
}

public function getAllThana(Request $request){
    // dd($request->all());
    $term=$request->term;
    $term=$term['term'];
    $search=DB::select("SELECT id,name as 'text' from thana where name LIke '%$term%';");
    // dd($search);
    return json_encode($search);
}

public function getAllCategories(Request $request){ 
    $term=$request->term;
    $term=$term['term'];
    $search=DB::select("SELECT id,name as 'text' from categories where name LIke '%$term%';"); 
    return json_encode($search);
}

public function getFarmerAdd()
{ 
    $category=new Categories;
    $units=DB::select("select id,name from units");
    return view('layouts.farmer_add',['category'=>$category,'units'=>$units]);
}

public function postAdd(Request $request){ 
    $validator = Validator::make($request->all(), [
        'product_category' => 'required',
        'name' => 'required', 
        'product_description' => 'required',
        'product_quantity' => 'required|numeric',
        'product_price' => 'required|numeric',
        'product_unit' => 'required',
        'expiry_date'=>'required',
        'image_file'=>'image| max:2000'
        // 'image_file'=>'image| mimes:jpeg,jpg,png | max:2000'

        ]);

    if ($validator->fails()) {
        return Redirect::back()
        ->withErrors($validator)
        ->withInput();
    }

    // dd($request->all());
    $post=new Posts;
    $post->name=(string)Input::get('name');
    $post->quantity=floatval(Input::get('product_quantity'));
    $post->price=floatval(Input::get('product_price'));
    $post->type=1;

    if(isset($request->product_description)){
        $post->description=(string)Input::get('product_description');
    }

    $post->expiry_date=(string)date('Y-m-d', strtotime(Input::get('expiry_date')));
    if (isset ($request->image_file) && Input::file('image_file')->isValid())
    {   
        $extension = Input::file('image_file')->getClientOriginalExtension();
        $uniq_id=uniqid('img_').'.'.$extension;
        $post->photo=(string)$uniq_id;
        $pic= Input::file('image_file'); 
        if (!$pic->move("uploads", $uniq_id)) { 
            return Redirect::back()
            ->withInput()
            ->withErrors(['could not upload image']); 
        }
        $post->status=1;
        $post->is_delete=0;
        $post->categories_id=intval(Input::get('product_category'));
        $post->units_id=intval(Input::get('product_unit'));
        $post->users_id=Auth::user()->id;
        
        if($post->save()){
            return Redirect::back();
        }else{
            return Redirect::back()
            ->withInput();
        }
    }else{
        $post->status=1;
        $post->is_delete=0;
        $post->categories_id=intval(Input::get('product_category'));
        $post->units_id=intval(Input::get('product_unit'));
        $post->users_id=Auth::user()->id;
        
        if($post->save()){
            // return Redirect::back();
         return Redirect::back()->with('status', 'Addvertisement Saved');
     }else{
        return Redirect::back()
        ->withInput();
    }
} 
}
public function getRequestGoods(Request $request){
    $category=new Categories;
    $units=DB::select("select id,name from units");
    return view('layouts.farmer_request_goods',['category'=>$category,'units'=>$units]);
}



public function postRequestGoods(Request $request){
    $validator = Validator::make($request->all(), [
        'product_category' => 'required',
        'name' => 'required', 
        'product_description' => 'required',
        'product_quantity' => 'required|numeric',
        'product_unit' => 'required',
        'expiry_date'=>'required',
        'image_file'=>'image| max:2000' 
        ]);

    if ($validator->fails()) {
        return Redirect::back()
        ->withErrors($validator)
        ->withInput();
    }
    // dd($request->all());
    $post=new Posts;
    $post->name=(string)Input::get('name');
    $post->quantity=floatval(Input::get('product_quantity'));
    $post->price=-1;
    $post->type=2;

    if(isset($request->product_description)){
        $post->description=(string)Input::get('product_description');
    }

    $post->expiry_date=(string)date('Y-m-d', strtotime(Input::get('expiry_date')));
    if (isset ($request->image_file) && Input::file('image_file')->isValid())
    {   
        $extension = Input::file('image_file')->getClientOriginalExtension();
        $uniq_id=uniqid('img_').'.'.$extension;
        $post->photo=(string)$uniq_id;
        $pic= Input::file('image_file'); 
        if (!$pic->move("uploads", $uniq_id)) { 
            return Redirect::back()
            ->withInput()
            ->withErrors(['could not upload image']); 
        }
        $post->status=1;
        $post->is_delete=0;
        $post->categories_id=intval(Input::get('product_category'));
        $post->units_id=intval(Input::get('product_unit'));
        $post->users_id=Auth::user()->id;
        
        if($post->save()){
            return Redirect::back();
        }else{
            return Redirect::back()
            ->withInput();
        }
    }else{
        $post->status=1;
        $post->is_delete=0;
        $post->categories_id=intval(Input::get('product_category'));
        $post->units_id=intval(Input::get('product_unit'));
        $post->users_id=Auth::user()->id;
        
        if($post->save()){
            // return Redirect::back();
            return Redirect::back()->with('status', 'Request Saved');
        }else{

            return Redirect::back()
            ->withInput();
        }
    }
}


public function getHistory(Request $request){ 
    $id=intval($request->user_id);
    $data=DB::select("
        SELECT 
        a.id,DATE(a.created_at) as post_date,a.name,a.description,CONCAT(a.quantity,'',c.name) as quantity,a.type,CONCAT(a.price,' tk') as price,b.name as category,a.status 
        from posts a 
        JOIN categories b on a.categories_id=b.id
        JOIN units c ON a.units_id=c.id
        WHERE a.users_id=$id AND a.is_delete=0 ORDER by a.created_at desc
        "); 
    return $data;
}
public function getDealerHistory(Request $request){ 
    $thana_id=intval($request->user_location);

    $data=DB::select("
        SELECT 
        a.id,DATE(a.created_at) as post_date,a.name,a.description,CONCAT(a.quantity,'',c.name) as quantity,a.type,CONCAT(a.price,' tk') as price,b.name as category,a.status ,d.phone_no,d.address
        from posts a 
        JOIN categories b on a.categories_id=b.id
        JOIN units c ON a.units_id=c.id
        JOIN users d ON a.users_id=d.id AND d.thana_id=$thana_id
        WHERE a.is_delete=0 AND a.type=2 ORDER by a.created_at desc
        "); 
    return $data;
}
public function deletePost($id){
    $id=intval($id); 
    DB::update("update posts set is_delete=1 WHERE id=$id");
    return Redirect::back()->with('status', 'Post Deleted');
}
public function soldPost($id){
    $id=intval($id); 
    DB::update("update posts set status=3 WHERE id=$id");
    return Redirect::back()->with('status', 'Post Status Changed');
}
public function ProcessPost($id){
    $id=intval($id); 
    DB::update("update posts set status=2 WHERE id=$id");
    return Redirect::back()->with('status', 'Post Status Updated');
}
public function CancelPost($id){
    $id=intval($id); 
    DB::update("update posts set status=1 WHERE id=$id");
    return Redirect::back()->with('status', 'Processing Cancelled');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
// use Validator;
// use App\Http\Requests;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
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
        return view('layouts.homepage');
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
}

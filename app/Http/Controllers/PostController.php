<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Log;
use DB;
//use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return Post::create($request->all());

        //return Post::all();

        return view('post', [
            'title' => 'List all my posts',
            'posts' => Post::all(),

        ]);
    }

    public function checkList(Request $request){
        $destinationPath = public_path().'/uploadPic/';
        $filename = $request->file('photo')->getClientOriginalName();
        $filetype = $request->file('photo')->getMimeType();
        //$unique_name = md5($filename.'.png');
        $unique_name = 'file.png';
        $request->file('photo')->move($destinationPath, $unique_name);


        $requirement = $request->input('requirement');
        #$requirement = implode(',', $request->input('requirement'));

        /*回傳需求相對應的科技＿豪華版*/
        if ($request->submit == '豪華版') {
            $gateway = DB::table('technology')->whereIn('idtechnology', [1001])->get();
            $resultNumber = '100';

            if (in_array("see", $requirement)) {
            $see = DB::table('technology')->whereIn('idtechnology', [1302, 1401, 1504, 1505])->get();
            }else{
                $see = null;
            }
            if (in_array("listen", $requirement)) {
                $listen = DB::table('technology')->whereIn('idtechnology', [1301])->get();
            }else{
                $listen = null;
            }
            if (in_array("muscle", $requirement)) {
                $muscle = DB::table('technology')->whereIn('idtechnology', [1103, 1401])->get();
            }else{
                $muscle = null;
            }
            if (in_array("balance", $requirement)) {
                $balance = DB::table('technology')->whereIn('idtechnology', [1301])->get();
            }else{
                $balance = null;
            }
            if (in_array("memory", $requirement)) {
                $memory = DB::table('technology')->whereIn('idtechnology', [1201, 1202, 1203, 1205, 1301, 1303, 1401])->get();
            }else{
                $memory = null;
            }
            if (in_array("sleep", $requirement)) {
                $sleep = DB::table('technology')->whereIn('idtechnology', [1201, 1202, 1203, 1204, 1205, 1501, 1502, 1503, 1504, 1505])->get();
            }else{
                $sleep = null;
            }
            if (in_array("accident", $requirement)) {
                $accident = DB::table('technology')->whereIn('idtechnology', [1102, 1103, 1201, 1202, 1203, 1204, 1205, 1301, 1302, 1303, 1501, 1505])->get();
            }else{
                $accident = null;
            }
            if (in_array("health", $requirement)) {
                $health = DB::table('technology')->whereIn('idtechnology', [1101, 1201, 1202, 1203, 1204, 1205, 1502, 1503, 1601])->get();
            }else{
                $health = null;
            }
            if (in_array("psy", $requirement)) {
                $psy = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $psy = null;
            }
            if (in_array("caregiver_accident", $requirement)) {
                $caregiver_accident = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_accident = null;
            }
            if (in_array("caregiver_help", $requirement)) {
                $caregiver_help = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_help = null;
            }
            if (in_array("caregiver_psy", $requirement)) {
                $caregiver_psy = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_psy = null;
            }

        /*回傳需求相對應的科技＿標準版*/
        }else if ($request->submit == '標準版') {
            $gateway = DB::table('technology')->whereIn('idtechnology', [1001])->get();
            $resultNumber = '50';

            if (in_array("see", $requirement)) {
            $see = DB::table('technology')->whereIn('idtechnology', [1302, 1401, 1504, 1505])->get();
            }else{
                $see = null;
            }
            if (in_array("listen", $requirement)) {
                $listen = DB::table('technology')->whereIn('idtechnology', [1301])->get();
            }else{
                $listen = null;
            }
            if (in_array("muscle", $requirement)) {
                $muscle = DB::table('technology')->whereIn('idtechnology', [1103, 1401])->get();
            }else{
                $muscle = null;
            }
            if (in_array("balance", $requirement)) {
                $balance = DB::table('technology')->whereIn('idtechnology', [1301])->get();
            }else{
                $balance = null;
            }
            if (in_array("memory", $requirement)) {
                $memory = DB::table('technology')->whereIn('idtechnology', [1201, 1202, 1203, 1205, 1301, 1303, 1401])->get();
            }else{
                $memory = null;
            }
            if (in_array("sleep", $requirement)) {
                $sleep = DB::table('technology')->whereIn('idtechnology', [1201, 1202, 1203, 1204, 1205, 1501, 1502, 1503, 1504, 1505])->get();
            }else{
                $sleep = null;
            }
            if (in_array("accident", $requirement)) {
                $accident = DB::table('technology')->whereIn('idtechnology', [1102, 1103, 1201, 1202, 1203, 1204, 1205, 1301, 1302, 1303, 1501, 1505])->get();
            }else{
                $accident = null;
            }
            if (in_array("health", $requirement)) {
                $health = DB::table('technology')->whereIn('idtechnology', [1101, 1201, 1202, 1203, 1204, 1205, 1502, 1503, 1601])->get();
            }else{
                $health = null;
            }
            if (in_array("psy", $requirement)) {
                $psy = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $psy = null;
            }
            if (in_array("caregiver_accident", $requirement)) {
                $caregiver_accident = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_accident = null;
            }
            if (in_array("caregiver_help", $requirement)) {
                $caregiver_help = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_help = null;
            }
            if (in_array("caregiver_psy", $requirement)) {
                $caregiver_psy = DB::table('technology')->whereIn('idtechnology', [1501, 1502, 1503, 1602])->get();
            }else{
                $caregiver_psy = null;
            }
        }
        



        return view('post', [
            'title' => 'List all my posts',
            'resultNumber' => $resultNumber,
            'gateway' => $gateway,
            'see' => $see,            
            'listen' => $listen,
            'muscle' => $muscle,
            'balance' => $balance,
            'memory' => $memory,
            'sleep' => $sleep,
            'accident' => $accident,
            'health' => $health,
            'psy' => $psy,
            'caregiver_accident' => $caregiver_accident,
            'caregiver_help' => $caregiver_help,
            'caregiver_psy' => $caregiver_psy,

        ]);

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return Post::findOrFail($id);
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
}

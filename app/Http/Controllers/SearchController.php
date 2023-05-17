<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
public function index()
{


   $detailsuser = DB::table('userdetails') ->select( 'userdetails.id', 'userdetails.name', 
   'designations.name as designation_name', 'departments.name as department_name', 
   'userdetails.phone_number') ->leftJoin(
   'designations', 'userdetails.designation_id', '=', 'designations.id') ->leftJoin(
   'departments', 'userdetails.department_id', '=', 'departments.id')
   ->get();

//return view('search');

return view('search', compact('detailsuser'));


}
public function search(Request $request)
{
    //dd('hh');

if($request->ajax())
{
   
$output="";
//$products=DB::table('departments')->where('name','LIKE','%'.$request->search."%")->get();


// $products = DB::table('userdetails') ->select( 'userdetails.id', 'userdetails.name', 
//    'departments.name as department_name', 'designations.name as designation_name') ->leftJoin(
//       'departments', 'userdetails.department_id', '=', 'departments.id') ->leftJoin('designations', 'userdetails.designation_id', '=', 'designations.id') ->where('userdetails.name','LIKE','%'.$request->search."%")->get();


   $products = DB::table('userdetails') ->select( 'userdetails.id', 'userdetails.name', 
   'designations.name as designation_name', 'departments.name as department_name', 
   'userdetails.phone_number') ->leftJoin(
   'designations', 'userdetails.designation_id', '=', 'designations.id') ->leftJoin(
   'departments', 'userdetails.department_id', '=', 'departments.id') 
   ->where('userdetails.name','LIKE','%'.$request->search."%")
   ->orwhere('designations.name','LIKE','%'.$request->search."%")
   ->orwhere('departments.name','LIKE','%'.$request->search."%")
   ->get();



//dd($products);
if($products)
{
foreach ($products as $key => $product) {
$output.=
'<h3>'.$product->name.'</h3>'.
'<h4>'.$product->designation_name.'</h4>'.
'<h4>'.$product->department_name.'</h4>';
}
return Response($output);
   }
   }
}
}
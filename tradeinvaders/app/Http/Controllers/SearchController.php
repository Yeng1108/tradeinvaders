<?php

namespace App\Http\Controllers;

use App\User;
use App\Vehicles;
use App\Customer;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    function index()
    {
     return view('appraiser.tradein');
    }

function action(Request $request)
{

  $output = '';
  $query = $request->get('query');
  if($query != '')
  {
    $data = Customer::where('CustomerName', 'LIKE', "%$query%")
                        ->orWhere('Contact', 'LIKE', "%$query%")
                        ->orWhere('birthday', 'LIKE', "%$query%")
                        ->get();
     
  }
  else
  {
  
      $data = Customer::orderBy('created_at', 'DESC')->get();
    //   $data = DB::table('users')->orderBy('id', 'desc')->get();
  }
  $total_row = $data->count();
  if($total_row > 0)
  {
   foreach($data as $row)
   {
    $output .= '
    <tr>
    <td><a href="'.url('/appraiser/'.$row->id.'/assignvehicle').'"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a> &nbsp; ('.$row->vehicles()->count().')</td>
    <td>'.$row->CustomerName.'</td>
    <td>'.$row->Contact.'</td>
    <td>'.$row->birthday.'</td>
    <td>
    <div class="d-flex flex-row">
    <a href="'.url('/appraiser/customer/'.$row->id.'/vehicle/view').'"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
    <a href="'.url('/admin/edit').'"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
    <a href="'.url('/admin/delete').'"  onclick="return confirm(\'Are you sure you want to delete this user?\');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
    </div>
    </td>
   
    ';
   }
  }
  else
  {
   $output = '
   <tr>
    <td align="center" colspan="5">No Data Found</td>
   </tr>
   ';
  }
  $data = array(
   'table_data'  => $output,
   'total_data'  => $total_row
  );

  echo json_encode($data);

}
}

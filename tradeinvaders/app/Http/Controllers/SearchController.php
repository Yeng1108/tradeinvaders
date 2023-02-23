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
    //for admin future ref
    // $data = Customer::where('CustomerName', 'LIKE', "%$query%")
    //                     ->orWhere('Contact', 'LIKE', "%$query%")
    //                     ->orWhere('birthday', 'LIKE', "%$query%")
    //                     ->get();
                        $data = Customer::whereHas('user', function ($query) {
                          $query->where('id', auth()->id());
                        })->where(function($q) use ($query) {
                            $q->where('CustomerName', 'LIKE', "%$query%")
                                ->orWhere('Contact', 'LIKE', "%$query%")
                                ->orWhere('birthday', 'LIKE', "%$query%");
                        })->orderBy('created_at', 'DESC')->get();

                        //for OG dealers future ref
                        // $data = Customer::whereHas('user', function ($query) {
                        //   $query->where('id', auth()->id())->orWhere('Dealer', 'TNE');
                        // })
                        // ->where(function($q) use ($query) {
                        //     $q->where('CustomerName', 'LIKE', "%$query%")
                        //         ->orWhere('Contact', 'LIKE', "%$query%")
                        //         ->orWhere('birthday', 'LIKE', "%$query%");
                        // })
                        // ->orderBy('created_at', 'DESC')
                        // ->get();
  }
  else
  {
  
      // $data = Customer::orderBy('created_at', 'DESC')->get();
      $data = Customer::whereHas('user', function ($query) {
        $query->where('id', auth()->id());
      })->orderBy('created_at', 'DESC')->get();
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
    </tr>
   
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

//   $output = '';
// $query = $request->get('query');

// if ($query != '') {
//     $data = Customer::whereHas('user', function ($query) {
//             $query->where('id', auth()->id());
//         })
//         ->where(function($q) use ($query) {
//             $q->where('CustomerName', 'LIKE', "%$query%")
//                 ->orWhere('Contact', 'LIKE', "%$query%")
//                 ->orWhere('birthday', 'LIKE', "%$query%");
//         })
//         ->orderBy('created_at', 'DESC')
//         ->paginate(5);
// } else {
//     $data = Customer::whereHas('user', function ($query) {
//             $query->where('id', auth()->id());
//         })
//         ->orderBy('created_at', 'DESC')
//         ->paginate(5);
// }

// if ($data->count() > 0) {
//     foreach ($data as $row) {
//         $output .= '
//         <tr>
//             <td><a href="'.url('/appraiser/'.$row->id.'/assignvehicle').'"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a> &nbsp; ('.$row->vehicles()->count().')</td>
//             <td>'.$row->CustomerName.'</td>
//             <td>'.$row->Contact.'</td>
//             <td>'.$row->birthday.'</td>
//             <td>
//                 <div class="d-flex flex-row">
//                     <a href="'.url('/appraiser/customer/'.$row->id.'/vehicle/view').'"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
//                     <a href="'.url('/admin/edit').'"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
//                     <a href="'.url('/admin/delete').'"  onclick="return confirm(\'Are you sure you want to delete this user?\');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
//                 </div>
//             </td>
//         </tr>';
//     }
// } else {
//     $output = '<tr>
//                 <td align="center" colspan="5">No Data Found</td>
//             </tr>';
// }

// $data = array(
//     'table_data'  => $output,
//     'total_data'  => $data->total(),
// );

// return response()->json($data);

}

function tradeinprocess(Request $request)
{

  $output = '';
  $query = $request->get('query');
  if($query != '')
  {
    $data = Customer::whereHas('user', function ($query) {
      $query->where('id', auth()->id());
    })
    ->where(function($q) use ($query) {
        $q->where('CustomerName', 'LIKE', "%$query%")
          ->orWhere('Contact', 'LIKE', "%$query%")
          ->orWhere('birthday', 'LIKE', "%$query%")
          ->orWhereHas('vehicles', function($q) use ($query) {
              $q->where('plateno', 'LIKE', "%$query%")
                ->orWhereHas('VehicleStatus', function($q) use ($query) {
                    $q->where('status', 'LIKE', "%$query%");
                });
          });
    })
    ->whereHas('vehicles.VehicleStatus')
    ->orderBy('created_at', 'DESC')
    ->paginate(3);
  }
  else
  {
  
      // $data = Customer::orderBy('created_at', 'DESC')->get();
      $data = Customer::whereHas('user', function ($query) {
        $query->where('id', auth()->id());
      })->orderBy('created_at', 'DESC')->paginate(3);
    //   $data = DB::table('users')->orderBy('id', 'desc')->get();
  }
  $total_row = $data->count();
  if($total_row > 0)
  {
   foreach($data as $row)
   {

    $vehicle = $row->vehicles()->first();
    $plateno = $vehicle ? $vehicle->plateno : '';
    $yearmodel = $vehicle ? $vehicle->yearmodel : '';
    $output .= '
      <tr>
        <td><a href="'.url('/appraiser/'.$row->id.'/assignvehicle').'"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a> &nbsp; ('.$row->vehicles()->count().')</td>
        <td>'.$row->CustomerName.'</td>
        <td>'.$row->Contact.'</td>
        <td>'.$row->birthday.'</td>
        <td>'.$plateno.'</td>
        <td>'.$yearmodel.'</td>
        <td>
                 <div class="d-flex flex-row">
                     <a href="'.url('/appraiser/customer/'.$row->id.'/vehicle/view').'"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                     <a href="'.url('/admin/edit').'"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
                     <a href="'.url('/admin/delete').'"  onclick="return confirm(\'Are you sure you want to delete this user?\');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
                </div>
        </td>
      </tr>
   
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



//   $output = '';
// $query = $request->get('query');

// if ($query != '') {
//     $data = Customer::whereHas('user', function ($query) {
//             $query->where('id', auth()->id());
//         })
//         ->where(function($q) use ($query) {
//             $q->where('CustomerName', 'LIKE', "%$query%")
//                 ->orWhere('Contact', 'LIKE', "%$query%")
//                 ->orWhere('birthday', 'LIKE', "%$query%");
//         })
//         ->orderBy('created_at', 'DESC')
//         ->paginate(5);
// } else {
//     $data = Customer::whereHas('user', function ($query) {
//             $query->where('id', auth()->id());
//         })
//         ->orderBy('created_at', 'DESC')
//         ->paginate(5);
// }

// if ($data->count() > 0) {
//     foreach ($data as $row) {
//         $output .= '
//         <tr>
//             <td><a href="'.url('/appraiser/'.$row->id.'/assignvehicle').'"><i class="fa-solid fa-plus"></i> <i class="fa-solid fa-car"></i> </a> &nbsp; ('.$row->vehicles()->count().')</td>
//             <td>'.$row->CustomerName.'</td>
//             <td>'.$row->Contact.'</td>
//             <td>'.$row->birthday.'</td>
//             <td>
//                 <div class="d-flex flex-row">
//                     <a href="'.url('/appraiser/customer/'.$row->id.'/vehicle/view').'"><button id="actionbutton" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
//                     <a href="'.url('/admin/edit').'"><button id="actionbutton" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button></a>
//                     <a href="'.url('/admin/delete').'"  onclick="return confirm(\'Are you sure you want to delete this user?\');"><button id="actionbutton" class="btn btn-danger btn-sm"><i class="fa-solid fa-user-slash"></i></button></a>
//                 </div>
//             </td>
//         </tr>';
//     }
// } else {
//     $output = '<tr>
//                 <td align="center" colspan="5">No Data Found</td>
//             </tr>';
// }

// $data = array(
//     'table_data'  => $output,
//     'total_data'  => $data->total(),
// );

// return response()->json($data);

}
}

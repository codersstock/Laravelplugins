<?php
use App\User;

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

Route::get('/qr','QRController@index');
Route::get('/qrread','QRController@read');

Route::get('/excel','ExcelController@index');
Route::post('/excel/import','ExcelController@import')->name('excel.import');

function getUserData(){
    $user = DB::table('users')->get();
    return $user;
}
Route::get('/', function () {
    $users = getUserData();
    return view('welcome',compact('users'));
});

Route::get('/pdf',function(){

    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML(convert_to_html());
    return $pdf->download('users-list.pdf');
})->name('user.pdf');

function convert_to_html(){
    $data = getUserData();
    $output = '
    <style>
    table{
        border-collapse:collapse;
        width:100%;
    }
    
td,th{
padding:5px;
border:0.8px solid #000;
}

.email{
    color:blue;
}
.logo{
    margin:20px 0px;
}
tr:nth-child(1){
    background:gray;
}
    </style>
    <center>
    <div class="logo">
    <img src="http://ebravo.pk/images/logo.png" width="150px" height="70px">
    </div>
    </center>
    <table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
    </tr>';

 foreach($data as $user){
    $output.=  '<tr>
        <td>' . $user->id  . '</td>' .
        '<td>' . $user->name  . '</td>' .
        '<td class="email">' . $user->email  . '</td>' .
        '<td>' . $user->created_at  . '</td>' .
      
   ' </tr>';
 }

  $output.='</table>';
    
    return $output;
}

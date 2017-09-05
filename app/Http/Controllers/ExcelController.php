<?php

namespace App\Http\Controllers;

use App\Diamond;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Anchu\Ftp\Facades\FTP;

class ExcelController extends Controller
{
    public function downloadExcel($type)
    {

                $data = Diamond::get()->toArray();
                return Excel::create(Carbon::now() . 'diamonds_csv' , function($excel) use ($data) {
                        $excel->sheet('mySheet', function($sheet) use ($data)
                            {
                                $sheet->fromArray($data);
                            });
             })->download($type);

    }

    public function upload()
    {
    	return view('excels/uploadExcel');
    }

    public function importClients()
    {

                $fileNames = ['RU-DiamondData.csv'];
                $connIPs = ['54.254.191.140'];
                $ftp_user_names = ['ru_user1'];
                $ftp_user_passes =  ['ru_user2017'];

                $local_file = 'files/' . $fileNames[0];
                $server_file = $fileNames[0];

                // set up basic connection
                $conn_id = ftp_connect($connIPs[0]);

                // login with username and password
                $login_result = ftp_login($conn_id, $ftp_user_names[0], $ftp_user_passes[0]);

                // try to download $server_file and save to $local_file
                if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
                    echo "Successfully written to $local_file\n";
                } else {
                    echo "There was a problem\n";
                }

                // close the connection
                ftp_close($conn_id);


        // $path = Input::file('excel')->getRealPath();
        $results = Excel::load($local_file, function($reader){
                                                $reader->all();
                                                })->get();

       unlink($local_file);
       // dd(parse_url('http://segoma.com/v.php?type=view&id=N12SEP444'));
        $this->importToDatabase($results);


        return view('excels.clients', ['clients' => $results]);
    }

    public function importToDatabase($data)
    {
        $usRate = 7.81;
        $supplierFactor = 1.15;
        if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'stock' => $value->stock, 
                    'netPrice' => $value->totalprice * $usRate * $supplierFactor,
                    'certificate' => $value->certificate, 
                    'shape' => $value->shape,
                    'weight' => $value->weight, 
                    'color' => $value->color,
                    'clarity' => $value->clarity, 
                    'cut' => $value->cut,
                    'polish' => $value->polish, 
                    'symmetry' => $value->symmetry,
                    'fluroscence' => $value->fluroscence, 
                    'lab' => $value->lab,
                    'location' => $value->location, 
                    'imageLink' => parse_url($value->imageLink, PHP_URL_QUERY),
                    'videoLink' => $value->videoLink,
                    ];
                }

                if(!empty($insert)){
                    DB::table('diamonds')->insert($insert);
                    // dd($insert);
                    dd('Insert Record successfully.');
                }
            }
                return;
        }
}

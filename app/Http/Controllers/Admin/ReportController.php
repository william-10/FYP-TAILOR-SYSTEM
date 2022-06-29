<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use App\Models\User;
use App\Models\Tailor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {   $tailor=Tailor::all();
        $customer=User::all();
        return view('admin.report.index',compact('tailor','customer'));
    }

    public function reportpdf()
    {
        $tailor=$this->get_tailor_data();
        return view('admin.report.pdf',compact('tailor'));
    }

    public function get_tailor_data()
    {
            $tailor_data=Tailor::get();

            return $tailor_data;
    }

    public function pdf()
    {
        $tailor = Tailor::get();
        $pdf = PDF::loadView('admin.report.pdf', compact('tailor'));
        
        return $pdf->stream('tailor.pdf');
    }

    public function convert_customer_data_to_html()
    {
        $tailor_data=$this->get_tailor_data();
        $output='
        <h3 align="center">Tailor Data</h3>
        <table width="100%" style="border-collapse:collapse;border:0px;">
            <tr>
                <th style="border:1px solid;padding:12px;" width="20%" >NAME</th>
                <th style="border:1px solid;padding:12px;" width="30%" >EMAIL</th>
                <th style="border:1px solid;padding:12px;" width="15%" >PHONE</th>
                <th style="border:1px solid;padding:12px;" width="15%" >LOCATION</th>
                <th style="border:1px solid;padding:12px;" width="20%" >STATUS</th>

            </tr>';

                foreach ($tailor_data as $tailor) {
                        $output .='
                        <tr>
                <th style="border:1px solid;padding:12px;" width="20%" >'.$tailor->tailor_name.'</td>
                <td style="border:1px solid;padding:12px;" width="30%" >'.$tailor->email.'</td>
                <td style="border:1px solid;padding:12px;" width="15%" >'.$tailor->phone.'</td>
                <td style="border:1px solid;padding:12px;" width="15%" >'.$tailor->region.'</td>
                <td style="border:1px solid;padding:12px;" width="20%" >'.$tailor->status.'</td>

            </tr>
                            ';
                }
                    $output .='</table>';
                    return $output;
    }
}


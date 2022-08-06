<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Maatwebsite\Excel;
use App\Models\loginuser;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

use App\Exports\UsersExport;
use App\Exports\UserFeedbackExport;
use App\Exports\UsersFeedbackExportAll;
use App\Exports\UsersTestReportExport;
use App\Exports\UsersTestExport;
use App\Exports\UserTestExportAll;
use App\Exports\UsersDemographicExport;
class ExportExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function exportDemoData($UserID) 
    {
        return Excel::download(new UsersDemographicExport($UserID), 'usersDemoGraphicData.xlsx');
    }

    public function exportTestData($UserID,$testMode) 
    {
        return Excel::download(new UsersTestExport($UserID,$testMode), 'usersTestData.xlsx');
    }
    public function exportReportData($UserID,$testMode,$testID) 
    {
        return Excel::download(new UsersTestReportExport($UserID,$testMode,$testID), 'usersTestReportData.xlsx');
    }
    public function exportfeedbackData($UserID) 
    {
        return Excel::download(new UserFeedbackExport($UserID), 'userFeedbackData.xlsx');
    }
    
    #EXPORT ALL TEST DIRECT WITHOUT USER ENVOLVMENT 
    public function exportReportDataALL($testMode,$testID) 
    {
        $dateSubmit = Carbon::now();
        return Excel::download(new UserTestExportAll($testMode,$testID),"usersTestReportData-".$testMode."-".$testID."-".$dateSubmit.".xlsx");
    }
    #EXPORT ALL FEEDBACK DATA ONCE
    public function exportfeedbackDataAll() 
    {
        $dateSubmit = Carbon::now();
        return Excel::download(new UsersFeedbackExportAll(), "userFeedbackDataAll-".$dateSubmit.".xlsx");
    }
    // function excel()
    // {
    // //  $customer_data = DB::table('tbl_customer')->get()->toArray();
    // //  $customer_array[] = array('Customer Name', 'Address', 'City', 'Postal Code', 'Country');
    // $customer_data=loginuser::all();
    //  foreach($customer_data as $customer)
    //  {
    //   $customer_array[] = array(
    //    'User Name'  => $customer->name,
    //    'Email'   => $customer->email,
    //    'Mobile'    => $customer->mobile,
    //    'User Code'  => $customer->UserID,
    //    'Approved'   => $customer->approved,
    //    'Created At'  => $customer->created_at 
    //   );
    //  }
    //  Excel::create('Customer Data', function($excel) use ($customer_array){
    //   $excel->setTitle('Customer Data');
    //   $excel->sheet('Customer Data', function($sheet) use ($customer_array){
    //    $sheet->fromArray($customer_array, null, 'A1', false, false);
    //   });
    //  })->download('xlsx');
    // }
}

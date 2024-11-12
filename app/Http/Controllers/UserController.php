<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Mpdf\Mpdf;


class userController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index' , compact('users'));
    }

    public function import(Request $request) 
    {
        $excelFile = Excel::import(new UsersImport, $request->file('file'));
        
        return redirect('/users')->with('success', 'All good!');
    }
    public function downloadPdf(){
        $users = User::all();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'default_font' => 'DejaVuSans',
            'format' => 'A4'
        ]);
        
        $html = view('pdf.user', ['users' => $users])->render();
        
        $mpdf->WriteHTML($html);
        
        return $mpdf->Output('users.pdf', 'I');
    }

    public function update(Request $request) {
        // منطق تحديث بيانات المستخدم
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/users')->with('success', 'User updated successfully!');
    }

    public function delete(Request $request) {
        // منطق حذف المستخدم
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully!');
    }

    public function edit($id) {
        // منطق جلب بيانات المستخدم للتعديل
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function deleteAll()
    {
        // حذف جميع المستخدمين
        User::truncate(); // أو يمكنك استخدام User::query()->delete(); إذا كنت تريد حذف السجلات مع الحفاظ على الـ IDs

        return redirect('/users')->with('success', 'تم حذف جميع المستخدمين بنجاح!');
    }
}

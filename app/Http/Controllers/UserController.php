<?php
namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function LoginPage()
    {
        return view('pages.login-page');
    }

    public function VerifyPage()
    {
        return view('pages.verify-page');
    }


    public function UserLogin(Request $request):JsonResponse
    {
        try {
            $UserEmail=$request->UserEmail;
            $OTP=rand (100000,999999);
            $details = ['code' => $OTP];
            Mail::to($UserEmail)->send(new OTPMail($details));
            User::updateOrCreate(['email' => $UserEmail], ['email'=>$UserEmail,'otp'=>$OTP]);
            return ResponseHelper::Out('success',"A 6 Digit OTP has been send to your email address",200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail',$e,200);
        }
    }


    public function VerifyLogin(Request $request):JsonResponse
    {
            $UserEmail=$request->UserEmail;
            $OTP=$request->OTP;

            $verification= User::where('email',$UserEmail)->where('otp',$OTP)->first();

            if($verification){
                User::where('email',$UserEmail)->where('otp',$OTP)->update(['otp'=>'0']);
                $token=JWTToken::CreateToken($UserEmail,$verification->id);
                return  ResponseHelper::Out('success',"",200)->cookie('token',$token,60*24*30);
            }
            else{
                return  ResponseHelper::Out('fail',null,401);
            }
    }

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }










    public function UserListPage(){
        $users = User::all();
        return view('dashboard.component.user.user-list', compact('users'));
    }
    
   public function UserAssignRoleEditPage($id)
    {
        $user = User::find($id); 
      
        if (!$user) {
            return redirect()->route('backend.components.user.user-list')->with('error', 'User not found.');
        }
        $roles = Role::all();
        return view('dashboard.component.user.assign-role', compact('user', 'roles'));
    }


    public function UserAssignRoleUpdate(Request $request, $id)
    {
       
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user-list')->with('error', 'User not found.');
        }

        $roles = $request->roles;

        $user->syncRoles($roles);

        return redirect()->route('user-list')->with('success', 'Roles updated successfully!');
    }


}


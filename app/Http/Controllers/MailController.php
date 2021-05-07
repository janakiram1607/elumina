<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;


class MailController extends Controller {
    
    public function sendEmail(Request $request) {
        try{
            $status['status']         = 'danger';
            $status['msg']            = 'Something Went Wrong. Please Try Again';
            $this->data['userId']     = (isset($request->curid) && ($request->curid>0) ? $request->curid : 0);
            $this->data['acttype']    = (isset($request->type) && ($request->type>0) ? $request->type : 0);
            $this->data['email']      = (isset($request->email) && ($request->email!="") ? trim($request->email) : "");
            if(($this->data['userId']>0) && ($this->data['acttype']>0) && ($this->data['email']!="")){
                if(User::find($this->data['userId'])->update(['workflowengine'=>$this->data['acttype']])){
                    $status['msg']      = ($this->data['acttype'] == 3 ? 'Approved' : 'Rejected');
                    $mailData = [
                        'title'     => 'Test Email',
                        'msg'       => $status['msg']
                    ];
                    /* Mail Section starts */
                    Mail::to($this->data['email'])->send(new EmailDemo($mailData));
                    if(Response::HTTP_OK == 200){
                        $status['status']   = ($this->data['acttype'] == 3 ? 'success' : 'info');
                    }
                }
                /* Mail Section ends */
            }
        }catch (\Exception $e) {
                $status['status'] = 'danger';
                $status['msg']  = $e->getMessage();
        }
        return response()->json($status);die();
    }
    public function __destruct() {
        unset($this->data);
    }
}
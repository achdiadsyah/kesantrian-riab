<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentPayment;

class IsPsbPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $studentData = Student::where('user_id', auth()->user()->id)->first();
        $studentPaymentStatus = StudentPayment::where(['student_id' => $studentData->id, 'payment_type' => 'psb'])->first();
        
        if(auth()->user()->referral_code !== NULL){
            return $next($request);
        }
        if ($studentPaymentStatus && $studentPaymentStatus->status == 'accepted') {
            return $next($request);
        }
        return redirect()->back()->with([
            'msg' => 'Upps, we still process your payment',
            'icon' => 'warning',
            'confirmButtonColor' => 'warning',
        ]);
    }
}

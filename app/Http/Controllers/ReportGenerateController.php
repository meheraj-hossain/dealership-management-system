<?php

namespace App\Http\Controllers;

use App\EmployeeManagement;
use App\Expense;
use App\Order;
use App\Stock;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportGenerateController extends Controller
{
    public function perMonthCalculation(){

        $title= 'Per Month Calculation Report';

//        $total_sells = Transaction::select(DB::raw('sum(paid_amount) as sum'),'created_at')->get()->groupBy(function ($date){
//            return Carbon::parse($date->created_at)->format('M');
//        });

        $total_sells = Transaction::select(
            DB::raw('sum(paid_amount) as total_sale'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )
            ->groupBy('months')
            ->get()->toArray();

        $employee_salaries = EmployeeManagement::select(
            DB::raw('sum(salary) as total_salary'),
            DB::raw('sum(bonus) as total_bonus'),
            DB::raw('sum(commission) as total_commission'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )
            ->where('is_paid','Yes')
            ->groupBy('months')
            ->get()->toArray();

        $other_expenses = Expense::select(
            DB::raw('sum(amount) as total_expense'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )
            ->groupBy('months')
            ->get()->toArray();

        $total_purchases = Stock::select(
            DB::raw('sum(total_purchased_price) as total_purchase'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        ) ->groupBy('months')
            ->get()->toArray();


        $data = array_merge($total_sells, $employee_salaries, $other_expenses, $total_purchases);
        $output=[];
        foreach ($data as $item) {
                // Initialize the person
                if (!isset($output[$item['months']])) {
                    $output[$item['months']] = ["months" => $item['months'], "total_sale" => 0, "total_salary" => 0, "total_expense"=>0, "total_purchase"=>0, "total_bonus"=>0, "total_commission"=>0];
                }
                // Add values
                if (isset($item['total_sale']))
                    $output[$item['months']]['total_sale'] += $item['total_sale'];
                if (isset($item['total_salary']))
                    $output[$item['months']]['total_salary'] += $item['total_salary'];
                if (isset($item['total_expense']))
                    $output[$item['months']]['total_expense'] += $item['total_expense'];
                if (isset($item['total_purchase']))
                    $output[$item['months']]['total_purchase'] += $item['total_purchase'];
                if (isset($item['total_bonus']))
                    $output[$item['months']]['total_bonus'] += $item['total_bonus'];
                if (isset($item['total_commission']))
                    $output[$item['months']]['total_commission'] += $item['total_commission'];
        }
        return view('admin.report.per_month_calculation',compact('title','output'));
    }


    public function totalOrderPerMonth(){

        $title='Total Order Per Month';
        $pending = Order::select(
            DB::raw("COUNT(order_status) as Pending"),
            DB::raw("user_id as user")
            )->where('order_status','Pending')
            ->groupBy('user_id')
            ->get()->toArray();

        $approved = Order::select(
            DB::raw("COUNT(order_status) as Approved"),
            DB::raw("user_id as user")
        )->where('order_status','Approved')
            ->groupBy('user')
            ->get()->toArray();

        $shipped = Order::select(
            DB::raw("COUNT(order_status) as Shipped"),
            DB::raw("user_id as user")
        )->where('order_status','Shipped')
            ->groupBy('user')
            ->get()->toArray();


        $delivered = Order::select(
            DB::raw("COUNT(order_status) as Delivered"),
            DB::raw("user_id as user")
        )->where('order_status','Delivered')
            ->groupBy('user')
            ->get()->toArray();

        $total_order = Order::select(
            DB::raw("COUNT(id) as total_order"),
            DB::raw("user_id as user")
        )->groupBy('user')
            ->get()->toArray();

        $data = array_merge($pending, $approved, $shipped, $delivered,$total_order);
        $output=[];
        foreach ($data as $item) {
            // Initialize the person
            if (!isset($output[$item['user']])) {
                $output[$item['user']] = ["user" => $item['user'], "Pending" => 0, "Approved" => 0, "Shipped"=>0, "Delivered"=>0,"total_order"=>0];
            }
            // Add values
            if (isset($item['Pending']))
                $output[$item['user']]['Pending'] += $item['Pending'];
            if (isset($item['Approved']))
                $output[$item['user']]['Approved'] += $item['Approved'];
            if (isset($item['Delivered']))
                $output[$item['user']]['Delivered'] += $item['Delivered'];
            if (isset($item['Shipped']))
                $output[$item['user']]['Shipped'] += $item['Shipped'];
            if (isset($item['total_order']))
                $output[$item['user']]['total_order'] += $item['total_order'];
        }

        dd($output);
        return view('admin.report.total_order_per_month',compact('title','output'));
    }
    public function userTransactionStatus(){
        $title = 'User Transaction Status';
        $total_due = Order::select(
            DB::raw("SUM(total) as total_due"),
            DB::raw("user_id as user")
        )->where('order_status','!=','Cancelled')
            ->groupBy('user')
            ->get()->toArray();

        $total_paid = Transaction::select(
            DB::raw("SUM(paid_amount) as total_paid"),
            DB::raw("user_id as user")
        )->groupBy('user')
            ->get()->toArray();

        $data = array_merge($total_due,$total_paid);
        $output = [];
        foreach ($data as $item){
            if (!isset($output[$item['user']])){
                $output[$item['user']] = ["user"=>$item['user'],"total_due"=>0, "total_paid"=>0];
            }
            if (isset($item['total_due']))
                $output[$item['user']]['total_due']+=$item['total_due'];
            if (isset($item['total_paid']))
                $output[$item['user']]['total_paid']+=$item['total_paid'];

        }
        return view('admin.report.user_transaction_status',compact('title','output'));
    }





}

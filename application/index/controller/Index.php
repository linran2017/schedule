<?php
namespace app\index\controller;

use think\Controller;
use think\Cookie;
use think\Db;

class Index extends Controller{
    /*
     *计划
     */

    public function index(){
        $data=db('user_view')->select();
        //halt($data);
        foreach($data as $k=>$v){
            if(isset($_GET['month']) && $_GET['year']){
                $year=$_GET['year'];
                $month=$_GET['month'];
                //halt($year.'-'.$month);
                $plan=db('plan')->where('person',$v['name'])
                    ->where('startdate','between time',[$year.'-'.$month.'-1',$year.'-'.$month.'-31'])
                    ->where('enddate','between time',[$year.'-'.$month.'-1',$year.'-'.$month.'-31'])
                    ->order('ssrw desc')
                    ->select();
                $presentYear=(int)$year;
                $presentMonth=(int)$month;
            }else{
                $nowYear=date('20y',time());
                //halt($nowYear);
                $nowMonth=date('m',time());
                //halt($nowYear.'-'.$nowMonth);
                //halt($nowMonth);
                $plan=db('plan')->where('person',$v['name'])
                    ->where('startdate','between time',[$nowYear.'-'.$nowMonth.'-1',$nowYear.'-'.$nowMonth.'-31'])
                    ->where('enddate','between time',[$nowYear.'-'.$nowMonth.'-1',$nowYear.'-'.$nowMonth.'-31'])
                    ->order('ssrw desc')
                    ->select();
                $presentYear=(int)$nowYear;
                $presentMonth=(int)$nowMonth;
            }
            $dayPlan=db('plan')->where('person',$v['name'])
                ->where('zxpl',1)
                ->select();
            $weekPlan=db('plan')->where('person',$v['name'])
                ->where('zxpl',2)
                ->select();
            $monthPlan=db('plan')->where('person',$v['name'])
                ->where('zxpl',3)
                ->select();
            $bdqPlan=db('plan')->where('person',$v['name'])
                ->where('zxpl',4)
                ->select();
            $learntask=db('learntask')->where('uid',$v['uid'])
                ->select();
            foreach($plan as $key=>$vo){
                $plan[$key]['duty']=db('duty')->where('id',$vo['ssrw'])
                    ->field('id,title,zycd')->find();
            }
            $data[$k]['fatherimportance']=Cookie::get('fatherimportance'.$v['vid'])!==null?Cookie::get('fatherimportance'.$v['vid']):1;
            $data[$k]['importance']=Cookie::get('importance'.$v['vid'])!==null?Cookie::get('importance'.$v['vid']):1;
            $data[$k]['finish']=Cookie::get('finish'.$v['vid'])!==null?Cookie::get('finish'.$v['vid']):0;
            $data[$k]['plan']=$plan;
            $data[$k]['dayplan']=$dayPlan;
            $data[$k]['weekplan']=$weekPlan;
            $data[$k]['monthplan']=$monthPlan;
            $data[$k]['bdqplan']=$bdqPlan;
            $data[$k]['learntask']=$learntask;
            //$d='2017-11-19';
            //$d=date('20y-m-',strtotime($d));
            //halt($d);
        }
        $headerTitle=$presentYear.'年度'.$presentMonth.'月计划安排';
        //halt($presentYear.'-'.$presentMonth);
        $totalfatherimportance=Cookie::get('totalfatherimportance')!==null?Cookie::get('totalfatherimportance'):1;
        $totalimportance=Cookie::get('totalimportance')!==null?Cookie::get('totalimportance'):1;
        $totalstatus=Cookie::get('totalstatus')!==null?Cookie::get('totalstatus'):0;
        // halt($data);
        //halt($totalstatus);
        return view('',compact('data','presentYear','presentMonth','headerTitle','totalfatherimportance','totalimportance','totalstatus'));
    }


    /*
     *任务
     */
    public function duty(){
        $data=db('user_view')->select();
        foreach($data as $k=>$v){
            if(isset($_GET['month']) && $_GET['year']){
                $year=$_GET['year'];
                $month=$_GET['month'];
                //halt($year.'-'.$month);
                $duty =db('duty')->where('user|zrr','like','%'.$v['name'].'%')
                    //->whereTime('d.startdate', '>=', $year . '-' . $month . '-31')
                    //->whereTime('d.startdate', '<=', $year . '-' . $month . '-31')
                    ->select();
                $presentYear=(int)$year;
                $presentMonth=(int)$month;
             /*   $startdate=$year.'-'.$month.'-1';
                $enddate=$year.'-'.$month.'-31';
                $sql="SELECT * FROM po_duty WHERE(user LIKE '%".$v['name']."%' OR zrr LIKE '%".$v['name']."%') 
                AND (DateDiff(startdate,'".$startdate."')<=0 and DateDiff(enddate,'".$enddate."')>=0)";
                 $duty=Db::query($sql);*/
            }else{
                $nowYear=date('20y',time());
                //halt($nowYear);
                $nowMonth=date('m',time());
                //halt($nowYear.'-'.$nowMonth);
                //halt($nowMonth);
                $duty = db('duty')->where('user|zrr','like','%'.$v['name'].'%')
                  // ->where("{date('20y-m-d')}",'between time',[$nowYear.'-'.$nowMonth.'-1',$nowYear.'-'.$nowMonth.'-31'])
                    ->select();
                $presentYear=(int)$nowYear;
                $presentMonth=(int)$nowMonth;
              /*  $startdate=$nowYear.'-'.$nowMonth.'-1';
                $enddate=$nowYear.'-'.$nowMonth.'-31';
                $sql="SELECT * FROM po_duty WHERE(user LIKE '%".$v['name']."%' OR zrr LIKE '%".$v['name']."%') 
                AND (DateDiff(startdate,'".$startdate."')>=0 and DateDiff(enddate,'".$enddate."')<=0)";
                $duty=Db::query($sql);*/
            }
            foreach ($duty as $key=>$vo){
                $duty[$key]['plan']=db('plan')->where('ssrw',$vo['id'])
                    ->column('title');
                $duty[$key]['plan']=$duty[$key]['plan']?implode(',', $duty[$key]['plan']):'';
            }
            $data[$k]['dutyimportance']=Cookie::get('dutyimportance'.$v['vid'])!==null?Cookie::get('dutyimportance'.$v['vid']):1;
            $data[$k]['dutyfinish']=Cookie::get('dutyfinish'.$v['vid'])!==null?Cookie::get('dutyfinish'.$v['vid']):0;
            $data[$k]['duty']=$duty;
            //$d='2017-11-19';
            //$d=date('20y-m-',strtotime($d));
            //halt($d);
        }
        $dutytotalimportance=Cookie::get('dutytotalimportance')!==null?Cookie::get('dutytotalimportance'):1;
        $dutytotalstatus=Cookie::get('dutytotalstatus')!==null?Cookie::get('dutytotalstatus'):0;
        $headerTitle=$presentYear.'年度'.$presentMonth.'月任务安排';
          //halt($data);
        return view('',compact('data','presentMonth','presentYear','headerTitle','dutytotalimportance','dutytotalstatus'));
    }


    /*
     * 右侧拉长拉短改变色块宽度，就是改变计划结束时间
     */
    public function planwidth(){
        $id=$_POST['id'];
        $enddate=$_POST['enddate'];
        $to=db('plan')->where('id',$id)->value('enddate');
        $to=date('20y-m-',strtotime($to));
        $enddate=$to.$enddate;
        $res=db('plan')->where('id',$id)->update(['enddate'=>$enddate]);
        if($res){
            echo $to.','.$_POST['enddate'].','.$enddate;
        }else{
            echo 0;
        }
    }

    /*
     * 左侧拉长拉短，改变计划开始时间
     */
    public function planleftwidth(){
        $id=$_POST['id'];
        $startdate=$_POST['startdate'];
        $start=db('plan')->where('id',$id)->value('startdate');
        $start=date('20y-m-',strtotime($start));
        $startdate=$start.$startdate;
        $res=db('plan')->where('id',$id)->update(['startdate'=>$startdate]);
        if($res){
            echo $start.','.$_POST['startdate'].','.$startdate;
        }else{
            echo 0;
        }
    }

    /*
     *色块移动， 改变色块的位置，，改变计划开始时间、结束时间
     */
    public function planleft(){
        $id=$_POST['id'];
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $start=db('plan')->where('id',$id)->value('startdate');
        $start=date('20y-m-',strtotime($start));
        $startdate=$start.$startdate;
        $to=db('plan')->where('id',$id)->value('enddate');
        $to=date('20y-m-',strtotime($to));
        $enddate=$to.$enddate;
        $ahead=$_POST['ahead'];
        $ahead=(int)$ahead;
        if($ahead==1){
            $res=db('plan')->where('id',$id)
                ->update(['startdate'=>$startdate,'enddate'=>$enddate,'ahead'=>$ahead]);
        }else{
            $res=db('plan')->where('id',$id)
                ->update(['startdate'=>$startdate,'enddate'=>$enddate]);
        }

        if($res){
            echo $enddate;
        }else{
            echo 0;
        }
    }

    /*
    * 右侧拉长拉短改变色块宽度，就是改变任务结束时间
    */
    public function dutywidth(){
        $id=$_POST['id'];
        $enddate=$_POST['enddate'];
        $to=db('duty')->where('id',$id)->value('enddate');
        $to=date('20y-m-',strtotime($to));
        $enddate=$to.$enddate;
        $res=db('duty')->where('id',$id)->update(['enddate'=>$enddate]);
        if($res){
            echo $to.','.$_POST['enddate'].','.$enddate;
        }else{
            echo 0;
        }
    }

    /*
     * 左侧拉长拉短，改变任务开始时间
     */
    public function dutyleftwidth(){
        $id=$_POST['id'];
        $startdate=$_POST['startdate'];
        $start=db('duty')->where('id',$id)->value('startdate');
        $start=date('20y-m-',strtotime($start));
        $startdate=$start.$startdate;
        $res=db('duty')->where('id',$id)->update(['startdate'=>$startdate]);
        if($res){
            echo $start.','.$_POST['startdate'].','.$startdate;
        }else{
            echo 0;
        }
    }

    /*
     *色块移动， 改变色块的位置，，改变任务开始时间、结束时间
     */
    public function dutyleft(){
        $id=$_POST['id'];
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        $start=db('duty')->where('id',$id)->value('startdate');
        $start=date('20y-m-',strtotime($start));
        $startdate=$start.$startdate;
        $to=db('duty')->where('id',$id)->value('enddate');
        $to=date('20y-m-',strtotime($to));
        $enddate=$to.$enddate;
        $ahead=$_POST['ahead'];
        $ahead=(int)$ahead;
        if($ahead==1){
            $res=db('duty')->where('id',$id)
                ->update(['startdate'=>$startdate,'enddate'=>$enddate,'ahead'=>$ahead]);
        }else{
            $res=db('duty')->where('id',$id)
                ->update(['startdate'=>$startdate,'enddate'=>$enddate]);
        }

        if($res){
            echo $to.','.$_POST['enddate'].','.$enddate;
        }else{
            echo 0;
        }
    }

    /*
     * 计划处理完成
     */
    public function sfwc(){
        $id=$_POST['id'];
        $res=db('plan')->where('id',$id)->update(['sfwc'=>1]);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    /*
   * 任务处理完成
   */
    public function dutyrwjd(){
        $id=$_POST['id'];
        $res=db('duty')->where('id',$id)->update(['rwjd'=>1]);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    /*
     * 移动端
     */
    public function mobile(){
        $data=db('user_view')->select();
        foreach($data as $k=>$v){
            if(isset($_GET['month']) && isset($_GET['year'])){
                $year=$_GET['year'];
                $month=$_GET['month'];
                $plan=db('plan')->where('uid',$v['uid'])
                    ->where('startdate','between time',[$year.'-'.$month.'-1',$year.'-'.$month.'-31'])
                    ->select();
            }else{
                $nowYear='20'.date('y',time());
                //halt($nowYear);
                $nowMonth=date('m',time());
                //halt($nowMonth);
                $plan=db('plan')->where('uid',$v['uid'])
                    ->where('startdate','between time',[$nowYear.'-'.$nowMonth.'-1',$nowYear.'-'.$nowMonth.'-31'])
                    ->select();
            }

            $data[$k]['plan']=$plan;
            //$d='2017-11-19';
            //$d=date('20y-m-',strtotime($d));
            //halt($d);
        }
        //halt($data);
        return view('',compact('data'));
    }
}

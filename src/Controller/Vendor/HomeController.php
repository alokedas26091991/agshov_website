<?php

namespace App\Controller\Student;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * CakePHP HomeController
 * @author Sanjib
 */
class HomeController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->deny();
    }

    /**
     * student dashboard
     */
    public function dashboard() {
		$examlist=TableRegistry::get('UserExaminations');
		$examination=$examlist->find()->where(['user_id'=>$this->Auth->user('id'),'is_allow'=>1])->contain(['Examinations']);
		$this->set(compact('examination'));
        $this->set('_serialize', ['examination']);
      
    }
	 public function wishlist() {
		$examlist=TableRegistry::get('UserExaminations');
		$examination=$examlist->find()->where(['user_id'=>$this->Auth->user('id'),'is_allow'=>0])->contain(['Examinations']);
		$this->set(compact('examination'));
        $this->set('_serialize', ['examination']);
      
    }
 public function news() {
		$newsObj=TableRegistry::get('News');
		$userbranch=$this->userBranch();
	
		if(!empty($userbranch)){
		
		$news=$newsObj->find()->where(['branch_id IN ('.implode(',',$userbranch).')','is_active'=>1]);
		}else{
			$news=$newsObj->find();
			}
		$this->set(compact('news'));
        $this->set('_serialize', ['news']);
      
    }
	public function branch() {
		 $tblUserBranchesObj = TableRegistry::get('UserBranches');
			 $user_id = $this->Auth->user('id');
			$userbranch = $tblUserBranchesObj->find()->contain(['Branches'])->where(['UserBranches.user_id'=>$user_id,'UserBranches.is_active'=>1]);
		$this->set(compact('userbranch'));
        $this->set('_serialize', ['userbranch']);
      
    }
    /**
     * student profile
     */
    public function profile() {
        
    }


    /**
     * student all test
     */
    public function test() {
        if ($this->Auth->user('id')) {
            $tblUserGlossariesObj = TableRegistry::get('UserGlossaries');

            $UserTest = $tblUserGlossariesObj->find('all')->where(['UserGlossaries.user_id' => $this->Auth->user('id')])->order(['UserGlossaries.glossary_id' => 'ASC','UserGlossaries.attempt_date' => 'DESC'])->contain(['Glossaries', 'UserGlossaryAnswers'])->toArray();
            $testid = -1;
            $newarr = [];

            $i = 0;
			$j=0;
            // pr($UserTest);
			//die;
            foreach ($UserTest as $test) {
				
               // pr($test);
                if ($j == 0) {
					//echo $testid;
                    $testid = $test->glossary_id;
					
                }
				if (intval($testid)!= intval($test->glossary_id)) {
					
                    $i++;
                }
                $newarr[$i][] = $test;
					 
                
				$testid = $test->glossary_id;
				$j++;
                
            }
           
            $this->set('UserTest', $newarr);
        }
    }

    public function setting() {

        $this->render('/Author/Home/setting');
    }
     public function viewPdf($slug = null) {

        $this->autoRender = false;
        $Courses = TableRegistry::get('Courses');
        $this->loadComponent('Mypdf', ['is_image' => true]);
        $course = $Courses->findBySlug($slug)->contain(['Users'])->first();
        /* language not english print name in english */
        if($course->course_language_id!=1){
            $english_name = $course->name_in_english;
        }
        else{
            $english_name = $course->name;
        }
        $content = file_get_contents(WWW_ROOT . 'pdf' . DS . 'certificate.html');
        $content = str_replace('WEB_URL', \Cake\Routing\Router::url('/', TRUE), $content);
        $content = str_replace("_NAME", $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name'), $content);
        $content = str_replace("_COURSENAME", $english_name, $content);
        $content = str_replace("_DATE", date("jS \D\a\y \of F, Y"), $content);
        $content = str_replace("_AUTHOR", $course->user->first_name . " " . $course->user->last_name, $content);


        $this->Mypdf->downloadcertificate($content, 'Certificate-' . $course->name . '-' . $this->Auth->user('first_name'));
    }
    /**
     * 
     */
    public function notification(){
        $tblNotificationObj = TableRegistry::get('Notifications');
        if($this->Auth->user('is_student')){
            $show_type = 3;
        }
        else if($this->Auth->user('is_author')){
            $show_type = 2;
        }
        else if($this->Auth->user('is_admin')){
            $show_type = 1;
        }
        $data = $tblNotificationObj->returnNotificationForUser($this->Auth->user('id'),$show_type);
        $this->set(compact('data'));
        
    }
    
    public function deleteNotification()
    {
        $status = FALSE;
        if($this->request->is('post')){
            $tblNotificationObj = TableRegistry::get('Notifications');
            $entity = $tblNotificationObj->get($this->request->data['noti_id']);
            $entity->is_deleted = 1;
            if($tblNotificationObj->save($entity))
            {
                $status = TRUE;
            }
        }
        echo json_encode(['data'=>$status]);
        $this->autoRender = FALSE;
    }
    /**
     * student examination 
     */
    public function examination()
    {
        $this->loadComponent('CompItem');
        $this->set('user_exams',$this->CompItem->getExaminationForUser());
    }
    
    /**
     * student webinars
     * @return [type] [description]
     */
    public function webinars()
    {
        $this->loadComponent('CompItem');
        $webinars = $this->CompItem->getUserWebinars();
        $this->set(compact('webinars'));
    }
	  public function job() {
        
    }

    public function getJobList() {
        $jobsApplications = TableRegistry::get('JobApplications');
        $count = $jobsApplications->find('all')->where(['JobApplications.user_id' => $this->Auth->user('id')])->count();

        $job_applications = $jobsApplications->find('all')->contain(['Jobs', 'Jobs.CompanyDetails'])->where(['JobApplications.user_id' => $this->Auth->user('id')])
                ->orderDesc('application_date');
        $jobs = $this->paginate($job_applications);
        $a = $count;
       // pr($this->paginate);
        //die;
        $b = $this->paginate['limit'];
        $lastpage = (($a - ($a % $b)) / $b) + (($count % $this->paginate['limit']) > 0 ? 1 : 0);
        $nextpage = $this->request->query('page') + 1;
        $arr = [];
        foreach ($jobs as $c) {

            switch ($c->status) {
                case 0:
                    $c->statusNow = 'Submited';
                    break;
                case 1:
                    $c->statusNow = 'Submited';
                    break;
                case 2:
                    $c->statusNow = 'Short Listed';
                    break;
                case 3:
                    $c->statusNow = 'Called for Interview';
                    break;
                case 4:
                    $c->statusNow = 'Selected';
                    break;
                 case 5:
                    $c->statusNow = 'Rejected';
                    break;
                default:
                    $c->statusNow = 'Submit';
            }

           
            $arr[] = $c;
        }
        echo json_encode(['success' => 1, 'data' => $arr, 'total' => $count, 'lastpage' => $lastpage, 'nextpage' => $nextpage]);
        $this->autoRender = FALSE;
    }
public function userBranch(){
			 $tblUserBranchesObj = TableRegistry::get('UserBranches');
			 $user_id = $this->Auth->user('id');
			$userbranch = $tblUserBranchesObj->find()->select(['branch_id'])->where(['user_id'=>$user_id,'is_active'=>1]);
			$ids=[];
			foreach($userbranch as $ub){
				$ids[]=$ub->branch_id;
			}
			 return $ids;
		}
}

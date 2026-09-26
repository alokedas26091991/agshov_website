<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\EventInterface;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use Cake\Http\ServerRequest;
class MyAclComponent extends Component {

    public $components = ['Auth','RequestHandler'];
        
    public $_permissionArray;
    protected $request;

    public function initialize(array $config):void {
        parent::initialize($config);
        $this->request=$config['request'];
        
    }
    
    public function beforeFilter(EventInterface $event){
       
		
        $controller = Inflector::dasherize(Inflector::singularize($this->_registry->getController()->getName()));
		
        $action = strtolower($this->request->getParam("action"));
        $prefix = strtolower($this->request->getParam("prefix"));

        if (($action == 'login' || $action == 'logout')) {
            return true;
        }
        if ($controller == 'login') {
            return true;
        }

        if ($controller == 'ajax') {
            if ($this->Auth->user('id')) {
                return true;
            }
        }

        switch ($prefix) {
            case 'admin':
                $access_type = 2;
				
                if (!$this->Auth->user('id')) {
                    return;
                }
                break;
            case 'author':
                $access_type = 1;
                if (!$this->Auth->user('id')) {
                    return;
                }
                break;
        }

        if($prefix == '')
        {
            $modules = TableRegistry::getTableLocator()->get('Modules');
            if ($modules->getPublicModules($controller)) {
                return true;
            }
        }
        

        $this->User = TableRegistry::getTableLocator()->get('Users');
        $query = $this->User->find('all')
                ->contain(['Roles'])
                ->matching('Roles')
                ->where(['Users.id' => $this->Auth->User('id')]);

        $i = 0;
        $role_ids = array();
        foreach ($query as $q) {
            $role_ids[$i] = $q->roles[$i++]->id;
        }
		

        switch ($action) {

            case 'index':
            case 'ajxdata':
            case 'getdata':
            case 'dashboard':
            case 'view':
            case 'profile':    
            case 'viewcourse':
            case 'download': 
            case 'loadData': 
                $cond = 'perm_view';
                break;
            case 'add':
            case 'create':
            //case 'design':
            case 'publish':
            case 'batch':
            case 'addcoursecoupon':
            case 'addlanguagecoupon': 
            case 'addusercoupon':  
                $cond = 'perm_insert';
                break;
            case 'edit':
            case 'reorder':
            case 'changestatus':
            case 'changefeatured':
            case 'setting':    
            case 'editcoursecoupon': 
            case 'updatecourses':
            case 'viewquestion':
            case 'getquestiondata':
            case 'updateword':
            case 'editsubjectcoupon':
            case 'editlanguagecoupon':
            case 'editusercoupon':
            case 'design':
            case 'batch':
                $cond = 'perm_update';
                break;
            case 'approve': 
            case 'batchchange':
                $cond = 'perm_approve';
                break;    
            case 'seo':
                $cond = 'perm_seo';
                break;
            case 'delete':
            case 'deleteword': 
            case 'deletecourseuser':    
                $cond = 'perm_delete';
                break;
             default :
              $cond = 'perm_view';
              break; 
        }

        $module_permission = TableRegistry::getTableLocator()->get('ModulePermissions');

        $permission = $module_permission->find()
                ->contain(['Modules', 'Roles'])
                ->where(['Roles.id in ' => array_values($role_ids)])
                ->where(['Modules.name' => $controller])
                ->where(['Modules.access_type' => $access_type]);
                //->where(['ModulePermission.' . $cond => 1]);
                //->order(['Modules.order_by' => 'DESC']);
        
        if($prefix == 'admin' && $action == 'batch')
        {
            $cond='perm_update';
        }
		
        $is_permitted = $permission->where(['ModulePermissions.' . $cond => 1])->count();
			
        if ($is_permitted) {
            $this->Auth->allow($action);
            
            /*send permission set to view for admin namespace*/
            if($prefix == 'admin')
            {
                $this->_generatePermission($permission->toArray());
                $controllerName = $event->getSubject();
                $controllerName->set('permission_array',($this->_permissionArray));
              // pr($this->_generateMenu($role_ids));die;
                $controllerName->set('menu_array',$this->_generateMenu($role_ids));
            }
        }
        if (!$is_permitted) {
            if ($this->request->is('post')) {
                echo json_encode(array('data' => array('dataset' => array('t' => 1), 'count' => 1)));
                die;
            } else {
                throw new \Cake\Network\Exception\UnauthorizedException;
            }
        }
    }
    
    /**
     * generate permission and set view var
     * @param type $module_array
     */
    private function _generatePermission($module_array)
    {
        $this->_permissionArray = [
            'perm_view'=>0,
            'perm_insert'=>0,
            'perm_update'=>0,
            'perm_delete'=>0,
            'perm_seo'=>0,
            'perm_approve'=>0
        ];
        foreach ($module_array as $m)
        {
            $this->_permissionArray['perm_view'] = ($this->_permissionArray['perm_view'] !=1) ? intval($m['perm_view']) : $this->_permissionArray['perm_view'];
            $this->_permissionArray['perm_insert'] = ($this->_permissionArray['perm_insert'] !=1) ? intval($m['perm_insert']) : $this->_permissionArray['perm_insert'];
            $this->_permissionArray['perm_update'] = ($this->_permissionArray['perm_update'] !=1) ? intval($m['perm_update']) : $this->_permissionArray['perm_update'];
            $this->_permissionArray['perm_delete'] = ($this->_permissionArray['perm_delete'] !=1) ? intval($m['perm_delete']) : $this->_permissionArray['perm_delete'];
            $this->_permissionArray['perm_seo'] = ($this->_permissionArray['perm_seo'] !=1) ? intval($m['perm_seo']) : $this->_permissionArray['perm_seo'];
            $this->_permissionArray['perm_approve'] = ($this->_permissionArray['perm_approve'] !=1) ? intval($m['perm_approve']) : $this->_permissionArray['perm_approve'];
        }
    }
    
    /**
     * generate menu for admin panel
     * @param type $role_ids
     * @return type
     */
    private function _generateMenu($role_ids=array())
    {
        $module_permission = TableRegistry::getTableLocator()->get('ModulePermissions');
        $all_modules = $module_permission->find()
                ->contain(['Modules'=>  function($q){
                    return $q->select(['order_by','name','caption','icon']);
                    
               
                }])
                ->contain(['Roles'=>  function($q){
                    return $q->select('role_name');
                }])
                ->where(['Roles.id in ' => array_values($role_ids)])
                ->order(['Modules.order_by' => 'ASC'])->toArray();
                
        $menu=[];
        $links = [];
        foreach ($all_modules as $m)
        {
            if($m['module']->name == 'home') continue;
            $key = Inflector::pluralize(Inflector::camelize($m['module']->name,'-'));
            if(is_array($menu) && array_key_exists($key, $menu))
            {
                continue;
            }
            if($m['perm_view'] || $m['perm_insert'] || $m['perm_update'] || $m['perm_delete'] || $m['perm_seo']){
                $menu[$key]['caption'] = $m['module']->caption;
                $menu[$key]['icon'] = $m['module']->icon;
            }
            if($m['perm_view'])
            {
                $links = array_merge($links,['index'=>'List']);
                $menu[$key]['links'] = $links;
            }
            
            if($m['perm_insert'] == 1)
            {
                $links = array_merge($links,['add'=>'Add']);
                $menu[$key]['links'] = $links;
            }
            
            $links = [];
        }
        return $menu;
    }
}

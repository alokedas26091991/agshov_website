<?php

namespace App\Controller;

/**
 * Description of TraitData
 * Fetch Data for the listing in admin panel
 * @author Biswajit
 */
trait TraitData {
    //put your code here
    private $_tableColumnNames;
    private $_conditions;
    
    /**
     * get the data for controller
     * @param type $page
     */
    public function getdata($page=1) {
        
        $conditions = array();
        if($this->request->is('post')){
            $m_conditions = $this->request->input('json_decode');
            if(!($m_conditions->request == 'XmlHttp')){
                return $this->redirect(['action'=>'index']);
            }
            $object_vars = get_object_vars($m_conditions);
            $fl = TRUE;
            foreach ($object_vars as $obj=>$objValue){
               //echo $obj;
               
                if(isset($m_conditions->$obj) && !empty($m_conditions->$obj))
                {
                    if($obj == 'request') continue;
                    $conditions = array_merge($conditions,array($this->name.'.'.$obj=>  $objValue));
                    $fl = FALSE;
                }
            }
            if($fl)
            {
                $conditions = array();
            }
        }
        //$count = $this->{$this->name}->find('all',['showAll'=>TRUE],['conditions'=>$conditions])->count();
        $count = $this->{$this->name}->find('all',['conditions'=>$conditions])->count();
        
        $data = $this->{$this->name}->find('all',['conditions'=>$conditions])
                ->contain(['Users'=>  function($q){
                        return $q->autoFields(false)
                         ->select(['first_name','last_name']);
        }])
                ->limit($this->_paginateCount)
                ->page($page)
                ->orderDesc($this->name.'.id');
        echo json_encode(['count'=>$count,'dataset'=>$data]);
        $this->autoRender = false;
    }
    
    public function setConditions(){
                
        $conditions = array();
        if($this->request->is('post')){
            $m_conditions = $this->request->input('json_decode');
            $object_vars = get_object_vars($m_conditions);
            
            if(!($m_conditions->request == 'XmlHttp')){
                return $this->redirect(['action'=>'index']);
            }
            //get the column names
            $this->_fetchColumnNames();
            
            $exclude_fields = array();
            
            $fl = TRUE;
            foreach ($object_vars as $obj=>$objValue){
                if(isset($m_conditions->$obj) && !empty($m_conditions->$obj))
                {
                    if(in_array($obj, $this->_tableColumnNames))
                    {
                        $conditions = array_merge($conditions,array($this->name.'.'.$obj=>  $objValue));
                    }
                    else
                    {
                        $exclude_fields[$obj] = $objValue;
                    }
                    $fl = FALSE;
                }
            }
            if($fl)
            {
                $conditions = array();
            }
            
            foreach ($exclude_fields as $fieldName=>$value){
                
                //for like
                $pos = strpos($fieldName, 'like');
                if($pos !== FALSE){
                    unset($exclude_fields[$fieldName]);
                    $fieldName = substr($fieldName,$pos+5);
                    $conditions = array_merge($conditions,array($this->name.'.'.$fieldName." like '%$value%'"));
                }
                $pos = strpos($fieldName, 'range');
                if($pos !== FALSE && ($value)!== "undefined|undefined" && $value!="|"){
                    unset($exclude_fields[$fieldName]);
                    $fieldName = substr($fieldName,6);
                    $dateFields = explode("|",$value);
					
                    $d0 = \DateTime::createFromFormat('m/d/Y',$dateFields[0]);
                    $d1 = \DateTime::createFromFormat('m/d/Y',$dateFields[1]);
				
                    $dateFields[0] = $d0->format('Y-m-d');
                    $dateFields[1] = $d1->format('Y-m-d');
                  
                   // $conditions = array_merge($conditions,array($this->name.'.'.$fieldName.' between '.implode(' and ',($dateFields))));
                    $conditions = array_merge($conditions,array($this->name.'.'.$fieldName.' between '."'".$dateFields[0]."'".' and '."'".$dateFields[1]."'"));
                }
            }
        }
        $this->_conditions = $conditions;
    }
    
    /**
     * get the column names from table objects
     */
    private function _fetchColumnNames()
    {
        $schema = $this->{$this->name}->schema();
        $this->_tableColumnNames = $schema->columns();
    }
    
    /**
     * Delete method
     * disable record
     * @param string|null $id Course Language id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $instance = $this->{$this->name}->get($id);
        if($instance)
        {
            $instance->is_deleted = 1;
            if($this->{$this->name}->save($instance))
            {
                $this->Flash->success(__('The item has been deleted.'));
            }
            else
            {
                $this->Flash->error(__('The item could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }
}

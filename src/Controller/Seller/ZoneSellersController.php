<?php
namespace App\Controller\Vendor;
use Cake\Routing\Router;
use App\Controller\Vendor\AppController;
use Cake\ORM\TableRegistry;

/**
 * ZoneSellers Controller
 *
 * @property \App\Model\Table\ZoneSellersTable $ZoneSellers
 */
class ZoneSellersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Zones','States']
        ];
        $zoneSellers = $this->paginate($this->ZoneSellers->find()->where(["seller_id"=>$this->Auth->user('id')]));

        $this->set(compact('zoneSellers'));
        $this->set('_serialize', ['zoneSellers']);
    }
    
    public function shippingdetails()
    {
            
            $source_pin=$this->request->data['source_pin'];
            $des_pin=$this->request->data['des_pin'];
            $order_type=$this->request->data['order_type'];
            $length=$this->request->data['length'];
            $width=$this->request->data['width'];
            $height=$this->request->data['height'];
            $weight=$this->request->data['weight'];
            $amount=$this->request->data['amount'];

        
        
            $timestamp = time();
            $appID = 4583;
            $key = 'GMy+h42lH8A=';
            $secret = 'y2Dh4wGzBOsUnKk33bJSpMOw2mjNqty4m+MOfJMdDAL/WTZfLLzAuW8CiymQjBit+qGBFuuQHlfQ7cJ/Hm+3Ng==';
        
            $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
            $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
            $ch = curl_init();
        
            $data = array( 
                        "sourcePin"=> $source_pin,
                        "destinationPin"=> $des_pin,
                        "orderType"=> $order_type,
                        "modeType"=> 1,
                        "length"=> $length,
                        "width"=> $width,
                        "height"=> $height,
                        "weight"=> $weight,
                        "invoiceValue"=> $amount
                    );
        
            $data_json = json_encode($data);
        
            $header = array(
                "x-appid: $appID",
                "x-sellerid:36326",
                "x-timestamp: $timestamp",
                "x-version:3", // for auth version 3.0 only
                "Authorization: $authtoken",
                "Content-Type: application/json",
                "Content-Length: ".strlen($data_json)
            );
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/pricecalculator');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response  = curl_exec($ch);
            $returndata=(json_decode($response,true));
            $service=$returndata['service'];
            $price=$returndata['pricing'];
            $this->set('price', $price);
            $this->set('service', $service);
            curl_close($ch);
    }
    public function shipping()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Zone Seller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zoneSeller = $this->ZoneSellers->get($id, [
            'contain' => ['Zones']
        ]);

        $this->set('zoneSeller', $zoneSeller);
        $this->set('_serialize', ['zoneSeller']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zoneSeller = $this->ZoneSellers->newEntity();
        if ($this->request->is('post')) {
            $zoneSeller = $this->ZoneSellers->patchEntity($zoneSeller, $this->request->data);
			$zoneSeller->seller_id=$this->Auth->user('id');
            if ($this->ZoneSellers->save($zoneSeller)) {
                $this->Flash->success(__('The seller zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The seller zone could not be saved. Please, try again.'));
            }
        }
       $states = $this->ZoneSellers->States->find('all')->contain(['Zones'=>function ($q) {
                return $q->autoFields(false)
                         ->select(['id','name','state_id']);}])->select(['States.id','States.name']);
        $zones = $this->ZoneSellers->Zones->find('list', ['limit' => 200]);
        $this->set(compact('zoneSeller', 'sellers', 'zones','states'));
        $this->set('_serialize', ['zoneSeller']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zone Seller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zoneSeller = $this->ZoneSellers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zoneSeller = $this->ZoneSellers->patchEntity($zoneSeller, $this->request->data);
            if ($this->ZoneSellers->save($zoneSeller)) {
                $this->Flash->success(__('The zone seller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zone seller could not be saved. Please, try again.'));
            }
        }
        $states = $this->ZoneSellers->States->find('list', ['limit' => 200]);
        $zones = $this->ZoneSellers->Zones->find('list', ['limit' => 200]);
        $this->set(compact('zoneSeller','zones','states'));
        $this->set('_serialize', ['zoneSeller']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zone Seller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zoneSeller = $this->ZoneSellers->get($id);
        if ($this->ZoneSellers->delete($zoneSeller)) {
            $this->Flash->success(__('The zone seller has been deleted.'));
        } else {
            $this->Flash->error(__('The zone seller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

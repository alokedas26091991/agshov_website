<?php 
declare(strict_types=1);
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class CouponComponent extends Component
{
	public function checkCouponCode($coupon_code,$user_id,$app_only=FALSE)
    {

        if(!$user_id)
        {
            $user_id = $this->Auth->user('id');
        }

        $tblCouponObj = TableRegistry::getTableLocator()->get('Coupons');

        $couponDetails = $tblCouponObj->findByCouponCode($coupon_code)
                ->where(['DATE(start_date)<="'.date('Y-m-d').'"'])
                ->andWhere(['DATE(expiry_date)>="'.date('Y-m-d').'"'])
                ->first();

        $coupon_is_valid = FALSE;

        if($couponDetails)
        {
            $coupon_is_valid = TRUE;
        }
        else if($app_only){
            $couponDetails = $tblCouponObj->findByCouponCode($coupon_code)
                ->where(['DATE(start_date)<="'.date('Y-m-d').'"'])
                ->andWhere(['DATE(expiry_date)>="'.date('Y-m-d').'"'])
                ->andWhere(['app_only'=>1])
                ->first();
            if($couponDetails){
                $coupon_is_valid = TRUE;
            }
        }

        
        
        if($coupon_is_valid)
        {
            $result = [];
            //coupon is valid now check on items
			
            switch ($couponDetails->coupon_type)
            {
                case 5:
                    $tblCartItemObj = TableRegistry::getTableLocator()->get('CartItems');
                    $result = $tblCartItemObj->find('all')
                            ->join([
                                'ProductCoupons'=>[
                                    'table'=>'product_coupons',
                                    'type'=>'RIGHT',
                                    'conditions'=>['CartItems.product_id=ProductCoupons.product_id']
                                ],
                                'Carts'=>[
                                    'table'=>'carts',
                                    'type'=>'INNER',
                                    'conditions'=>['Carts.id=CartItems.cart_id']
                                ]
                            ])
                            ->where(['CartItems.parent_id is NULL'])
                            ->where(['ProductCoupons.coupon_id'=>$couponDetails->id])
                            ->andWhere(['Carts.user_id'=>$user_id])
                            ->andWhere(['Carts.coupon_id' => 0])
                            ->select(['CartItems.id','CartItems.item_gross_amount','Carts.id']);
                    break;
                case 4:

                    $tblCartItemObj = TableRegistry::getTableLocator()->get('CartItems');
                    $result = $tblCartItemObj->find('all')
                            ->join([
                                'Products'=>[
                                    'table'=>'products',
                                    'type'=>'INNER',
                                    'conditions'=>['CartItems.product_id=Products.id']
                                ],
                                'ProductCoupons'=>[
                                    'table'=>'product_coupons',
                                    'type'=>'RIGHT',
                                    'conditions'=>['Products.brand_id=ProductCoupons.brand_id']
                                ],
                                'Carts'=>[
                                    'table'=>'carts',
                                    'type'=>'INNER',
                                    'conditions'=>['Carts.id=CartItems.cart_id']
                                ]
                            ])
                            ->where(['CartItems.parent_id is NULL'])
                            ->where(['ProductCoupons.coupon_id'=>$couponDetails->id])
                            ->andWhere(['Carts.user_id'=>$user_id])
                            ->andWhere(['Carts.coupon_id' => 0])
                            ->select(['CartItems.id','CartItems.item_gross_amount','Carts.id']);
                    break;
                case 3:
                    $tblCartItemObj = TableRegistry::getTableLocator()->get('CartItems');
                    $result = $tblCartItemObj->find('all')
                            ->join([
                                'Products'=>[
                                    'table'=>'products',
                                    'type'=>'INNER',
                                    'conditions'=>['CartItems.product_id=Products.id']
                                ],
                                'ProductCoupons'=>[
                                    'table'=>'product_coupons',
                                    'type'=>'RIGHT',
                                    'conditions'=>['Products.type_id=ProductCoupons.type_id']
                                ],
                                'Carts'=>[
                                    'table'=>'carts',
                                    'type'=>'INNER',
                                    'conditions'=>['Carts.id=CartItems.cart_id']
                                ]
                            ])
                            ->where(['CartItems.parent_id is NULL'])
                            ->where(['ProductCoupons.coupon_id'=>$couponDetails->id])
                            ->andWhere(['Carts.user_id'=>$user_id])
                            ->andWhere(['Carts.coupon_id' => 0])
                            ->select(['CartItems.id','CartItems.item_gross_amount','Carts.id']);
                    break;
				 case 2:
                    $tblCartItemObj = TableRegistry::getTableLocator()->get('CartItems');
                    $result = $tblCartItemObj->find('all')
                            ->join([
                                'Products'=>[
                                    'table'=>'products',
                                    'type'=>'INNER',
                                    'conditions'=>['CartItems.product_id=Products.id']
                                ],
                                'ProductCoupons'=>[
                                    'table'=>'product_coupons',
                                    'type'=>'RIGHT',
                                    'conditions'=>['Products.sub_category_id=ProductCoupons.sub_category_id']
                                ],
                                'Carts'=>[
                                    'table'=>'carts',
                                    'type'=>'INNER',
                                    'conditions'=>['Carts.id=CartItems.cart_id']
                                ]
                            ])
                            ->where(['CartItems.parent_id is NULL'])
                            ->where(['ProductCoupons.coupon_id'=>$couponDetails->id])
                            ->andWhere(['Carts.user_id'=>$user_id])
                            ->andWhere(['Carts.coupon_id' => 0])
                            ->select(['CartItems.id','CartItems.item_gross_amount','Carts.id']);
                    break;
					 case 1:
                    $tblCartItemObj = TableRegistry::getTableLocator()->get('CartItems');
                    $result = $tblCartItemObj->find('all')
                            ->join([
                                'Products'=>[
                                    'table'=>'products',
                                    'type'=>'INNER',
                                    'conditions'=>['CartItems.product_id=Products.id']
                                ],
                                'ProductCoupons'=>[
                                    'table'=>'product_coupons',
                                    'type'=>'RIGHT',
                                    'conditions'=>['Products.category_id=ProductCoupons.category_id']
                                ],
                                'Carts'=>[
                                    'table'=>'carts',
                                    'type'=>'INNER',
                                    'conditions'=>['Carts.id=CartItems.cart_id']
                                ]
                            ])
                            ->where(['CartItems.parent_id is NULL'])
                            ->where(['ProductCoupons.coupon_id'=>$couponDetails->id])
                            ->andWhere(['Carts.user_id'=>$user_id])
                            ->andWhere(['Carts.coupon_id' => 0])
                            ->select(['CartItems.id','CartItems.item_gross_amount','Carts.id']);
                    break;
                
            }
            if(is_array($result) && empty($result) || (is_object($result) && $result->count() <=0 ))
            {
                return ['success'=>0,'msg'=>'Coupon already applied or not valid'];
            }
            $cart_id = 0;
            foreach ($result as $r)
            {
                /* update cartitems table */
                $cart_id = $r['Carts']['id'];
                $amt = $r->item_gross_amount;
                if($couponDetails->discount_type == 'p')
                {
                    $discount = $amt *  $couponDetails->discount_value/100;
                }
                elseif($couponDetails->discount_type == 'f')
                {
                    $discount = $couponDetails->discount_value;
                }
                $discount=round($discount);
                $r->discount_amt = $discount;
                $r->item_net_amount = $amt - $discount;
                $r->coupon_id = $couponDetails->id;
                $tblCartItemObj->save($r);
            }
            /* update carts table */
            $tblCartsObj = TableRegistry::getTableLocator()->get('Carts');
            $cartsInfo = $tblCartsObj->get($cart_id);
            $cartsInfo->coupon_id = $couponDetails->id;
            $tblCartsObj->save($cartsInfo);

            $cart_info = $tblCartsObj->find('all')->where(['Carts.user_id' => $user_id])->contain(['CartItems'])->toArray();
            $total = 0;
           
            $totaltax = 0;
            $totaldiscount = 0;
            $total_gross_amount = 0;
            $totalwithtax = 0;
            if (!empty($cart_info)) {
                $cartdata = $cart_info[0]['cart_items'];
                foreach ($cartdata as $datas) {
                    $total_gross_amount = $total_gross_amount + $datas->item_gross_amount;
                    $totaldiscount = $totaldiscount + $datas->discount_amt;
                    $total = $total + $datas->item_net_amount;
                }
                $Taxes = TableRegistry::getTableLocator()->get('Taxes');
                $tax = $Taxes->getTaxesForProducts();
                foreach ($tax as $taxs) {

                    $totaltax = $totaltax + ($total * $taxs['tax_percentage']) / 100;
                }
                $totaltax = round($totaltax);
                $totalwithtax = $total + $totaltax;
                $cart = $tblCartsObj->get($cart_info[0]['id'], ['contain' => []]);
                $cart->gross_amt = $total_gross_amount;
                $cart->discount_amt = $totaldiscount;
                $cart->tax_amt = $totaltax;
                $cart->net_amt = $total;
                $tblCartsObj->save($cart);
            }
            return ['success'=>1,'msg'=>'Coupon applied successfully'];
        }

        return ['success'=>0,'msg'=>'Coupon invalid'];
    }

}

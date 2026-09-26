<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\BrandrequestsTable&\Cake\ORM\Association\HasMany $Brandrequests
 * @property \App\Model\Table\CancelPaymentsTable&\Cake\ORM\Association\HasMany $CancelPayments
 * @property \App\Model\Table\CartOriginalsTable&\Cake\ORM\Association\HasMany $CartOriginals
 * @property \App\Model\Table\CartsTable&\Cake\ORM\Association\HasMany $Carts
 * @property \App\Model\Table\CombosTable&\Cake\ORM\Association\HasMany $Combos
 * @property \App\Model\Table\CourseCommentsTable&\Cake\ORM\Association\HasMany $CourseComments
 * @property \App\Model\Table\CourseRatingsTable&\Cake\ORM\Association\HasMany $CourseRatings
 * @property \App\Model\Table\CourseRemainderEmailsTable&\Cake\ORM\Association\HasMany $CourseRemainderEmails
 * @property \App\Model\Table\InvoiceCourseHistoryTable&\Cake\ORM\Association\HasMany $InvoiceCourseHistory
 * @property \App\Model\Table\InvoiceCoursesTable&\Cake\ORM\Association\HasMany $InvoiceCourses
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\ManualCartsTable&\Cake\ORM\Association\HasMany $ManualCarts
 * @property \App\Model\Table\OfflineCartsTable&\Cake\ORM\Association\HasMany $OfflineCarts
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\RefundRequestsTable&\Cake\ORM\Association\HasMany $RefundRequests
 * @property \App\Model\Table\RequestcallsTable&\Cake\ORM\Association\HasMany $Requestcalls
 * @property \App\Model\Table\ReviewEmailsTable&\Cake\ORM\Association\HasMany $ReviewEmails
 * @property \App\Model\Table\ReviewLikeDislikesTable&\Cake\ORM\Association\HasMany $ReviewLikeDislikes
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\SellerbrandsTable&\Cake\ORM\Association\HasMany $Sellerbrands
 * @property \App\Model\Table\SocialProfilesTable&\Cake\ORM\Association\HasMany $SocialProfiles
 * @property \App\Model\Table\SupportsTable&\Cake\ORM\Association\HasMany $Supports
 * @property \App\Model\Table\TempCartsTable&\Cake\ORM\Association\HasMany $TempCarts
 * @property \App\Model\Table\UserCouponsTable&\Cake\ORM\Association\HasMany $UserCoupons
 * @property \App\Model\Table\UserDeliveryDetailsTable&\Cake\ORM\Association\HasMany $UserDeliveryDetails
 * @property \App\Model\Table\UserDevicesTable&\Cake\ORM\Association\HasMany $UserDevices
 * @property \App\Model\Table\UserLoginsTable&\Cake\ORM\Association\HasMany $UserLogins
 * @property \App\Model\Table\UserProductsTable&\Cake\ORM\Association\HasMany $UserProducts
 * @property \App\Model\Table\UserRolesTable&\Cake\ORM\Association\HasMany $UserRoles
 * @property \App\Model\Table\UserSettingsTable&\Cake\ORM\Association\HasMany $UserSettings
 * @property \App\Model\Table\WishlistsTable&\Cake\ORM\Association\HasMany $Wishlists
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
        $this->hasMany('Brandrequests', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CancelPayments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CartOriginals', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Carts', [
            'foreignKey' => 'user_id',
        ]);
       
       
        $this->hasMany('Invoices', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ManualCarts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OfflineCarts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('RefundRequests', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Requestcalls', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ReviewEmails', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ReviewLikeDislikes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Sellerbrands', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SocialProfiles', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Supports', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('TempCarts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserCoupons', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserDeliveryDetails', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserDevices', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserLogins', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserProducts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserRoles', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserSettings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Wishlists', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Roles', [
            'joinTable' => 'user_roles',
            'through'=>'UserRoles',
            'foreignKey' => 'user_id'
        ]);
        
        $this->addBehavior('Muffin/Slug.Slug', [
       'displayField'=>'first_name',
	   'Model.beforeSave' => 'beforeSave'
    ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['mobile']), ['errorField' => 'mobile']);

        return $rules;
    }
     public function getUser(\Cake\Datasource\EntityInterface $profile) {

        // Make sure here that all the required fields are actually present
        if (empty($profile->email)) {
            throw new \RuntimeException('Could not find email in social profile.');
        }


        // Check if user with same email exists. This avoids creating multiple
        // user accounts for different social identities of same user. You should
        // probably skip this check if your system doesn't enforce unique email
        // per user.
        $user = $this->find()
                ->where(['email' => $profile->email])
                ->first();

        if ($user) {

            return $user;
        }

        $user = $this->newEmptyEntity();
        $user->email = $profile->email;
        $user->first_name = $profile->first_name;
        $user->last_name = $profile->last_name;
        $user->mobile = $profile->phone;
        $user->address1 = $profile->address;
        $user->password = 'fabini1234';
        $user->date_of_registration = date('Y-m-d');
        $user->is_customer = 1;
         $user->is_active = 1;
        $user->is_email_verified = TRUE;
       
        $this->save($user,['checkRules' => false, 'atomic' => false]);

        $roleObj = \Cake\ORM\TableRegistry::getTableLocator()->get('UserRoles');
        $new_role = $roleObj->newEmptyEntity();
        $new_role->user_id = $user->id;
        $new_role->role_id = 4;
        $roleObj->save($new_role);

       
        
       
        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }


        return $user;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
{
    $query
        ->where(['Users.is_mobile_verified' => 1]);

    return $query;
}

}

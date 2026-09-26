<?php

if($this->request->session()->read('Auth.User.is_admin')=='1'){
echo "gfhfghfg";
echo $this->element('dashboard/user_dashboard');
}
if($this->request->session()->read('Auth.User.user_type')==2){

echo $this->element('dashboard/user_dashboard');
}
if($this->request->session()->read('Auth.User.user_type')=='3'){

echo $this->element('dashboard/user_dashboard');
}

?>
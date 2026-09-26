
<style>



.tree ul {
  position: relative;
  padding: 1em 2px;
  white-space: nowrap;
  margin: 0 auto;
  text-align: center;
}
.nopadding{
	padding: 0 0 !important;
}
.tree ul::after {
  content: '';
  display: table;
  clear: both;
}

.tree li {
  display: inline-block;
  vertical-align: top;
  text-align: center;
  list-style-type: none;
  position: relative;
  //padding: 1em .5em 0 .5em;
}
.tree li::before, .tree li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 50%;
  border-top: 1px solid #ccc;
  width: 50%;
  height: 1em;
}
.tree li::after {
  right: auto;
  left: 50%;
  border-left: 1px solid #ccc;
}
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}
.tree li:only-child {
  padding-top: 0;
}
.tree li:first-child::before, .tree li:last-child::after {
  border: 0 none;
}
.tree li:last-child::before {
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
}
.tree li:first-child::after {
  border-radius: 5px 0 0 0;
}

.tree ul ul::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  border-left: 1px solid #ccc;
  width: 0;
  height: 1em;
}

.tree li a {
  border: 1px solid #ccc;
  padding: .5em .75em;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
  color: #333;
  position: relative;
  top: 1px;
 
}

.tree li a:hover {
  background: #607D8B;
  color: #fff;
  border: 1px solid #607D8B;
}

.tree li a:hover + ul li::after,
.tree li a:hover + ul li::before,
.tree li a:hover + ul::before,
.tree li a:hover + ul ul::before {
  border-color: #607D8B;
}
.fontsz{
	font-size:11px!important;
}

.popover {
    position: absolute;
    left: -50%;
    top: 100%;
    z-index: 9999;
    display: block;
    color: black;
}
a {
    position: relative;
}

.popover {
    text-decoration: none;
    color: black;
    position: absolute;
    left: 100%;
    top: 0;
    display: block;
    padding: 0 20px;
}

.popover span {
    display: block;
    font-weight: 700;
}

</style>
<div class="main-content" ng-app="tree" ng-controller="userTree">

	 
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
<div class="row" ng-hide="addshow">
        <div class="col-sm-12">
<div class="tree">
 <tree family="treeFamily"></tree>
	
</div>

</div></div></section></div>



</div>
 
 
 
 <script>var ajxUrl='<?=$this->Url->build('/admin/users',true);?>'

var tree=<?=json_encode($user)?>

</script>

	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js','/admin_template/js/angular-1.5.8/angular-animate.min','/admin_template/js/angular-1.5.8/angular-messages.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal','/admin_template/datetime/js/moment-with-locales','/admin_template/datetime/js/bootstrap-datetimepicker.min','/admin_template/datetime/js/datetimedata','/admin_template/js/angular/tree'],['block'=>'scriptBottom']);?>
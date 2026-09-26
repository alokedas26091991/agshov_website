

  
    <div id="main-wrapper">

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
				
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Questions & Answers</h4>
                               
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                      <th>SL NO</th>
                                      <th>User name</th>
                                      <th>Seller Name</th>
									  <th>Product Name</th>
									  <th>Question</th>
									  <th>Answer</th>
									  <th>Answer by</th>
									 <th>Date</th>
									  <th>Status</th>
									  <th>Action</th>
                                </tr>
                            </thead>
        <?php 
		$c=1;
		foreach ($question as $pro1):
		if($pro1->is_active==1)
		{
			$a="Active";
		}
		else
		{
			$a="Inctive";
		}
		
		if($pro1->ans_by==1)
		{
		    $an="Not Answer Yet";
		}
		else if($pro1->ans_by==2)
		{
		    $an="Admin";
		}
		else
		{
		    $an="Seller";
		}
		?>
            <tr>
                <td><?= $c ?></td>
                <td><?= $pro1->user->first_name ?></td>
                <td><?= $pro1->seller->first_name ?></td>
                <td><?= $pro1->product->name ?></td>
				<td><?= $pro1->question ?></td>
               <td><?= $pro1->ans ?></td>
               <td><?=$an?></td>
               <td><?= $pro1->dt ?></td>
               
			   <td><?= $a ?></td>
                    <td class="actions">
					 
                 <?= $this->Html->link('<span class="">Edit</span><span class="sr-only">' . __('Edit') . '</span>', ['controller'=>'Questions','action' => 'edit', $pro1->id], ['escape' => false, 'class' => '', 'title' => __('Edit')]) ?>
                    
                    <?= $this->Form->postLink('<span class="">delete</span><span class="sr-only">' . __('Delete Question') . '</span>', ['controller'=>'Questions','action' => 'delete', $pro1->id], ['confirm' => __('Are you sure you want to Delete ?'), 'escape' => false, 'class' => '', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php $c++;
		endforeach; ?>
                        </table>
                        </div>
                                       
                                  		 
                                </div>
                                	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>
                            </div>
                        </div>
				
                    </div>


              

            
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    
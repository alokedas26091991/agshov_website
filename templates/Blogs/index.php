 <style>
   .col-lg-9.col-12.shadow.p-3 {
     width: 100%;
   }

   .absolute-col {
     position: relative;
   }

   p.xyz {
     display: none;
   }

   ul {
     list-style-type: none;
   }


   .paginator {
     text-align: center;
     margin: 20px 0;
   }

   .pagination {
     display: inline-block;
     padding: 0;
     margin: 0;
     list-style: none;
   }

   .pagination li {
     display: inline;
   }

   .pagination li a,
   .pagination li span {
     color: #333;
     padding: 8px 16px;
     text-decoration: none;
     background-color: #f4f4f4;
     border: 1px solid #ddd;
     margin-right: 5px;
     border-radius: 4px;
     transition: background-color 0.3s ease, color 0.3s ease;
   }

   .pagination li a:hover {
     background-color: #007bff;
     color: #fff;
     border-color: #007bff;
   }

   .pagination li a:focus {
     outline: none;
     box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
   }

   .pagination li a.active {
     background-color: #007bff;
     color: white;
     border: 1px solid #007bff;
   }

   .pagination li span {
     cursor: not-allowed;
     background-color: #e9ecef;
     color: #6c757d;
   }

   .paginator p {
     color: #555;
     font-size: 14px;
     margin-top: 10px;
   }

   .tagcloud {

     list-style-type: none;
   }

   @media (max-width: 991.98px) {
     .absolute-col {
       position: relative !important;
       margin-top: 20px !important;
     }
   }

   @media (max-width: 575px) {
     li.last {
       display: inline-block;
       margin-top: 30px;
     }
   }

   @media (max-width: 480px) {
     li.last {
       margin-top: 25px;
       display: inline-block;
     }
   }

   @media (max-width: 440px) {

     .pagination li a,
     .pagination li span {
       padding: 5px 6px;
     }

     li.last {
       margin-top: 20px;
       display: inline-block;
     }
   }
 </style>
 <main class="main">
   <div class="page-header text-center" style="background-image: url('/img/page-header-bg.jpg')">
     <div class="container">
       <h1 class="page-title">Blog Details</h1>
     </div>
   </div>
   <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
     <div class="container">
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Blog</li>
       </ol>
     </div>
   </nav>
   <div class="page-content">
     <div class="container">
       <div class="row">
         <div class="col-lg-9">
           <div class="row">
             <?php
              foreach ($post1 as $p) {
              ?>
               <div class="col-lg-6">
                 <article class="entry">
                   <figure class="entry-media">
                     <a href="<?php echo $this->Url->build(["controller" => "Blogs", "action" => "blogdetails", $p->slug]); ?>">
                       <img src="/upload/allimages/<?= $p->banner_photo ?>" alt="<?= $p->title ?>">
                     </a>
                   </figure>
                   <div class="entry-body">
                     <h2 class="entry-title">
                       <a href="single.html"><?= $p->title ?></a>
                     </h2>
                     <div class="entry-content">
                       <p><?= substr($p->details, 0, 100); ?></p>
                     </div>
                   </div>
                 </article>
               </div>
             <?php
              }
              ?>
           </div>
           <div class="paginator">
             <ul class="pagination">
               <?= $this->Paginator->first('<< First') ?>
               <?= $this->Paginator->prev('< Previous') ?>
               <?= $this->Paginator->numbers() ?>
               <?= $this->Paginator->next('Next >') ?>
               <?= $this->Paginator->last('Last >>') ?>
             </ul>
             <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
           </div>
         </div><!-- End .col-lg-9 -->
         <aside class="col-lg-3">
           <div class="sidebar">
           
             <div class="widget widget-cats">
               <h3 class="widget-title">Categories</h3><!-- End .widget-title -->
               <ul>
                 <?php
                  foreach ($postcategories1 as $p1) {
                  ?>
                   <li><a href="<?php echo $this->Url->build(["controller" => "Blogs", "action" => "blogcategory", $p1->slug]); ?>"><?= $p1->name ?></a></li>
                 <?php
                  }
                  ?>
               </ul>
             </div>
             <div class="widget">
               <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->
               <div class="tagcloud">
                 <?php
                  foreach ($tags1 as $p2) {
                  ?>
                   <li style>
                     <a href="<?php echo $this->Url->build(["controller" => "Blogs", "action" => "tag", $p2->slug]); ?>"><?= $p2->name ?></a>
                   <?php
                  }
                    ?>
               </div>
             </div>
           </div>
         </aside>
       </div>
     </div>
   </div>
 </main>
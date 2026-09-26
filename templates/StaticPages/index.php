
<style>

	.imgblock {
		width: 100%;
		height: 500px;
		position: sticky;
		display: block;
		top: 0;
		z-index: 5;
	}
	.imgblock .img-size {
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 10px;
		padding-right: 5px;
		padding-bottom: 5px;
		border-right: 2px solid #ddd;
		border-bottom: 2px solid #ddd;
	}
	.imgblock .img-size img {
		border-radius: 15px;
	}
	
	@media (max-width: 767px) {
	.imgblock {
		height: 270px;	
		position:relative
	 }
	}
	
	
</style>

<section><img src="/upload/slider/<?=$page->banner_photo?>" alt="" class="img-fluid" ></section>
<div class="breadcrumb-section">
<div class="container">
<div class="breadcrumb-section-inner">
<nav aria-label="breadcrumb" class="breadcrumb-nav">
<ol class="breadcrumb mt-0">
<li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="" style="color:red;"><?=$page->page_name?></a></li>
</ol>
</nav>
</div>
</div>
</div>

<section>
<div class="container">
<div class="clr height10"></div>
<div class="row">
<div class="col-lg-4">
<div class="imgblock">
<img src="/upload/slider/<?=$page->side_banner_photo?>" alt="" class="img-size">	
</div>
</div>
<div class="col-lg-8">
<p><?=$page->description?></p>

</div>
</div>
<div class="clr height10"></div>
</div>
</section>






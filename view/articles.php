<?php require('../inc/header.php');?>
<?php require('../db/fetchData.php');?>

<div id="mainbox">
	<img id="img-nav-side" src="../img/nav.png" ><br/>
	<br><br><br><br>
		<nav class="adv" style="display: fixed;">

			<p>  Avertisement part </p>
			<img src="../img/polito.png" width="100px;">
		    <hr>
			<?php if($heads->num_rows > 0) :?>
				<?php while($row = $heads->fetch_assoc()):?>
					<h5 style="clear:left;" ><a href="#<?php echo $row['id'] ;?>">
					<img src="../img/<?php echo$row['pic'];?>" height="50px;" width="50px;" style="float:left;">
					<?php echo $row['title'] ;?><br><br>
					</a></h5>
				<?php endwhile;?>
			<?php endif;?>
		    <hr>
		</nav>
	<main class="artiles normalWidth">
	<div id="showSuggestions"></div>
		<?php if($result->num_rows > 0) :?>
			<?php while($row = $result->fetch_assoc()):?>
				<article id="<?php echo $row['id'] ;?>">
					<fieldset>
						<legend><h3 id="article-title"><?php echo $row['title'] ;?> </h3></legend>
							<figure>
								<img id="article-imgsrc" src="../img/<?php echo $row['pic'] ;?>" width="300px" alt="picture was not found">
								<figcaption><?php echo "published in : ".$row['published'] ;?></figcaption>
							</figure>
						<p class="article-para"><?php echo $row['paragraph'] ;?></p>
						<p class="more"><?php echo $row['more'] ;?></p>
						<label class="seeMore">see more</label>
					</fieldset>
				</article>
			<?php endwhile;?>
		<?php endif;?>
	</main>
</div>
<?php require('../inc/footer.php');?>
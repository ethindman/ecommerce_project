  <?php $this->load->view('partials/head') ?>
  <title>Products List</title>
<script>
		$(document).ready(function() {
			$('button.change-img').on('click', function() {
				var id = $(this).val();
				$('#passId').val(id);
			})
		});
	</script>
<head>
 <?php $this->load->view('partials/header_logoff') ?>
<?php $this->load->view('partials/messages') ?>
<?php $this->load->view('partials/modal') ?>

  <div class="jumbotron">
 
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
			<br>
			<form action="/search_products" method="post">
	    	    <div class="input-group">
			        <input type="text" name="search" placeholder="Search for...">
			        <input type="submit" value="Go!">
			    </div>
	        </form>
        	<br>
		  </div>
      <div class="col-md-6">
		  <br>
		  <button type="submit" class="btn btn-default pull-right"><a class='signin' href='/addProduct'>Add new product</a></button>
	  </div>

<div class="col-md-12">
<table class="table table-bordered">
	<thead class='order'>
		<tr>
			<th>Picture</th>
			<th>ID</th>
			<th>Name</th>
			<th>Inventory Count</th>
			<th>Quantity sold</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
<!-- loops begin -->
<?php 
foreach ($products as $product) {
 ?>
		<tr>
			<td>
				<img src="/assets/img/lg/<?= $product['img_name'] ?>" height="60px" width="80px">
				<button class="change-img link" data-toggle="modal" data-target=".upload-photo" value="<?= $product['id']; ?>">Change Image</button>
			</td>
			<td><?= $product['id'] ?></td>
			<td><?= $product['name'] ?></td>
			<td><?= $product['inventory'] ?></td>
			<td>5</td>
			<td>
			<form class="inline" action="/edit" method="post">
				<input type="hidden" name="id" value="<?= $product['id'] ?>" > 
				<input id="input" type="submit" value="edit" > 
			</form>| 
				<a class="inline" id="red" href='/delete/<?= $product['id'] ?>'>remove</a>
			</td>
		</tr>
<?php 
}
 ?>

<!-- loops end -->
	</tbody>
</table>
<nav>
  <ul class="pager">
<?php 
		if(isset($total_products)) {
			$count = 1;
			for ($i=0;$i<$total_products;$i+=5)
			{
				$url = "<li><a class='pagination' href='/admins/products/" . $count;
				$url = $url . "'>" . $count . "</a></li>";
				echo $url;
				$count++;
			}
		}
?>
  </ul>
</nav>
</div>

</div>
</div>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</body>
</html>
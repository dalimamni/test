<?PHP
include "../core/promoc.php";
include "../views/product-edit.php";
$promo1C=new promoC();
$listepromo=$promo1C->afficherpromo();

//var_dump($listeEmployes->fetchAll());
?>
 <div class="review-tab-pro-inner">
    <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
<table>  
    <tr>
     <th width="10%">Code</th>
     <th width="10%">Title</th>
     <th width="10%">Discount</th>
     <th width="10%">Price</th>
     <th width="10%">New price</th>
      <th width="10%">Delete</th>
       <th width="10%">update</th>

    </tr>
  
<?PHP
foreach($listepromo as $row){
  ?>
  <tr>
  <font color="00FF00"><td><?PHP echo $row['code']; ?></td></font>
  <td><?PHP echo $row['title']; ?></td>
  <td><?PHP echo $row['discount']; ?> %</td>
  <td><?PHP echo $row['price']; ?></td>
  <td>$ <?php echo number_format($row['price'] - ( $row['price'] * ($row['discount'] / 100)));?></td>
   <td><form method="POST" action="supprimer.php">
  <input type="submit" name="delete" class="btn btn-danger bt-xs delete"value="delete">
  <input type="hidden" value="<?PHP echo $row['code']; ?>" name="code">
  </form>
  </td>
    <td><a href="modifierpromo.php?code=<?PHP echo $row['code']; ?>"class="btn btn-warning bt-xs update">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
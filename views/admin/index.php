<?php ob_start(); ?>

<!-- La page d'accueil de la section d'administration -->
<div class="users">
<table class="table table-hover">
  <thead class='thead-dark'>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Message</th>
      <th scope='col'>Permissions</th>
      <th scope='col'>Supprimer</th>
    </tr>
  </thead>
  <tbody>
      <?php while($user = $users->fetch()){ ?>
            <tr class="bg-<?= ($user['state']=='admin')?'dark text-light':'light' ?>">
                <th scope="row"><?=$user['ID']?></th>
                <td><?=$user['username']?></td>
                <td><?=$user['msg']?></td>
                <td>
                 <?=($user['ID']===$_SESSION['ID'])?
                 "<button type='button' class='btn btn-warning'>".$user['state']."</button>" : 
                 "<a type='button' class='btn btn-warning perm' data-toggle='tooltip' data-placement='right' title='Changer les permissions' href='".$user['ID']."'>".$user['state']."</a>" ?>
                </td>
                <td>
                  <?=($user['ID']===$_SESSION['ID'])?
                  'Vous':
                  "<a type='button' class='btn btn-danger supr' href='".$user['ID']."'>Supprimer</a>"?>
                  </td>
            </tr>
      <?php } ?>
  </tbody>
</table>
</div>

<script src="public/js/admin.js"></script>

<?php $content = ob_get_clean();?>
<?php require('views/templates/adminTemplate.php');?>

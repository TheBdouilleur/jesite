<!-- Navigation entre les onglets -->
<nav>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="/admin">Utilisateurs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/projects">Projets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active">Chat</a>
    </li>
  </ul>
</nav>
<br>

<form id='send_msg' >
	<div class="form-group">
		<label for="msg" ><?= $_SESSION['username']?>:</label>
		<textarea autofocus class="form-control" id="msg" name='msg'></textarea>
		<input type="text" hidden value='admin' name='category' id='category'>
	</div>
	<input type='submit' class="btn btn-outline-dark" name='send_msg_admin' id="send_msg_admin" value="Poster" />
</form>

<hr>

<div id="msgs_admin">
    <?php
    foreach($messages as $message) {?>
		<div class="msg">
			<p><a href="/profile/<?=$message['sender_ID']?>" class="unlike"><strong>@<?php echo htmlspecialchars($message['sender']); ?></strong></a>[<?= $message['age']?>]: <?php echo $message['msg']; ?></p>
		</div>
	<?php } ?>
</div>

<!-- <nav aria-label="Page navigation messages">
    <ul class="pagination">
        <?php if(($page-1) >0){ ?>
            <li class="page-item"><a class="page-link" href="/chat_admin/<?=$page-1?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php } else{ ?>
            <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php }
        
        for ($i=1; $i <= $nbPage; $i++) {
            if($page === $i){ ?>
                <li class="page-item active"><a class="page-link" href="/chat_admin/<?=$i?>"><?=$i?></a></li>
            <?php }else{ ?>
                <li class="page-item"><a class="page-link" href="/chat_admin/<?=$i?>"><?=$i?></a></li>
            <?php }
        }?>

        <?php if(($page+1) <=$nbPage){ ?>
            <li class="page-item"><a class="page-link" href="/chat_admin/<?=$page+1?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        <?php } else{ ?>
            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        <?php }?>
    </ul>
</nav> -->

<script src='/public/js/chatAdmin.js'></script>
<script>
	setInterval( 'loadMessages()' , 2000);
	function loadMessages(){
		$('#msgs_admin').load('../../controllers/php/loadAdminMessages.php');
	}
</script>

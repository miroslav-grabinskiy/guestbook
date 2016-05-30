<div class="left-sidebar">
	<div class="messages">
		<? foreach ($data as $message) {?>
			<div class="message">
				<div class="userinfo clearfix">
					<span class="author"><?=$message['userName']?></span>
					<span class="delete" title="delete this message" data-delete-id="<?=$message['commentId']?>">x</span>
					<span class="mail"><?=$message['userEmail']?></span>
				</div>
				<p class="text"><?=$message['message']?></p>
			</div>
		<?}?>
	</div>
</div>
<div class="right-sidebar">
	<form action="" method="POST" class="feedback clearfix">
		<p>Напишите нам</p>
		<input type="text" name="name" placeholder="name" required />
		<input type="email" name="email" placeholder="email" required />
		<textarea name="message" placeholder="сообщение" required></textarea>
		<input type="submit" onclick="return false;" value="Написать">
		<div class="error"></div>
	</form>
</div>
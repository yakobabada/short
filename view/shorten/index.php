<h2>Shorten Url</h2>

<?php if(!empty($param['shortUrl'])){ ?>
<div>
    <p>Your new Short Url is <a href="<?php echo $param['shortUrl'] ?>" target="_blank"><?php echo $param['shortUrl'] ?></a></p>
</div>
<?php } ?>

<form method="post">
    <input type="url" name="longUrl" placeholder="Long URL" required>
    <input type="submit" value="submit">
</form>
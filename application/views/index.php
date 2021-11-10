
<div class="container padding">
<div class="col-lg-offset-4 col-lg-4 " style="border: solid 1px lightgray;border-radius: 5px;background: white;">
<?php
echo form_open('front/index');
?>
<div class="padding">
<input type="text" name="username" placeholder="username" class="form-control">
</div>
<div class="padding">
<input type="password" name="password" placeholder="password" class="form-control">
<input type="checkbox" name="remember"> Remember me
</div>
<div class="padding">
<button type="submit" name="submit" class="btn btn-primary form-control">login</button>
</div>
</form>
</div>
</div>
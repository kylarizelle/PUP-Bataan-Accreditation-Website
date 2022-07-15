<?php
session_start();
echo '<p style="color: red">Please try again after '.((($_SESSION["locked"])+30)-(time())).' seconds.</p><br>
						 ';
                         ?>
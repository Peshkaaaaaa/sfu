 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewort" content="width=device-width, initial-scale=1.0">
    <title>table*</title> 
</head>
<body>
<table align="center">
<tr>
<?php for ($i=1; $i<=5; $i++):?>
    <td>
    <?php for($j=1; $j<=10; $j++){
    echo $i.'x'.$j.'='.$i*$j.'<br>';    
    }?>
    </td>
   <?php endfor;?>
</tr>
<tr>
<?php for ($i=6; $i<=10; $i++):?>
    <td>
    <?php for($j=1; $j<=10; $j++){
        echo $i.'x'.$j.'='.$i*$j.'<br>';
    }?>
    </td>
<?php endfor;?>
</tr>
</table>
</body>
</html>

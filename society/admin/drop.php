<?php 
echo "<select name='wing_id'>";
$query_P="SELECT wing_id FROM wing";

$rslt_p=mysqli_query($con,$query_P);
while($row=mysqli_fetch_assoc($rslt_p))
{
    echo '<option value='.$row["wing_id"].'>'.$row["wing_id"].'</option>';
}
echo "</select>";
?>
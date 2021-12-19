<?php
    include("../classes/DataBase.php");

    $db = new DataBase();

    $sql = "select * from users";

    $result = $db->getConnection($sql);

    echo "<table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Last nameme</th>
            <th>Phone</th>
            <th>Comment</th>
            <th>Created at</th>
        </tr>";
        foreach($result as $item){
        echo "<tr><td>".$item[id]."</td>" ;
        echo "<td>".$item[name]."</td>" ;
        echo "<td>".$item[last_name]."</td>" ;
        echo "<td>".$item[phone]."</td>" ;
        echo "<td>".$item[comment]."</td>" ;
        echo "<td>".$item[created_at]."</td></tr>" ;
    }
    echo "</table>";
?>

